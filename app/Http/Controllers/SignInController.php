<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class SignInController extends Controller
{
    /**
     * Обработка попыток аутентификации.
     *
     * @param  \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
//    public function authenticate(AuthUserRequest $request)
//    {
////                echo 'test';
////        die();
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);
//
//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            return redirect()->route('home');
//
////            return redirect()->intended('banknote');
//        }
//
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
//    }
//    public function show()
//    {
//        return view('signin');
//    }
}
