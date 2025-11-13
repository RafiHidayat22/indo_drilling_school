<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleAdminController;
use App\Http\Controllers\ArticleWebController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\ProgramWebController;
use App\Http\Controllers\ContactInquiryController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AdminProjectController;


// Public routes
// routes/web.php
// Impor controller

Route::get('/', [HomeController::class, 'index'])->name('home');

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


use App\Http\Controllers\TrainingController;
use App\Http\Controllers\CategoriesController;

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

Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');

use App\Http\Controllers\ProgramController;

// 1. Program Portal (program.blade.php yang sudah Anda buat)
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');

// 2. Program Detail (programDetail.blade.php - menampilkan daftar course per kategori)
// Dipanggil ketika user klik "Learn More" di program.blade.php
Route::get('/program/{category}', [ProgramController::class, 'show'])->name('program.show');

// 3. Enrollment Page (ketika user klik "Enroll Now" di programDetail.blade.php)
Route::get('/program/{category}/enroll/{course}', [ProgramController::class, 'enroll'])->name('program.enroll');

// Protected Admin Routes
Route::middleware(['check.auth'])->group(function () {

    // Article Admin (untuk admin dan superAdmin)
    Route::middleware(['role:admin,superAdmin'])->group(function () {

        Route::get('/dashboard', [DashboardAdminController::class, 'index'])
            ->name('dashboard');
        Route::get('/articleadmin', [ArticleAdminController::class, 'index'])->name('articleadmin.index');
        //contact admin routes
        Route::get('/contactadmin', [ContactInquiryController::class, 'index'])
            ->name('contactadmin');
        Route::get('/contacts/{contact}', [ContactInquiryController::class, 'show'])
            ->name('admin.contacts.show');
        Route::put('/contacts/{contact}', [ContactInquiryController::class, 'update'])
            ->name('admin.contacts.update');
        Route::delete('/contacts/{contact}', [ContactInquiryController::class, 'destroy'])
            ->name('admin.contacts.destroy');
        Route::post('/contacts/bulk-update', [ContactInquiryController::class, 'bulkUpdateStatus'])
            ->name('admin.contacts.bulk-update');
        Route::post('/contacts/{contact}/mark-read', [ContactInquiryController::class, 'markAsRead'])
            ->name('admin.contacts.mark-read');
        Route::post('/contacts/{contact}/mark-unread', [ContactInquiryController::class, 'markAsUnread'])
            ->name('admin.contacts.mark-unread');
        Route::get('/contacts-stats', [ContactInquiryController::class, 'getStats'])
            ->name('admin.contacts.stats');
        Route::get('/api/contact-inquiries/unread-count', [ContactInquiryController::class, 'unreadCount']);
        Route::post('/contact-inquiries/{contact}/mark-as-read', [ContactInquiryController::class, 'markAsRead'])
            ->name('contact-inquiries.mark-as-read');
        Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
        Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
        Route::put('/training/{id}', [TrainingController::class, 'update'])->name('training.update');
        Route::delete('/training/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');
    });

    // Training Management Routes


    Route::middleware(['role:admin,superAdmin'])->prefix('articleadmin')->name('articleadmin.')->group(function () {
        Route::get('/', [ArticleAdminController::class, 'index'])->name('index');
        Route::post('/', [ArticleAdminController::class, 'store'])->name('store');
        Route::get('/{id}', [ArticleAdminController::class, 'show'])->name('show');
        Route::match(['put', 'post'], '/{id}', [ArticleAdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [ArticleAdminController::class, 'destroy'])->name('destroy');
        Route::post('/bulk-delete', [ArticleAdminController::class, 'bulkDelete'])->name('bulkDelete');
        Route::post('/{id}/restore', [ArticleAdminController::class, 'restore'])->name('restore');
    });

    // Categories Management Routes (untuk admin dan superAdmin)
    Route::middleware(['check.auth', 'role:admin,superAdmin'])->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::post('/', [CategoriesController::class, 'store'])->name('store');
        Route::put('/{id}', [CategoriesController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
        Route::post('/reorder', [CategoriesController::class, 'reorder'])->name('reorder');
    });

    // User Management (hanya untuk superAdmin)
    Route::middleware(['role:superAdmin'])->group(function () {
        Route::get('/users', [UserAdminController::class, 'index'])->name('users.index');
    });
    // Dashboard Admin Route
    Route::middleware(['auth', 'checkRole:admin,superAdmin'])->group(function () {
    Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])
        ->name('dashboardadmin');
    });

Route::middleware(['check.auth', 'role:admin,superAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
        Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{id}', [AdminProjectController::class, 'show'])->name('projects.show');
        Route::put('/projects/{id}', [AdminProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');
        Route::post('/admin/projects/delete-gallery-image', [AdminProjectController::class, 'deleteGalleryImage'])->name('admin.projects.delete-gallery-image');
    });

    
});


use App\Http\Controllers\ContactController;

// Route untuk menampilkan halaman contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Route untuk menyimpan data dari formulir contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
