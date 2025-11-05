<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ContactInquiry;
use App\Models\User;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $pageTitle = 'Dashboard Admin';
        
        // Get statistics
        $stats = $this->getStatistics();
        
        // Get recent articles (5 latest)
        $recentArticles = $this->getRecentArticles();
        
        // Get recent inquiries (5 latest)
        $recentInquiries = $this->getRecentInquiries();
        
        // Get articles by category for chart
        $articlesByCategory = $this->getArticlesByCategory();
        
        // Get system activity
        $systemActivity = $this->getSystemActivity();

        return view('dashboardadmin', compact(
            'pageTitle',
            'stats',
            'recentArticles',
            'recentInquiries',
            'articlesByCategory',
            'systemActivity'
        ));
    }

    /**
     * Get dashboard statistics
     */
    private function getStatistics()
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $startOfWeek = $now->copy()->startOfWeek();

        return [
            // Articles
            'totalArticles' => Article::count(),
            'newArticlesThisMonth' => Article::where('created_at', '>=', $startOfMonth)->count(),
            
            // Programs (Training Categories)
            'totalPrograms' => TrainingCategory::count(),
            'activePrograms' => TrainingCategory::where('status', 'Active')->count(),
            
            // Users
            'totalUsers' => User::count(),
            'newUsersThisWeek' => User::where('created_at', '>=', $startOfWeek)->count(),
            
            // Inquiries
            'pendingInquiries' => ContactInquiry::whereNull('read_at')->count(),
            'unreadInquiries' => ContactInquiry::unread()->count(),
        ];
    }

    /**
     * Get recent articles with formatted data
     */
    private function getRecentArticles()
    {
        $articles = Article::with(['category', 'author'])
            ->latest('created_at')
            ->take(5)
            ->get();

        $colorClasses = [
            'from-purple-500 to-pink-500',
            'from-blue-500 to-cyan-500',
            'from-green-500 to-emerald-500',
            'from-orange-500 to-red-500',
            'from-indigo-500 to-purple-500',
        ];

        return $articles->map(function($article, $index) use ($colorClasses) {
            return [
                'id' => $article->id,
                'title' => $article->title,
                'category' => $article->category->name ?? 'Uncategorized',
                'author' => $article->author->name ?? 'Unknown',
                'date' => $article->created_at->diffForHumans(),
                'status' => ucfirst($article->status),
                'statusClass' => $this->getStatusClass($article->status),
                'colorClass' => $colorClasses[$index % count($colorClasses)],
            ];
        })->toArray();
    }

    /**
     * Get status badge class
     */
    private function getStatusClass($status)
    {
        return match($status) {
            'published' => 'bg-green-100 text-green-800',
            'draft' => 'bg-yellow-100 text-yellow-800',
            'archived' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get recent inquiries
     */
    private function getRecentInquiries()
    {
        $inquiries = ContactInquiry::latest('created_at')
            ->take(5)
            ->get();

        return $inquiries->map(function($inquiry) {
            return [
                'id' => $inquiry->id,
                'name' => $inquiry->full_name,
                'subject' => $this->getSubjectLabel($inquiry->subject),
                'time' => $inquiry->created_at->diffForHumans(),
                'is_read' => !is_null($inquiry->read_at),
            ];
        })->toArray();
    }

    /**
     * Get subject label in Indonesian
     */
    private function getSubjectLabel($subject)
    {
        return match($subject) {
            'training' => 'Pelatihan',
            'partnership' => 'Kemitraan',
            'certification' => 'Sertifikasi',
            'consultation' => 'Konsultasi',
            'other' => 'Lainnya',
            default => ucfirst($subject),
        };
    }

    /**
     * Get articles grouped by category for chart
     */
    private function getArticlesByCategory()
    {
        $categories = ArticleCategory::withCount('articles')
            ->having('articles_count', '>', 0)
            ->orderBy('articles_count', 'desc')
            ->take(6)
            ->get();

        $totalArticles = $categories->sum('articles_count');

        $colorClasses = [
            'bg-purple-500',
            'bg-blue-500',
            'bg-green-500',
            'bg-yellow-500',
            'bg-red-500',
            'bg-indigo-500',
        ];

        return $categories->map(function($category, $index) use ($totalArticles, $colorClasses) {
            $percentage = $totalArticles > 0 ? ($category->articles_count / $totalArticles) * 100 : 0;
            
            return [
                'name' => $category->name,
                'count' => $category->articles_count,
                'percentage' => round($percentage, 1),
                'colorClass' => $colorClasses[$index % count($colorClasses)],
            ];
        })->toArray();
    }

    /**
     * Get system activity (recent activities)
     */
    private function getSystemActivity()
    {
        $activities = [];

        // Recent articles
        $recentArticle = Article::with('author')
            ->latest('created_at')
            ->first();
        
        if ($recentArticle) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-purple-100',
                'description' => '<strong>' . ($recentArticle->author->name ?? 'User') . '</strong> menambahkan artikel baru',
                'time' => $recentArticle->created_at->diffForHumans(),
            ];
        }

        // Recent inquiries
        $recentInquiry = ContactInquiry::latest('created_at')->first();
        
        if ($recentInquiry) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>',
                'iconBg' => 'bg-blue-100',
                'description' => 'Inquiry baru dari <strong>' . $recentInquiry->full_name . '</strong>',
                'time' => $recentInquiry->created_at->diffForHumans(),
            ];
        }

        // Recent users
        $recentUser = User::latest('created_at')
            ->where('id', '!=', auth()->id())
            ->first();
        
        if ($recentUser) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/></svg>',
                'iconBg' => 'bg-green-100',
                'description' => 'User baru <strong>' . $recentUser->name . '</strong> terdaftar',
                'time' => $recentUser->created_at->diffForHumans(),
            ];
        }

        // Recent published article
        $recentPublished = Article::with('author')
            ->where('status', 'published')
            ->latest('published_at')
            ->first();
        
        if ($recentPublished && $recentPublished->id !== ($recentArticle->id ?? null)) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-indigo-100',
                'description' => 'Artikel <strong>' . \Illuminate\Support\Str::limit($recentPublished->title, 30) . '</strong> dipublikasikan',
                'time' => $recentPublished->published_at->diffForHumans(),
            ];
        }

        // Limit to 5 activities
        return array_slice($activities, 0, 5);
    }
}