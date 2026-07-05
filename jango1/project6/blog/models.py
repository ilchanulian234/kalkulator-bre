from django.db import models
from django.contrib.auth.models import User
from django.utils import timezone
from django.utils.text import slugify
from django.urls import reverse

# ========================================
# Post Model
# ========================================
class Post(models.Model):
    """
    Model untuk artikel blog dengan dukungan AI Summary dan kategori.
    """
    CATEGORY_CHOICES = [
        ('technology', 'Technology'),
        ('sustainability', 'Sustainability'),
        ('eco-living', 'Eco Living'),
        ('climate-action', 'Climate Action'),
        ('green-tech', 'Green Tech'),
        ('renewable-energy', 'Renewable Energy'),
        ('wildlife', 'Wildlife'),
        ('zero-waste', 'Zero Waste'),
    ]
    
    title = models.CharField(max_length=200)
    slug = models.SlugField(unique=True, blank=True)
    author = models.ForeignKey(User, on_delete=models.CASCADE, related_name='posts')
    category = models.CharField(max_length=50, choices=CATEGORY_CHOICES, default='technology')
    content = models.TextField()
    excerpt = models.TextField(max_length=500, blank=True)
    featured_image = models.ImageField(upload_to='blog_images/', blank=True, null=True)
    
    # AI Summary Fields
    ai_summary = models.TextField(blank=True, null=True, help_text="Auto-generated summary by AI")
    ai_summary_generated = models.BooleanField(default=False)
    
    # Engagement Fields
    views = models.IntegerField(default=0)
    likes = models.IntegerField(default=0)
    
    # Metadata
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    published = models.BooleanField(default=True)
    featured = models.BooleanField(default=False)
    
    class Meta:
        ordering = ['-created_at']
        verbose_name_plural = 'Posts'
        indexes = [
            models.Index(fields=['-created_at']),
            models.Index(fields=['category']),
            models.Index(fields=['author']),
        ]
    
    def __str__(self):
        return self.title
    
    def save(self, *args, **kwargs):
        if not self.slug:
            base_slug = slugify(self.title)
            slug = base_slug
            counter = 1
            while Post.objects.filter(slug=slug).exists():
                slug = f"{base_slug}-{counter}"
                counter += 1
            self.slug = slug
        super().save(*args, **kwargs)
    
    def get_absolute_url(self):
        return reverse('blog:post_detail', kwargs={'slug': self.slug})
    
    def increment_views(self):
        """Increment view count"""
        self.views += 1
        self.save(update_fields=['views'])
    
    def get_reading_time(self):
        """Calculate estimated reading time in minutes"""
        word_count = len(self.content.split())
        reading_time = max(1, word_count // 200)  # Assume 200 words per minute
        return reading_time


# ========================================
# Comment Model
# ========================================
class Comment(models.Model):
    """
    Model untuk komentar pada artikel blog.
    """
    post = models.ForeignKey(Post, on_delete=models.CASCADE, related_name='comments')
    author = models.ForeignKey(User, on_delete=models.CASCADE)
    content = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    approved = models.BooleanField(default=True)
    
    class Meta:
        ordering = ['-created_at']
    
    def __str__(self):
        return f'Comment by {self.author} on {self.post.title}'


# ========================================
# Poll Model
# ========================================
class Poll(models.Model):
    """
    Model untuk poll yang dapat disematkan dalam artikel.
    """
    post = models.OneToOneField(Post, on_delete=models.CASCADE, related_name='poll', blank=True, null=True)
    question = models.CharField(max_length=500)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    active = models.BooleanField(default=True)
    
    class Meta:
        ordering = ['-created_at']
    
    def __str__(self):
        return self.question
    
    def get_total_votes(self):
        """Get total number of votes across all options"""
        return sum(option.votes for option in self.options.all())
    
    def get_results(self):
        """Get poll results with percentages"""
        total_votes = self.get_total_votes()
        results = []
        
        for option in self.options.all():
            percentage = (option.votes / total_votes * 100) if total_votes > 0 else 0
            results.append({
                'option': option,
                'votes': option.votes,
                'percentage': round(percentage, 1)
            })
        
        return results


# ========================================
# Poll Option Model
# ========================================
class PollOption(models.Model):
    """
    Model untuk opsi dalam sebuah poll.
    """
    poll = models.ForeignKey(Poll, on_delete=models.CASCADE, related_name='options')
    text = models.CharField(max_length=500)
    votes = models.IntegerField(default=0)
    
    class Meta:
        ordering = ['id']
    
    def __str__(self):
        return self.text


# ========================================
# Vote Model
# ========================================
class Vote(models.Model):
    """
    Model untuk mencatat suara pengguna pada poll.
    """
    poll = models.ForeignKey(Poll, on_delete=models.CASCADE, related_name='votes')
    # CUKUP UBAH BARIS DI BAWAH INI: ganti related_name menjadi 'poll_votes'
    option = models.ForeignKey(PollOption, on_delete=models.CASCADE, related_name='poll_votes')
    user = models.ForeignKey(User, on_delete=models.CASCADE, blank=True, null=True)
    ip_address = models.GenericIPAddressField(blank=True, null=True)
    created_at = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        unique_together = ('poll', 'user', 'ip_address')
        ordering = ['-created_at']
    
    def __str__(self):
        return f'Vote on {self.poll.question}'



# ========================================
# Category Model
# ========================================
class Category(models.Model):
    """
    Model untuk kategori artikel blog.
    """
    name = models.CharField(max_length=100, unique=True)
    slug = models.SlugField(unique=True)
    description = models.TextField(blank=True)
    icon = models.CharField(max_length=50, blank=True, help_text="Emoji or icon class")
    color = models.CharField(max_length=7, default='#006400', help_text="Hex color code")
    
    class Meta:
        verbose_name_plural = 'Categories'
        ordering = ['name']
    
    def __str__(self):
        return self.name
    
    def get_absolute_url(self):
        return reverse('blog:category_posts', kwargs={'slug': self.slug})


# ========================================
# User Profile Model
# ========================================
class UserProfile(models.Model):
    """
    Model untuk menyimpan profil pengguna dan preferensi.
    """
    user = models.OneToOneField(User, on_delete=models.CASCADE, related_name='profile')
    bio = models.TextField(blank=True)
    avatar = models.ImageField(upload_to='avatars/', blank=True, null=True)
    preferred_categories = models.ManyToManyField(Category, blank=True, related_name='followers')
    theme_preference = models.CharField(
        max_length=10,
        choices=[('light', 'Light'), ('dark', 'Dark'), ('auto', 'Auto')],
        default='auto'
    )
    email_notifications = models.BooleanField(default=True)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    
    class Meta:
        ordering = ['-created_at']
    
    def __str__(self):
        return f'{self.user.username} Profile'
    
    def get_recommended_posts(self, limit=5):
        """Get recommended posts based on user's preferred categories"""
        if self.preferred_categories.exists():
            return Post.objects.filter(
                category__in=self.preferred_categories.values_list('slug', flat=True),
                published=True
            ).order_by('-created_at')[:limit]
        return Post.objects.filter(published=True).order_by('-created_at')[:limit]


# ========================================
# Like Model
# ========================================
class Like(models.Model):
    """
    Model untuk mencatat like pengguna pada artikel.
    """
    post = models.ForeignKey(Post, on_delete=models.CASCADE, related_name='post_likes')
    user = models.ForeignKey(User, on_delete=models.CASCADE)
    created_at = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        unique_together = ('post', 'user')
        ordering = ['-created_at']
    
    def __str__(self):
        return f'{self.user.username} liked {self.post.title}'


# ========================================
# Bookmark Model
# ========================================
class Bookmark(models.Model):
    """
    Model untuk menyimpan artikel yang di-bookmark oleh pengguna.
    """
    post = models.ForeignKey(Post, on_delete=models.CASCADE, related_name='bookmarks')
    user = models.ForeignKey(User, on_delete=models.CASCADE, related_name='bookmarks')
    created_at = models.DateTimeField(auto_now_add=True)
    
    class Meta:
        unique_together = ('post', 'user')
        ordering = ['-created_at']
    
    def __str__(self):
        return f'{self.user.username} bookmarked {self.post.title}'
