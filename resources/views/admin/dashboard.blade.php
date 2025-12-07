@extends('admin.layout')

@section('page-title', 'Dashboard')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .stat-card h3 {
        color: #6b7280;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .stat-card .number {
        font-size: 2rem;
        font-weight: bold;
        color: #1f2937;
    }
    
    .stat-card .icon {
        font-size: 2.5rem;
        float: right;
        opacity: 0.2;
    }
    
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }
    
    .quick-action {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: transform 0.3s;
        text-align: center;
    }
    
    .quick-action:hover {
        transform: translateY(-3px);
    }
    
    .quick-action .icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
</style>

<div class="stats-grid">
    <div class="stat-card">
        <span class="icon">📝</span>
        <h3>Blog Posts</h3>
        <div class="number">{{ \App\Models\BlogPosts::count() }}</div>
    </div>
    
    <div class="stat-card">
        <span class="icon">💼</span>
        <h3>Projects</h3>
        <div class="number">{{ \App\Models\Project::count() }}</div>
    </div>
    
    <div class="stat-card">
        <span class="icon">💻</span>
        <h3>Experiences</h3>
        <div class="number">{{ \App\Models\Experience::count() }}</div>
    </div>
    
    <div class="stat-card">
        <span class="icon">🎓</span>
        <h3>Education</h3>
        <div class="number">{{ \App\Models\Education::count() }}</div>
    </div>
    
    <div class="stat-card">
        <span class="icon">🏆</span>
        <h3>Certificates</h3>
        <div class="number">{{ \App\Models\Certificate::count() }}</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Quick Actions</h2>
    </div>
    
    <div class="quick-actions">
        <a href="{{ route('admin.blog-posts.create') }}" class="quick-action">
            <div class="icon">📝</div>
            <div>New Blog Post</div>
        </a>
        
        <a href="{{ route('admin.projects.create') }}" class="quick-action">
            <div class="icon">💼</div>
            <div>New Project</div>
        </a>
        
        <a href="{{ route('admin.experiences.create') }}" class="quick-action">
            <div class="icon">💻</div>
            <div>New Experience</div>
        </a>
        
        <a href="{{ route('admin.education.create') }}" class="quick-action">
            <div class="icon">🎓</div>
            <div>New Education</div>
        </a>
        
        <a href="{{ route('admin.certificates.create') }}" class="quick-action">
            <div class="icon">🏆</div>
            <div>New Certificate</div>
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Recent Blog Posts</h2>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Published</th>
            </tr>
        </thead>
        <tbody>
            @forelse(\App\Models\BlogPosts::latest()->take(5)->get() as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if($post->published)
                            <span class="badge badge-success">Published</span>
                        @else
                            <span class="badge badge-warning">Draft</span>
                        @endif
                    </td>
                    <td>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Not published' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #6b7280;">No blog posts yet. Create your first one!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
