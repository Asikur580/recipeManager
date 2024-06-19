<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function myRecipe(Request $request)
    {
        $user_id=$request->header('id');
        $myRecipes = Recipe::where('user_id','=',$user_id)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('userHome',compact('myRecipes'));
    }
    public function index()
    {
        $recipes = Recipe::orderBy('created_at', 'desc')->simplePaginate(12);
        return view('pages.recipes.index', compact('recipes'));
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('pages.recipes.show', compact('recipe'));
    }

    public function create()
    {
        return view('pages.recipes.create');
    }

    public function store(Request $request)
    {
        $user_id=$request->header('id');

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $validatedData['user_id'] = $user_id;
        Recipe::create($validatedData);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'tags' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $recipe->update($validatedData);

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }

    public function search(Request $request)
    {
        $search = $request->input('query');
        $recipes = Recipe::search($search)->paginate(12);

        return view('pages.recipes.index', compact('recipes'));
    }

}
