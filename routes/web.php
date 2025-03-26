<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('employee', [EmployeeController::class, 'index']);
Route::get('employee/{id}', [EmployeeController::class, 'show']);
