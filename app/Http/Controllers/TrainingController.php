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
        $user = current_user();
        $isSuperAdmin = is_super_admin();
        $pageTitle = 'Programs & Trainings';
        // Query LANGSUNG dari TrainingSubcategory (bukan TrainingCategory)
        // Karena 1 subcategory = 1 baris di tabel
        $breadcrumbs = [
            ['name' => 'Dashboard', 'url' => route('dashboard')],
            ['name' => 'Programs & Trainings', 'url' => null] // null karena halaman aktif
        ];

        $query = TrainingSubcategory::with([
            'category',
            'trainings' => function ($q) {
                $q->orderBy('created_at', 'desc');
            }
        ]);
        $query = TrainingSubcategory::with([
            'category',
            'trainings' => function ($q) {
                $q->orderBy('created_at', 'desc');
            }
        ]);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', ucfirst($request->status));
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($catQ) use ($search) {
                        $catQ->where('title', 'like', "%{$search}%");
                    })
                    ->orWhereHas('trainings', function ($trainQ) use ($search) {
                        $trainQ->where('title', 'like', "%{$search}%");
                    });
            });
        }

        // Ambil data subcategories dengan pagination
        $subcategories = $query->orderBy('created_at', 'desc')
            ->paginate(10);

        // Transform data untuk view (sesuai struktur yang diharapkan view)
        $trainings = $subcategories->through(function ($subcategory) {
            $allTrainings = [];

            foreach ($subcategory->trainings as $training) {
                $allTrainings[] = [
                    'id' => $training->id,
                    'name' => $training->title,
                    'description' => $training->description,
                    'status' => strtolower($training->status),
                ];
            }

            return [
                'id' => $subcategory->id,
                'category_id' => $subcategory->category_id,
                'category' => $subcategory->category->title ?? 'Tidak ada kategori',
                'provider' => $subcategory->title,
                'provider_description' => $subcategory->description,
                'status' => strtolower($subcategory->status),
                'created_at' => $subcategory->created_at,
                'trainings' => $allTrainings
            ];
        });

        // Ambil semua kategori untuk dropdown
        $allCategories = TrainingCategory::where('status', 'Active')
            ->orderBy('title', 'asc')
            ->get(['id', 'title']);

        return view('training', compact('trainings', 'allCategories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'providers' => 'required|array|min:1',
            'providers.*.name' => 'required|string|max:255',
            'providers.*.description' => 'nullable|string',
            'providers.*.status' => 'required|in:active,inactive',
            'providers.*.trainings' => 'required|array|min:1',
            'providers.*.trainings.*.name' => 'required|string|max:255',
            'providers.*.trainings.*.description' => 'nullable|string',
            'providers.*.trainings.*.status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            // Create or get category
            $category = TrainingCategory::firstOrCreate(
                ['slug' => Str::slug($validated['category'])],
                [
                    'title' => $validated['category'],
                    'description' => '',
                    'status' => 'Active',
                    'order' => TrainingCategory::max('order') + 1
                ]
            );

            // Loop through each provider (subcategory)
            foreach ($validated['providers'] as $index => $providerData) {
                // Generate unique slug untuk subcategory
                $baseSlug = Str::slug($providerData['name']);
                $subcategorySlug = $baseSlug . '-' . time() . '-' . $index;

                // Create subcategory for each provider
                $subcategory = TrainingSubcategory::create([
                    'category_id' => $category->id,
                    'title' => $providerData['name'],
                    'slug' => $subcategorySlug,
                    'description' => $providerData['description'] ?? '',
                    'status' => ucfirst($providerData['status']),
                    'order' => TrainingSubcategory::where('category_id', $category->id)->max('order') + 1
                ]);

                // Create trainings for this provider
                foreach ($providerData['trainings'] as $tIndex => $trainingData) {
                    $trainingBaseSlug = Str::slug($trainingData['name']);
                    $trainingSlug = $trainingBaseSlug . '-' . $subcategory->id . '-' . $tIndex;

                    Training::create([
                        'subcategory_id' => $subcategory->id,
                        'title' => $trainingData['name'],
                        'slug' => $trainingSlug,
                        'description' => $trainingData['description'] ?? '',
                        'status' => ucfirst($trainingData['status'])
                    ]);
                }
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
            'category_id' => 'nullable|exists:training_categories,id',
            'providers' => 'required|array|min:1',
            'providers.*.name' => 'required|string|max:255',
            'providers.*.description' => 'nullable|string',
            'providers.*.status' => 'required|in:active,inactive',
            'providers.*.trainings' => 'required|array|min:1',
            'providers.*.trainings.*.name' => 'required|string|max:255',
            'providers.*.trainings.*.description' => 'nullable|string',
            'providers.*.trainings.*.status' => 'required|in:active,inactive'
        ]);

        try {
            DB::beginTransaction();

            $subcategory = TrainingSubcategory::findOrFail($id);

            // Get or create category
            $category = TrainingCategory::firstOrCreate(
                ['slug' => Str::slug($validated['category'])],
                [
                    'title' => $validated['category'],
                    'description' => '',
                    'status' => 'Active',
                    'order' => TrainingCategory::max('order') + 1
                ]
            );

            // Update current subcategory with first provider data
            $firstProvider = $validated['providers'][0];

            // Generate unique slug untuk subcategory
            $baseSlug = Str::slug($firstProvider['name']);
            $newSlug = $baseSlug;

            // Jika slug berubah atau konflik, buat slug unik
            if ($subcategory->slug !== $newSlug) {
                $counter = 1;
                while (TrainingSubcategory::where('id', '!=', $subcategory->id)
                    ->where('category_id', $category->id)
                    ->where('slug', $newSlug)
                    ->exists()
                ) {
                    $newSlug = $baseSlug . '-' . $counter;
                    $counter++;
                }
            }

            $subcategory->update([
                'category_id' => $category->id,
                'title' => $firstProvider['name'],
                'slug' => $newSlug,
                'description' => $firstProvider['description'] ?? '',
                'status' => ucfirst($firstProvider['status'])
            ]);

            // Delete existing trainings untuk subcategory ini
            $subcategory->trainings()->delete();

            // Create trainings for first provider
            foreach ($firstProvider['trainings'] as $tIndex => $trainingData) {
                $trainingBaseSlug = Str::slug($trainingData['name']);
                $trainingSlug = $trainingBaseSlug . '-' . $subcategory->id . '-' . $tIndex . '-' . time();

                Training::create([
                    'subcategory_id' => $subcategory->id,
                    'title' => $trainingData['name'],
                    'slug' => $trainingSlug,
                    'description' => $trainingData['description'] ?? '',
                    'status' => ucfirst($trainingData['status'])
                ]);
            }

            // Create additional providers if any (index > 0)
            // Ini akan membuat subcategory baru (baris baru di tabel)
            for ($i = 1; $i < count($validated['providers']); $i++) {
                $providerData = $validated['providers'][$i];

                $providerSlug = Str::slug($providerData['name']) . '-' . time() . '-' . $i;

                $newSubcategory = TrainingSubcategory::create([
                    'category_id' => $category->id,
                    'title' => $providerData['name'],
                    'slug' => $providerSlug,
                    'description' => $providerData['description'] ?? '',
                    'status' => ucfirst($providerData['status']),
                    'order' => TrainingSubcategory::where('category_id', $category->id)->max('order') + 1
                ]);

                foreach ($providerData['trainings'] as $tIndex => $trainingData) {
                    $trainingSlug = Str::slug($trainingData['name']) . '-' . $newSubcategory->id . '-' . $tIndex . '-' . time();

                    Training::create([
                        'subcategory_id' => $newSubcategory->id,
                        'title' => $trainingData['name'],
                        'slug' => $trainingSlug,
                        'description' => $trainingData['description'] ?? '',
                        'status' => ucfirst($trainingData['status'])
                    ]);
                }
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

            // Delete semua trainings terkait terlebih dahulu
            $subcategory->trainings()->delete();

            // Delete subcategory
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
