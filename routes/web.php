<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\LoginController;
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

Route::redirect("/", '/game');

/* ----- Game routes ----- */
Route::prefix('/game')->name('game')->group(function () {
    Route::get('/', [GameController::class, 'index'])->middleware('auth');
    Route::get('/ranking', [GameController::class, 'all'])->name('.ranking')->middleware('auth');
    Route::post('/', [GameController::class, 'store'])->name('.store')->middleware('auth');
});

/* ----- Login/Signup views routes ----- */
Route::prefix('login')->name('login')->group(function () {
    Route::view('/', 'login');
    Route::view('/signup', 'signup')->name('.signup');
});

/* ----- User routes ----- */
Route::prefix('user')->name('user')->group(function () {
    Route::get('/', [UserController::class, 'show'])->name('.show')->middleware('auth');
    Route::post('/', [UserController::class, 'store'])->name('.store');

    Route::post('/login', [UserController::class, 'login'])->name('.login');
    Route::post('/logout', [UserController::class, 'logout'])->name('.logout');
});
