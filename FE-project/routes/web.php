<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['title' => 'Home Page']);
});
Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog Page']);
});
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});
