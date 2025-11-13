<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ContactInquiry;
use App\Models\User;
use App\Models\TrainingCategory;
use App\Models\GalleryImage;
use App\Models\Project;
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

        // Get recent projects
        $recentProjects = $this->getRecentProjects();

        // Get projects by status
        $projectsByStatus = $this->getProjectsByStatus();

        // Get recent gallery images
        $recentGalleryImages = $this->getRecentGalleryImages();

        return view('dashboardadmin', compact(
            'pageTitle',
            'stats',
            'recentArticles',
            'recentInquiries',
            'articlesByCategory',
            'systemActivity',
            'recentProjects',
            'projectsByStatus',
            'recentGalleryImages'
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

            // Projects
            'totalProjects' => Project::count(),
            'activeProjects' => Project::where('status', 'ongoing')->count(),
            'completedProjects' => Project::where('status', 'completed')->count(),
            'featuredProjects' => Project::where('is_featured', true)->count(),

            // Gallery
            'totalGalleryImages' => GalleryImage::count(),
            'activeGalleryImages' => GalleryImage::where('is_active', true)->count(),
            'featuredGalleryImages' => GalleryImage::where('is_featured', true)->count(),
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

        return $articles->map(function ($article, $index) use ($colorClasses) {
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
        return match ($status) {
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

        return $inquiries->map(function ($inquiry) {
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
        return match ($subject) {
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

        return $categories->map(function ($category, $index) use ($totalArticles, $colorClasses) {
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

        // Recent project
        $recentProject = Project::latest('created_at')->first();

        if ($recentProject) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-cyan-600" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/></svg>',
                'iconBg' => 'bg-cyan-100',
                'description' => 'Project baru <strong>' . \Illuminate\Support\Str::limit($recentProject->title, 30) . '</strong> ditambahkan',
                'time' => $recentProject->created_at->diffForHumans(),
            ];
        }

        // Recent gallery image
        $recentGallery = GalleryImage::latest('created_at')->first();

        if ($recentGallery) {
            $activities[] = [
                'icon' => '<svg class="w-4 h-4 text-pink-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-pink-100',
                'description' => 'Gambar baru <strong>' . \Illuminate\Support\Str::limit($recentGallery->title, 30) . '</strong> ditambahkan ke galeri',
                'time' => $recentGallery->created_at->diffForHumans(),
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

        // Limit to 6 activities
        return array_slice($activities, 0, 6);
    }

    /**
     * Get recent projects
     */
    private function getRecentProjects()
    {
        $projects = Project::latest('created_at')
            ->take(4)
            ->get();

        return $projects->map(function ($project) {
            return [
                'id' => $project->id,
                'title' => $project->title,
                'client' => $project->client,
                'status' => ucfirst($project->status),
                'statusClass' => $this->getProjectStatusClass($project->status),
                'category' => ucfirst($project->category),
                'categoryClass' => $this->getProjectCategoryClass($project->category),
                'date' => $project->created_at->diffForHumans(),
                'is_featured' => $project->is_featured,
            ];
        })->toArray();
    }

    /**
     * Get project status badge class
     */
    private function getProjectStatusClass($status)
    {
        return match ($status) {
            'ongoing' => 'bg-blue-100 text-blue-800',
            'completed' => 'bg-green-100 text-green-800',
            'planning' => 'bg-yellow-100 text-yellow-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get project category badge class
     */
    private function getProjectCategoryClass($category)
    {
        return match ($category) {
            'drilling' => 'bg-red-100 text-red-800',
            'safety' => 'bg-yellow-100 text-yellow-800',
            'certification' => 'bg-blue-100 text-blue-800',
            'training' => 'bg-purple-100 text-purple-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    /**
     * Get projects by status for chart
     */
    private function getProjectsByStatus()
    {
        $statuses = ['ongoing', 'completed', 'planning'];
        $projectsData = [];

        foreach ($statuses as $status) {
            $count = Project::where('status', $status)->count();
            if ($count > 0) {
                $projectsData[] = [
                    'status' => ucfirst($status),
                    'count' => $count,
                    'colorClass' => $this->getProjectStatusClass($status),
                ];
            }
        }

        return $projectsData;
    }

    /**
     * Get recent gallery images
     */
    private function getRecentGalleryImages()
    {
        $images = GalleryImage::active()
            ->latest('created_at')
            ->take(6)
            ->get();

        return $images->map(function ($image) {
            return [
                'id' => $image->id,
                'title' => $image->title,
                'year' => $image->year,
                'image_url' => $image->image_url,
                'is_featured' => $image->is_featured,
                'date' => $image->created_at->diffForHumans(),
            ];
        })->toArray();
    }
}
