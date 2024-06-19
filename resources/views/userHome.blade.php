<!-- resources/views/profile.blade.php -->

@extends('layouts.userDashboardLayout')

@section('title', 'Home')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Recipes</h2>
    <div class="row">
        @foreach ($myRecipes as $recipe)
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
    <!-- Pagination Links -->
    <div class="row my-4">
        <div class="col-md-12">
            {{ $myRecipes->links() }}
        </div>
    </div>
</div>
@endsection