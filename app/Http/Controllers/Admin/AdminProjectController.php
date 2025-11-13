<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::orderBy('order', 'desc')->orderBy('created_at', 'desc');

        // Filter by category
        if ($request->has('category') && $request->category !== '') {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search') && $request->search !== '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('client', 'like', '%' . $request->search . '%');
            });
        }

        $projects = $query->paginate(10);

        // Stats
        $stats = [
            'total' => Project::count(),
            'published' => Project::where('is_published', true)->count(),
            'draft' => Project::where('is_published', false)->count(),
            'ongoing' => Project::where('status', 'ongoing')->count(),
            'completed' => Project::where('status', 'completed')->count(),
            'featured' => Project::where('is_featured', true)->count(),
        ];

        return view('admin.projects.index', compact('projects', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:ongoing,completed',
            'category' => 'nullable|in:drilling,safety,certification',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'results' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|in:1,0,on,off,true,false',
            'is_published' => 'nullable|in:1,0,on,off,true,false',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['title']);
        
        // Generate unique folder name for this project
        $projectFolder = 'projects/' . Str::slug($validated['title']) . '-' . time();

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store($projectFolder, 'public');
        }

        // Handle gallery images - simpan di folder khusus project ini
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store($projectFolder . '/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;
        
        // Konversi checkbox menjadi boolean
        $validated['is_featured'] = $request->filled('is_featured');
        $validated['is_published'] = $request->filled('is_published');

        Project::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil ditambahkan'
        ]);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:ongoing,completed',
            'category' => 'nullable|in:drilling,safety,certification',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'results' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_featured' => 'nullable|in:1,0,on,off,true,false',
            'is_published' => 'nullable|in:1,0,on,off,true,false',
        ]);

        // Dapatkan folder project yang sudah ada
        $projectFolder = $this->getProjectFolder($project);

        // Update slug if title changed
        if ($validated['title'] !== $project->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store($projectFolder, 'public');
        }

        // Handle gallery images - simpan di folder project yang sama
        if ($request->hasFile('gallery_images')) {
            $newGalleryImages = [];
            foreach ($request->file('gallery_images') as $image) {
                $newGalleryImages[] = $image->store($projectFolder . '/gallery', 'public');
            }

            // Gabungkan dengan gallery lama
            $existingGallery = $project->gallery_images ?? [];
            $validated['gallery_images'] = array_merge($existingGallery, $newGalleryImages);
        } else {
            // Jika tidak ada upload baru, biarkan gallery lama
            $validated['gallery_images'] = $project->gallery_images;
        }

        // Konversi checkbox menjadi boolean
        $validated['is_featured'] = $request->filled('is_featured');
        $validated['is_published'] = $request->filled('is_published');

        $project->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Hapus seluruh folder project
        $projectFolder = $this->getProjectFolder($project);
        if (Storage::disk('public')->exists($projectFolder)) {
            Storage::disk('public')->deleteDirectory($projectFolder);
        }

        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Project berhasil dihapus'
        ]);
    }

    public function deleteGalleryImage(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
            'project_id' => 'required|integer',
        ]);

        $path = $request->path;
        $projectId = $request->project_id;

        // Cegah path traversal
        if (strpos($path, '..') !== false) {
            return response()->json(['success' => false, 'message' => 'Path tidak valid'], 400);
        }

        // Validasi bahwa path adalah milik project ini
        if (!preg_match('/^projects\/[^\/]+\/gallery\//', $path)) {
            return response()->json(['success' => false, 'message' => 'Akses tidak diizinkan'], 403);
        }

        // Hapus file jika ada
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            
            // Update database - hapus dari array gallery_images
            $project = Project::findOrFail($projectId);
            $galleryImages = $project->gallery_images ?? [];
            $galleryImages = array_values(array_filter($galleryImages, function($img) use ($path) {
                return $img !== $path;
            }));
            $project->gallery_images = $galleryImages;
            $project->save();
            
            return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'Gambar tidak ditemukan'], 404);
    }

    /**
     * Helper function untuk mendapatkan folder project
     */
    private function getProjectFolder($project)
    {
        // Jika featured_image ada, ambil folder dari path-nya
        if ($project->featured_image) {
            $path = $project->featured_image;
            // Extract folder: projects/nama-project-timestamp
            if (preg_match('/^(projects\/[^\/]+)/', $path, $matches)) {
                return $matches[1];
            }
        }
        
        // Jika gallery_images ada, ambil dari salah satu gallery
        if (!empty($project->gallery_images)) {
            $path = $project->gallery_images[0];
            // Extract folder: projects/nama-project-timestamp
            if (preg_match('/^(projects\/[^\/]+)/', $path, $matches)) {
                return $matches[1];
            }
        }

        // Fallback: buat folder baru
        return 'projects/' . Str::slug($project->title) . '-' . $project->id;
    }
}