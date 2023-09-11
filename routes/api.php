<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('banknote/list/{id}', [\App\Http\Controllers\Api\BanknoteController::class, 'list']);
Route::post('banknote/store/{id}', [\App\Http\Controllers\Api\BanknoteController::class, 'store']);

Route::post('/checkpoint/store/{id}', [\App\Http\Controllers\Api\BanknoteCheckpointController::class, 'store']);
Route::get('/checkpoint/list/{id}', [\App\Http\Controllers\Api\BanknoteCheckpointController::class, 'index']);

Route::group(['middleware' => 'api',], function ($router) {
    Route::post('signup', [\App\Http\Controllers\Api\UserController::class, 'signUp']);
    Route::post('signin', [\App\Http\Controllers\Api\UserController::class, 'signIn']);
    Route::post('logout', [\App\Http\Controllers\Api\UserController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\Api\UserController::class, 'refresh']);
    Route::get('me', [\App\Http\Controllers\Api\UserController::class, 'me']);
});
