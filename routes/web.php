<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Guest only
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'show'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
        ->name('login.store');

    Route::get('/register', [RegisterController::class, 'show'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');

    Route::get('/forgot-password', fn () => 'Forgot password page coming soon')
        ->name('password.request');
});

// Logged in only
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', fn () => view('dashboard'))
        ->name('dashboard');

    Route::post('/logout', [LoginController::class, 'destroy'])
        ->name('logout');
});