<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Fetch all posts and pass them to the view
        $posts = Post::latest()->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the create view
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string|unique:posts,slug|max:255',
        ]);

        // Create a new post and associate it with the authenticated user
        $user = User::find(Auth::user()->id);
        $user->posts()->create([
            'title' => strtolower($validatedData['title']),
            'slug' => Str::slug($validatedData['title']),
            'body' => strtolower($validatedData['body']),
        ]);

        // Redirect to index with success message
        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Return the show view with the post
        return view('posts.show',[
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        $this->authorize('update', $post);

        // Return the edit view with the post
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        $this->authorize('update', $post);

        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id . '|max:255',
        ]);

        // Update the post
        $post->update($validatedData);

        // Redirect to the show view with success message
        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        $this->authorize('delete', $post);

        // Delete the post
        $post->delete();

        // Redirect to index with success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
