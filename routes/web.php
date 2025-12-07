<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogPostsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CertificateController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// About page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Blog
Route::get('/blog', [BlogPostsController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogPostsController::class, 'show'])->name('blog.show');

// Portfolio/Projects
Route::get('/portfolio', [ProjectController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{id}', [ProjectController::class, 'show'])->name('portfolio.show');

// Experience (optional - for resume section)
Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
Route::get('/experience/{id}', [ExperienceController::class, 'show'])->name('experience.show');

// Education (optional - for resume section)
Route::get('/education', [EducationController::class, 'index'])->name('education.index');
Route::get('/education/{id}', [EducationController::class, 'show'])->name('education.show');

// Certificates (optional - for credentials section)
Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');

// Authentication Routes
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', function(\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('login.post');

Route::post('/logout', function(\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Admin Routes - Protected by authentication
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Blog Posts Management
    Route::resource('blog-posts', BlogPostsController::class)->except(['show']);
    
    // Projects Management
    Route::resource('projects', ProjectController::class)->except(['show']);
    
    // Experience Management
    Route::resource('experiences', ExperienceController::class);
    
    // Education Management
    Route::resource('education', EducationController::class);
    
    // Certificates Management
    Route::resource('certificates', CertificateController::class);
});
