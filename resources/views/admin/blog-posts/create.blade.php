@extends('admin.layout')

@section('page-title', 'Create Blog Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Create New Blog Post</h2>
        <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form method="POST" action="{{ route('admin.blog-posts.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug *</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
            <small style="color: #6b7280;">URL-friendly version of the title (e.g., my-first-blog-post)</small>
        </div>
        
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
            <small style="color: #6b7280;">Short summary of the blog post</small>
        </div>
        
        <div class="form-group">
            <label for="content">Content *</label>
            <textarea id="content" name="content" required style="min-height: 300px;">{{ old('content') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', auth()->user()->name) }}">
        </div>
        
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags') }}">
            <small style="color: #6b7280;">Comma-separated tags (e.g., Laravel, PHP, Web Development)</small>
        </div>
        
        <div class="form-group">
            <label for="read_time">Read Time (minutes)</label>
            <input type="number" id="read_time" name="read_time" value="{{ old('read_time', 5) }}" min="1">
        </div>
        
        <div class="form-group">
            <label for="published_at">Published Date</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at', now()->format('Y-m-d')) }}">
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="published" name="published" value="1" {{ old('published') ? 'checked' : '' }}>
            <label for="published" style="margin: 0;">Published</label>
        </div>
        
        <button type="submit" class="btn">Create Blog Post</button>
    </form>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function(e) {
        const slug = e.target.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
