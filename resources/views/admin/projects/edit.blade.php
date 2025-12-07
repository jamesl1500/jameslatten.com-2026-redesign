@extends('admin.layout')

@section('page-title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Edit Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug *</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $project->slug) }}" required>
        </div>
        
        <div class="form-group">
            <label for="emoji">Emoji</label>
            <input type="text" id="emoji" name="emoji" value="{{ old('emoji', $project->emoji) }}" maxlength="10">
        </div>
        
        <div class="form-group">
            <label for="description">Short Description *</label>
            <textarea id="description" name="description" required rows="3">{{ old('description', $project->description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="long_description">Detailed Description</label>
            <textarea id="long_description" name="long_description" style="min-height: 200px;">{{ old('long_description', $project->long_description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $project->category) }}">
        </div>
        
        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input type="text" id="technologies" name="technologies" value="{{ old('technologies', $project->technologies) }}">
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="in-progress" {{ old('status', $project->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="maintenance" {{ old('status', $project->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="demo_url">Demo URL</label>
            <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url', $project->demo_url) }}">
        </div>
        
        <div class="form-group">
            <label for="github_url">GitHub URL</label>
            <input type="url" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url) }}">
        </div>

        <div class="form-group">
            <label for="image_url">Image</label>
            <input type="file" id="image_url" name="image_url" accept="image/*">
            <small style="color: #6b7280;">Upload an image representing the project</small>
        </div>
        
        <div class="form-group">
            <label for="order">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', $project->order) }}" min="0">
        </div>
        
        <div class="form-group">
            <label for="completed_at">Completion Date</label>
            <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at', $project->completed_at ? $project->completed_at->format('Y-m-d') : '') }}">
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
            <label for="is_featured" style="margin: 0;">Featured Project</label>
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }}>
            <label for="is_published" style="margin: 0;">Published</label>
        </div>
        
        <button type="submit" class="btn">Update Project</button>
    </form>
</div>
@endsection
