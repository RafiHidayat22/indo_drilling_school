<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory;
use App\Models\Article; // Tambahkan import Article
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Ambil semua kategori training yang aktif
        $trainingCategories = TrainingCategory::where('status', 'active')
            ->orderBy('order')
            ->get();

        // Ambil 3 artikel terbaru yang sudah published
        $latestArticles = Article::with(['category', 'author'])
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(6)
            ->get();

        // Return view dengan data trainingCategories dan latestArticles
        return view('home', compact('trainingCategories', 'latestArticles'));
    }
}
