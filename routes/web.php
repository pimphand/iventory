<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UnloadingController;
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

auth()->loginUsingId(2);
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // page user
    Route::view('users', 'pages.user');
    /** Customer */
    Route::view('customer', 'pages.customer.index')->name('customer');
    /** Bongkar Muat /Unloading */
    Route::view('unloading', 'pages.unloading.index')->name('unloading');
    /** Proses - produksi */
    // Route::view('proses-produksi', 'pages.produksi.index')->name('produksi');
    Route::view('proses', 'pages.proses.index')->name('proses');
});

require __DIR__ . '/auth.php';
