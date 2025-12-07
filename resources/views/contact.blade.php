@extends('layouts.app')

@section('title', 'Contact - James Latten')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
    }
    
    .page-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    
    .contact-container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .contact-form {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
    .form-group textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        font-size: 1rem;
        font-family: inherit;
    }
    
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #2563eb;
    }
    
    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }
    
    .contact-info {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        margin-top: 2rem;
        text-align: center;
    }
    
    .contact-info h3 {
        color: #2563eb;
        margin-bottom: 1rem;
    }
    
    .contact-item {
        margin: 1rem 0;
    }
</style>

<div class="page-header">
    <h1>Get In Touch</h1>
    <p>Have a question or want to work together?</p>
</div>

<div class="container contact-container">
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

    <div class="contact-form">
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}">
            </div>
            
            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" required>{{ old('message') }}</textarea>
            </div>
            
            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>

    <div class="contact-info">
        <h3>Other Ways to Connect</h3>
        <div class="contact-item">
            <strong>Email:</strong> james@jameslatten.com
        </div>
        <div class="contact-item">
            <strong>LinkedIn:</strong> linkedin.com/in/jameslatten
        </div>
        <div class="contact-item">
            <strong>GitHub:</strong> github.com/jameslatten
        </div>
    </div>
</div>
@endsection
