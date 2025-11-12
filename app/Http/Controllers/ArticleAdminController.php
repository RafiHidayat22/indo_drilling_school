<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleAdminController extends Controller
{
    /**
     * Display a listing of articles
     */
    public function index(Request $request)
    {
        $query = Article::with(['category', 'author'])
            ->latest('created_at');

        // Filter by search
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->byCategory($request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->published();
            } else {
                $query->where('status', $request->status);
            }
        }

        // Paginate results
        $articles = $query->paginate(8)->withQueryString();

        // Get categories for filter dropdown
        $categories = ArticleCategory::active()->ordered()->get();

        // Statistics
        $stats = [
            'total' => Article::count(),
            'published' => Article::where('status', 'published')->count(),
            'draft' => Article::where('status', 'draft')->count(),
            'categories' => ArticleCategory::active()->count(),
        ];

        return view('articleadmin', compact('articles', 'categories', 'stats'));
    }

    /**
     * Store a newly created article
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'content' => 'required|string|min:100',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'nullable|string|max:500',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['featured_image'] = $request->file('thumbnail')
                ->store('articles/thumbnails', 'public');
        }

        // Set author
        $validated['author_id'] = auth()->id();

        // Auto-generate slug (will be handled by model boot)
        $validated['slug'] = Str::slug($validated['title']);

        // Ensure unique slug
        $originalSlug = $validated['slug'];
        $count = 1;
        while (Article::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count;
            $count++;
        }

        // Generate excerpt if not provided
        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 200);
        }

        // Set published_at if status is published
        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        // Calculate read time (will be handled by model boot, but we can set it here too)
        $validated['read_time'] = Article::calculateReadTime($validated['content']);

        $article = Article::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil ditambahkan',
            'data' => $article->load(['category', 'author'])
        ], 201);
    }

    /**
     * Display the specified article
     */
    public function show($id)
    {
        $article = Article::with(['category', 'author', 'tags'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $article
        ]);
    }

    /**
     * Update the specified article
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'content' => 'required|string|min:100',
            'status' => 'required|in:draft,published,archived',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'excerpt' => 'nullable|string|max:500',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }

            $validated['featured_image'] = $request->file('thumbnail')
                ->store('articles/thumbnails', 'public');
        }

        // Update slug if title changed
        if ($article->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);

            // Ensure unique slug
            $originalSlug = $validated['slug'];
            $count = 1;
            while (Article::where('slug', $validated['slug'])
                ->where('id', '!=', $id)
                ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Generate excerpt if not provided
        if (empty($validated['excerpt'])) {
            $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 200);
        }

        // Set published_at if status changed to published
        if ($validated['status'] === 'published' && $article->status !== 'published') {
            $validated['published_at'] = now();
        }

        // Recalculate read time if content changed
        if ($article->content !== $validated['content']) {
            $validated['read_time'] = Article::calculateReadTime($validated['content']);
        }

        $article->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil diupdate',
            'data' => $article->fresh(['category', 'author'])
        ]);
    }
    /**
     * Remove the specified article
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Delete thumbnail
        if ($article->featured_image) {
            Storage::disk('public')->delete($article->featured_image);
        }

        // Soft delete
        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dihapus'
        ]);
    }

    /**
     * Bulk delete articles
     */
    public function bulkDelete(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:articles,id'
        ]);

        $articles = Article::whereIn('id', $validated['ids'])->get();

        foreach ($articles as $article) {
            if ($article->featured_image) {
                Storage::disk('public')->delete($article->featured_image);
            }
            $article->delete();
        }

        return response()->json([
            'success' => true,
            'message' => count($validated['ids']) . ' artikel berhasil dihapus'
        ]);
    }

    /**
     * Restore soft deleted article
     */
    public function restore($id)
    {
        $article = Article::withTrashed()->findOrFail($id);
        $article->restore();

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dipulihkan'
        ]);
    }
}
