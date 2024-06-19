<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\TokenVerificationMiddleware;

// auth route
Route::get('/register',[UserController::class,'RegistrationForm']);
Route::post('/register',[UserController::class,'register']);
Route::get('/login',[UserController::class,'LogInForm']);
Route::post('/login',[UserController::class,'login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout')->middleware([TokenVerificationMiddleware::class]);

// user route
Route::get('/myRecipe', [RecipeController::class,'myRecipe'])->name('myRecipe')->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware([TokenVerificationMiddleware::class]);
Route::get('/profile-edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware([TokenVerificationMiddleware::class]);
Route::post('profile-update', [ProfileController::class,'update'])->name('profile.update')->middleware([TokenVerificationMiddleware::class]);

// home route
Route::get('/',[HomeController::class,'index']);

// recipe route
Route::resource('recipes', RecipeController::class)->middleware([TokenVerificationMiddleware::class]);
Route::get('/search', [RecipeController::class,'search'])->name('search')->middleware([TokenVerificationMiddleware::class]);