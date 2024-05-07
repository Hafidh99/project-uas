<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipe = Recipe::first();
        return view('user.index',compact('recipe'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function cookingRecipes()
    {
        $recipe = Recipe::orderBy('created_at','desc')->get();
        return view('user.cooking-recipe',compact('recipe'));
    }

    public function detail($id)
    {
        $recipe = Recipe::find($id);
        return view('user.cooking-recipe-detail',compact('recipe'));
    }
}
