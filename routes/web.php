<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee', [EmployeeController::class, 'index']);
Route::get('employee/{id}', [EmployeeController::class, 'show']);

Route::get('products',[ProductController::class, 'index']);
Route::get('stores',[StoreController::class, 'index']);

Route::get('activities', [ActivityController::class, 'index']);
Route::get('activities/{id}', [ActivityController::class,'show']);
