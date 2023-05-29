<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function show()
    {
        return view('signup');
    }
//    public function login()
//    {
//       validator(request()->all(), [
//           'name' => 'required',
//           'password' => 'required',
////           'email' => 'required',
//       ])->validate();
//       if(auth()->attempt(request()->only(['email', 'password']))){
//           return redirect('/home');
//       }
//       return redirect()->back()->withErrors(['email' => 'invalid credentials']);
//    }
    public function home()
    {
        return view('home');
    }
    public function signup(StoreUserRequest $request)
    {
//        echo 'test';
//        die();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('home');
    }
}
