<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(10
            // $perPage = 15, $columns = ['*'], $pageName = 'posts'
        );
        // $posts = Post::where('votes', '>', 100)->paginate(15);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');
        $tags = Tag::all();
        return view('posts.create', compact('users', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        //
        $post = Post::create($request->all());
        // $post([$request->tag_id]);

        $post->tags()->sync($request->tag_id);  
        return redirect()->route('posts.index');
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
        $post = Post::where('id', $id)->first();
        $users = User::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        // dd($post, $users);
        return view("posts.edit", compact('users', 'post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        //

        // dd($request->all());

        $post = Post::where('id', $id)->first();
        // $users = User::pluck('name', 'id');

        // $users->update($request->all());
        $post->update($request->all());

        return redirect()->route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::where('id', $id)->first();
        $post->tags()->detach();
        // dd($post);
        $post->delete();
        return redirect()->back();
    }
}
