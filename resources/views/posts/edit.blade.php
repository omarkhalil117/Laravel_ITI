@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Post</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" >
                            @error('title')
                                <div class="alert alert-danger ">{{ $message }}</div> 
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="5" required>{{ $post->body }}</textarea>
                        </div>
                            @error('body')
                                <div class="alert alert-danger ">{{ $message }}</div> 
                            @enderror
                        <select class="form-select" aria-label="Default select example" name="creator_id" value="{{$post->user->id}}">
                            <option selected disabled value="{{$post->user->id}}">{{$post->user->name}}</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection