@extends('master')
@section('main')
    <h1>Author: {{$user->username}}</h1>
    <a href="/user/{{$user->id}}/post/create" class="btn btn-primary">Add new post</a>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">content</th>
            <th scope="col">Setting</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1?>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>
                    <a href="/user/{{$user->id}}/post/edit/{{$post->id}}" class="btn btn-primary">Edit</a>
                    <a href="/user/{{$user->id}}/post/delete/{{$post->id}}" class="btn btn-danger" onclick="return confirm('Delete this post?')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
