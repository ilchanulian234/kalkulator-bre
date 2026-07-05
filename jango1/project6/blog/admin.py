from django.contrib import admin
from .models import (
    Post, Comment, Poll, PollOption, Vote, 
    Category, UserProfile, Like, Bookmark
)

# ========================================
# Post Admin
# ========================================
@admin.register(Post)
class PostAdmin(admin.ModelAdmin):
    list_display = ('title', 'author', 'category', 'created_at', 'published', 'featured', 'views', 'likes')
    list_filter = ('category', 'published', 'featured', 'created_at')
    search_fields = ('title', 'content', 'excerpt')
    prepopulated_fields = {'slug': ('title',)}
    readonly_fields = ('views', 'likes', 'created_at', 'updated_at')
    
    fieldsets = (
        ('Basic Information', {
            'fields': ('title', 'slug', 'author', 'category')
        }),
        ('Content', {
            'fields': ('excerpt', 'content', 'featured_image')
        }),
        ('AI Summary', {
            'fields': ('ai_summary', 'ai_summary_generated'),
            'classes': ('collapse',)
        }),
        ('Settings', {
            'fields': ('published', 'featured')
        }),
        ('Statistics', {
            'fields': ('views', 'likes', 'created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    def save_model(self, request, obj, form, change):
        if not change:
            obj.author = request.user
        super().save_model(request, obj, form, change)


# ========================================
# Comment Admin
# ========================================
@admin.register(Comment)
class CommentAdmin(admin.ModelAdmin):
    list_display = ('author', 'post', 'created_at', 'approved')
    list_filter = ('approved', 'created_at')
    search_fields = ('author__username', 'content', 'post__title')
    readonly_fields = ('created_at', 'updated_at')
    
    fieldsets = (
        ('Comment Information', {
            'fields': ('post', 'author', 'content')
        }),
        ('Moderation', {
            'fields': ('approved',)
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )


# ========================================
# Poll Admin
# ========================================
class PollOptionInline(admin.TabularInline):
    model = PollOption
    extra = 1
    fields = ('text', 'votes')
    readonly_fields = ('votes',)


@admin.register(Poll)
class PollAdmin(admin.ModelAdmin):
    list_display = ('question', 'post', 'active', 'created_at', 'get_total_votes')
    list_filter = ('active', 'created_at')
    search_fields = ('question', 'post__title')
    readonly_fields = ('created_at', 'updated_at')
    inlines = [PollOptionInline]
    
    fieldsets = (
        ('Poll Information', {
            'fields': ('question', 'post')
        }),
        ('Settings', {
            'fields': ('active',)
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )
    
    def get_total_votes(self, obj):
        return obj.get_total_votes()
    get_total_votes.short_description = 'Total Votes'


# ========================================
# Vote Admin
# ========================================
@admin.register(Vote)
class VoteAdmin(admin.ModelAdmin):
    list_display = ('poll', 'option', 'user', 'ip_address', 'created_at')
    list_filter = ('poll', 'created_at')
    search_fields = ('user__username', 'ip_address')
    readonly_fields = ('created_at',)


# ========================================
# Category Admin
# ========================================
@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display = ('name', 'slug', 'icon', 'color')
    search_fields = ('name', 'slug')
    prepopulated_fields = {'slug': ('name',)}
    
    fieldsets = (
        ('Category Information', {
            'fields': ('name', 'slug', 'description')
        }),
        ('Appearance', {
            'fields': ('icon', 'color')
        }),
    )


# ========================================
# UserProfile Admin
# ========================================
@admin.register(UserProfile)
class UserProfileAdmin(admin.ModelAdmin):
    list_display = ('user', 'theme_preference', 'email_notifications', 'created_at')
    list_filter = ('theme_preference', 'email_notifications', 'created_at')
    search_fields = ('user__username', 'user__email')
    readonly_fields = ('created_at', 'updated_at')
    filter_horizontal = ('preferred_categories',)
    
    fieldsets = (
        ('User', {
            'fields': ('user',)
        }),
        ('Profile', {
            'fields': ('bio', 'avatar')
        }),
        ('Preferences', {
            'fields': ('preferred_categories', 'theme_preference', 'email_notifications')
        }),
        ('Timestamps', {
            'fields': ('created_at', 'updated_at'),
            'classes': ('collapse',)
        }),
    )


# ========================================
# Like Admin
# ========================================
@admin.register(Like)
class LikeAdmin(admin.ModelAdmin):
    list_display = ('user', 'post', 'created_at')
    list_filter = ('created_at',)
    search_fields = ('user__username', 'post__title')
    readonly_fields = ('created_at',)


# ========================================
# Bookmark Admin
# ========================================
@admin.register(Bookmark)
class BookmarkAdmin(admin.ModelAdmin):
    list_display = ('user', 'post', 'created_at')
    list_filter = ('created_at',)
    search_fields = ('user__username', 'post__title')
    readonly_fields = ('created_at',)
