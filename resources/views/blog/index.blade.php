@extends('layouts.app')

@section('title', 'Blog - James Latten')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }
    
    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .blog-list {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .blog-card {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
        transition: transform 0.3s;
    }
    
    .blog-card:hover {
        transform: translateY(-3px);
    }
    
    .blog-card h2 {
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
    }
    
    .blog-card h2 a {
        color: #1f2937;
        text-decoration: none;
    }
    
    .blog-card h2 a:hover {
        color: #2563eb;
    }
    
    .blog-meta {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }
    
    .blog-excerpt {
        color: #374151;
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    
    .read-more {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }
    
    .read-more:hover {
        text-decoration: underline;
    }
    
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }
    
    .pagination a,
    .pagination span {
        padding: 0.5rem 1rem;
        background: white;
        border-radius: 0.25rem;
        text-decoration: none;
        color: #374151;
    }
    
    .pagination a:hover {
        background: #2563eb;
        color: white;
    }
    
    .pagination .active {
        background: #2563eb;
        color: white;
    }
</style>

<div class="page-header">
    <h1>Blog</h1>
    <p>Thoughts, tutorials, and insights on web development</p>
</div>

<div class="container">
    <div class="blog-list">
        @forelse($posts as $post)
            <article class="blog-card">
                <h2><a href="{{ route('blog.show', $post->id) }}">{{ $post->title ?? 'Blog Post Title' }}</a></h2>
                <div class="blog-meta">
                    Published on {{ $post->published_at ? $post->published_at->format('F j, Y') : ($post->created_at ? $post->created_at->format('F j, Y') : 'Recently') }}
                    @if($post->read_time)
                        • {{ $post->read_time }} min read
                    @endif
                </div>
                <div class="blog-excerpt">
                    {{ $post->excerpt ?? Str::limit($post->content ?? 'Blog post excerpt goes here...', 200) }}
                </div>
                <a href="{{ route('blog.show', $post->id) }}" class="read-more">Read More →</a>
            </article>
        @empty
            <article class="blog-card">
                <h2><a href="#">Getting Started with Laravel 11</a></h2>
                <div class="blog-meta">Published on December 1, 2025 • 5 min read</div>
                <div class="blog-excerpt">
                    Laravel 11 brings exciting new features and improvements. In this post, we'll explore the key changes and how to migrate your existing applications.
                </div>
                <a href="#" class="read-more">Read More →</a>
            </article>
            
            <article class="blog-card">
                <h2><a href="#">Building Modern UIs with Tailwind CSS</a></h2>
                <div class="blog-meta">Published on November 28, 2025 • 7 min read</div>
                <div class="blog-excerpt">
                    Tailwind CSS has revolutionized the way we build user interfaces. Learn best practices and advanced techniques for creating beautiful, responsive designs.
                </div>
                <a href="#" class="read-more">Read More →</a>
            </article>
            
            <article class="blog-card">
                <h2><a href="#">API Design Best Practices</a></h2>
                <div class="blog-meta">Published on November 20, 2025 • 10 min read</div>
                <div class="blog-excerpt">
                    Designing a great API requires careful planning and consideration. Discover the principles that make APIs intuitive, scalable, and developer-friendly.
                </div>
                <a href="#" class="read-more">Read More →</a>
            </article>
        @endforelse
        
        @if(method_exists($posts, 'links'))
            <div class="pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
