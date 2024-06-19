<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function update(Request $request, Recipe $recipe)
    {
        $user_id=$request->header('id');
        return $user_id === $recipe->user_id;
    }

    public function delete(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }
}
