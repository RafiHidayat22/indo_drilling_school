<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use App\Models\TrainingSubcategory;
use App\Models\Training;
use Illuminate\Http\Request;

class ProgramWebController extends Controller
{
    public function index()
    {
        $categories = TrainingCategory::where('status', 'Active')
            ->orderBy('order')
            ->get();
            
        return view('program', compact('categories'));
    }

    public function showCategory($categorySlug)
    {
        $category = TrainingCategory::where('slug', $categorySlug)
            ->where('status', 'Active')
            ->with(['subcategories' => function($query) {
                $query->where('status', 'Active')
                    ->orderBy('order')
                    ->withCount('trainings');
            }])
            ->firstOrFail();

        return view('programDetail', [
            'programTitle' => $category->title,
            'programDescription' => $category->description,
            'programSlug' => $category->slug,
            'programIcon' => $category->icon,
            'subcategories' => $category->subcategories
        ]);
    }

    public function showSubcategory($categorySlug, $subcategorySlug)
    {
        $category = TrainingCategory::where('slug', $categorySlug)
            ->where('status', 'Active')
            ->firstOrFail();

        $subcategory = TrainingSubcategory::where('slug', $subcategorySlug)
            ->where('category_id', $category->id)
            ->where('status', 'Active')
            ->with(['trainings' => function($query) {
                $query->where('status', 'Active')->orderBy('order');
            }])
            ->firstOrFail();

        return view('subcategoryDetail', [
            'category' => $category,
            'subcategory' => $subcategory,
            'trainings' => $subcategory->trainings
        ]);
    }

    public function showTraining($categorySlug, $subcategorySlug, $trainingSlug)
    {
        $category = TrainingCategory::where('slug', $categorySlug)
            ->where('status', 'Active')
            ->firstOrFail();

        $subcategory = TrainingSubcategory::where('slug', $subcategorySlug)
            ->where('category_id', $category->id)
            ->where('status', 'Active')
            ->firstOrFail();

        $training = Training::where('slug', $trainingSlug)
            ->where('subcategory_id', $subcategory->id)
            ->where('status', 'Active')
            ->firstOrFail();

        return view('enroll', [
            'category' => $category,
            'subcategory' => $subcategory,
            'training' => $training
        ]);
    }
}