<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TrainingController;




// Public routes
Route::post('/login', [AuthController::class, 'login']);

// Public Training Routes
Route::prefix('trainings')->group(function () {
    Route::get('/categories', [TrainingController::class, 'indexCategories']);
    Route::get('/categories/{category}', [TrainingController::class, 'showCategory']);
    Route::get('/categories/{category}/subcategories', [TrainingController::class, 'indexSubcategories']);
    Route::get('/categories/{category}/subcategories/{subcategory}', [TrainingController::class, 'showSubcategory']);
    Route::get('/categories/{category}/subcategories/{subcategory}/trainings', [TrainingController::class, 'indexTrainings']);
    Route::get('/categories/{category}/subcategories/{subcategory}/trainings/{training}', [TrainingController::class, 'showTraining']);
});

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // User Management Routes - Super Admin only
    // GANTI super.admin dengan role:superAdmin
    Route::middleware(['auth:sanctum', 'role:superAdmin'])->group(function () {
        Route::get('/users', [AuthController::class, 'getAllUsers']);
        Route::post('/users', [AuthController::class, 'register']);
        Route::get('/users/{id}', [AuthController::class, 'getUser']);
        Route::put('/users/{id}', [AuthController::class, 'updateUser']);
        Route::delete('/users/{id}', [AuthController::class, 'deleteUser']);
    });
    
    // Training Management Routes - Admin & Super Admin
    Route::middleware(['role:admin,superAdmin'])->group(function () {
        Route::post('/admin/trainings/categories', [TrainingController::class, 'storeCategory']);
        Route::put('/admin/trainings/categories/{category}', [TrainingController::class, 'updateCategory']);
        Route::delete('/admin/trainings/categories/{category}', [TrainingController::class, 'destroyCategory']);
        
        Route::post('/admin/trainings/categories/{category}/subcategories', [TrainingController::class, 'storeSubcategory']);
        Route::put('/admin/trainings/categories/{category}/subcategories/{subcategory}', [TrainingController::class, 'updateSubcategory']);
        Route::delete('/admin/trainings/categories/{category}/subcategories/{subcategory}', [TrainingController::class, 'destroySubcategory']);
        
        Route::post('/admin/trainings/categories/{category}/subcategories/{subcategory}/trainings', [TrainingController::class, 'storeTraining']);
        Route::put('/admin/trainings/categories/{category}/subcategories/{subcategory}/trainings/{training}', [TrainingController::class, 'updateTraining']);
        Route::delete('/admin/trainings/categories/{category}/subcategories/{subcategory}/trainings/{training}', [TrainingController::class, 'destroyTraining']);
    });
});