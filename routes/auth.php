<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Profile\PasswordController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // >>>>>>>>>>>>>>>>>>>>>>>>>> Profile Routes <<<<<<<<<<<<<<<<<<<<
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // >>>>>>>>>>>>>>>>>>>>>>>>>> Password Routes <<<<<<<<<<<<<<<<<<<<
    Route::resource('password', PasswordController::class)
        ->only(['edit', 'update']);
});
