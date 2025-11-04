<?php

namespace App\Http\Controllers;

use App\Models\TrainingCategory; // Impor model TrainingCategory
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
        // Ambil semua kategori training yang aktif, diurutkan berdasarkan kolom 'order'
        // Anda bisa menambahkan filter lain jika diperlukan, misalnya hanya yang 'status' = 'active'
        $trainingCategories = TrainingCategory::where('status', 'active') // Filter berdasarkan status jika kolom 'status' digunakan
            ->orderBy('order') // Urutkan berdasarkan kolom 'order'
            ->get();

        // Return view 'home' dan kirimkan data $trainingCategories
        return view('home', compact('trainingCategories'));
    }
}
