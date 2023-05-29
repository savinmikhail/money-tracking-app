<?php

use App\Http\Controllers\ProfileController;
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



Route::post('/signup', [\App\Http\Controllers\UserController::class, 'signup'])->name('signUp');
Route::get('/signup', [\App\Http\Controllers\UserController::class, 'show'])->name('showSignUp');

Route::get('/signin', [\App\Http\Controllers\SignInController::class, 'show'])->name('showSignIn');
Route::post('/signin', [\App\Http\Controllers\SignInController::class, 'authenticate'])->name('signIn');

Route::get('/', function () {return view('welcome');});


Route::middleware('auth')->group(function (){

    Route::get('/home', [\App\Http\Controllers\UserController::class, 'home'])->name('home');
    Route::get('/checkpoints', function () {return view('checkpoints');});

    Route::get('/dashboard', function () {return view('dashboard');});

    Route::get('/banknote', function () {return view('banknote');});
    Route::post('/banknote', function () {return view('banknote');});

});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__.'/auth.php';
