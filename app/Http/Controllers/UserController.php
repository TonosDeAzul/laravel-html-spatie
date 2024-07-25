<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $usuario = User::create($request->all());
        return redirect()->route("users.edit", ["id" => $usuario->id]);
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
    public function edit(string $id)
    {
        //
        $user = User::where("id", $id)->first();
        // dd($user->posts);
        return view("users.edit", compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
        // dd($this()->all());
        $user = User::where("id", $id)->first();
        // $user->name = $request->name;
        // $user->email = $request->email;
        $user->update($request->all());
        // return view("users.edit", compact("user"));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::where("id", $id)->first();
        // dd($user);
        // dd($user->posts);
        $user->posts()->delete();
        $user->delete();
        return redirect()->back();
    }
}
