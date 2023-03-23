<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UnloadingController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('api')->name('api.')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('unloading', UnloadingController::class);
    Route::apiResource('customer', CustomerController::class);
});

