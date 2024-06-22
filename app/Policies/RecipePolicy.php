<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given recipe can be updated by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipe  $recipe
     * @return bool
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }

    /**
     * Determine if the given recipe can be deleted by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Recipe  $recipe
     * @return bool
     */
    public function delete(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }
}

