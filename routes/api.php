<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TrainingController;

// Public routes
Route::post('/login', [AuthController::class, 'login']);

// Public Training Routes (untuk frontend)
Route::prefix('trainings')->group(function () {
    // Get all categories
    Route::get('/categories', [TrainingController::class, 'indexCategories']);
    
    // Get specific category with subcategories
    Route::get('/categories/{category}', [TrainingController::class, 'showCategory']);
    
    // Get subcategories of a category
    Route::get('/categories/{category}/subcategories', [TrainingController::class, 'indexSubcategories']);
    
    // Get specific subcategory with trainings
    Route::get('/categories/{category}/subcategories/{subcategory}', [TrainingController::class, 'showSubcategory']);
    
    // Get trainings of a subcategory
    Route::get('/categories/{category}/subcategories/{subcategory}/trainings', [TrainingController::class, 'indexTrainings']);
    
    // Get specific training
    Route::get('/categories/{category}/subcategories/{subcategory}/trainings/{training}', [TrainingController::class, 'showTraining']);
});

// Protected routes (perlu authentication)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Register hanya bisa dilakukan oleh superAdmin
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('role:superAdmin');
    
    // Training Management Routes (hanya untuk admin dan superAdmin)
    Route::prefix('admin/trainings')->middleware('role:admin,superAdmin')->group(function () {
        
        // Category Management
        Route::prefix('categories')->group(function () {
            Route::post('/', [TrainingController::class, 'storeCategory']);
            Route::put('/{category}', [TrainingController::class, 'updateCategory']);
            Route::delete('/{category}', [TrainingController::class, 'destroyCategory']);
        });
        
        // Subcategory Management
        Route::prefix('categories/{category}/subcategories')->group(function () {
            Route::post('/', [TrainingController::class, 'storeSubcategory']);
            Route::put('/{subcategory}', [TrainingController::class, 'updateSubcategory']);
            Route::delete('/{subcategory}', [TrainingController::class, 'destroySubcategory']);
        });
        
        // Training Management
        Route::prefix('categories/{category}/subcategories/{subcategory}/trainings')->group(function () {
            Route::post('/', [TrainingController::class, 'storeTraining']);
            Route::put('/{training}', [TrainingController::class, 'updateTraining']);
            Route::delete('/{training}', [TrainingController::class, 'destroyTraining']);
        });
    });
});