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

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/users', function () {
    return view('users');
});

use App\Http\Controllers\ArticleAdminController;

Route::get('/articleadmin', [ArticleAdminController::class, 'index'])->name('articleadmin.index');

Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');

use App\Http\Controllers\ProgramController;

// 1. Program Portal (program.blade.php yang sudah Anda buat)
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

// 2. Program Detail (programDetail.blade.php - menampilkan daftar course per kategori)
// Dipanggil ketika user klik "Learn More" di program.blade.php
Route::get('/program/{category}', [ProgramController::class, 'show'])->name('program.show');

// 3. Enrollment Page (ketika user klik "Enroll Now" di programDetail.blade.php)
Route::get('/program/{category}/enroll/{course}', [ProgramController::class, 'enroll'])->name('program.enroll');
