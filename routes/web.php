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

Route::get('/program', function () {
    return view('program');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/users', function () {
    return view('users');
});

use App\Http\Controllers\ArticleAdminController;

Route::get('/articleadmin', [ArticleAdminController::class, 'index'])->name('articleadmin.index');

use App\Http\Controllers\UserAdminController;

Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');

use App\Http\Controllers\TrainingController;

Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
