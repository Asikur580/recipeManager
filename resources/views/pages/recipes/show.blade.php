
<!-- resources/views/recipes/show.blade.php -->

@extends('../../layouts.userDashboardLayout')

@section('content')
<div class="container">
    <h1>{{ $recipe->title }}</h1>
    @if ($recipe->image)
        <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid" alt="{{ $recipe->title }}">
    @endif
    <p>{{ $recipe->description }}</p>
    
    <h3>Ingredients</h3>
    <p>{{ $recipe->ingredients }}</p>
    
    <h3>Instructions</h3>
    <p>{{ $recipe->instructions }}</p>
    
    <h3>Tags</h3>
    <p>{{ $recipe->tags }}</p>

    @can('update', $recipe)
        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-secondary">Edit Recipe</a>
    @endcan

    @can('delete', $recipe)
        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Recipe</button>
        </form>
    @endcan

    <h3>Comments</h3>
    <div class="comments">
        @foreach ($recipe->comments as $comment)
            <div class="comment">
                <p>{{ $comment->comment }}</p>
                <small>by {{ $comment->user->username }}</small>
            </div>
        @endforeach
    </div>

    @auth
        <form action="{{ route('comments.store') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <div class="form-group">
                <label for="comment">Add a comment:</label>
                <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    @endauth
</div>
@endsection

