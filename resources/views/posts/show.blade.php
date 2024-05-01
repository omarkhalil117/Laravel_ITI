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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection