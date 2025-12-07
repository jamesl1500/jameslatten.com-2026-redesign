@extends('layouts.app')

@section('title', 'Contact - James Latten')

@section('content')
<!-- Contact Hero Section -->
<section class="page-hero-section">
    <div class="container">
        <div class="page-hero-content">
            <div class="section-label">Contact</div>
            <h1 class="page-hero-title">Get in Touch</h1>
            <p class="page-hero-subtitle">
                Whether you have a question, a project idea, or just want to say hello, 
                feel free to reach out using the form below or via my social media channels.
            </p>
        </div>
    </div>
</section>

<!-- Contact Content Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-container">
                <div class="contact-form-header">
                    <h2>Send Me a Message</h2>
                    <p>Fill out the form below and I'll get back to you as soon as possible.</p>
                </div>

                @if(session('success'))
                    <div class="contact-alert contact-alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="contact-alert contact-alert-error">
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                    @csrf
                    
                    <div class="contact-form-row">
                        <div class="contact-form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        
                        <div class="contact-form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    
                    <div class="contact-form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="What's this about?">
                    </div>
                    
                    <div class="contact-form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" required placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                    </div>
                    
                    <button type="submit" class="contact-submit-btn">Send Message</button>
                </form>
            </div>

            <!-- Contact Info Sidebar -->
            <div class="contact-info-sidebar">
                <div class="contact-info-card">
                    <h3>Get in Touch</h3>
                    <p>Prefer to reach out directly? You can find me on these platforms.</p>
                    
                    <div class="contact-info-items">
                        <div class="contact-info-item">
                            <div class="contact-info-content">
                                <div class="contact-info-label">Email</div>
                                <a href="mailto:hello@jameslatten.com" class="contact-info-link">hello@jameslatten.com</a>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-info-content">
                                <div class="contact-info-label">LinkedIn</div>
                                <a href="https://linkedin.com/in/jameslattenjr" target="_blank" class="contact-info-link">linkedin.com/in/jameslattenjr</a>
                            </div>
                        </div>
                        
                        <div class="contact-info-item">
                            <div class="contact-info-content">
                                <div class="contact-info-label">GitHub</div>
                                <a href="https://github.com/jamesl1500" target="_blank" class="contact-info-link">github.com/jamesl1500</a>
                            </div>
                        </div>
                    
                    </div>
                </div>
                
                <div class="contact-info-card">
                    <h3>Response Time</h3>
                    <p>I typically respond within 24-48 hours during business days. For urgent matters, please mention it in your message.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="page-cta-section contact-cta">
    <div class="container">
        <h2 class="cta-title">Not Ready to Reach Out Yet?</h2>
        <p class="cta-text">Check out my portfolio and blog to see more of my work.</p>
        <div class="cta-buttons">
            <a href="{{ route('portfolio.index') }}" class="btn btn-primary">View Portfolio</a>
            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Read Blog</a>
        </div>
    </div>
</section>
@endsection
