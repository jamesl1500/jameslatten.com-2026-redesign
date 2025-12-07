<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check if we're in admin panel
        if (request()->is('admin/*')) {
            $posts = \App\Models\BlogPosts::orderBy('created_at', 'desc')->paginate(15);
            return view('admin.blog-posts.index', compact('posts'));
        }
        
        // Public blog view
        $posts = \App\Models\BlogPosts::where('published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'read_time' => 'nullable|integer',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
        
        \App\Models\BlogPosts::create($validated);
        
        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = \App\Models\BlogPosts::where('published', true)->findOrFail($id);
        
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = \App\Models\BlogPosts::findOrFail($id);
        return view('admin.blog-posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = \App\Models\BlogPosts::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_posts,slug,' . $id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'tags' => 'nullable|string',
            'read_time' => 'nullable|integer',
            'published' => 'boolean',
            'published_at' => 'nullable|date',
        ]);
        
        $post->update($validated);
        
        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = \App\Models\BlogPosts::findOrFail($id);
        $post->delete();
        
        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post deleted successfully!');
    }
}
