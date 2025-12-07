@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

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
    
    .project-detail {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 0 auto;
    }
    
    .project-meta {
        display: flex;
        gap: 2rem;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #e5e7eb;
    }
    
    .meta-item {
        flex: 1;
    }
    
    .meta-item strong {
        display: block;
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 0.25rem;
    }
    
    .project-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    
    .tag {
        background: #e0e7ff;
        color: #3730a3;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
    }
    
    .project-description {
        line-height: 1.8;
        color: #374151;
        margin-bottom: 2rem;
    }
    
    .project-links {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
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
</style>

<div class="page-header">
    <h1>{{ $project->title ?? 'Project Title' }}</h1>
</div>

<div class="container">
    <a href="{{ route('portfolio.index') }}" class="back-link">← Back to Portfolio</a>
    
    <div class="project-detail">
        <div class="project-meta">
            <div class="meta-item">
                <strong>Status</strong>
                <span>{{ $project->status ?? 'Completed' }}</span>
            </div>
            <div class="meta-item">
                <strong>Date</strong>
                <span>{{ $project->completed_at ? $project->completed_at->format('M Y') : ($project->created_at ? $project->created_at->format('M Y') : 'Recent') }}</span>
            </div>
            <div class="meta-item">
                <strong>Category</strong>
                <span>{{ $project->category ?? 'Web Development' }}</span>
            </div>
        </div>
        
        @if($project->technologies)
            <div style="margin-bottom: 2rem;">
                <strong style="display: block; margin-bottom: 0.5rem;">Technologies Used:</strong>
                <div class="project-tags">
                    @foreach(explode(',', $project->technologies) as $tech)
                        <span class="tag">{{ trim($tech) }}</span>
                    @endforeach
                </div>
            </div>
        @endif
        
        <div class="project-description">
            <h3 style="margin-bottom: 1rem; color: #1f2937;">Overview</h3>
            <p>{{ $project->description ?? 'Detailed project description goes here.' }}</p>
            
            @if($project->long_description)
                <p style="margin-top: 1rem;">{{ $project->long_description }}</p>
            @endif
        </div>
        
        <div class="project-links">
            @if($project->demo_url)
                <a href="{{ $project->demo_url }}" target="_blank" class="btn">View Live Demo</a>
            @endif
            
            @if($project->github_url)
                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-secondary">View on GitHub</a>
            @endif
        </div>
    </div>
</div>
@endsection
