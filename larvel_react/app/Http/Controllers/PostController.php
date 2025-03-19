<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return inertia and tell which comonent to render
        // create this file '/resources/js/pages/posts/index.tsx'
        return Inertia::render('posts/index',[
            "posts" => Post::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validate the body
        $request->validate(['title'=>"required", "body"=>"required"]);

        // insert into DB
        Post::create([
            "title" => $request->title,
            "body" => $request->body, 
        ]);

        // return to index page to see the list
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return Inertia::render('posts/edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['title'=>"required", "body"=>"required"]);


        // find the post
        $post = Post::find($id);

        // update the data
        $post->title = $request->title;
        $post->body = $request->body;

        // save the post
        $post->save();

        // return to index page to see the list
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
