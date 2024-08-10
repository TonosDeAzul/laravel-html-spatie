<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $archivos = $request->file;
        
        // $data = [
        //     ['name' => 'nombre1', 'path' => 'ruta1'],
        //     ['name' => 'nombre2', 'path' => 'ruta2'],
        //     ['name' => 'nombre3', 'path' => 'ruta3'],
        //     ['name' => 'nombre4', 'path' => 'ruta4'],
        // ];
        
        // $data = array();

        // Creamos el post y retornamos el modelo
        $post = Post::create($request->all());

        $data = [];

        foreach ($archivos as $archivo) {
            // array_merge($data, []);
            // $name = $archivo->getClientOriginalName();
            // dd($archivo);
            // array_push(
            //     $data, 
            //     [
            //         'name' => $archivo->getClientOriginalName(), 
            //         'path' => $archivo->hashName()
            //     ]
            // );

            // Creamo la imagen y retornamos el modelo
            $img = Images::create(
                [
                    'name' => $archivo->getClientOriginalName(), 
                    'path' => $archivo->store('/', 'post')
                ]
                );

            // array_push($data, $img->id);
            array_push($data, $img);
            // $archivo = $request->file('file')->store('/', 'post');
            // $archivo = $archivo->store('/', 'post');
            // echo('<pre>');
            // print_r($archivo);
            // echo('</pre>');
            // echo('</br>');
        };

        // dd($data);
        $post->images()->sync($data);
        $post->tags()->sync($request->tag_id);  

        foreach ($data as $value) {
            print_r($value['name']);
            echo('</br>');
        }

        dd('hola');
        // dd($request->all());
        // Storage::disk('local')->put('example.txt', 'Contents');
        // $post([$request->tag_id]);
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
        $users = User::pluck('name', 'id');
        $categories = Categories::pluck('name', 'id');

        $tags = Tag::all();
        $post = Post::where("id", $id)->first();
        $tagsPost = $post->tags;
        return view('posts.edit', compact('users', 'post', 'categories', 'tags', 'tagsPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        //
        $post = Post::where("id", $id)->first();
        $post->update($request->all());
        $post->tags()->sync($request->tag_id);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::where("id", $id)->first();
        $post->tags()->detach();
        $post->delete();
        return redirect()->back();
    }
}
