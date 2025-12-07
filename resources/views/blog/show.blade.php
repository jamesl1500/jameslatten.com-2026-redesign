@extends('layouts.app')

@section('title', $post->title . ' - Blog')

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
    
    .blog-meta {
        color: rgba(255,255,255,0.9);
        font-size: 0.875rem;
    }
    
    .blog-content {
        background: white;
        padding: 3rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
    }
    
    .blog-content p {
        line-height: 1.8;
        color: #374151;
        margin-bottom: 1.5rem;
    }
    
    .blog-content h2,
    .blog-content h3 {
        color: #1f2937;
        margin-top: 2rem;
        margin-bottom: 1rem;
    }
    
    .blog-content code {
        background: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-family: 'Courier New', monospace;
        font-size: 0.9rem;
    }
    
    .blog-content pre {
        background: #1f2937;
        color: #f9fafb;
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin: 1.5rem 0;
    }
    
    .blog-content pre code {
        background: none;
        padding: 0;
        color: inherit;
    }
    
    .back-link {
        color: #2563eb;
        text-decoration: none;
        display: inline-block;
        margin-bottom: 2rem;
    }
    
    .back-link:hover {
        text-decoration: underline;
    }
    
    .blog-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }
    
    .tag {
        background: #e0e7ff;
        color: #3730a3;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
    }
</style>

<div class="page-header">
    <h1>{{ $post->title ?? 'Blog Post Title' }}</h1>
    <div class="blog-meta">
        Published on {{ $post->published_at ? $post->published_at->format('F j, Y') : ($post->created_at ? $post->created_at->format('F j, Y') : 'Recently') }}
        @if($post->author)
            by {{ $post->author }}
        @endif
        @if($post->read_time)
            • {{ $post->read_time }} min read
        @endif
    </div>
</div>

<div class="container">
    <a href="{{ route('blog.index') }}" class="back-link">← Back to Blog</a>
    
    <article class="blog-content">
        {!! nl2br(e($post->content ?? 'Blog post content goes here...')) !!}
        
        @if($post->tags)
            <div class="blog-tags">
                @foreach(explode(',', $post->tags) as $tag)
                    <span class="tag">{{ trim($tag) }}</span>
                @endforeach
            </div>
        @endif
    </article>
</div>
@endsection
