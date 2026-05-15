<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {

    // FORM REGISTER
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    // PROSES REGISTER
    Route::post('/register', [AuthController::class, 'registerProcess'])
        ->name('register.process');

    // FORM LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    // PROSES LOGIN
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});
// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
