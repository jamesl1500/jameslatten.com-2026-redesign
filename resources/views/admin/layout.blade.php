<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'NeueMontreal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #fafafa;
        }
        
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            background: #000;
            color: white;
            padding: 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            border-right: 1px solid #222;
        }
        
        .sidebar-header {
            padding: 2.5rem 2rem;
            border-bottom: 1px solid #222;
            background: #000;
        }
        
        .sidebar-header h2 {
            color: #fff;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .sidebar-header p {
            color: #999;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 1rem 0;
        }
        
        .sidebar-nav a {
            display: flex;
            align-items: center;
            padding: 1rem 2rem;
            color: #999;
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.95rem;
            font-weight: 500;
            border-left: 3px solid transparent;
        }
        
        .sidebar-nav a:hover {
            background: #111;
            color: #fff;
            border-left-color: #fff;
        }
        
        .sidebar-nav a.active {
            background: #111;
            color: #fff;
            border-left-color: #fff;
        }
        
        .sidebar-nav a span {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }
        
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 0;
            background: #fafafa;
        }
        
        .admin-header {
            background: #fff;
            padding: 2rem 3rem;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .admin-header h1 {
            color: #000;
            font-size: 2rem;
            font-weight: 700;
        }
        
        .admin-user {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .admin-user span {
            color: #666;
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .btn {
            display: inline-block;
            padding: 0.75rem 1.75rem;
            background: #000;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: inherit;
        }
        
        .btn:hover {
            background: #333;
        }
        
        .btn-secondary {
            background: #fff;
            color: #000;
            border: 1px solid #e0e0e0;
        }
        
        .btn-secondary:hover {
            background: #f5f5f5;
            border-color: #ccc;
        }
        
        .btn-danger {
            background: #dc2626;
        }
        
        .btn-danger:hover {
            background: #b91c1c;
        }
        
        .btn-sm {
            padding: 0.5rem 1.25rem;
            font-size: 0.875rem;
        }
        
        .alert {
            padding: 1.25rem 1.5rem;
            margin: 2rem 3rem;
            border-left: 4px solid;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-left-color: #16a34a;
        }
        
        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border-left-color: #dc2626;
        }
        
        .card {
            background: #fff;
            border: 1px solid #e0e0e0;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .card-header h2 {
            color: #1f2937;
            font-size: 1.5rem;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        
        table thead {
            background: #f3f4f6;
        }
        
        table th,
        table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        table th {
            font-weight: 600;
            color: #374151;
        }
        
        table tr:hover {
            background: #f9fafb;
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }
        
        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
        
        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
            font-weight: 500;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-family: inherit;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2563eb;
        }
        
        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: auto;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
                <p>Content Management</p>
            </div>
            <ul class="sidebar-nav">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><span>📊</span> Dashboard</a></li>
                <li><a href="{{ route('admin.blog-posts.index') }}" class="{{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}"><span>📝</span> Blog Posts</a></li>
                <li><a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}"><span>💼</span> Projects</a></li>
                <li><a href="{{ route('admin.experiences.index') }}" class="{{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}"><span>💻</span> Experience</a></li>
                <li><a href="{{ route('admin.education.index') }}" class="{{ request()->routeIs('admin.education.*') ? 'active' : '' }}"><span>🎓</span> Education</a></li>
                <li><a href="{{ route('admin.certificates.index') }}" class="{{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}"><span>🏆</span> Certificates</a></li>
                <li><a href="{{ route('home') }}" target="_blank"><span>🌐</span> View Site</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <div class="admin-header">
                <h1>@yield('page-title', 'Dashboard')</h1>
                <div class="admin-user">
                    <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-secondary">Logout</button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul style="list-style: none;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
