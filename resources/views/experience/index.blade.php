@extends('layouts.app')

@section('title', 'Experience - James Latten')

@section('content')
<!-- Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Career</div>
            <h1 class="page-hero-title">Professional Experience</h1>
            <p class="page-hero-subtitle">
                A journey through roles, challenges, and achievements that have shaped my expertise 
                in full-stack development and digital innovation.
            </p>
        </div>
    </div>
</section>

<!-- Experience Timeline Section -->
<section class="experience-timeline-section">
    <div class="container">
        <div class="experience-timeline">
            @forelse($experiences as $experience)
                <article class="experience-item">
                    <a href="{{ route('experience.show', $experience->id) }}" class="experience-card-link">
                        <div class="experience-card">
                            <div class="experience-header">
                                <div class="experience-meta">
                                    <span class="experience-date">
                                        {{ $experience->start_date ? $experience->start_date->format('M Y') : 'Start' }} - 
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    </span>
                                    @if(!$experience->end_date)
                                        <span class="experience-badge">Current</span>
                                    @endif
                                </div>
                                <h2 class="experience-title">{{ $experience->title }}</h2>
                                <div class="experience-company">{{ $experience->company }}</div>
                                @if($experience->location)
                                    <div class="experience-location">📍 {{ $experience->location }}</div>
                                @endif
                            </div>
                            <div class="experience-footer">
                                <span class="experience-link-arrow">View Details →</span>
                            </div>
                        </div>
                    </a>
                </article>
            @empty
                <div class="experience-empty">
                    <div class="empty-icon">💼</div>
                    <h3>No Experience Added Yet</h3>
                    <p>Experience entries will appear here once added through the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="experience-stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">{{ date('Y') - 2018 }}+</div>
                <div class="stat-label">Years of Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ $experiences->count() ?: '5+' }}</div>
                <div class="stat-label">Professional Roles</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ \App\Models\Project::count() ?: '50+' }}</div>
                <div class="stat-label">Projects Delivered</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="page-cta-section">
    <div class="container">
        <div class="page-cta-content">
            <h2 class="page-cta-title">Ready to collaborate?</h2>
            <p class="page-cta-description">
                Let's discuss how my experience can help bring your next project to life.
            </p>
            <div class="page-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Get In Touch</a>
                <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-large">View Portfolio</a>
            </div>
        </div>
    </div>
</section>
@endsection
