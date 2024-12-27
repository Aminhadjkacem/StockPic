<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    /**
     * Display a list of all posts.
     */
    public function index(): Response
    {
        // Fetch all posts ordered by the most recently updated
        $posts = Post::orderBy('updated_at', 'desc')->get();

        // Return a view and pass the posts data to it
        return response()->view('posts.index', compact('posts'));
    }

    /**
     * Show the form to create a new post.
     */
    public function create(): Response
    {
        // Return a form view for creating a new post
        return response()->view('posts.form');
    }

    /**
     * Store a newly created post in the database.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        // Validate the request data using the custom StoreRequest validation rules
        $validated = $request->validated();

        // Check if there's an uploaded image for the post
        if ($request->hasFile('featured_image')) {
            // Save the uploaded image to the public storage folder
            $filePath = Storage::disk('public')->put('images/posts/featured-images', $request->file('featured_image'));
            // Add the image path to the validated data
            $validated['featured_image'] = $filePath;
        }

        // Create a new post in the database with the validated data
        $create = Post::create($validated);

        if ($create) {
            // Add a success notification message to the session
            session()->flash('notif.success', 'Post created successfully!');
            // Redirect to the posts list
            return redirect()->route('posts.index');
        }

        // If something went wrong, abort with a 500 error
        return abort(500);
    }

    /**
     * Display the details of a specific post.
     */
    public function show(string $id): Response
    {
        // Fetch the post by ID and pass it to the view
        $post = Post::findOrFail($id);
        return response()->view('posts.show', compact('post'));
    }

    /**
     * Show the form to edit a specific post.
     */
    public function edit(string $id): Response
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Return the form view and pass the post data, including the image URL
        $imageUrl = Storage::disk('public')->url($post->featured_image);
        return response()->view('posts.form', compact('post', 'imageUrl'));
    }

    /**
     * Update an existing post in the database.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Validate the incoming request data
        $validated = $request->validated();

        // Check if there's an uploaded image and update it
        if ($request->hasFile('featured_image')) {
            // Delete the old image
            Storage::disk('public')->delete($post->featured_image);

            // Save the new image
            $filePath = Storage::disk('public')->put('images/posts/featured-images', $request->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        // Update the post in the database
        $update = $post->update($validated);

        if ($update) {
            // Add a success notification message
            session()->flash('notif.success', 'Post updated successfully!');
            // Redirect to the posts list
            return redirect()->route('posts.index');
        }

        // If something went wrong, abort with a 500 error
        return abort(500);
    }

    /**
     * Delete a specific post from the database.
     */
    public function destroy(string $id): RedirectResponse
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Delete the post's image from storage
        Storage::disk('public')->delete($post->featured_image);

        // Delete the post from the database
        $delete = $post->delete();

        if ($delete) {
            // Add a success notification message
            session()->flash('notif.success', 'Post deleted successfully!');
            // Redirect to the posts list
            return redirect()->route('posts.index');
        }

        // If something went wrong, abort with a 500 error
        return abort(500);
    }
}
