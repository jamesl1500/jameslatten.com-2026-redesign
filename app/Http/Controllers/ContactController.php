<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
        // TODO: Implement email sending logic or save to database
        // For now, just redirect back with success message
        
        return redirect()->route('contact')->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}
