<?php

namespace App\Http\Controllers\Api;

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
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['signup', 'signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
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

//        SendEmailVerificationJob::dispatch($user)->onQueue('default');
//        $user->sendEmailVerificationNotification();

        // Log in the newly created user
//        $token = auth('api')->login($user);
        return response()->json(['success' => true, 'data' => $user]);
    }
//
//    // Authenticate the user
//    public function authenticate(AuthUserRequest $request)
//    {
//        // Validate the credentials
//        $credentials = $request->validate([
//            'email' => ['required', 'email'],
//            'password' => ['required'],
//        ]);
//        // Attempt to authenticate the user
//        if (Auth::attempt($credentials)) {
//            // Regenerate the session
//            $request->session()->regenerate();
//            // Redirect the user to the home page
//            return redirect()->route('home');
//        }
//        // Authentication failed, redirect back with an error message
//        return back()->withErrors([
//            'email' => 'The provided credentials do not match our records.',
//        ]);
//    }
//
//    // Log out the user
//    public function logout()
//    {
//        // Clear the session
//        Session::flush();
//
//        // Log out the user
//        Auth::logout();
//
//        // Redirect the user to the sign-in page
//        return redirect('/signin');
//    }
//
//    public function google()
//    {
//        //send the user's  request to Google
//        return Socialite::driver('google')->redirect();
//    }
//
//    public function googleRedirect()
//    {
//        try {
//            $google_user = Socialite::driver('google')->user();
//            $user = User::where('google_id', $google_user->getId())->first();
//
//            if(!$user){
//                $new_user = User::create([
//                    'name' => $google_user->name,
//                    'email' => $google_user->email,
//                    'google_id' => $google_user->id,
//                    'email_verified_at' => time(),
//                ]);
//                Auth::login($new_user);
//
//                return redirect('/home');
//
//            } else {
//
//                Auth::login($user);
//                return redirect('/home');
//            }
//        } catch (\Throwable $th) {
//            dd('Something went wrong! ' . $th->getMessage());
//        }
//    }
}
