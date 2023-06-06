<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Show the sign-up form
    public function showSignUp()
    {
        return view('signup');
    }

    // Handle the sign-up request
    public function signup(StoreUserRequest $request)
    {
        // Create a new user with the provided data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        $name = $request->name;
        Mail::to($request->email)->send(new PasswordMail($name));
        // Log in the newly created user
        Auth::login($user);
        // Redirect the user to the home page
        return redirect()->route('home');
    }

    // Authenticate the user
    public function authenticate(AuthUserRequest $request)
    {
        // Validate the credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session
            $request->session()->regenerate();
            // Redirect the user to the home page
            return redirect()->route('home');
        }
        // Authentication failed, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    // Show the sign-in form
    public function showSignIn()
    {
        return view('signin');
    }

    // Show the home page
    public function home()
    {
        return view('home');
    }

    // Log out the user
    public function logout()
    {
        // Clear the session
        Session::flush();

        // Log out the user
        Auth::logout();

        // Redirect the user to the sign-in page
        return redirect('/signin');
    }
}
