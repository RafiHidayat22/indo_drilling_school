<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingCategory;
use App\Models\TrainingSubcategory;
use App\Models\Training;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        // Query dengan relasi
        $query = TrainingCategory::with([
            'subcategories' => function($q) {
                $q->orderBy('order', 'asc');
            },
            'subcategories.trainings'
        ]);

        // Filter berdasarkan status kategori
        if ($request->has('status') && $request->status != '') {
            $query->where('status', ucfirst($request->status));
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhereHas('subcategories', function($subQ) use ($search) {
                      $subQ->where('title', 'like', "%{$search}%");
                  })
                  ->orWhereHas('trainings', function($trainQ) use ($search) {
                      $trainQ->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Ambil data dengan pagination
        $categories = $query->orderBy('order', 'asc')
                           ->orderBy('created_at', 'desc')
                           ->paginate(8);

        // Transform data untuk view (sesuai struktur lama)
        $trainings = $categories->through(function($category) {
            $allTrainings = [];
            
            foreach($category->subcategories as $subcategory) {
                foreach($subcategory->trainings as $training) {
                    $allTrainings[] = [
                        'id' => $training->id,
                        'name' => $training->title,
                        'description' => $training->description,
                        'status' => strtolower($training->status),
                        'subcategory' => $subcategory->title,
                        'subcategory_id' => $subcategory->id
                    ];
                }
            }
            
            return [
                'id' => $category->subcategories->first()->id ?? $category->id,
                'category' => $category->title,
                'provider' => $category->subcategories->first()->title ?? $category->title,
                'provider_description' => $category->description,
                'status' => strtolower($category->status),
                'created_at' => $category->created_at,
                'trainings' => $allTrainings
            ];
        });

        // Ambil semua kategori untuk dropdown - TAMBAHAN INI
        $allCategories = TrainingCategory::where('status', 'Active')
                                        ->orderBy('title', 'asc')
                                        ->get(['id', 'title']);

        return view('training', compact('trainings', 'allCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'provider_description' => 'nullable|string',
            'trainings' => 'required|array|min:1',
            'trainings.*.name' => 'required|string|max:255',
            'trainings.*.description' => 'nullable|string',
            'trainings.*.status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            // Create or get category
            $category = TrainingCategory::firstOrCreate(
                ['slug' => Str::slug($validated['category'])],
                [
                    'title' => $validated['category'],
                    'description' => $validated['provider_description'] ?? '',
                    'status' => ucfirst($validated['status']),
                    'order' => TrainingCategory::max('order') + 1
                ]
            );

            // Create subcategory (using provider as subcategory name)
            $subcategory = TrainingSubcategory::create([
                'category_id' => $category->id,
                'title' => $validated['provider'],
                'slug' => Str::slug($validated['provider']),
                'description' => $validated['provider_description'],
                'status' => ucfirst($validated['status']),
                'order' => $category->subcategories()->max('order') + 1
            ]);

            // Create trainings
            foreach ($validated['trainings'] as $trainingData) {
                Training::create([
                    'subcategory_id' => $subcategory->id,
                    'title' => $trainingData['name'],
                    'slug' => Str::slug($trainingData['name']),
                    'description' => $trainingData['description'] ?? '',
                    'status' => ucfirst($trainingData['status'])
                ]);
            }

            DB::commit();

            return redirect()->route('training.index')
                           ->with('success', 'Program berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                           ->with('error', 'Gagal menambahkan program: ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'provider_description' => 'nullable|string',
            'trainings' => 'required|array|min:1',
            'trainings.*.name' => 'required|string|max:255',
            'trainings.*.description' => 'nullable|string',
            'trainings.*.status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            $subcategory = TrainingSubcategory::findOrFail($id);
            
            $category = TrainingCategory::firstOrCreate(
                ['slug' => Str::slug($validated['category'])],
                [
                    'title' => $validated['category'],
                    'description' => $validated['provider_description'] ?? '',
                    'status' => ucfirst($validated['status']),
                    'order' => TrainingCategory::max('order') + 1
                ]
            );

            $subcategory->update([
                'category_id' => $category->id,
                'title' => $validated['provider'],
                'slug' => Str::slug($validated['provider']),
                'description' => $validated['provider_description'],
                'status' => ucfirst($validated['status'])
            ]);

            $subcategory->trainings()->delete();

            foreach ($validated['trainings'] as $trainingData) {
                Training::create([
                    'subcategory_id' => $subcategory->id,
                    'title' => $trainingData['name'],
                    'slug' => Str::slug($trainingData['name']),
                    'description' => $trainingData['description'] ?? '',
                    'status' => ucfirst($trainingData['status'])
                ]);
            }

            DB::commit();

            return redirect()->route('training.index')
                           ->with('success', 'Program berhasil diupdate!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                           ->with('error', 'Gagal mengupdate program: ' . $e->getMessage())
                           ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $subcategory = TrainingSubcategory::findOrFail($id);
            $subcategory->delete();

            DB::commit();

            return redirect()->route('training.index')
                           ->with('success', 'Program berhasil dihapus!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                           ->with('error', 'Gagal menghapus program: ' . $e->getMessage());
        }
    }
}