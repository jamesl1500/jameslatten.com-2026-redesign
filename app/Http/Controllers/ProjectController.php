<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if we're in admin panel
        if (request()->is('admin/*')) {
            $projects = \App\Models\Project::orderBy('order', 'asc')->orderBy('created_at', 'desc')->paginate(15);
            return view('admin.projects.index', compact('projects'));
        }
        
        // Public portfolio view
        $projects = \App\Models\Project::where('is_featured', true)
            ->orWhere('is_published', true)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('portfolio.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug',
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'emoji' => 'nullable|string|max:10',
            'category' => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'image_url' => 'nullable|file|image|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'nullable|integer',
            'completed_at' => 'nullable|date',
        ]);

        if( !isset($validated['image_url']) || empty($validated['image_url']) ) {
            $validated['image_url'] = null;
        }

        if($validated['image_url'] !== null)
        {
            // Upload image
            $imagePath = str_replace('/storage/', '', $validated['image_url']);
            if (file_exists(storage_path('app/public/' . $imagePath))) {
                // Image already in storage, do nothing
            } else {
                // Move image from temp to permanent location
                $tempPath = str_replace('/storage/temp/', '', $validated['image_url']);
                if (file_exists(storage_path('app/public/temp/' . $tempPath))) {
                    $newPath = 'projects/' . basename($tempPath);
                    \Illuminate\Support\Facades\Storage::move('public/temp/' . $tempPath, 'public/' . $newPath);
                    $validated['image_url'] = '/storage/' . $newPath;
                } else {
                    // Temp image doesn't exist, set to null
                    $validated['image_url'] = null;
                }
            }
        }
        
        \App\Models\Project::create($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        if (request()->is('admin/*')) {
            $project = \App\Models\Project::where('slug', $slug)->firstOrFail();
            return view('admin.projects.show', compact('project'));
        }
        
        $project = \App\Models\Project::where('is_published', true)->where('slug', $slug)->firstOrFail();
        
        // Get related projects (same category or random, excluding current)
        $relatedProjects = \App\Models\Project::where('is_published', true)
            ->where('id', '!=', $project->id)
            ->when($project->category, function($query) use ($project) {
                return $query->where('category', $project->category);
            })
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        return view('portfolio.show', compact('project', 'relatedProjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $id,
            'description' => 'required|string',
            'long_description' => 'nullable|string',
            'emoji' => 'nullable|string|max:10',
            'category' => 'nullable|string|max:255',
            'technologies' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'image_url' => 'nullable|file|image|max:2048',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'order' => 'nullable|integer',
            'completed_at' => 'nullable|date',
        ]);

        if(isset($validated['image_url']) && !empty($validated['image_url']))
        {
            // Upload image
            $imagePath = str_replace('/storage/', '', $validated['image_url']);
            if (file_exists(storage_path('app/public/' . $imagePath))) {
                // Image already in storage, do nothing
            } else {
                // Move image from temp to permanent location
                $tempPath = str_replace('/storage/temp/', '', $validated['image_url']);
                if (file_exists(storage_path('app/public/temp/' . $tempPath))) {
                    $newPath = 'projects/' . basename($tempPath);
                    \Illuminate\Support\Facades\Storage::move('public/temp/' . $tempPath, 'public/' . $newPath);
                    $validated['image_url'] = '/storage/' . $newPath;
                } else {
                    // Temp image doesn't exist, set to null
                    $validated['image_url'] = null;
                }
            }
        } else {
            $validated['image_url'] = $project->image_url; // Keep existing image if none uploaded
        }
        
        $project->update($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = \App\Models\Project::findOrFail($id);
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully!');
    }
}
