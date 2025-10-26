<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/articles', function () {
    return view('articles');
});
Route::get('/articlespv', function () {
    return view('articlespv');
});
