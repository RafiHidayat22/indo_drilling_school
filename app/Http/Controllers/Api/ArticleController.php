<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // ==================== PUBLIC ROUTES ====================
    
    /**
     * Get all published articles with filters
     * GET /api/articles
     */
    public function index(Request $request)
    {
        $query = Article::with(['category', 'author', 'tags'])
                        ->published();

        // Search
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Filter by category
        if ($request->has('category') && $request->category !== 'all') {
            $query->byCategory($request->category);
        }

        // Filter by tag
        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        // Sorting
        $sortBy = $request->get('sort', 'latest');
        switch ($sortBy) {
            case 'popular':
                $query->orderBy('views_count', 'desc');
                break;
            case 'oldest':
                $query->orderBy('published_at', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('published_at', 'desc');
                break;
        }

        $perPage = $request->get('per_page', 12);
        $articles = $query->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $articles->items(),
            'pagination' => [
                'total' => $articles->total(),
                'per_page' => $articles->perPage(),
                'current_page' => $articles->currentPage(),
                'last_page' => $articles->lastPage(),
                'from' => $articles->firstItem(),
                'to' => $articles->lastItem(),
            ],
        ]);
    }

    /**
     * Get single article by slug
     * GET /api/articles/{slug}
     */
    public function show(Request $request, $slug)
    {
        $article = Article::with(['category', 'author', 'tags'])
                         ->where('slug', $slug)
                         ->published()
                         ->firstOrFail();

        // Track view
        $article->incrementViews(
            $request->ip(),
            $request->userAgent()
        );

        // Get related articles
        $relatedArticles = Article::with(['category', 'author'])
                                 ->where('category_id', $article->category_id)
                                 ->where('id', '!=', $article->id)
                                 ->published()
                                 ->inRandomOrder()
                                 ->limit(3)
                                 ->get();

        return response()->json([
            'success' => true,
            'data' => $article,
            'related_articles' => $relatedArticles,
        ]);
    }

    /**
     * Get all categories
     * GET /api/articles/categories
     */
    public function getCategories()
    {
        $categories = ArticleCategory::active()
                                    ->ordered()
                                    ->withCount('publishedArticles')
                                    ->get()
                                    ->map(function ($category) {
                                        return [
                                            'id' => $category->id,
                                            'name' => $category->name,
                                            'slug' => $category->slug,
                                            'color' => $category->color,
                                            'icon' => $category->icon,
                                            'articles_count' => $category->published_articles_count,
                                        ];
                                    });

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    /**
     * Get recent/popular articles for sidebar
     * GET /api/articles/recent
     */
    public function getRecent()
    {
        $recent = Article::with(['category'])
                        ->published()
                        ->recent(3)
                        ->get();

        return response()->json([
            'success' => true,
            'data' => $recent,
        ]);
    }

    /**
     * Get article stats for hero section
     * GET /api/articles/stats
     */
    public function getStats()
    {
        $stats = [
            'total_articles' => Article::published()->count(),
            'categories' => ArticleCategory::active()->count(),
            'total_views' => Article::published()->sum('views_count'),
        ];

        return response()->json([
            'success' => true,
            'data' => $stats,
        ]);
    }

    // ==================== ADMIN ROUTES ====================
    
    /**
     * Get all articles (including drafts) - Admin only
     * GET /api/admin/articles
     */
    public function adminIndex(Request $request)
    {
        $query = Article::with(['category', 'author', 'tags']);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Search
        if ($request->has('search')) {
            $query->search($request->search);
        }

        $articles = $query->latest()->paginate($request->get('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => $articles->items(),
            'pagination' => [
                'total' => $articles->total(),
                'per_page' => $articles->perPage(),
                'current_page' => $articles->currentPage(),
                'last_page' => $articles->lastPage(),
            ],
        ]);
    }

    /**
     * Create new article - Admin only
     * POST /api/admin/articles
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:article_categories,id',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'featured_image_caption' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $articleData = $request->except('tags');
        $articleData['author_id'] = auth()->id();
        $articleData['slug'] = Str::slug($request->title);

        // Auto-publish if status is published and no published_at is set
        if ($request->status === 'published' && !$request->published_at) {
            $articleData['published_at'] = now();
        }

        $article = Article::create($articleData);

        // Handle tags
        if ($request->has('tags') && is_array($request->tags)) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = ArticleTag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $article->tags()->sync($tagIds);
        }

        return response()->json([
            'success' => true,
            'message' => 'Article created successfully',
            'data' => $article->load(['category', 'author', 'tags']),
        ], 201);
    }

    /**
     * Update article - Admin only
     * PUT /api/admin/articles/{id}
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:article_categories,id',
            'content' => 'sometimes|string',
            'excerpt' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'featured_image_caption' => 'nullable|string',
            'status' => 'sometimes|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'tags' => 'nullable|array',
            'tags.*' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $articleData = $request->except('tags');

        // Update slug if title changed
        if ($request->has('title')) {
            $articleData['slug'] = Str::slug($request->title);
        }

        // Auto-set published_at if changing to published
        if ($request->status === 'published' && !$article->published_at && !$request->published_at) {
            $articleData['published_at'] = now();
        }

        $article->update($articleData);

        // Handle tags
        if ($request->has('tags')) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = ArticleTag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $article->tags()->sync($tagIds);
        }

        return response()->json([
            'success' => true,
            'message' => 'Article updated successfully',
            'data' => $article->fresh(['category', 'author', 'tags']),
        ]);
    }

    /**
     * Delete article - Admin only
     * DELETE /api/admin/articles/{id}
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Article deleted successfully',
        ]);
    }

    // ==================== CATEGORY MANAGEMENT ====================
    
    /**
     * Get all categories (admin)
     * GET /api/admin/articles/categories
     */
    public function adminGetCategories()
    {
        $categories = ArticleCategory::withCount('articles')
                                    ->ordered()
                                    ->get();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    /**
     * Create category
     * POST /api/admin/articles/categories
     */
    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100|unique:article_categories,name',
            'color' => 'required|string|in:red,orange,blue,green,purple',
            'icon' => 'required|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $category = ArticleCategory::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category,
        ], 201);
    }

    /**
     * Update category
     * PUT /api/admin/articles/categories/{id}
     */
    public function updateCategory(Request $request, $id)
    {
        $category = ArticleCategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:100|unique:article_categories,name,' . $id,
            'color' => 'sometimes|string|in:red,orange,blue,green,purple',
            'icon' => 'sometimes|string|max:50',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $category->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
            'data' => $category,
        ]);
    }

    /**
     * Delete category
     * DELETE /api/admin/articles/categories/{id}
     */
    public function destroyCategory($id)
    {
        $category = ArticleCategory::findOrFail($id);
        
        if ($category->articles()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category with articles',
            ], 422);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully',
        ]);
    }
}