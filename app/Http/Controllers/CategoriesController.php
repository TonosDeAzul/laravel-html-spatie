<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoriesRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        // dd($request->all());
        $categorie = Categories::create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        $category = Categories::where('id', $id)->first();
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, String $id)
    {
        //
        $category = Categories::where('id', $id)->first();
        // dd($category);
        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        //
        $category = Categories::where('id', $id)->first();
        // dd($category->id);
        $category->delete();
        return redirect()->back();
    }
}
