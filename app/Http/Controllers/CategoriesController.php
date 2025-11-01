<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    public function index()
    {
        // Data dummy untuk preview
        $categoriesData = collect([
            [
                'id' => 1,
                'name' => 'Keselamatan Kerja',
                'slug' => 'keselamatan-kerja',
                'description' => 'Program pelatihan yang berfokus pada keselamatan dan kesehatan kerja (K3) di lingkungan industri',
                'icon' => '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>',
                'status' => 'active',
                'created_at' => Carbon::now()->subDays(30),
            ],
            [
                'id' => 2,
                'name' => 'Teknik & Operasional',
                'slug' => 'teknik-operasional',
                'description' => 'Pelatihan teknis dan operasional untuk meningkatkan kompetensi di bidang teknik dan maintenance',
                'icon' => '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
                'status' => 'active',
                'created_at' => Carbon::now()->subDays(25),
            ],
            [
                'id' => 3,
                'name' => 'Manajemen & Leadership',
                'slug' => 'manajemen-leadership',
                'description' => 'Program pengembangan kemampuan manajemen dan kepemimpinan untuk supervisor dan manager',
                'icon' => '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
                'status' => 'active',
                'created_at' => Carbon::now()->subDays(20),
            ],
            [
                'id' => 4,
                'name' => 'Sertifikasi Profesional',
                'slug' => 'sertifikasi-profesional',
                'description' => 'Program sertifikasi untuk memperoleh lisensi dan kompetensi profesional yang diakui',
                'icon' => '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>',
                'status' => 'active',
                'created_at' => Carbon::now()->subDays(15),
            ],
            [
                'id' => 5,
                'name' => 'Teknologi Informasi',
                'slug' => 'teknologi-informasi',
                'description' => 'Pelatihan di bidang IT, programming, dan sistem informasi',
                'icon' => '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>',
                'status' => 'inactive',
                'created_at' => Carbon::now()->subDays(10),
            ],
        ]);

        // Pagination manual untuk dummy data
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $categories = new \Illuminate\Pagination\LengthAwarePaginator(
            $categoriesData->forPage($currentPage, $perPage),
            $categoriesData->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Generate slug
        $validated['slug'] = \Str::slug($validated['name']);

        // Logic untuk menyimpan ke database
        // Category::create($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Generate slug
        $validated['slug'] = \Str::slug($validated['name']);

        // Logic untuk update ke database
        // $category = Category::findOrFail($id);
        // $category->update($validated);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Logic untuk hapus dari database
        // $category = Category::findOrFail($id);
        // $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
