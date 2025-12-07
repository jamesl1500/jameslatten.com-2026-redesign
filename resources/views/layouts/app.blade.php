<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="James Latten - Full Stack Developer & Digital Innovator. Explore my portfolio, blog, and projects showcasing cutting-edge web solutions.">
    <meta name="keywords"
        content="James Latten, Full Stack Developer, Digital Innovator, Portfolio, Blog, Web Development, Web Solutions">
    <meta name="author" content="James Latten">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'James Latten - Portfolio')">
    <meta property="og:description"
        content="James Latten - Full Stack Developer & Digital Innovator. Explore my portfolio, blog, and projects showcasing cutting-edge web solutions.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:image:alt" content="James Latten - Full Stack Developer & Digital Innovator">

    <title>@yield('title', 'James Latten - Portfolio')</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header id="main-nav">
        <div class="nav-container">
            <div class="nav-left">
                <nav class="small-nav">
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('experience.index') }}">Experience</a></li>
                    <li><a href="{{ route('education.index') }}">Education</a></li>
                </nav>
            </div>
            <div class="nav-center">
                <a href="{{ route('home') }}" class="nav-logo">
                    <h4>JAMES LATTEN.</h4>
                </a>
            </div>
            <div class="nav-right">
                <nav id="nav-menu" class="nav-menu">
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </nav>
            </div>
        </div>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>JAMES LATTEN.</h3>
                <p style="color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.8;">
                    Full Stack Developer & Digital Innovator creating exceptional web experiences.
                </p>
            </div>
            <div class="footer-section">
                <h3>EXPLORE</h3>
                <ul>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('experience.index') }}">Experience</a></li>
                    <li><a href="{{ route('education.index') }}">Education</a></li>
                    <li><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>CONNECT</h3>
                <ul>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="https://github.com/jamesl1500" target="_blank">GitHub</a></li>
                    <li><a href="https://linkedin.com/in/jameslattenjr" target="_blank">LinkedIn</a></li>
                    <li><a href="mailto:hello@jameslatten.com">Email</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Designed & Developed by James Latten</p>
            <p>&copy; {{ date('Y') }} James Latten. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
