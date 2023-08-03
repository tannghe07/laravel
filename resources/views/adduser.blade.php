@extends('master')
@section('main')

    <form method="POST" action="">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" required name="first_name">
            @error('first_name')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" required name="last_name">
            @error('last_name')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" required name="username">
            @error('username')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required name="email">
            @error('email')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" required name="password">
            @error('password')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="is_admin">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            @error('is_admin')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status</label><br>
            <input type="checkbox" id="is_active" name="is_active" value="active" checked="checked">
            <label for="active">Active</label><br>
            <input type="checkbox" id="is_active" name="is_active" value="inactive">
            <label for="inactive">Inactive</label><br>
            @error('is_active')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.index')}}" class="btn btn-primary">Back</a>
    </form>

@endsection
