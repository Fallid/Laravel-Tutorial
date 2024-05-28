<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'role:user'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('admin', 'admin.index')
    ->middleware(['auth', 'role:admin'])
    ->name('admin.index');

require __DIR__ . '/auth.php';
