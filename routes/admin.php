<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Settings\BannerController;
use App\Http\Controllers\Admin\Settings\SettingController;
use App\Http\Controllers\Admin\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'can:isAdmin'])->group(function () {
    Route::prefix('administrator')->group(function () {
        // ------------------- Dashboard -------------------
        Route::get('/dashboard', fn () => view('admin.dashboard'))
            ->name('dashboard');

        // >>>>>>>>>>>>>>>>>>>>>>>>>> Users <<<<<<<<<<<<<<<<<<<<
        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
        Route::get('/user/{id}', [UserController::class, 'show'])
            ->name('users.show');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        // >>>>>>>>>>>>>>>>>>>>>>>>>> Category Routes <<<<<<<<<<<<<<<<<<<<
        Route::resource('category', CategoryController::class);

        // >>>>>>>>>>>>>>>>>>>>>>>>>> Settings Routes <<<<<<<<<<<<<<<<<<<<
        Route::resource('settings', SettingController::class)
            ->only('edit', 'update');

        // >>>>>>>>>>>>>>>>>>>>>>>>>> Banner Settings Routes <<<<<<<<<<<<<<<<<<<<
        Route::resource('banner', BannerController::class)
            ->only('create', 'store', 'destroy');
    });
});
