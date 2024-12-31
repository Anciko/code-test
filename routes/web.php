<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogControlller;
use App\Http\Controllers\WelcomeController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthController::class, 'submitLogin'])->name('submit.login');
});

Route::middleware('auth')->group(function () {
    Route::post("logout", [AuthController::class, 'logout'])->name('logout');

    Route::resource('blogs', BlogControlller::class);
});
