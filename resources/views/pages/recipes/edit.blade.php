@extends('layouts.userDashboardLayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Recipe</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $recipe->title) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $recipe->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            @if ($recipe->image)
                                <img src="{{ asset('storage/' . $recipe->image) }}" class="img-fluid mb-3" style="max-width: 300px;" alt="{{ $recipe->title }}">
                            @endif
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="ingredients">Ingredients:</label>
                            <textarea name="ingredients" id="ingredients" rows="4" class="form-control" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="instructions">Instructions:</label>
                            <textarea name="instructions" id="instructions" rows="4" class="form-control" required>{{ old('instructions', $recipe->instructions) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="tags">Tags:</label>
                            <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags', $recipe->tags) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Recipe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

