<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'NeueMontreal', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #000;
            color: #fff;
        }
        
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-card {
            background: #fff;
            color: #000;
            padding: 4rem 3rem;
            width: 100%;
            max-width: 480px;
            border: 1px solid #e0e0e0;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .login-header p {
            color: #666;
            font-size: 0.95rem;
        }
        
        .alert {
            padding: 1rem 1.25rem;
            margin-bottom: 2rem;
            border-left: 4px solid #dc2626;
            background: #fef2f2;
            color: #991b1b;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            color: #000;
            font-weight: 600;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 1rem;
            border: 1px solid #e0e0e0;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.2s;
            background: #fff;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #000;
            background: #fafafa;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 1.25rem;
            height: 1.25rem;
            cursor: pointer;
        }
        
        .checkbox-group label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            color: #666;
        }
        
        .btn {
            width: 100%;
            padding: 1rem;
            background: #000;
            color: #fff;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn:hover {
            background: #333;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #e0e0e0;
        }
        
        .login-footer a {
            color: #000;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }
        
        .login-footer a:hover {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1>Admin Panel</h1>
                <p>Sign in to manage your content</p>
            </div>
            
            @if($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                
                <button type="submit" class="btn">Sign In</button>
            </form>
            
            <div class="login-footer">
                <a href="{{ route('home') }}">← Back to Website</a>
            </div>
        </div>
    </div>
</body>
</html>
