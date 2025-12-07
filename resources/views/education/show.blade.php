@extends('layouts.app')

@section('title', $education->degree . ' - James Latten')

@section('content')
<!-- Hero Section -->
<section class="detail-hero-section">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('education.index') }}">Education</a>
            <span>/</span>
            <span>{{ $education->degree }}</span>
        </div>
        <div class="detail-hero-content">
            <div class="section-label">Education Details</div>
            <h1 class="detail-hero-title">{{ $education->degree }}</h1>
            <div class="detail-hero-meta">
                <div class="detail-meta-item">
                    <strong>Institution:</strong> {{ $education->institution }}
                </div>
                @if($education->location)
                    <div class="detail-meta-item">
                        <strong>Location:</strong> {{ $education->location }}
                    </div>
                @endif
                <div class="detail-meta-item">
                    <strong>Period:</strong>
                    {{ $education->start_date ? $education->start_date->format('Y') : 'Start' }} - 
                    {{ $education->end_date ? $education->end_date->format('Y') : 'Present' }}
                </div>
                @if($education->gpa)
                    <div class="detail-meta-item">
                        <strong>GPA:</strong> {{ $education->gpa }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section class="detail-content-section">
    <div class="container">
        <div class="detail-content-grid">
            <div class="detail-main">
                @if($education->description)
                    <div class="detail-section">
                        <h2 class="detail-section-title">About This Program</h2>
                        <div class="detail-section-content">
                            <p class="detail-description">{{ $education->description }}</p>
                        </div>
                    </div>
                @endif

                @if($education->achievements)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Achievements & Honors</h2>
                        <div class="detail-section-content">
                            <ul class="detail-achievements-list">
                                @foreach(explode("\n", $education->achievements) as $achievement)
                                    @if(trim($achievement))
                                        <li>{{ trim($achievement) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($education->activities)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Activities & Societies</h2>
                        <div class="detail-section-content">
                            <ul class="detail-list">
                                @foreach(explode("\n", $education->activities) as $activity)
                                    @if(trim($activity))
                                        <li>{{ trim($activity) }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($education->thesis)
                    <div class="detail-section">
                        <h2 class="detail-section-title">Thesis / Capstone Project</h2>
                        <div class="detail-section-content">
                            <div class="detail-projects">
                                <div class="detail-project-item">
                                    <span class="project-marker">📝</span>
                                    <span>{{ $education->thesis }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <aside class="detail-sidebar">
                @if($education->field_of_study)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Field of Study</h3>
                        <p class="sidebar-text">{{ $education->field_of_study }}</p>
                    </div>
                @endif

                @if($education->courses)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Relevant Coursework</h3>
                        <div class="sidebar-tags">
                            @foreach(explode(',', $education->courses) as $course)
                                <span class="sidebar-tag">{{ trim($course) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($education->skills)
                    <div class="sidebar-section">
                        <h3 class="sidebar-title">Skills Acquired</h3>
                        <div class="sidebar-tags">
                            @foreach(explode(',', $education->skills) as $skill)
                                <span class="sidebar-tag">{{ trim($skill) }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="sidebar-section">
                    <h3 class="sidebar-title">Share</h3>
                    <div class="sidebar-share">
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($education->degree . ' from ' . $education->institution) }}&url={{ urlencode(route('education.show', $education->id)) }}" target="_blank" class="share-link">
                            Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('education.show', $education->id)) }}" target="_blank" class="share-link">
                            LinkedIn
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- Related Education Section -->
@if($relatedEducation->count() > 0)
<section class="related-section">
    <div class="container">
        <h2 class="related-title">Other Educational Qualifications</h2>
        <div class="related-grid">
            @foreach($relatedEducation as $related)
                <a href="{{ route('education.show', $related->id) }}" class="related-card">
                    <h3 class="related-card-title">{{ $related->degree }}</h3>
                    <div class="related-card-company">{{ $related->institution }}</div>
                    <div class="related-card-date">
                        {{ $related->start_date ? $related->start_date->format('Y') : 'Start' }} - 
                        {{ $related->end_date ? $related->end_date->format('Y') : 'End' }}
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
            <h2 class="detail-cta-title">Let's work together</h2>
            <p class="detail-cta-description">
                With a strong educational foundation and practical experience, I'm ready to contribute to your next project.
            </p>
            <div class="detail-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Get In Touch</a>
                <a href="{{ route('education.index') }}" class="btn btn-secondary btn-large">Back to Education</a>
            </div>
        </div>
    </div>
</section>
@endsection
