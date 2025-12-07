@extends('layouts.app')

@section('title', 'Blog - James Latten')

@section('content')
<!-- Blog Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Blog</div>
            <h1 class="page-hero-title">Insights & Articles</h1>
            <p class="page-hero-subtitle">
                Explore my latest thoughts, tutorials, and industry insights on web development, 
                programming, and technology trends.
            </p>
        </div>
    </div>
</section>

<!-- Blog Grid Section -->
<section class="blog-grid-section">
    <div class="container">
        @if($posts->count() > 0)
            <div class="blog-grid">
                @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->id) }}" class="blog-card-link">
                        <article class="blog-card">
                            <div class="blog-card-header">
                                <div class="blog-meta">
                                    <span class="blog-date">{{ $post->published_at?->format('M j, Y') ?? $post->created_at->format('M j, Y') }}</span>
                                    @if($post->read_time)
                                        <span class="blog-separator">•</span>
                                        <span class="blog-read-time">{{ $post->read_time }} min read</span>
                                    @endif
                                </div>
                            </div>
                            
                            <h2 class="blog-card-title">{{ $post->title }}</h2>
                            
                            @if($post->excerpt)
                                <p class="blog-card-excerpt">{{ Str::limit($post->excerpt, 150) }}</p>
                            @endif
                            
                            @if($post->tags)
                                <div class="blog-card-tags">
                                    @foreach(array_slice(explode(',', $post->tags), 0, 3) as $tag)
                                        <span class="blog-tag">{{ trim($tag) }}</span>
                                    @endforeach
                                </div>
                            @endif
                            
                            <div class="blog-card-footer">
                                <span class="blog-link-arrow">Read Article →</span>
                            </div>
                        </article>
                    </a>
                @endforeach
            </div>
            
            @if($posts->hasPages())
                <div class="blog-pagination">
                    {{ $posts->links() }}
                </div>
            @endif
        @else
            <div class="blog-empty">
                <div class="empty-icon">📝</div>
                <h3>No Blog Posts Yet</h3>
                <p>Check back soon for new articles and insights!</p>
            </div>
        @endif
    </div>
</section>

<!-- Blog Stats Section -->
<section class="page-stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">{{ \App\Models\BlogPosts::where('published', true)->count() }}</div>
                <div class="stat-label">Articles Published</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ \App\Models\BlogPosts::where('published', true)->avg('read_time') ? number_format(\App\Models\BlogPosts::where('published', true)->avg('read_time')) : 0 }}</div>
                <div class="stat-label">Avg. Read Time (min)</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ \App\Models\BlogPosts::where('published', true)->distinct('tags')->count('tags') }}</div>
                <div class="stat-label">Topics Covered</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Weekly</div>
                <div class="stat-label">Publishing Schedule</div>
            </div>
        </div>
    </div>
</section>

<!-- Blog CTA Section -->
<section class="page-cta-section">
    <div class="container">
        <h2 class="cta-title">Want to Stay Updated?</h2>
        <p class="cta-text">Subscribe to receive the latest articles and tutorials directly in your inbox.</p>
        <div class="cta-buttons">
            <a href="/contact" class="btn btn-primary">Get in Touch</a>
            <a href="/portfolio" class="btn btn-secondary">View Portfolio</a>
        </div>
    </div>
</section>
@endsection
