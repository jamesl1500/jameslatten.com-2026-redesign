@extends('layouts.app')

@section('title', 'About - James Latten')

@section('content')
<!-- Hero Section -->
<section class="about-hero-section">
    <div class="container">
        <div class="about-hero-content">
            <div class="section-label">About</div>
            <h1 class="about-hero-title">Crafting digital experiences that make a difference</h1>
            <p class="about-hero-subtitle">
                A passionate full-stack developer dedicated to building innovative solutions 
                that bridge the gap between technology and human needs.
            </p>
        </div>
    </div>
</section>

<!-- Bio Section -->
<section class="about-bio-section">
    <div class="container">
        <div class="bio-grid">
            <div class="bio-content">
                <h2 class="bio-title">Hello, I'm James Latten</h2>
                <p class="bio-text">
                    I'm a full-stack developer with over {{ date('Y') - 2021 }} years of experience creating 
                    elegant solutions to complex problems. My journey in web development began with a simple 
                    curiosity about how websites work, which quickly evolved into a passion for building 
                    powerful, user-centric applications.
                </p>
                <p class="bio-text">
                    I specialize in modern web technologies including Laravel, Vue.js, React, and cloud 
                    infrastructure. My approach combines technical excellence with a deep understanding 
                    of user experience, ensuring that every project not only functions flawlessly but 
                    also delights its users.
                </p>
                <p class="bio-text">
                    When I'm not coding, you'll find me exploring emerging technologies, contributing 
                    to open-source projects, mentoring aspiring developers, or sharing insights through 
                    blog posts and technical talks.
                </p>
            </div>
            <div class="bio-stats">
                <div class="bio-stat-item">
                    <div class="bio-stat-number">{{ date('Y') - 2021 }}+</div>
                    <div class="bio-stat-label">Years of Experience</div>
                </div>
                <div class="bio-stat-item">
                    <div class="bio-stat-number">{{ \App\Models\Project::count() ?: '50+' }}</div>
                    <div class="bio-stat-label">Projects Completed</div>
                </div>
                <div class="bio-stat-item">
                    <div class="bio-stat-number">{{ \App\Models\Certificate::count() ?: '10+' }}</div>
                    <div class="bio-stat-label">Certificates</div>
                </div>
                <div class="bio-stat-item">
                    <div class="bio-stat-number">100%</div>
                    <div class="bio-stat-label">Client Satisfaction</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="about-skills-section">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Expertise</div>
            <h2 class="section-title">Technical Skills</h2>
        </div>
        
        <div class="skills-grid">
            <div class="skill-category">
                <h3 class="skill-category-title">Backend</h3>
                <div class="skill-tags">
                    <span class="skill-tag">PHP</span>
                    <span class="skill-tag">Laravel</span>
                    <span class="skill-tag">Node.js</span>
                    <span class="skill-tag">Python</span>
                    <span class="skill-tag">REST APIs</span>
                    <span class="skill-tag">GraphQL</span>
                </div>
            </div>
            
            <div class="skill-category">
                <h3 class="skill-category-title">Frontend</h3>
                <div class="skill-tags">
                    <span class="skill-tag">Vue.js</span>
                    <span class="skill-tag">React</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">TypeScript</span>
                    <span class="skill-tag">Tailwind CSS</span>
                    <span class="skill-tag">SASS</span>
                </div>
            </div>
            
            <div class="skill-category">
                <h3 class="skill-category-title">Database</h3>
                <div class="skill-tags">
                    <span class="skill-tag">MySQL</span>
                    <span class="skill-tag">PostgreSQL</span>
                    <span class="skill-tag">MongoDB</span>
                    <span class="skill-tag">Redis</span>
                </div>
            </div>
            
            <div class="skill-category">
                <h3 class="skill-category-title">DevOps & Cloud</h3>
                <div class="skill-tags">
                    <span class="skill-tag">AWS</span>
                    <span class="skill-tag">Docker</span>
                    <span class="skill-tag">CI/CD</span>
                    <span class="skill-tag">Git</span>
                    <span class="skill-tag">Linux</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="about-cta-section">
    <div class="container">
        <div class="about-cta-content">
            <h2 class="about-cta-title">Let's work together</h2>
            <p class="about-cta-description">
                I'm always interested in hearing about new projects and opportunities. 
                Whether you have a question or just want to say hi, feel free to reach out.
            </p>
            <div class="about-cta-buttons">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-large">Get In Touch</a>
                <a href="{{ route('portfolio.index') }}" class="btn btn-secondary btn-large">View My Work</a>
            </div>
        </div>
    </div>
</section>
@endsection
