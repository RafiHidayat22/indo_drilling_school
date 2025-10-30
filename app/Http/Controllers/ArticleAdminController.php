<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleAdminController extends Controller
{
    public function index(Request $request)
    {
        // === DATA DUMMY (10 ARTIKEL) ===
        $dummyArticles = [
            ['title' => 'PWELADAHHH', 'category' => 'Training', 'author' => 'Admin', 'status' => 'Published', 'date' => '20 Jan 2024'],
            ['title' => 'Pentingnya HSE di Industri', 'category' => 'HSE', 'author' => 'John Doe', 'status' => 'Published', 'date' => '22 Jan 2024'],
            ['title' => 'Cara Mendapatkan Sertifikasi ISO', 'category' => 'Certification', 'author' => 'Jane Smith', 'status' => 'Published', 'date' => '25 Jan 2024'],
            ['title' => 'Tips Membangun Karir di HSE', 'category' => 'Career', 'author' => 'Robert Johnson', 'status' => 'Draft', 'date' => '28 Jan 2024'],
            ['title' => 'Berita Terkini Keselamatan Kerja', 'category' => 'News', 'author' => 'Emily Wilson', 'status' => 'Published', 'date' => '01 Feb 2024'],
            ['title' => 'Workshop Training Fire Safety', 'category' => 'Training', 'author' => 'Michael Brown', 'status' => 'Published', 'date' => '05 Feb 2024'],
            ['title' => 'Implementasi HSE Management System', 'category' => 'HSE', 'author' => 'Sarah Davis', 'status' => 'Draft', 'date' => '10 Feb 2024'],
            ['title' => 'Peluang Karir Safety Officer', 'category' => 'Career', 'author' => 'David Miller', 'status' => 'Published', 'date' => '15 Feb 2024'],
            ['title' => 'Standar Baru dalam Sertifikasi Lingkungan', 'category' => 'Certification', 'author' => 'Lisa Anderson', 'status' => 'Published', 'date' => '18 Feb 2024'],
            ['title' => 'Update Kebijakan K3 Nasional 2025', 'category' => 'News', 'author' => 'Admin', 'status' => 'Draft', 'date' => '22 Feb 2024'],
        ];

        // Konversi ke collection dan paginate manual
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 8;
        $currentItems = array_slice($dummyArticles, ($currentPage - 1) * $perPage, $perPage);
        $articles = new LengthAwarePaginator(
            $currentItems,
            count($dummyArticles),
            $perPage,
            $currentPage,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        // Kirim ke view
        return view('articleadmin', compact('articles'));
    }
}
