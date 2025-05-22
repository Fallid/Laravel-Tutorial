<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['role:admin,member'])->group(function () {
    Route::get('employee', [EmployeeController::class, 'index'])->name('employees');
    Route::get('employee/detail/{id}', [EmployeeController::class, 'show'])->name('employee-detail');

    Route::get('products', [ProductController::class, 'index']);
    Route::get('stores', [StoreController::class, 'index']);

    Route::get('activities', [ActivityController::class, 'index']);
    Route::get('activities/{id}', [ActivityController::class, 'show']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('update/password', [ResetPasswordController::class, 'edit'])->name('user_update_password');
    Route::patch('update/password/store', [ResetPasswordController::class, 'update'])->name('user_store_password');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee-create');
    Route::post('employee/create', [EmployeeController::class, 'store'])->name('employee-store');
    Route::get('employee/edit/{contact}', [EmployeeController::class, 'edit'])->name('employee-edit');
    Route::patch('employee/edit/update/{contact}', [EmployeeController::class, 'update'])->name('employee-update');
    Route::delete('employee/delete/{contact}', [EmployeeController::class, 'destroy'])->name('employee-delete');
});

Auth::routes();

Route::get('language/{locale}', [LocaleController::class, 'set_locale'])->name('set_locale');


