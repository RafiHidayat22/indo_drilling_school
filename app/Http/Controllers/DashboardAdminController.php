<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        // Data dummy untuk statistik utama
        $stats = [
            'totalArticles' => 24,
            'newArticlesThisMonth' => 5,
            'totalPrograms' => 8,
            'activePrograms' => 8,
            'totalUsers' => 156,
            'newUsersThisWeek' => 12,
            'pendingInquiries' => 4,
            'unreadInquiries' => 1,
        ];

        // Data dummy untuk artikel terbaru
        $recentArticles = [
            [
                'title' => 'Pentingnya Keselamatan Kerja di Industri',
                'category' => 'HSE',
                'author' => 'Admin',
                'date' => '2 Nov 2025',
                'status' => 'Published',
                'statusClass' => 'bg-green-100 text-green-800',
                'colorClass' => 'from-green-500 to-green-600',
            ],
            [
                'title' => 'Tips Membangun Karir di HSE',
                'category' => 'Career',
                'author' => 'John Doe',
                'date' => '1 Nov 2025',
                'status' => 'Published',
                'statusClass' => 'bg-green-100 text-green-800',
                'colorClass' => 'from-blue-500 to-blue-600',
            ],
            [
                'title' => 'Sertifikasi ISO Terbaru 2025',
                'category' => 'Certification',
                'author' => 'Jane Smith',
                'date' => '31 Oct 2025',
                'status' => 'Draft',
                'statusClass' => 'bg-amber-100 text-amber-800',
                'colorClass' => 'from-purple-500 to-purple-600',
            ],
            [
                'title' => 'Panduan Lengkap AOSH Training',
                'category' => 'Training',
                'author' => 'Robert Johnson',
                'date' => '30 Oct 2025',
                'status' => 'Published',
                'statusClass' => 'bg-green-100 text-green-800',
                'colorClass' => 'from-indigo-500 to-indigo-600',
            ],
        ];

        // Data dummy untuk inquiry terbaru
        $recentInquiries = [
            [
                'name' => 'Ozan',
                'subject' => 'Training HSE untuk perusahaan',
                'time' => '17 menit yang lalu',
                'is_read' => false,
            ],
            [
                'name' => 'Ahmad Rizki',
                'subject' => 'Partnership program pelatihan',
                'time' => '1 jam yang lalu',
                'is_read' => true,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'subject' => 'Informasi sertifikasi AOSH',
                'time' => '3 jam yang lalu',
                'is_read' => true,
            ],
            [
                'name' => 'Budi Santoso',
                'subject' => 'Konsultasi HSE Management',
                'time' => '5 jam yang lalu',
                'is_read' => true,
            ],
        ];

        // Data dummy untuk artikel per kategori
        $articlesByCategory = [
            [
                'name' => 'Training',
                'count' => 8,
                'percentage' => 100,
                'colorClass' => 'bg-blue-600',
            ],
            [
                'name' => 'HSE',
                'count' => 6,
                'percentage' => 75,
                'colorClass' => 'bg-green-600',
            ],
            [
                'name' => 'Certification',
                'count' => 5,
                'percentage' => 62.5,
                'colorClass' => 'bg-purple-600',
            ],
            [
                'name' => 'Career',
                'count' => 3,
                'percentage' => 37.5,
                'colorClass' => 'bg-amber-600',
            ],
            [
                'name' => 'Teknik & Operasional',
                'count' => 2,
                'percentage' => 25,
                'colorClass' => 'bg-indigo-600',
            ],
        ];

        // Data dummy untuk aktivitas sistem
        $systemActivity = [
            [
                'icon' => '<svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-green-100',
                'description' => '<strong>Admin</strong> mempublikasikan artikel baru <strong>"Pentingnya Keselamatan Kerja"</strong>',
                'time' => '30 menit yang lalu',
            ],
            [
                'icon' => '<svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/></svg>',
                'iconBg' => 'bg-blue-100',
                'description' => 'User baru <strong>Sarah Johnson</strong> mendaftar untuk program AOSH',
                'time' => '1 jam yang lalu',
            ],
            [
                'icon' => '<svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-purple-100',
                'description' => 'Program baru <strong>"PT Safety Pro Training"</strong> ditambahkan',
                'time' => '2 jam yang lalu',
            ],
            [
                'icon' => '<svg class="w-4 h-4 text-amber-600" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>',
                'iconBg' => 'bg-amber-100',
                'description' => 'Inquiry baru dari <strong>PT Indo Mining</strong> tentang training HSE',
                'time' => '4 jam yang lalu',
            ],
            [
                'icon' => '<svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/></svg>',
                'iconBg' => 'bg-indigo-100',
                'description' => '<strong>John Doe</strong> memperbarui pengaturan sistem',
                'time' => '6 jam yang lalu',
            ],
        ];

        $pageTitle = 'Dashboard';

        return view('dashboardadmin', compact(
            'pageTitle',
            'stats',
            'recentArticles',
            'recentInquiries',
            'articlesByCategory',
            'systemActivity'
        ));
    }
}
