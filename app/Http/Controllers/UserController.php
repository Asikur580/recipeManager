<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function RegistrationForm()
    {
        return view('pages.auth.register');
    }

    public function LogInForm()
    {
        return view('pages.auth.login');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user record in the database using the validated data
        $user = User::create([
            'username' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect the user to the desired page after registration (e.g., dashboard)
        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

    

        // Retrieve the user by their email
       // $user = User::where('email', $credentials['email'])->first();

        // Check if the user exists and the password matches
        // if ($user && Hash::check($credentials['password'], $user->password)) {
           
        //     // User Login-> JWT Token Issue
        //     $token = JWTToken::CreateToken($request->input('email'), $user->id);
        //     return redirect()->intended('recipes')->with('success', 'Login successful.')->cookie('token', $token, time() + 60 * 24 * 30);


        //     // Redirect to intended page or user dashboard
        //     //return redirect()->intended('/dashboard')->with('success', 'Login successful.');
        // }
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('recipes');
        }
        // Authentication failed, redirect back with error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
