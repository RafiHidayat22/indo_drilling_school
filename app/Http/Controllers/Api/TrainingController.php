<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrainingCategory;
use App\Models\TrainingSubcategory;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TrainingController extends Controller
{
    // ============ TRAINING CATEGORIES ============
    
    public function indexCategories(): JsonResponse
    {
        $categories = TrainingCategory::where('status', 'Active')
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }

    public function storeCategory(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:training_categories,slug',
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $category = TrainingCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    public function showCategory($id): JsonResponse
    {
        $category = TrainingCategory::with(['subcategories' => function($query) {
            $query->where('status', 'Active')->orderBy('order');
        }])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    public function updateCategory(Request $request, $id): JsonResponse
    {
        $category = TrainingCategory::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => ['sometimes', 'required', 'string', Rule::unique('training_categories')->ignore($id)],
            'description' => 'sometimes|required|string',
            'icon' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    public function destroyCategory($id): JsonResponse
    {
        $category = TrainingCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    // ============ TRAINING SUBCATEGORIES ============

    public function indexSubcategories($categoryId): JsonResponse
    {
        $subcategories = TrainingSubcategory::where('category_id', $categoryId)
            ->where('status', 'Active')
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $subcategories
        ]);
    }

    public function storeSubcategory(Request $request, $categoryId): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        $validated['category_id'] = $categoryId;

        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Check unique slug per category
        $exists = TrainingSubcategory::where('category_id', $categoryId)
            ->where('slug', $validated['slug'])
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Slug already exists in this category'
            ], 422);
        }

        $subcategory = TrainingSubcategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Subcategory created successfully',
            'data' => $subcategory
        ], 201);
    }

    public function showSubcategory($categoryId, $subcategoryId): JsonResponse
    {
        $subcategory = TrainingSubcategory::where('category_id', $categoryId)
            ->with(['trainings' => function($query) {
                $query->where('status', 'Active');
            }])
            ->findOrFail($subcategoryId);

        return response()->json([
            'success' => true,
            'data' => $subcategory
        ]);
    }

    public function updateSubcategory(Request $request, $categoryId, $subcategoryId): JsonResponse
    {
        $subcategory = TrainingSubcategory::where('category_id', $categoryId)
            ->findOrFail($subcategoryId);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        if (isset($validated['slug'])) {
            $exists = TrainingSubcategory::where('category_id', $categoryId)
                ->where('slug', $validated['slug'])
                ->where('id', '!=', $subcategoryId)
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Slug already exists in this category'
                ], 422);
            }
        }

        $subcategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Subcategory updated successfully',
            'data' => $subcategory
        ]);
    }

    public function destroySubcategory($categoryId, $subcategoryId): JsonResponse
    {
        $subcategory = TrainingSubcategory::where('category_id', $categoryId)
            ->findOrFail($subcategoryId);
        $subcategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Subcategory deleted successfully'
        ]);
    }

    // ============ TRAININGS ============

    public function indexTrainings($categoryId, $subcategoryId): JsonResponse
    {
        $trainings = Training::where('subcategory_id', $subcategoryId)
            ->where('status', 'Active')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $trainings
        ]);
    }

    public function storeTraining(Request $request, $categoryId, $subcategoryId): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'required|string',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        $validated['subcategory_id'] = $subcategoryId;

        if (!isset($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Check unique slug per subcategory
        $exists = Training::where('subcategory_id', $subcategoryId)
            ->where('slug', $validated['slug'])
            ->exists();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Slug already exists in this subcategory'
            ], 422);
        }

        $training = Training::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Training created successfully',
            'data' => $training
        ], 201);
    }

    public function showTraining($categoryId, $subcategoryId, $trainingId): JsonResponse
    {
        $training = Training::where('subcategory_id', $subcategoryId)
            ->with('subcategory.category')
            ->findOrFail($trainingId);

        return response()->json([
            'success' => true,
            'data' => $training
        ]);
    }

    public function updateTraining(Request $request, $categoryId, $subcategoryId, $trainingId): JsonResponse
    {
        $training = Training::where('subcategory_id', $subcategoryId)
            ->findOrFail($trainingId);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'status' => 'nullable|in:Active,Inactive'
        ]);

        if (isset($validated['slug'])) {
            $exists = Training::where('subcategory_id', $subcategoryId)
                ->where('slug', $validated['slug'])
                ->where('id', '!=', $trainingId)
                ->exists();

            if ($exists) {
                return response()->json([
                    'success' => false,
                    'message' => 'Slug already exists in this subcategory'
                ], 422);
            }
        }

        $training->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Training updated successfully',
            'data' => $training
        ]);
    }

    public function destroyTraining($categoryId, $subcategoryId, $trainingId): JsonResponse
    {
        $training = Training::where('subcategory_id', $subcategoryId)
            ->findOrFail($trainingId);
        $training->delete();

        return response()->json([
            'success' => true,
            'message' => 'Training deleted successfully'
        ]);
    }
}