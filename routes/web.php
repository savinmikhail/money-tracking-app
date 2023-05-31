<?php

use App\Http\Controllers\BanknoteController;
use App\Http\Controllers\BanknoteCheckpointController;
use App\Http\Controllers\UserController;
use http\Client\Request;
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

    Route::get('/home', [BanknoteController::class, 'list'])->name('home');

//    Route::get('/checkpoint', [BanknoteCheckpointController::class, 'list'])->name('checkpointList');

    Route::post('/checkpoint/{id?}', [BanknoteCheckpointController::class, 'store'])
        ->name('checkpointsStore');

    Route::get('/dashboard', function () {return view('dashboard');});

//    Route::get('/home', function () {return view('home');});
    Route::post('/home', [BanknoteController::class, 'store'])->name('storeBanknote');

    Route::get('/checkpoint/{id}', [BanknoteCheckpointController::class, 'index']);


//    Route::get('/checkpoint/{id}', function ($id) {return 'checkpoint'.$id;})->name('getBanknoteId');//определит, какая страница нужна

//    Route::get('/checkpoint/{id}', function ($id) {return '/checkpoint/'.$id;})->name('getBanknoteId');//определит, какая страница нужна

//    Route::get('/user/{id}', function (Request $request, $id) {return 'User '.$id;});//перейдет по нужной странице

});

