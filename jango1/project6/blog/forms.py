from django import forms
from .models import Comment, Poll, PollOption

# ========================================
# Comment Form
# ========================================
class CommentForm(forms.ModelForm):
    """
    Form untuk menambahkan komentar pada artikel.
    """
    class Meta:
        model = Comment
        fields = ['content']
        widgets = {
            'content': forms.Textarea(attrs={
                'class': 'comment-textarea',
                'placeholder': 'Share your thoughts...',
                'rows': 4,
                'cols': 50,
            })
        }
        labels = {
            'content': 'Your Comment',
        }


# ========================================
# Poll Form
# ========================================
class PollForm(forms.ModelForm):
    """
    Form untuk membuat poll baru.
    """
    class Meta:
        model = Poll
        fields = ['question', 'active']
        widgets = {
            'question': forms.TextInput(attrs={
                'class': 'poll-question-input',
                'placeholder': 'Enter your poll question...',
                'maxlength': 500,
            }),
            'active': forms.CheckboxInput(attrs={
                'class': 'poll-active-checkbox',
            })
        }
        labels = {
            'question': 'Poll Question',
            'active': 'Active',
        }


# ========================================
# Poll Option Formset
# ========================================
class PollOptionForm(forms.ModelForm):
    """
    Form untuk opsi poll.
    """
    class Meta:
        model = PollOption
        fields = ['text']
        widgets = {
            'text': forms.TextInput(attrs={
                'class': 'poll-option-input',
                'placeholder': 'Enter poll option...',
                'maxlength': 500,
            })
        }
        labels = {
            'text': 'Option',
        }


# ========================================
# Search Form
# ========================================
class SearchForm(forms.Form):
    """
    Form untuk pencarian artikel.
    """
    q = forms.CharField(
        max_length=200,
        required=False,
        widget=forms.TextInput(attrs={
            'class': 'search-input',
            'placeholder': 'Search articles, topics, experts...',
            'autocomplete': 'off',
        })
    )
    category = forms.ChoiceField(
        required=False,
        widget=forms.Select(attrs={
            'class': 'category-select',
        })
    )
    
    def __init__(self, *args, **kwargs):
        super().__init__(*args, **kwargs)
        from .models import Category
        self.fields['category'].choices = [('', 'All Categories')] + [
            (cat.slug, cat.name) for cat in Category.objects.all()
        ]


# ========================================
# Newsletter Subscription Form
# ========================================
class NewsletterSubscriptionForm(forms.Form):
    """
    Form untuk berlangganan newsletter.
    """
    email = forms.EmailField(
        required=True,
        widget=forms.EmailInput(attrs={
            'class': 'newsletter-email-input',
            'placeholder': 'Enter your email address',
            'autocomplete': 'email',
        })
    )
    
    def clean_email(self):
        email = self.cleaned_data.get('email')
        if email:
            # Optional: Check if email already subscribed
            from django.contrib.auth.models import User
            if User.objects.filter(email=email).exists():
                raise forms.ValidationError('This email is already subscribed.')
        return email


# ========================================
# Contact Form
# ========================================
class ContactForm(forms.Form):
    """
    Form untuk menghubungi tim blog.
    """
    name = forms.CharField(
        max_length=100,
        required=True,
        widget=forms.TextInput(attrs={
            'class': 'contact-name-input',
            'placeholder': 'Your Name',
        })
    )
    email = forms.EmailField(
        required=True,
        widget=forms.EmailInput(attrs={
            'class': 'contact-email-input',
            'placeholder': 'Your Email',
            'autocomplete': 'email',
        })
    )
    subject = forms.CharField(
        max_length=200,
        required=True,
        widget=forms.TextInput(attrs={
            'class': 'contact-subject-input',
            'placeholder': 'Subject',
        })
    )
    message = forms.CharField(
        required=True,
        widget=forms.Textarea(attrs={
            'class': 'contact-message-textarea',
            'placeholder': 'Your message...',
            'rows': 5,
            'cols': 50,
        })
    )
