<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\TokenVerificationMiddleware;

//guest middleware

Route::group(['middleware' => 'guest'], function () {

    // home route
    Route::get('/', [HomeController::class, 'index']);    

    // auth route
    Route::get('/register', [UserController::class, 'RegistrationForm'])->name('register.form');
    Route::post('/register', [UserController::class, 'register'])->name('register.submit');
    Route::get('/login', [UserController::class, 'LogInForm'])->name('login.form');
    Route::post('/login', [UserController::class, 'login'])->name('login.submit');

});




//auth middleware

Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

    // user route
    Route::get('/myRecipe', [RecipeController::class, 'myRecipe'])->name('myRecipe');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile-update', [ProfileController::class, 'update'])->name('profile.update');

    // recipe route
    Route::resource('recipes', RecipeController::class);
    Route::get('/search', [RecipeController::class, 'search'])->name('search');

    // comments route

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

});


