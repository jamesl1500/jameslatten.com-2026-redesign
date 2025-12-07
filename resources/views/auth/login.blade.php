@extends('layouts.app')

@section('title', 'Login - Admin')

@section('content')
<style>
    .login-container {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .login-card {
        background: white;
        padding: 3rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 400px;
    }
    
    .login-card h2 {
        color: #1f2937;
        margin-bottom: 2rem;
        text-align: center;
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
    
    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
    }
    
    .form-group input:focus {
        outline: none;
        border-color: #2563eb;
    }
    
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }
    
    .checkbox-group input[type="checkbox"] {
        width: auto;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <h2>Admin Login</h2>
        
        @if($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" style="margin: 0;">Remember me</label>
            </div>
            
            <button type="submit" class="btn" style="width: 100%;">Login</button>
        </form>
    </div>
</div>
@endsection
