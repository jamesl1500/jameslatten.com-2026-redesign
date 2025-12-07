@extends('admin.layout')

@section('page-title', 'Edit Blog Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Blog Post</h2>
        <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form method="POST" action="{{ route('admin.blog-posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug *</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
        </div>
        
        <div class="form-group">
            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="content">Content *</label>
            <textarea id="content" name="content" required style="min-height: 300px;">{{ old('content', $post->content) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $post->author) }}">
        </div>
        
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags', $post->tags) }}">
        </div>
        
        <div class="form-group">
            <label for="read_time">Read Time (minutes)</label>
            <input type="number" id="read_time" name="read_time" value="{{ old('read_time', $post->read_time) }}" min="1">
        </div>
        
        <div class="form-group">
            <label for="published_at">Published Date</label>
            <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d') : '') }}">
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="published" name="published" value="1" {{ old('published', $post->published) ? 'checked' : '' }}>
            <label for="published" style="margin: 0;">Published</label>
        </div>
        
        <button type="submit" class="btn">Update Blog Post</button>
    </form>
</div>
@endsection
