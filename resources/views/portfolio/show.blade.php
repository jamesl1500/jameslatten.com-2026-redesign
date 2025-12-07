@extends('layouts.app')

@section('title', $project->title . ' - Portfolio')

@section('content')
<!-- Hero Section -->
<section class="detail-hero-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('portfolio.index') }}">Portfolio</a>
            <span>/</span>
            <span>{{ $project->title }}</span>
        </div>
        <div class="detail-hero-content">
            <div class="section-label">Project Details</div>
            <h1 class="detail-hero-title">{{ $project->title }}</h1>
            <div class="detail-hero-meta">
                @if($project->category)
                    <div class="detail-meta-item">
                        <strong>Category:</strong> {{ $project->category }}
                    </div>
                @endif
                @if($project->client)
                    <div class="detail-meta-item">
                        <strong>Client:</strong> {{ $project->client }}
                    </div>
                @endif
                <div class="detail-meta-item">
                    <strong>Completed:</strong>
                    {{ $project->completed_at ? $project->completed_at->format('M Y') : ($project->created_at ? $project->created_at->format('M Y') : 'Recent') }}
                </div>
                @if($project->status)
                    <div class="detail-meta-item">
                        <strong>Status:</strong> {{ $project->status }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Project Image Section -->
@if($project->image_url)
<section class="project-image-section">
    <div class="container">
        <div class="project-featured-image">
            <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
        </div>
    </div>
</section>
@endif

<!-- Main Content Section -->
<section class="detail-content-section">
    <div class="container">
        <div class="detail-content-grid">
            <div class="detail-main">
                <div class="detail-section">
                    <h2 class="detail-section-title">Project Overview</h2>
                    <div class="detail-section-content">
                        <p class="detail-description">{{ $project->description }}</p>
                        @if($project->long_description)
                            <p class="detail-description" style="margin-top: 1.5rem;">{{ $project->long_description }}</p>
                        @endif
                    </div>
                </div>

                @if($project->challenge)
                    <div class="detail-section">
                        <h2 class="detail-section-title">The Challenge</h2>
                        <div class="detail-section-content">
                            <p class="detail-description">{{ $project->challenge }}</p>
                        </div>
                    </div>
                @endif

                @if($project->solution)
                    <div class="detail-section">
                        <h2 class="detail-section-title">The Solution</h2>
                        <div class="detail-section-content">
                            <p class="detail-description">{{ $project->solution }}</p>
                        </div>
                    </div>
                @endif

                @if($project->features)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Key Features</h2>
                        <div class="detail-section-content">
                            <ul class="detail-list">
                                @foreach(explode("\n", $project->features) as $feature)
                                    @if(trim($feature))
                                        <li>{{ trim($feature) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($project->results)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Results & Impact</h2>
                        <div class="detail-section-content">
                            <ul class="detail-achievements-list">
                                @foreach(explode("\n", $project->results) as $result)
                                    @if(trim($result))
                                        <li>{{ trim($result) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <aside class="detail-sidebar">
                @if($project->technologies)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Technologies Used</h3>
                        <div class="sidebar-tags">
                            @foreach(explode(',', $project->technologies) as $tech)
                                <span class="sidebar-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($project->role)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">My Role</h3>
                        <p class="sidebar-text">{{ $project->role }}</p>
                    </div>
                @endif

                @if($project->duration)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Project Duration</h3>
                        <p class="sidebar-text">{{ $project->duration }}</p>
                    </div>
                @endif

                @if($project->demo_url || $project->github_url)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Project Links</h3>
                        <div class="sidebar-links">
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="sidebar-link-btn">
                                    View Live Demo →
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="sidebar-link-btn">
                                    View on GitHub →
                                </a>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Share</h3>
                    <div class="sidebar-share">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($project->title) }}&url={{ urlencode(route('portfolio.show', $project->slug ?? $project->id)) }}" target="_blank" class="share-link">
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('portfolio.show', $project->slug ?? $project->id)) }}" target="_blank" class="share-link">
                            LinkedIn
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Related Projects Section -->
@if($relatedProjects->count() > 0)
<section class="related-section">
    <div class="container">
        <h2 class="related-title">Related Projects</h2>
        <div class="related-grid">
            @foreach($relatedProjects as $related)
                <a href="{{ route('portfolio.show', $related->slug ?? $related->id) }}" class="related-card">
                    @if($related->image_url)
                        <div class="related-card-image">
                            <img src="{{ $related->image_url }}" alt="{{ $related->title }}">
                        </div>
                    @endif
                    <h3 class="related-card-title">{{ $related->title }}</h3>
                    <div class="related-card-company">{{ $related->category ?? 'Web Development' }}</div>
                    <span class="related-card-link">View Project →</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="detail-cta-section">
    <div class="container">
        <div class="detail-cta-content">
            <h2 class="detail-cta-title">Like what you see?</h2>
            <p class="detail-cta-description">
                Let's collaborate on your next project and create something amazing together.
            </p>
            <div class="detail-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Start a Project</a>
                <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-large">View More Projects</a>
            </div>
        </div>
    </div>
</section>
@endsection
