@extends('layouts.app')

@section('title', $post->title . ' - Blog')

@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-container">
    <div class="container">
        <nav class="breadcrumb">
            <a href="/">Home</a>
            <span class="breadcrumb-separator">/</span>
            <a href="{{ route('blog.index') }}">Blog</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current">{{ Str::limit($post->title, 40) }}</span>
        </nav>
    </div>
</div>

<!-- Blog Post Hero -->
<section class="detail-hero-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="/">Home</a>
            <span class="breadcrumb-separator">/</span>
            <a href="{{ route('blog.index') }}">Blog</a>
            <span class="breadcrumb-separator">/</span>
            <span class="breadcrumb-current">{{ Str::limit($post->title, 40) }}</span>
        </div>
        <div class="detail-hero-content">
            <h1 class="detail-hero-title">{{ $post->title }}</h1>
            <div class="detail-hero-meta">
                @if($post->author)
                    <span class="meta-item">
                        <strong>Author:</strong> {{ $post->author }}
                    </span>
                @endif
                <span class="meta-item">
                    <strong>Published:</strong> {{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}
                </span>
                @if($post->read_time)
                    <span class="meta-item">
                        <strong>Read Time:</strong> {{ $post->read_time }} minutes
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Blog Post Content -->
<section class="detail-content-section">
    <div class="container">
        <div class="detail-content-grid">
            <div class="detail-main">
                @if($post->excerpt)
                    <div class="content-section">
                        <p class="blog-excerpt-intro"><em>{{ $post->excerpt }}</em></p>
                    </div>
                @endif
                
                <div class="content-section">
                    <div class="blog-content">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>
            </div>
            
            <aside class="detail-sidebar">
                @if($post->tags)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Tags</h3>
                        <div class="sidebar-tags">
                            @foreach(explode(',', $post->tags) as $tag)
                                <span class="sidebar-tag">{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif
                
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Share Article</h3>
                    <div class="sidebar-share">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="share-btn">
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="share-btn">
                            LinkedIn
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="share-btn">
                            Facebook
                        </a>
                    </div>
                </div>
                
                <div class="sidebar-section">
                    <h3 class="sidebar-title">Published</h3>
                    <p class="sidebar-text">{{ $post->published_at?->format('F j, Y') ?? $post->created_at->format('F j, Y') }}</p>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Related Posts Section -->
@if(isset($relatedPosts) && $relatedPosts->count() > 0)
<section class="related-section">
    <div class="container">
        <h2 class="section-title">Related Articles</h2>
        <div class="related-grid">
            @foreach($relatedPosts as $relatedPost)
                <a href="{{ route('blog.show', $relatedPost->id) }}" class="related-card-link">
                    <div class="related-card">
                        <div class="related-card-header">
                            <span class="related-date">{{ $relatedPost->published_at?->format('M j, Y') ?? $relatedPost->created_at->format('M j, Y') }}</span>
                        </div>
                        <h3 class="related-card-title">{{ $relatedPost->title }}</h3>
                        @if($relatedPost->excerpt)
                            <p class="related-card-excerpt">{{ Str::limit($relatedPost->excerpt, 100) }}</p>
                        @endif
                        @if($relatedPost->read_time)
                            <div class="related-card-footer">
                                <span class="related-read-time">{{ $relatedPost->read_time }} min read</span>
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Detail CTA Section -->
<section class="detail-cta-section">
    <div class="container">
        <h2 class="detail-cta-title">Interested in Working Together?</h2>
        <p class="detail-cta-text">Let's discuss how I can help bring your project to life.</p>
        <div class="detail-cta-buttons">
            <a href="/contact" class="btn btn-primary">Get in Touch</a>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Read More Articles</a>
        </div>
    </div>
</section>
@endsection
