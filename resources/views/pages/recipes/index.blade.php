<!-- resources/views/recipes/index.blade.php -->

@extends('../../layouts.userDashboardLayout')

@section('title', 'Recipes')

@section('content')
<h1>Recipes</h1>

<!-- Search Form -->
<form action="{{ route('search') }}" method="GET" class="mb-4">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for recipes..." name="query">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>

<!-- Recipe List -->
<div class="row">
    @forelse ($recipes as $recipe)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="{{ $recipe->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->title }}</h5>
                <p class="card-text">{{ $recipe->description }}</p>
                <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}" class="btn btn-primary">View Recipe</a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-md-12">
        <p>No recipes found.</p>
    </div>
    @endforelse
</div>

<!-- Pagination Links -->
<div class="row my-4">
    <div class="col-md-12">
        {{ $recipes->links() }}
    </div>
</div>
@endsection