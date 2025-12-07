<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = \App\Models\Experience::orderBy('start_date', 'desc');
        
        if (request()->is('admin/*')) {
            $experiences = $experiences->paginate(15);
            return view('admin.experiences.index', compact('experiences'));
        }
        
        $experiences = $experiences->get();
        return view('experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_working' => 'boolean',
            'description' => 'nullable|string',
        ]);
        
        \App\Models\Experience::create($validated);
        
        return redirect()->route('admin.experiences.index')->with('success', 'Experience created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $experience = \App\Models\Experience::findOrFail($id);
        
        if (request()->is('admin/*')) {
            return view('admin.experiences.show', compact('experience'));
        }
        
        // Get related experiences (other experiences, excluding current one)
        $relatedExperiences = \App\Models\Experience::where('id', '!=', $id)
            ->orderBy('start_date', 'desc')
            ->take(3)
            ->get();
        
        return view('experience.show', compact('experience', 'relatedExperiences'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $experience = \App\Models\Experience::findOrFail($id);
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $experience = \App\Models\Experience::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'currently_working' => 'boolean',
            'description' => 'nullable|string',
        ]);
        
        $experience->update($validated);
        
        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = \App\Models\Experience::findOrFail($id);
        $experience->delete();
        
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted successfully!');
    }
}
