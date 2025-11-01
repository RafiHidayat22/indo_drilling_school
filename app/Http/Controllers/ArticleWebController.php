<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleWebController extends Controller
{
    /**
     * Display article listing page
     * GET /articles
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

        $articles = $query->paginate(12);

        // Get categories for sidebar
        $categories = ArticleCategory::active()
                                    ->ordered()
                                    ->withCount('publishedArticles')
                                    ->get();

        // Get recent articles for sidebar
        $recentArticles = Article::with(['category'])
                                ->published()
                                ->recent(3)
                                ->get();

        // Get stats for hero section
        $stats = [
            'total_articles' => Article::published()->count(),
            'categories' => ArticleCategory::active()->count(),
            'total_views' => Article::published()->sum('views_count'),
        ];

        return view('articles', compact('articles', 'categories', 'recentArticles', 'stats'));
    }

    /**
     * Display single article page
     * GET /articles/{slug}
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

        return view('articlespv', compact('article', 'relatedArticles'));
    }
}