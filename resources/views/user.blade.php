@extends('master')
@section('main')
    <a href="{{route('user.create')}}" class="btn btn-primary">Add new user</a>
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Setting</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1?>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td><a href="/user/{{$user->id}}/post">{{$user->first_name . ' ' . $user->last_name}}</a></td>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_admin ?'Admin' : 'User'}}</td>
                <td>{{$user->is_active ?'Active':'Inactive'}}</td>
                <td>
                    @if($user->is_admin==false)
                    <a href="{{route('user.destroy', ['id'=>$user->id])}}" class="btn btn-danger" onclick="return confirm('do you want to delete this user?')">Delete</a>
                    <a href="{{route('user.edit', ['id'=>$user->id])}}" class="btn btn-primary">Edit</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
