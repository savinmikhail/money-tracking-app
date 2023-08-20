<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Jobs\SendEmailVerificationJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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

        SendEmailVerificationJob::dispatch($user)->onQueue('default');
//        $user->sendEmailVerificationNotification();

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
//    public function sendText()
//    {
//        SendEmailVerificationJob::dispatch()->onQueue('default');
//    }

    public function github()
    {
        //send the user's  request to GitHub
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        //get oauth request back from GitHub to authenticate user
        $user = Socialite::driver('github')->user();
        //if this user doesn't exist, add him
        //if he does, get the model
        //either way, authenticate the user into the application and redirect afterward
        $user = User::firstOrCreate([
            'email' => 'mikhail@savin'
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(20))
        ]);

        Auth::login($user, true);

        return redirect('/home');
        //dd($user);
    }

    public function google()
    {
        //send the user's  request to Google
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        try {
            $google_user = Socialite::driver('google')->user();
//            dd($google_user);
//            dd($google_user->id);
            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){
                $new_user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id,
                    'email_verified_at' => time(),
                ]);
                Auth::login($new_user);

                return redirect('/home');

            } else {

                Auth::login($user);
                return redirect('/home');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong! ' . $th->getMessage());
        }
    }
}
