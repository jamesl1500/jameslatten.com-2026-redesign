<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);
        
        // Send email or save to database
        Mail::to('hello@example.com')->send(new ContactFormMail($validated));
        
        return redirect()->route('contact')->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}
