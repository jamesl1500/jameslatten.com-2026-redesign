<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = \App\Models\Education::orderBy('start_date', 'desc');
        
        if (request()->is('admin/*')) {
            $education = $education->paginate(15);
            return view('admin.education.index', compact('education'));
        }
        
        $education = $education->get();
        return view('education.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:50',
        ]);
        
        \App\Models\Education::create($validated);
        
        return redirect()->route('admin.education.index')->with('success', 'Education created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        
        if (request()->is('admin/*')) {
            return view('admin.education.show', compact('education'));
        }
        
        // Get related education (other education entries, excluding current one)
        $relatedEducation = \App\Models\Education::where('id', '!=', $id)
            ->orderBy('start_date', 'desc')
            ->take(3)
            ->get();
        
        return view('education.show', compact('education', 'relatedEducation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        return view('admin.education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        
        $validated = $request->validate([
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'institution' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'description' => 'nullable|string',
            'grade' => 'nullable|string|max:50',
        ]);
        
        $education->update($validated);
        
        return redirect()->route('admin.education.index')->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = \App\Models\Education::findOrFail($id);
        $education->delete();
        
        return redirect()->route('admin.education.index')->with('success', 'Education deleted successfully!');
    }
}
