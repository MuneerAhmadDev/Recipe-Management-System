<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::view('/contact', 'contact')->name('contact');


require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
