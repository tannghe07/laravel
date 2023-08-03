<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\EditPostRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $posts = $user->posts()->get();
        return view('post', compact('user', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPostRequest $request, User $user)
    {
        $input = $request->all();
        $user->posts()->create($input);
        $posts = $user->posts()->get();
        return redirect()->route('post.index', compact('user', 'posts'))->with('success', 'Add post successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $post = $user->posts()->find($id);
        return view('editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, User $user, $id)
    {
        $input = $request->all();
        $user->posts()->find($id)->update($input);
        $posts = $user->posts()->get();
        return redirect()->route('post.index', compact('user', 'posts'))->with('success', 'Update post successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user->posts()->find($id)->delete();
        return redirect()->back()->with('success', 'Delete post successfully!');
    }
}
