@extends('layouts.app')

@section('title', 'Certifications - James Latten')

@section('content')
<!-- Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Certificates</div>
            <h1 class="page-hero-title">Certificates & Achievements</h1>
            <p class="page-hero-subtitle">
                Professional certificates and industry-recognized credentials that validate 
                my expertise and commitment to continuous learning.
            </p>
        </div>
    </div>
</section>

<!-- Certifications Grid Section -->
<section class="certifications-page-section">
    <div class="container">
        <div class="certifications-page-grid">
            @forelse($certificates as $cert)
                <article class="certification-detail-card">
                    <div class="certification-card-header">
                        <h2 class="certification-card-name">{{ $cert->name }}</h2>
                    </div>
                    <div class="certification-card-body">
                        <div class="certification-card-issuer">
                            <strong>Issued by:</strong> {{ $cert->issuer }}
                        </div>
                        <div class="certification-card-date">
                            <strong>Date:</strong> {{ $cert->issue_date ? $cert->issue_date->format('F Y') : 'N/A' }}
                        </div>
                        @if($cert->expiry_date)
                            <div class="certification-card-expiry">
                                <strong>Valid Until:</strong> {{ $cert->expiry_date->format('F Y') }}
                            </div>
                        @endif
                        @if($cert->credential_id)
                            <div class="certification-card-id">
                                <strong>Credential ID:</strong> {{ $cert->credential_id }}
                            </div>
                        @endif
                        @if($cert->description)
                            <p class="certification-card-description">{{ $cert->description }}</p>
                        @endif
                        @if($cert->skills)
                            <div class="certification-skills">
                                <h4 class="skills-title">Skills Validated:</h4>
                                <div class="skill-tags">
                                    @foreach(explode(',', $cert->skills) as $skill)
                                        <span class="skill-tag">{{ trim($skill) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    @if($cert->credential_url)
                        <div class="certification-card-footer">
                            <a href="{{ $cert->credential_url }}" target="_blank" class="certification-verify-link">
                                Verify Credential →
                            </a>
                        </div>
                    @endif
                </article>
            @empty
                <div class="certifications-empty">
                    <div class="empty-icon">🏆</div>
                    <h3>No Certificates Added Yet</h3>
                    <p>Professional certificates will appear here once added through the admin panel.</p>
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
                <div class="stat-number">{{ $certificates->count() ?: '10+' }}</div>
                <div class="stat-label">Professional Certificates</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">{{ date('Y') - 2021 }}+</div>
                <div class="stat-label">Years Learning</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Multiple</div>
                <div class="stat-label">Technology Platforms</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Always</div>
                <div class="stat-label">Up to Date</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="page-cta-section">
    <div class="container">
        <div class="page-cta-content">
            <h2 class="page-cta-title">Interested in working together?</h2>
            <p class="page-cta-description">
                With proven expertise and industry-recognized credentials, I'm ready to tackle 
                your next challenge. Let's connect.
            </p>
            <div class="page-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Start a Conversation</a>
                <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-large">See My Work</a>
            </div>
        </div>
    </div>
</section>
@endsection
