@extends('admin.layout')

@section('page-title', 'Create Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Create New Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
    
    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug *</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}" required>
        </div>
        
        <div class="form-group">
            <label for="emoji">Emoji</label>
            <input type="text" id="emoji" name="emoji" value="{{ old('emoji', '💼') }}" maxlength="10">
            <small style="color: #6b7280;">Single emoji to represent the project</small>
        </div>
        
        <div class="form-group">
            <label for="description">Short Description *</label>
            <textarea id="description" name="description" required rows="3">{{ old('description') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="long_description">Detailed Description</label>
            <textarea id="long_description" name="long_description" style="min-height: 200px;">{{ old('long_description') }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', 'Web Development') }}">
        </div>
        
        <div class="form-group">
            <label for="technologies">Technologies</label>
            <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}">
            <small style="color: #6b7280;">Comma-separated (e.g., Laravel, Vue.js, MySQL)</small>
        </div>
        
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="demo_url">Demo URL</label>
            <input type="url" id="demo_url" name="demo_url" value="{{ old('demo_url') }}">
        </div>
        
        <div class="form-group">
            <label for="github_url">GitHub URL</label>
            <input type="url" id="github_url" name="github_url" value="{{ old('github_url') }}">
        </div>
        
        <div class="form-group">
            <label for="order">Display Order</label>
            <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0">
            <small style="color: #6b7280;">Lower numbers appear first</small>
        </div>
        
        <div class="form-group">
            <label for="completed_at">Completion Date</label>
            <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at') }}">
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
            <label for="is_featured" style="margin: 0;">Featured Project</label>
        </div>
        
        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', 1) ? 'checked' : '' }}>
            <label for="is_published" style="margin: 0;">Published</label>
        </div>
        
        <button type="submit" class="btn">Create Project</button>
    </form>
</div>

<script>
    document.getElementById('title').addEventListener('input', function(e) {
        const slug = e.target.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
