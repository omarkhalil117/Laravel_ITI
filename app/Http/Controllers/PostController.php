<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
        private function file_operations($request){
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filepath=$image->store("images", "posts_uploads");
                return $filepath;
            }
            return null;
        }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $posts = Post::paginate(5);
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
        $file_path = $this->file_operations($request);
        $req = request()->all();
        $new_post = new Post();
        
        $new_post->title = str_slug($req['title'],'-');
        $new_post->body = $req['body'];
        $new_post->image = $file_path;
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
        $this->authorize('update', $post);
        $update_data = $request->all();
        $post->title = str_slug($update_data['title'],'-'); 
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
        $this->authorize('update', $post);
        $post->delete();
        return to_route("posts.index");
    }

    public function restore()
    {
        $restoredCount = Post::onlyTrashed()->restore();

        return redirect()->back()->with('success', $restoredCount . ' soft deleted posts restored successfully');
    }
}
