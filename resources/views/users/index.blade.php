@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>All Posts</h1>
            <div class="mb-3">
                {{-- <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a> --}}
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td><a href="{{route('users.show', $user->id )}}">{{ $user['name'] }}</a></td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <a href="{{route('posts.show',$user['id'] )}}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{route('posts.edit',$user['id'] )}}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', $user['id']) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                {!! $users->links() !!}
        </div>
    </div>
</div>
@endsection