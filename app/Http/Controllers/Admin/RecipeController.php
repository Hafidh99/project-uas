<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Recipe;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipe = Recipe::all();
        return view("admin.recipe.index",compact('recipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.recipe.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->name = $request->name;

        if($request->hasFile("picture")){
            $picPath =  $request->file('picture')->store('recipe','public');
            $recipe->picture =$picPath;
        }
        $recipe->category = $request->category;
        $recipe->content = $request->content;
        $recipe->description = $request->description;


        if($recipe->save()){
            return redirect()->route('recipe.index');
        }
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
        $recipe = Recipe::find($id);
        return view("admin.recipe.edit",compact('recipe'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe = Recipe::find($id);
        $recipe->name = $request->name;

        if($request->hasFile("picture")){
            $picPath =  $request->file('picture')->store('recipe','public');
            $recipe->picture =$picPath;
        }
        $recipe->category = $request->category;
        $recipe->content = $request->content;
        $recipe->description = $request->description;


        if($recipe->save()){
            return redirect()->route('recipe.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe = Recipe::find($id);

        if ($recipe->delete()){
            return redirect()->route('recipe.index');
        }
    }
}
