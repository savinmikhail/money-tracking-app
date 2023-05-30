<?php

use App\Http\Controllers\BanknoteController;
use App\Http\Controllers\BanknoteCheckpointController;
use App\Http\Controllers\UserController;
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



Route::post('/signup', [UserController::class, 'signup'])->name('signUp');
Route::get('/signup', [UserController::class, 'showSignUp'])->name('showSignUp');

Route::get('/signin', [UserController::class, 'showSignIn'])->name('showSignIn');
Route::post('/signin', [UserController::class, 'authenticate'])->name('signIn');

Route::get('/', function () {return view('welcome');});


Route::middleware('auth')->group(function (){

    Route::get('/home', [UserController::class, 'home'])->name('home');

    Route::get('/checkpoint', [BanknoteController::class, 'list'])->name('checkpointList');

    Route::post('/checkpoint', [BanknoteCheckpointController::class, 'store'])->name('checkpointsStore');

    Route::get('/dashboard', function () {return view('dashboard');});

    Route::get('/banknote', function () {return view('banknote');})->name('banknote');
    Route::post('/banknote', function () {return view('banknote');});

});

