@extends('master')
@section('main')

    <form method="POST" action="">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" required name="title">
            @error('title')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" class="form-control" id="image" required name="image">
            @error('image')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" class="form-control" id="content" required name="content">
            @error('content')
            <span class="alert-danger">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
