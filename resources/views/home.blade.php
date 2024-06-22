<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="hero-section bg-light text-dark text-center py-5" style="background-image: url('{{ asset("images/image1.jpg") }}'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <h1 class="display-4 font-weight-bold text-info">Welcome to Recipe Manager</h1>
        <p class="lead mb-4 text-info">Discover and share your favorite recipes with our community.</p>
        <a href="{{ route('recipes.index') }}" class="btn btn-primary btn-lg">Explore Recipes</a>
    </div>
</div>

<!-- Featured Recipes Section -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Featured Recipes</h2>
    <div class="row">
        @foreach ($featuredRecipes as $recipe)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <p class="card-text">{{ Str::limit($recipe->description, 100) }}</p>
                    <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Recipe Categories Section -->
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Recipe Categories</h2>
        <!-- Add your recipe categories grid or list here -->
    </div>
</div>

<!-- Benefits Section -->
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Benefits</h2>
        <!-- Add your benefits section here -->
    </div>
</div>

<!-- Testimonials Section -->
<div class="row mb-4">
    <div class="col-md-12">
        <h2>Testimonials</h2>
        <!-- Add your testimonials section here -->
    </div>
</div>
@endsection