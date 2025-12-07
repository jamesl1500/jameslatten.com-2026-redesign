@extends('layouts.app')

@section('title', 'Portfolio - James Latten')

@section('content')
<!-- Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Portfolio</div>
            <h1 class="page-hero-title">Selected Works</h1>
            <p class="page-hero-subtitle">
                A showcase of projects that demonstrate my expertise in building scalable, 
                user-centric applications and digital experiences.
            </p>
        </div>
    </div>
</section>

<!-- Projects Grid Section -->
<section class="portfolio-grid-section">
    <div class="container">
        <div class="portfolio-grid">
            @forelse($projects as $project)
                <a href="{{ route('portfolio.show', $project->slug ?? $project->id) }}" class="portfolio-card-link">
                    <article class="portfolio-card">
                        @if($project->image_url)
                            <div class="portfolio-card-image">
                                <img src="{{ $project->image_url }}" alt="{{ $project->title }}">
                            </div>
                        @else
                            <div class="portfolio-card-placeholder">
                                <span class="portfolio-emoji">{{ $project->emoji ?? '💼' }}</span>
                            </div>
                        @endif
                        <div class="portfolio-card-content">
                            <h2 class="portfolio-card-title">{{ $project->title }}</h2>
                            <p class="portfolio-card-description">
                                {{ Str::limit($project->description, 100) }}
                            </p>
                            @if($project->technologies)
                                <div class="portfolio-card-tags">
                                    @foreach(array_slice(explode(',', $project->technologies), 0, 3) as $tech)
                                        <span class="portfolio-tag">{{ trim($tech) }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="portfolio-card-footer">
                                <span class="portfolio-link-arrow">View Project →</span>
                            </div>
                        </div>
                    </article>
                </a>
            @empty
                <div class="portfolio-empty">
                    <div class="empty-icon">💼</div>
                    <h3>No Projects Added Yet</h3>
                    <p>Portfolio projects will appear here once added through the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="page-stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">{{ $projects->count() ?: '50+' }}</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ date('Y') - 2021 }}+</div>
                <div class="stat-label">Years of Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Client Satisfaction</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support Available</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="page-cta-section">
    <div class="container">
        <div class="page-cta-content">
            <h2 class="page-cta-title">Have a project in mind?</h2>
            <p class="page-cta-description">
                Let's collaborate to bring your vision to life with cutting-edge technology 
                and creative solutions.
            </p>
            <div class="page-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Start a Project</a>
                <a href="{{ route('about') }}" class="btn btn-secondary btn-large">Learn More About Me</a>
            </div>
        </div>
    </div>
</section>
@endsection
