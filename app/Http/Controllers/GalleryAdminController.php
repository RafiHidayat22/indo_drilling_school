<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Rules\ValidYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = GalleryImage::query();

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $images = $query->ordered()->paginate(12);

        // ✅ Optimized stats: 1 query only
        $statsData = GalleryImage::selectRaw('
            COUNT(*) as total,
            SUM(CASE WHEN is_active = 1 THEN 1 ELSE 0 END) as active,
            SUM(CASE WHEN is_featured = 1 THEN 1 ELSE 0 END) as featured
        ')->first();

        $stats = [
            'total' => $statsData->total,
            'active' => $statsData->active,
            'featured' => $statsData->featured,
            'years' => GalleryImage::distinct('year')->orderBy('year', 'desc')->pluck('year')
        ];

        return view('gallery.index', compact('images', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'year' => ['required', new ValidYear()],
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        $uploadedPath = null;

        try {
            // ✅ Safe upload (Laravel auto-generates unique filename)
            if ($request->hasFile('image')) {
                $uploadedPath = $request->file('image')->store('gallery', 'public');
                $validated['image_path'] = $uploadedPath;
            }

            $validated['is_featured'] = $request->boolean('is_featured');
            $validated['is_active'] = $request->boolean('is_active', true); // default: aktif
            $validated['order'] = $request->integer('order', 0);

            GalleryImage::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil ditambahkan ke gallery'
            ]);
        } catch (\Exception $e) {
            // 🧹 Cleanup: delete uploaded file if DB insert fails
            if ($uploadedPath && Storage::disk('public')->exists($uploadedPath)) {
                Storage::disk('public')->delete($uploadedPath);
            }

            \Log::error('Gallery store error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan gambar. Pastikan data valid dan coba lagi.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(GalleryImage $gallery)
    {
        return response()->json([
            'success' => true,
            'data' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'year' => ['required', new ValidYear()],
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0'
        ]);

        $uploadedPath = null;

        try {
            if ($request->hasFile('image')) {
                // 🗑️ Delete old image first
                if (!empty($gallery->image_path) && Storage::disk('public')->exists($gallery->image_path)) {
                    Storage::disk('public')->delete($gallery->image_path);
                }

                // 📤 Upload new
                $uploadedPath = $request->file('image')->store('gallery', 'public');
                $validated['image_path'] = $uploadedPath;
            }

            // 🔐 Preserve current boolean values if not sent
            $validated['is_featured'] = $request->filled('is_featured')
                ? $request->boolean('is_featured')
                : $gallery->is_featured;

            $validated['is_active'] = $request->filled('is_active')
                ? $request->boolean('is_active')
                : $gallery->is_active;

            $validated['order'] = $request->integer('order', $gallery->order);

            $gallery->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            // 🧹 Cleanup: delete new file if update fails
            if ($uploadedPath && Storage::disk('public')->exists($uploadedPath)) {
                Storage::disk('public')->delete($uploadedPath);
            }

            \Log::error('Gallery update error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate gambar. Coba lagi.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $gallery)
    {
        try {
            if (!empty($gallery->image_path) && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $gallery->delete(); // ✅ Hard delete

            return response()->json([
                'success' => true,
                'message' => 'Gambar berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            \Log::error('Gallery destroy error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus gambar.'
            ], 500);
        }
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(GalleryImage $gallery)
    {
        try {
            $gallery->update(['is_featured' => !$gallery->is_featured]);
            return response()->json([
                'success' => true,
                'message' => 'Status featured berhasil diubah',
                'is_featured' => $gallery->is_featured
            ]);
        } catch (\Exception $e) {
            \Log::error('Gallery toggleFeatured error: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Toggle active status
     */
    public function toggleActive(GalleryImage $gallery)
    {
        try {
            $gallery->update(['is_active' => !$gallery->is_active]);
            return response()->json([
                'success' => true,
                'message' => 'Status aktif berhasil diubah',
                'is_active' => $gallery->is_active
            ]);
        } catch (\Exception $e) {
            \Log::error('Gallery toggleActive error: ' . $e->getMessage());
            return response()->json(['success' => false], 500);
        }
    }

    /**
     * Reorder gallery images
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:gallery_images,id'
        ]);

        try {
            // ✅ Gunakan transaction biasa — kompatibel MySQL, PostgreSQL, SQLite
            DB::transaction(function () use ($request) {
                foreach ($request->ids as $index => $id) {
                    GalleryImage::where('id', $id)->update(['order' => $index]);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Urutan berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            \Log::error('Gallery reorder error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate urutan. Coba lagi.'
            ], 500);
        }
    }
}
