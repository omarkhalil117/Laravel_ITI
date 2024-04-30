<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view("posts.create", ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $req = request()->all();
        $new_post = new Post();

        $new_post->title = $req['title'] ;
        $new_post->body = $req['body'];
        $new_post->creator_id = $req['creator_id'];

        $new_post->save();

        return to_route('posts.index');        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $users = User::all();
        return view('posts.edit', ["post" => $post , 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $update_data = $request->all();
        $post->title = $update_data['title']; 
        $post->body = $update_data['body'];
        $post->creator_id = $update_data['creator_id'];

        $post->save();
        return to_route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("posts.index");
    }
}
