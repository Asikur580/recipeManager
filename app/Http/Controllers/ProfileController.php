<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);
        
        return view('pages.profile.show', compact('user'));
    }
    public function edit(Request $request)
    {
        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);
        //dd($user);
        return view('pages.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);

        // Validate input
        $request->validate([
            'username' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the username
        $user->username = $request->username;

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        // Save the user
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
    
}
