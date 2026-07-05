from django.shortcuts import render, get_object_or_404, redirect
from django.views.generic import ListView, DetailView, CreateView, UpdateView, DeleteView, TemplateView
from django.contrib.auth.mixins import LoginRequiredMixin, UserPassesTestMixin
from django.contrib.auth.decorators import login_required
from django.http import JsonResponse, HttpResponseForbidden
from django.db.models import Q, Count
from django.urls import reverse_lazy
from django.utils.text import slugify
from django.utils.safestring import mark_safe
from django.views.decorators.http import require_http_methods
import markdown
import requests
import os

from .models import (
    Post, Comment, Poll, PollOption, Vote, Category, 
    UserProfile, Like, Bookmark
)
from .forms import CommentForm, PollForm, ContactForm

# ========================================
# Post List View
# ========================================
class PostListView(ListView):
    """
    View untuk menampilkan daftar artikel blog dengan filter kategori.
    """
    model = Post
    template_name = 'blog/post_list.html'
    context_object_name = 'posts'
    paginate_by = 10
    
    def get_queryset(self):
        queryset = Post.objects.filter(published=True).select_related('author')
        
        # Filter by category
        category = self.request.GET.get('category')
        if category:
            queryset = queryset.filter(category=category)
        
        # Search functionality
        search_query = self.request.GET.get('q')
        if search_query:
            queryset = queryset.filter(
                Q(title__icontains=search_query) |
                Q(content__icontains=search_query) |
                Q(excerpt__icontains=search_query)
            )
        
        return queryset.order_by('-created_at')
    
    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['categories'] = Category.objects.all()
        context['featured_posts'] = Post.objects.filter(
            published=True, 
            featured=True
        ).order_by('-created_at')[:5]
        return context


# ========================================
# Explore View
# ========================================
class ExploreView(ListView):
    """
    View untuk menampilkan halaman explore dengan konten menarik.
    """
    model = Post
    template_name = 'blog/explore.html'
    context_object_name = 'posts'
    paginate_by = 10

    def get_queryset(self):
        return Post.objects.filter(published=True).order_by('-created_at')

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['categories'] = Category.objects.all()
        return context


# ========================================
# About Page View
# ========================================
class AboutView(TemplateView):
    """
    View untuk halaman about.
    """
    template_name = 'blog/about.html'


# ========================================
# Post Detail View
# ========================================
class PostDetailView(DetailView):
    """
    View untuk menampilkan detail artikel dengan AI Summary dan Polls.
    """
    model = Post
    template_name = 'blog/post_detail.html'
    context_object_name = 'post'
    slug_field = 'slug'
    
    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        post = self.get_object()
        
        # Increment view count
        post.increment_views()
        
        # Get comments
        context['comments'] = post.comments.filter(approved=True)
        context['comment_form'] = CommentForm()
        
        # Get poll if exists
        context['poll'] = getattr(post, 'poll', None)
        
        # Check if user liked this post
        context['user_liked'] = False
        if self.request.user.is_authenticated:
            context['user_liked'] = Like.objects.filter(
                post=post,
                user=self.request.user
            ).exists()
        
        # Check if user bookmarked this post
        context['user_bookmarked'] = False
        if self.request.user.is_authenticated:
            context['user_bookmarked'] = Bookmark.objects.filter(
                post=post,
                user=self.request.user
            ).exists()
        
        # Related posts
        context['related_posts'] = Post.objects.filter(
            category=post.category,
            published=True
        ).exclude(id=post.id).order_by('-created_at')[:3]
        
        # Render markdown content safely
        if post.excerpt:
            excerpt_text = post.excerpt
        else:
            excerpt_text = ' '.join(post.content.split()[:120])
            if len(post.content.split()) > 120:
                excerpt_text += '...'

        context['rendered_excerpt'] = mark_safe(
            markdown.markdown(excerpt_text, extensions=['extra', 'nl2br'])
        )
        context['rendered_content'] = mark_safe(markdown.markdown(post.content, extensions=['extra', 'nl2br']))
        return context


# ========================================
# Generate AI Summary
# ========================================
@login_required
@require_http_methods(["POST"])
def generate_ai_summary(request, post_id):
    """
    View untuk generate AI summary menggunakan API eksternal (OpenAI/Gemini).
    """
    post = get_object_or_404(Post, id=post_id)
    
    # Check if user is author or admin
    if post.author != request.user and not request.user.is_staff:
        return HttpResponseForbidden("Anda tidak memiliki izin untuk melakukan ini")
    
    try:
        # Call OpenAI API or Gemini API
        summary = call_ai_api_for_summary(post.content)
        
        post.ai_summary = summary
        post.ai_summary_generated = True
        post.save()
        
        return JsonResponse({
            'success': True,
            'summary': summary
        })
    except Exception as e:
        return JsonResponse({
            'success': False,
            'error': str(e)
        }, status=500)


def call_ai_api_for_summary(content, max_length=500):
    """
    Helper function untuk memanggil AI API dan mendapatkan ringkasan.
    Anda bisa menggunakan OpenAI, Gemini, atau layanan AI lainnya.
    """
    # Example using OpenAI API
    api_key = os.getenv('OPENAI_API_KEY')
    
    if not api_key:
        return "AI Summary tidak tersedia. Konfigurasi API key terlebih dahulu."
    
    try:
        headers = {
            'Authorization': f'Bearer {api_key}',
            'Content-Type': 'application/json'
        }
        
        data = {
            'model': 'gpt-3.5-turbo',
            'messages': [
                {
                    'role': 'system',
                    'content': 'Anda adalah asisten yang ahli dalam merangkum artikel. Buatlah ringkasan singkat dan padat.'
                },
                {
                    'role': 'user',
                    'content': f'Buatlah ringkasan dari artikel berikut dalam {max_length} karakter:\n\n{content}'
                }
            ],
            'temperature': 0.7,
            'max_tokens': 150
        }
        
        response = requests.post(
            'https://api.openai.com/v1/chat/completions',
            headers=headers,
            json=data,
            timeout=10
        )
        
        if response.status_code == 200:
            result = response.json()
            return result['choices'][0]['message']['content']
        else:
            return f"Error: {response.status_code}"
    
    except Exception as e:
        return f"Error generating summary: {str(e)}"


# ========================================
# Comment Views
# ========================================
@login_required
@require_http_methods(["POST"])
def add_comment(request, post_id):
    """
    View untuk menambahkan komentar pada artikel.
    """
    post = get_object_or_404(Post, id=post_id)
    
    if request.method == 'POST':
        form = CommentForm(request.POST)
        if form.is_valid():
            comment = form.save(commit=False)
            comment.post = post
            comment.author = request.user
            comment.save()
            
            return redirect('blog:post_detail', slug=post.slug)
    
    return redirect('blog:post_detail', slug=post.slug)


# ========================================
# Poll Voting Views
# ========================================
@login_required
@require_http_methods(["POST"])
def vote_poll(request, poll_id):
    """
    View untuk submit vote pada poll.
    """
    poll = get_object_or_404(Poll, id=poll_id)
    
    if not poll.active:
        return JsonResponse({'success': False, 'error': 'Poll sudah ditutup'}, status=400)
    
    option_id = request.POST.get('option_id')
    option = get_object_or_404(PollOption, id=option_id, poll=poll)
    
    # Get user IP address
    ip_address = get_client_ip(request)
    
    try:
        # Check if user already voted
        if request.user.is_authenticated:
            existing_vote = Vote.objects.filter(poll=poll, user=request.user).first()
        else:
            existing_vote = Vote.objects.filter(poll=poll, ip_address=ip_address).first()
        
        if existing_vote:
            # Update existing vote
            old_option = existing_vote.option
            old_option.votes -= 1
            old_option.save()
            
            existing_vote.option = option
            existing_vote.save()
        else:
            # Create new vote
            vote = Vote(
                poll=poll,
                option=option,
                user=request.user if request.user.is_authenticated else None,
                ip_address=ip_address if not request.user.is_authenticated else None
            )
            vote.save()
        
        # Increment option votes
        option.votes += 1
        option.save()
        
        # Get updated results
        results = poll.get_results()
        
        return JsonResponse({
            'success': True,
            'results': [
                {
                    'option': r['option'].text,
                    'votes': r['votes'],
                    'percentage': r['percentage']
                }
                for r in results
            ]
        })
    
    except Exception as e:
        return JsonResponse({'success': False, 'error': str(e)}, status=500)


def get_client_ip(request):
    """
    Helper function untuk mendapatkan IP address klien.
    """
    x_forwarded_for = request.META.get('HTTP_X_FORWARDED_FOR')
    if x_forwarded_for:
        ip = x_forwarded_for.split(',')[0]
    else:
        ip = request.META.get('REMOTE_ADDR')
    return ip


# ========================================
# Like/Unlike Post
# ========================================
@login_required
@require_http_methods(["POST"])
def toggle_like(request, post_id):
    """
    View untuk toggle like pada artikel.
    """
    post = get_object_or_404(Post, id=post_id)
    
    like, created = Like.objects.get_or_create(post=post, user=request.user)
    
    if not created:
        # User already liked, so unlike
        like.delete()
        liked = False
    else:
        liked = True
    
    # Update post like count
    post.likes = Like.objects.filter(post=post).count()
    post.save()
    
    return JsonResponse({
        'success': True,
        'liked': liked,
        'like_count': post.likes
    })


# ========================================
# Bookmark/Unbookmark Post
# ========================================
@login_required
@require_http_methods(["POST"])
def toggle_bookmark(request, post_id):
    """
    View untuk toggle bookmark pada artikel.
    """
    post = get_object_or_404(Post, id=post_id)
    
    bookmark, created = Bookmark.objects.get_or_create(post=post, user=request.user)
    
    if not created:
        # User already bookmarked, so unbookmark
        bookmark.delete()
        bookmarked = False
    else:
        bookmarked = True
    
    return JsonResponse({
        'success': True,
        'bookmarked': bookmarked
    })


# ========================================
# Category Posts View
# ========================================
class CategoryPostsView(ListView):
    """
    View untuk menampilkan artikel berdasarkan kategori.
    """
    model = Post
    template_name = 'blog/category_posts.html'
    context_object_name = 'posts'
    paginate_by = 10
    
    def get_queryset(self):
        self.category = get_object_or_404(Category, slug=self.kwargs['slug'])
        return Post.objects.filter(
            category=self.category.slug,
            published=True
        ).order_by('-created_at')
    
    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['category'] = self.category
        context['categories'] = Category.objects.all()
        return context


# ========================================
# Search View
# ========================================
class SearchView(ListView):
    """
    View untuk pencarian artikel.
    """
    model = Post
    template_name = 'blog/search_results.html'
    context_object_name = 'posts'
    paginate_by = 10
    
    def get_queryset(self):
        query = self.request.GET.get('q', '')
        return Post.objects.filter(
            Q(title__icontains=query) |
            Q(content__icontains=query) |
            Q(excerpt__icontains=query),
            published=True
        ).order_by('-created_at')
    
    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['search_query'] = self.request.GET.get('q', '')
        return context


# ========================================
# User Bookmarks View
# ========================================
class UserBookmarksView(LoginRequiredMixin, ListView):
    """
    View untuk menampilkan artikel yang di-bookmark oleh pengguna.
    """
    model = Bookmark
    template_name = 'blog/user_bookmarks.html'
    context_object_name = 'bookmarks'
    paginate_by = 10
    
    def get_queryset(self):
        return Bookmark.objects.filter(user=self.request.user).order_by('-created_at')


# ========================================
# Contact View
# ========================================
class ContactView(TemplateView):
    """
    View untuk halaman contact dengan form.
    """
    template_name = 'blog/contact.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['form'] = ContactForm()
        return context

    def post(self, request, *args, **kwargs):
        form = ContactForm(request.POST)
        if form.is_valid():
            # You can add email sending logic here if needed.
            context = self.get_context_data()
            context['form'] = form
            context['success'] = True
            return self.render_to_response(context)

        context = self.get_context_data()
        context['form'] = form
        return self.render_to_response(context)
