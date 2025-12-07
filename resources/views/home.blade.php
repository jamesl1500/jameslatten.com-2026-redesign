@extends('layouts.app')

@section('title', 'Home - James Latten')

@section('content')
<div class="page-home">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <div class="hero-intro">Hi, I'm James Latten</div>
                <h1 class="hero-title">
                    <span class="hero-line">A leader in</span>
                    <span class="hero-line">web development</span>
                    <span class="hero-line">innovation.</span>
                </h1>
                <p class="hero-subtitle">
                    Crafting exceptional digital experiences through modern technology, 
                    elegant design, and strategic thinking.
                </p>
                <div class="hero-cta">
                    <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Explore Work</a>
                    <a href="{{ route('contact') }}" class="btn btn-secondary">Get In Touch</a>
                </div>
            </div>
        </div>
        <div class="scroll-indicator">
            <span class="scroll-line"></span>
            <span class="scroll-text">SCROLL</span>
        </div>
    </section>

    <!-- About Preview Section -->
    <section class="about-preview-section">
        <div class="container">
            <div class="about-preview-content">
                <div class="section-label">About</div>
                <h2 class="section-title">Building the future of digital experiences</h2>
                <p class="section-description">
                    With over {{ date('Y') - 2021 }} years of experience in full-stack development, 
                    I specialize in creating innovative web applications that combine cutting-edge 
                    technology with thoughtful design. My approach focuses on understanding business 
                    goals and delivering solutions that drive real results.
                </p>
                <a href="{{ route('about') }}" class="link-arrow btn">Learn More About Me →</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Services</div>
                <h2 class="section-title">What I Do.</h2>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">⚡</div>
                    <h3 class="service-title">Full Stack Development</h3>
                    <p class="service-description">
                        End-to-end development of robust web applications using Laravel, Vue.js, 
                        React, and modern frameworks. From architecture to deployment.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🎨</div>
                    <h3 class="service-title">UI/UX Design</h3>
                    <p class="service-description">
                        Creating intuitive, accessible interfaces that users love. Focused on 
                        conversion optimization and seamless user journeys.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🚀</div>
                    <h3 class="service-title">Performance Optimization</h3>
                    <p class="service-description">
                        Speed matters. I optimize applications for lightning-fast load times, 
                        better SEO, and superior user experience.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-icon">☁️</div>
                    <h3 class="service-title">Cloud Solutions</h3>
                    <p class="service-description">
                        Scalable cloud infrastructure on AWS, Azure, and Google Cloud. DevOps, 
                        CI/CD, and containerization expertise.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-icon">📱</div>
                    <h3 class="service-title">API Development</h3>
                    <p class="service-description">
                        RESTful and GraphQL APIs designed for performance, security, and developer 
                        experience. Complete documentation included.
                    </p>
                </div>
                <div class="service-card">
                    <div class="service-icon">🔒</div>
                    <h3 class="service-title">Security & Compliance</h3>
                    <p class="service-description">
                        Enterprise-grade security implementation, GDPR compliance, and best 
                        practices to protect your data and users.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="featured-projects-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Portfolio</div>
                <h2 class="section-title">Featured Work</h2>
            </div>
            
            <div class="section-cta">
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">{{ date('Y') - 2021 }}+</div>
                    <div class="stat-label">Years Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">{{ \App\Models\Project::count() ?: '50+' }}</div>
                    <div class="stat-label">Projects Completed</div>
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

    <!-- Blog Preview Section -->
    <section class="blog-preview-section">
        <div class="container">
            <div class="section-header">
                <div class="section-label">Blog</div>
                <h2 class="section-title">Latest Insights</h2>
            </div>
            @php
                $latestPosts = \App\Models\BlogPosts::where('published', true)
                    ->orderBy('published_at', 'desc')
                    ->take(3)
                    ->get();
            @endphp
            @if($latestPosts->count() > 0)
            <div class="blog-grid">
                @foreach($latestPosts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                    @if($post->image_url)
                    <div class="blog-image">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </div>
                    @endif
                    <div class="blog-info">
                        <div class="blog-meta">
                            <span class="blog-date">{{ $post->published_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="blog-title">{{ $post->title }}</h3>
                        <p class="blog-excerpt">{{ Str::limit($post->excerpt ?? strip_tags($post->content), 100) }}</p>
                        <span class="blog-link">Read More →</span>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div class="blog-placeholder">
                <p>Blog posts will be displayed here once published through the admin panel.</p>
            </div>
            @endif
            <div class="section-cta">
                <a href="{{ route('blog.index') }}" class="btn btn-primary">View All Posts</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Let's create something amazing together</h2>
                <p class="cta-description">
                    Have a project in mind? Let's discuss how we can bring your vision to life 
                    with cutting-edge technology and creative solutions.
                </p>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Start a Conversation</a>
            </div>
        </div>
    </section>
</div>
@endsection
