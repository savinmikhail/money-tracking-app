<?php

use App\Http\Controllers\BanknoteController;
use App\Http\Controllers\BanknoteCheckpointController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route:get('/', function () {redirect('/signin');});
Route::get('/', function () {return view('signin');});

Route::get('/signup', [UserController::class, 'showSignUp'])->name('showSignUp');
Route::post('/signup', [UserController::class, 'signup'])->name('signUp');

Route::get('/signin', [UserController::class, 'showSignIn'])->name('showSignIn');
Route::post('/signin', [UserController::class, 'authenticate'])->name('signIn');

Route::get('/signin/github', [UserController::class, 'github']);
Route::get('/signin/github/redirect', [UserController::class, 'githubRedirect']);

Route::get('/signin/google', [UserController::class, 'google']);
Route::get('/signin/google/callback', [UserController::class, 'googleRedirect']);



Route::middleware(['auth','verified'])->group(function (){

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/home', [BanknoteController::class, 'list'])->name('home');
    Route::post('/home', [BanknoteController::class, 'store'])->name('storeBanknote');

    Route::post('/checkpoint/{id}', [BanknoteCheckpointController::class, 'store'])->name('checkpointsStore');
    Route::get('/checkpoint/{id}', [BanknoteCheckpointController::class, 'index']);

    Route::get('/feedback', function () {return view('feedback');});

});
//Route::get('/text', [UserController::class, 'sendText']);

Route::get('/email/verify', function () {return view('auth.verify_email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {$request->fulfill();
    return redirect('/home');})->middleware(['auth', 'signed'])->name('verification.verify');
//Auth::routes(['verify' => true]);
