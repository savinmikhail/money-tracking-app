<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
//Route::get('login', [CustomAuthController::class, 'index'])->name('login');
//Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
//Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
//Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
//Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

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

Route::get('/user', function () {
    dump(\App\Models\User::find(1));
});

Route::get('/banknote', function () {
    dump(\App\Models\Banknote::find(1));
});

Route::get('/', [\App\Http\Controllers\Banknote::class, 'list']);

Route::get('/create', [\App\Http\Controllers\Banknote::class, 'create']);
Route::post('/create', [\App\Http\Controllers\Banknote::class, 'store']);

Route::get('/banknote/{banknote}', [\App\Http\Controllers\Banknote::class, 'edit']);
Route::post('/banknote/{banknote}', [\App\Http\Controllers\Banknote::class, 'update']);

Route::delete('/banknote/{banknote}', [\App\Http\Controllers\Banknote::class, 'destroy']);





        //    $user = \App\Models\User::create([
//        'name' => 'user',
//        'email' => 'user@',
//        'password' => \Illuminate\Support\Facades\Hash::make('user')
//    ]);
//    return $user;



//Route::get('/about-laravel', [AboutUsController::class, 'show']);

