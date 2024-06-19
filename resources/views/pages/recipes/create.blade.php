<!-- resources/views/recipes/create.blade.php -->

@extends('../../layouts.userDashboardLayout')

@section('content')
<div class="container">
    <h1>Create Recipe</h1>
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" class="form-control" id="ingredients">{{ old('ingredients') }}</textarea>
        </div>
        <div class="form-group">
            <label for="instructions">Instructions</label>
            <textarea name="instructions" class="form-control" id="instructions">{{ old('instructions') }}</textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" class="form-control" id="tags" value="{{ old('tags') }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Create Recipe</button>
    </form>
</div>
@endsection
