@extends('layouts.app')

@section('title', 'Education - James Latten')

@section('content')
<!-- Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Learning</div>
            <h1 class="page-hero-title">Educational Background</h1>
            <p class="page-hero-subtitle">
                Academic foundations and continuous learning that have fueled my passion 
                for technology and innovation.
            </p>
        </div>
    </div>
</section>

<!-- Education Grid Section -->
<section class="education-grid-section">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Degrees</div>
            <h2 class="section-title">Educational Background</h2>
        </div>
        <div class="education-cards">
            @forelse($education as $edu)
                <a href="{{ route('education.show', $edu->id) }}" class="education-card-link">
                    <article class="education-detail-card">
                        <div class="education-card-header">
                            <h2 class="education-card-degree">{{ $edu->degree }}</h2>
                            <div class="education-card-institution">{{ $edu->institution }}</div>
                            <div class="education-card-date">
                                {{ $edu->start_date ? $edu->start_date->format('Y') : 'Start' }} - 
                                {{ $edu->end_date ? $edu->end_date->format('Y') : 'End' }}
                            </div>
                            @if($edu->gpa)
                                <div class="education-card-gpa">GPA: {{ $edu->gpa }}</div>
                            @endif
                        </div>
                        <div class="education-card-footer">
                            <span class="education-link-arrow">View Details →</span>
                        </div>
                    </article>
                </a>
            @empty
                <div class="education-empty">
                    <div class="empty-icon">🎓</div>
                    <h3>No Education Entries Yet</h3>
                    <p>Educational qualifications will appear here once added through the admin panel.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Certifications Preview Section -->
@if(\App\Models\Certificate::count() > 0)
<section class="related-certifications-section">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Credentials</div>
            <h2 class="section-title">Professional Certificates</h2>
        </div>
        <div class="certifications-preview-grid">
            @foreach(\App\Models\Certificate::take(6)->get() as $cert)
                <div class="certification-preview-card">
                    <h3 class="certification-name">{{ $cert->name }}</h3>
                    <div class="certification-issuer">{{ $cert->issuer }}</div>
                    <div class="certification-date">
                        {{ $cert->issue_date ? $cert->issue_date->format('M Y') : 'Issued' }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="section-cta">
            <a href="{{ route('certificates.index') }}" class="btn btn-secondary">View All Certificates</a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="page-cta-section">
    <div class="container">
        <div class="page-cta-content">
            <h2 class="page-cta-title">Let's work together</h2>
            <p class="page-cta-description">
                Interested in collaborating? I'd love to hear about your project and discuss 
                how I can help bring your vision to life.
            </p>
            <div class="page-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Contact Me</a>
                <a href="{{ route('experience.index') }}" class="btn btn-secondary btn-large">View Experience</a>
            </div>
        </div>
    </div>
</section>
@endsection
