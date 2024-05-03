@extends('layouts.default')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <img style="height: 300px;" src="{{ asset('images/posts/' . $user['image']) }}" class="card-img-top" alt="Post Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $user['name'] }}</h5>
                    <p class="card-text">{{ $user['email'] }}</p>

                    {{-- <p>Created {{$user->getCreatedAt()}}</p> --}}
                </div>

            </div>
        </div>

        <div class="mt-4">
                <h2>Posts</h2>
                @if ($user->posts->count() > 0)
                    <ul class="list-group">
                        @foreach ($user->posts as $post)
                            <h3>{{ $post->title }}</h3>
                            <textarea class="list-group-item">{{ $post->body }}</textarea>
                        @endforeach
                    </ul>
                @else
                    <p>No Posts available.</p>
                @endif
                </div>
            </div>
</div>
@endsection