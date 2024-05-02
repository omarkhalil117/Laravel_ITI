@extends('layouts.default')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <img style="height: 300px;" src="{{ asset('images/posts/' . $post['image']) }}" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $post['title'] }}</h5>
                    <p class="card-text">{{ $post['body'] }}</p>
                    <p class="card-text">{{ $post->user->name }}</p>

                    <p>Created {{$post->getCreatedAt()}}</p>

                    <form action="{{route('comment.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea name="content" placeholder="add content here..."></textarea>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

        <div class="mt-4">
        <h2>Comments</h2>
        @if ($post->comments->count() > 0)
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">{{ $comment->content }}</li>
                @endforeach
            </ul>
        @else
            <p>No comments available.</p>
        @endif
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection