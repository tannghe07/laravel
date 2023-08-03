<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('posts')->get();
        return view('user', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['is_admin'] = $input['is_admin']=='admin'?true:false;
        $input['is_active'] = $input['is_active']=='active'?true:false;
        User::create($input);
        return redirect('/user')->with('success', 'add user successfully!');
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
    public function edit($id)
    {
        $user = User::find($id);
        return view('edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditUserRequest $request, $id)
    {
        $input = $request->all();
        $input['is_admin'] = $input['is_admin']=='admin'?true:false;
        $input['is_active'] = $input['is_active']=='active'?true:false;
        User::find($id)->update($input);
        return redirect('/user')->with('success', 'edit user successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'Delete user successfully!');
    }
}
