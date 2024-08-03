<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tags = Tag::paginate(10
            // $perPage = 15, $columns = ['*'], $pageName = 'posts'
        );
        // $posts = Post::where('votes', '>', 100)->paginate(15);
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $tags = Tag::pluck('name', 'id');
        // $categories = Categories::pluck('name', 'id');
        // return view('posts.create', compact('tag', 'categories'));

        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        //
        $tag = Tag::create($request->all());

        // dd($tag);
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $tag = Tag::where('id', $id)->first();
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $id)
    {
        //
        $tag = Tag::where('id', $id)->first();
        // dd($category);
        $tag->update($request->all());
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $tag = Tag::where('id', $id)->first();
        // dd($category->id);
        $tag->delete();
        return redirect()->back();
    }


    // Hacer la vista para vewr los posts que contengas los tags

    /**
     * Para ver los tags del post
     */
    public function posts(string $user_id)
    {
        //
        $tags = Tag::where('id', $user_id)->first();
        // $userPosts = $user->posts;
        // dd($user->posts);
        return view("users.posts", compact('tag'));

    }
}
