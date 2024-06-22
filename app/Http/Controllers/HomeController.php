<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredRecipes = Recipe::orderBy('created_at', 'desc')->take(6)->get();// Fetching the latest 6 recipes
        return view('home', compact('featuredRecipes'));
    }   

}
