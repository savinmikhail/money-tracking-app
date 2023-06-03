<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function showSignUp()
    {
        return view('signup');
    }

    public function signup(StoreUserRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }

    public function authenticate(AuthUserRequest $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');

//            return redirect()->intended('banknote');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function showSignIn()
    {
        return view('signin');
    }

    public function home()
    {
        return view('home');
    }
//    public function logout(Request $request)
//    {
//        Auth::logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        return redirect('/signin');
//    }
    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/signin');
    }
}
