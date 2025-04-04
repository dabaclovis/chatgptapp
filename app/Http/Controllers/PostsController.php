<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Post::class);
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $this->authorize('create',Post::class);

        $data = $this->validate($request,[
            'title' => ['required','string'],
            'body' => ['required','string','max:3600'],
            'category' => ['required','string'],
            'avatar' => ['required','mimes:png, jpeg, pdf,jpg , doc, docx,', 'max:2048'],
        ],[
            'avatar.mimes' => 'This file must be png, pdf, doc, docx, jpeg',
            'avatar.max'=> 'The file size must not exceed 2MB',
        ]);

            $file = $request->file($data['avatar']);
            $image = $file->hashName();

            $request->file($data['avatar'])->storeAs('images', $image, 'public');

             User::find(Auth::user()->id)->posts()->create([
                'title' => strtolower($data['title']),
                'slug' => strtolower(Str::slug($data['title'])),
                'body' => strtolower($data['body']),
            ]);

            // create post image in the image table
            User::find(Auth::user()->id)->images()->create([
                'avatar' => $image,
            ]);
            User::find(Auth::user()->id)->categories()->create([
                'category' => $data['category'],
            ]);
            return redirect()->route('home');


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
