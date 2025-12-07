<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certificate;

class AboutController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $education = Education::orderBy('start_date', 'desc')->get();
        $certificates = Certificate::orderBy('issue_date', 'desc')->get();
        
        return view('about', compact('experiences', 'education', 'certificates'));
    }
}
