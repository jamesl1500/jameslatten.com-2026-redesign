@extends('layouts.app')

@section('title', $experience->title . ' - James Latten')

@section('content')
<!-- Hero Section -->
<section class="detail-hero-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('experience.index') }}">Experience</a>
            <span>/</span>
            <span>{{ $experience->title }}</span>
        </div>
        <div class="detail-hero-content">
            <div class="section-label">Experience Details</div>
            <h1 class="detail-hero-title">{{ $experience->title }}</h1>
            <div class="detail-hero-meta">
                <div class="detail-meta-item">
                    <strong>Company:</strong> {{ $experience->company }}
                </div>
                @if($experience->location)
                    <div class="detail-meta-item">
                        <strong>Location:</strong> {{ $experience->location }}
                    </div>
                @endif
                <div class="detail-meta-item">
                    <strong>Duration:</strong>
                    {{ $experience->start_date ? $experience->start_date->format('M Y') : 'Start' }} - 
                    {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                    @if(!$experience->end_date)
                        <span class="badge-current">Current Position</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="detail-content-section">
    <div class="container">
        <div class="detail-content-grid">
            <div class="detail-main">
                <div class="detail-section">
                    <h2 class="detail-section-title">Role Overview</h2>
                    <div class="detail-section-content">
                        <p class="detail-description">{{ $experience->description }}</p>
                    </div>
                </div>

                @if($experience->responsibilities)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Key Responsibilities</h2>
                        <div class="detail-section-content">
                            <ul class="detail-list">
                                @foreach(explode("\n", $experience->responsibilities) as $responsibility)
                                    @if(trim($responsibility))
                                        <li>{{ trim($responsibility) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($experience->achievements)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Key Achievements</h2>
                        <div class="detail-section-content">
                            <ul class="detail-achievements-list">
                                @foreach(explode("\n", $experience->achievements) as $achievement)
                                    @if(trim($achievement))
                                        <li>{{ trim($achievement) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($experience->projects)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Notable Projects</h2>
                        <div class="detail-section-content">
                            <div class="detail-projects">
                                @foreach(explode("\n", $experience->projects) as $project)
                                    @if(trim($project))
                                        <div class="detail-project-item">
                                            <span class="project-marker">▸</span>
                                            <span>{{ trim($project) }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <aside class="detail-sidebar">
                @if($experience->technologies)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Technologies Used</h3>
                        <div class="sidebar-tags">
                            @foreach(explode(',', $experience->technologies) as $tech)
                                <span class="sidebar-tag">{{ trim($tech) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($experience->employment_type)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Employment Type</h3>
                        <p class="sidebar-text">{{ $experience->employment_type }}</p>
                    </div>
                @endif

                @if($experience->team_size)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Team Size</h3>
                        <p class="sidebar-text">{{ $experience->team_size }} members</p>
                    </div>
                @endif
            </aside>
        </div>
    </div>
</section>

<!-- Related Experiences Section -->
@if($relatedExperiences->count() > 0)
<section class="related-section">
    <div class="container">
        <h2 class="related-title">Other Experiences</h2>
        <div class="related-grid">
            @foreach($relatedExperiences as $related)
                <a href="{{ route('experience.show', $related->id) }}" class="related-card">
                    <h3 class="related-card-title">{{ $related->title }}</h3>
                    <div class="related-card-company">{{ $related->company }}</div>
                    <div class="related-card-date">
                        {{ $related->start_date ? $related->start_date->format('M Y') : 'Start' }} - 
                        {{ $related->end_date ? $related->end_date->format('M Y') : 'Present' }}
                    </div>
                    <span class="related-card-link">View Details →</span>
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
            <h2 class="detail-cta-title">Interested in my experience?</h2>
            <p class="detail-cta-description">
                Let's discuss how my background can contribute to your next project.
            </p>
            <div class="detail-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Get In Touch</a>
                <a href="{{ route('experience.index') }}" class="btn btn-secondary btn-large">Back to Experience</a>
            </div>
        </div>
    </div>
</section>
@endsection
