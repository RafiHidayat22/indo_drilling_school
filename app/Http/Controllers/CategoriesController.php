<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class CategoriesController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index(Request $request)
    {
        $query = TrainingCategory::query()->orderBy('order', 'asc')->orderBy('created_at', 'desc');

        // Filter berdasarkan search
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Pagination
        $categories = $query->paginate(10)->withQueryString();

        // Hitung total program terkait
        foreach ($categories as $category) {
            $category->programs_count = $category->subcategories()
                ->withCount('trainings')
                ->get()
                ->sum('trainings_count');
        }

        return view('categories', compact('categories'));
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Tambahkan validasi untuk gambar
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori maksimal 255 karakter',
            'icon.required' => 'Icon wajib dipilih',
            'status.required' => 'Status wajib dipilih',
            'status.in' => 'Status harus Active atau Inactive',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        try {
            // Generate slug
            $slug = Str::slug($request->name);

            // Cek apakah slug sudah ada
            $count = TrainingCategory::where('slug', $slug)->count();
            if ($count > 0) {
                $slug = $slug . '-' . ($count + 1);
            }

            // Get max order untuk urutan baru
            $maxOrder = TrainingCategory::max('order') ?? 0;

            // Proses upload gambar jika ada
            $imagePath = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $imageName = time() . '_' . Str::slug($request->name) . '.' . $request->file('image')->extension();
                $imagePath = $request->file('image')->storeAs(
                    'categories', // folder di dalam storage/app/public/
                    time() . '_' . Str::slug($request->name) . '.' . $request->file('image')->extension(),
                    'public' // disk name
                );
                // Jika ingin menyimpan path relatif saja (tanpa 'storage/')
                // $imagePath = str_replace('public/', '', $imagePath); // Opsional
            }

            TrainingCategory::create([
                'title' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'icon' => $request->icon,
                'status' => $request->status,
                'order' => $maxOrder + 1,
                'image' => $imagePath, // Simpan path gambar
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Kategori berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, $id)
    {
        $category = TrainingCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'status' => 'required|in:Active,Inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max' => 'Nama kategori maksimal 255 karakter',
            'icon.required' => 'Icon wajib dipilih',
            'status.required' => 'Status wajib dipilih',
            'status.in' => 'Status harus Active atau Inactive',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        try {
            // Generate slug baru jika nama berubah
            $slug = $category->slug;
            if ($request->name !== $category->title) {
                $slug = Str::slug($request->name);

                // Cek apakah slug sudah ada (kecuali milik sendiri)
                $count = TrainingCategory::where('slug', $slug)
                    ->where('id', '!=', $id)
                    ->count();

                if ($count > 0) {
                    $slug = $slug . '-' . ($count + 1);
                }
            }

            // Proses upload gambar jika ada
            $imagePath = $category->image; // Default: gunakan gambar lama
            $shouldDeleteImage = $request->has('delete_image') && $request->delete_image == '1';

            if ($shouldDeleteImage) {
                // Hapus gambar lama jika ada
                if ($category->image && Storage::exists($category->image)) {
                    Storage::delete($category->image);
                }
                $imagePath = null; // Set menjadi null
            } elseif ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Hapus gambar lama jika ada
                if ($category->image && Storage::exists($category->image)) {
                    Storage::delete($category->image);
                }

                $imageName = time() . '_' . Str::slug($request->name) . '.' . $request->file('image')->extension();
                $imagePath = $request->file('image')->storeAs('categories', $imageName, 'public');
            }

            $category->update([
                'title' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'icon' => $request->icon,
                'status' => $request->status,
                'image' => $imagePath, // Simpan path gambar baru atau null
            ]);

            return redirect()->route('categories.index')
                ->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified category
     */
    public function destroy($id)
    {
        try {
            $category = TrainingCategory::findOrFail($id);

            // Cek apakah kategori memiliki subcategories
            $subcategoriesCount = $category->subcategories()->count();

            if ($subcategoriesCount > 0) {
                return redirect()->back()
                    ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki ' . $subcategoriesCount . ' sub-kategori. Hapus sub-kategori terlebih dahulu.');
            }

            // Hapus gambar jika ada
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }

            $category->delete();

            return redirect()->route('categories.index')
                ->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Reorder categories
     */
    public function reorder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:training_categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal'
            ], 422);
        }

        try {
            foreach ($request->orders as $order => $id) {
                TrainingCategory::where('id', $id)->update(['order' => $order + 1]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Urutan kategori berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
