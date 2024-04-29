<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    function create()
    {
        return view("create");
    }
    function store()
    {
        $req = request()->all();
        $new_post = new Post();

        $new_post->title = $req['title'] ;
        $new_post->body = $req['body'];
        $new_post->creator = $req['creator'];

        $new_post->save();

        return to_route('posts.index');
    }
    function index()
    {
        $posts = Post::all();
        return view("index", ["posts" => $posts]);
    }
    function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', ["post" => $post]);
        
    }
    function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', ["post" => $post]);
    }

    function update($id) 
    {
        $post = Post::findOrFail($id);
        $update_data = request()->all();

        $post->title = $update_data['title']; 
        $post->body = $update_data['body'];
        $post->creator = $update_data['creator'];

        $post->save();
        return to_route("posts.index");
    }

    public function destroy($id)
    {
        
        $post = Post::findOrFail($id);
        $post->delete();
        
        return to_route("posts.index");
    }
}