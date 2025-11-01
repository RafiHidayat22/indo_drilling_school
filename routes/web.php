<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\ArticleWebController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\ProgramWebController;

// Public routes
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Article Public Routes
Route::get('/articles', [ArticleWebController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}', [ArticleWebController::class, 'show'])->name('articles.show');

// Login route (hanya untuk guest)
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect('/articleadmin');
    }
    return view('login');
})->name('login');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('success', 'Logout berhasil');
})->name('logout');

// Program Portal (Public)
Route::get('/program', [ProgramWebController::class, 'index'])->name('program.index');
Route::get('/program/{categorySlug}', [ProgramWebController::class, 'showCategory'])->name('program.category');
Route::get('/program/{categorySlug}/{subcategorySlug}', [ProgramWebController::class, 'showSubcategory'])->name('program.subcategory');
Route::get('/program/{categorySlug}/{subcategorySlug}/{trainingSlug}', [ProgramWebController::class, 'showTraining'])->name('program.training');

// Protected Admin Routes
Route::middleware(['check.auth'])->group(function () {
    
    // Article Admin (untuk admin dan superAdmin)
    Route::middleware(['role:admin,superAdmin'])->group(function () {
        Route::get('/articleadmin', [ArticleAdminController::class, 'index'])->name('articleadmin.index');
    });
    
    // User Management (hanya untuk superAdmin)
    Route::middleware(['role:superAdmin'])->group(function () {
        Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
    });
});