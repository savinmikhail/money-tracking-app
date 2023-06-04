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

Route::get('/signup', [UserController::class, 'showSignUp'])->name('showSignUp');
Route::post('/signup', [UserController::class, 'signup'])->name('signUp');

Route::get('/signin', [UserController::class, 'showSignIn'])->name('showSignIn');
Route::post('/signin', [UserController::class, 'authenticate'])->name('signIn');

Route::middleware('auth')->group(function (){

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/home', [BanknoteController::class, 'list'])->name('home');
    Route::post('/home', [BanknoteController::class, 'store'])->name('storeBanknote');

    Route::post('/checkpoint/{id}', [BanknoteCheckpointController::class, 'store'])->name('checkpointsStore');
    Route::get('/checkpoint/{id}', [BanknoteCheckpointController::class, 'index']);

    Route::get('/feedback', function () {return view('feedback');});

});

