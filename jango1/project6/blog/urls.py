from django.urls import path
from . import views

app_name = 'blog'

urlpatterns = [
    # Post URLs
    path('', views.PostListView.as_view(), name='post_list'),
    path('post/<slug:slug>/', views.PostDetailView.as_view(), name='post_detail'),
    
    # Category URLs
    path('category/<slug:slug>/', views.CategoryPostsView.as_view(), name='category_posts'),
    path('explore/', views.ExploreView.as_view(), name='explore'),
    path('about/', views.AboutView.as_view(), name='about'),
    
    # Search URL
    path('search/', views.SearchView.as_view(), name='search'),
    
    # Comment URLs
    path('post/<int:post_id>/comment/', views.add_comment, name='add_comment'),
    
    # Poll URLs
    path('poll/<int:poll_id>/vote/', views.vote_poll, name='vote_poll'),
    
    # Like/Unlike URLs
    path('post/<int:post_id>/like/', views.toggle_like, name='toggle_like'),
    
    # Bookmark URLs
    path('post/<int:post_id>/bookmark/', views.toggle_bookmark, name='toggle_bookmark'),
    
    # AI Summary URL
    path('post/<int:post_id>/generate-summary/', views.generate_ai_summary, name='generate_ai_summary'),
    
    # Contact
    path('contact/', views.ContactView.as_view(), name='contact'),
    
    # User Bookmarks
    path('bookmarks/', views.UserBookmarksView.as_view(), name='user_bookmarks'),
]
