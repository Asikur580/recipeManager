<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Recipe;
use App\Policies\RecipePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Recipe::class => RecipePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

