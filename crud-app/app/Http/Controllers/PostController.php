<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a newly created post in storage
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create a new post with only the allowed fields
        Post::create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // Display a specific post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Show the form for editing a specific post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update a specific post in storage
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Update the post with only the allowed fields
        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove a specific post from storage
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}