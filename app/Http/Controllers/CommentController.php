<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'comment' => 'required|string|max:1000',
        ]);

        // Create a new comment
        Comment::create([
            'user_id' => Auth::id(),
            'recipe_id' => $validatedData['recipe_id'],
            'comment' => $validatedData['comment'],
        ]);

        // Redirect back to the recipe page with a success message
        return redirect()->route('recipes.show', $validatedData['recipe_id'])
            ->with('success', 'Comment added successfully.');
    }
}

