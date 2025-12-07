@extends('layouts.app')

@section('title', 'Portfolio - James Latten')

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
    
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }
    
    .project-card {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s;
    }
    
    .project-card:hover {
        transform: translateY(-5px);
    }
    
    .project-image {
        width: 100%;
        height: 200px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
    }
    
    .project-content {
        padding: 1.5rem;
    }
    
    .project-content h3 {
        color: #1f2937;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
    }
    
    .project-content p {
        color: #6b7280;
        margin-bottom: 1rem;
    }
    
    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }
    
    .tag {
        background: #e0e7ff;
        color: #3730a3;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
    }
    
    .project-link {
        display: inline-block;
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }
    
    .project-link:hover {
        text-decoration: underline;
    }
</style>

<div class="page-header">
    <h1>My Portfolio</h1>
    <p>Explore my recent projects and work</p>
</div>

<div class="container">
    <div class="projects-grid">
        @forelse($projects as $project)
            <div class="project-card">
                <div class="project-image">
                    {{ $project->emoji ?? '💼' }}
                </div>
                <div class="project-content">
                    <h3>{{ $project->title ?? 'Project Title' }}</h3>
                    <p>{{ Str::limit($project->description ?? 'Project description goes here.', 120) }}</p>
                    
                    @if($project->technologies)
                        <div class="project-tags">
                            @foreach(explode(',', $project->technologies) as $tech)
                                <span class="tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    @endif
                    
                    <a href="{{ route('portfolio.show', $project->id) }}" class="project-link">View Details →</a>
                </div>
            </div>
        @empty
            <div class="project-card">
                <div class="project-image">🚀</div>
                <div class="project-content">
                    <h3>E-Commerce Platform</h3>
                    <p>A full-featured e-commerce solution built with Laravel and Vue.js, handling thousands of daily transactions.</p>
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Vue.js</span>
                        <span class="tag">MySQL</span>
                    </div>
                    <a href="#" class="project-link">View Details →</a>
                </div>
            </div>
            
            <div class="project-card">
                <div class="project-image">📱</div>
                <div class="project-content">
                    <h3>Task Management App</h3>
                    <p>A collaborative task management application with real-time updates and team collaboration features.</p>
                    <div class="project-tags">
                        <span class="tag">React</span>
                        <span class="tag">Node.js</span>
                        <span class="tag">MongoDB</span>
                    </div>
                    <a href="#" class="project-link">View Details →</a>
                </div>
            </div>
            
            <div class="project-card">
                <div class="project-image">🎨</div>
                <div class="project-content">
                    <h3>Portfolio CMS</h3>
                    <p>A headless CMS for managing portfolio content with an intuitive admin interface and API.</p>
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">REST API</span>
                        <span class="tag">Tailwind</span>
                    </div>
                    <a href="#" class="project-link">View Details →</a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
