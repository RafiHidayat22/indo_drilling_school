<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class AboutController extends Controller
{
    public function index()
    {
        // Ambil semua gambar ACTIVE, urutkan:
        // 1. featured (is_featured = 1) dulu → diurutkan berdasarkan `order`
        // 2. non-featured (is_featured = 0) berikutnya → juga diurutkan berdasarkan `order`
        $featuredImages = GalleryImage::active()
            ->orderBy('is_featured', 'desc')   // 1 = featured → muncul lebih dulu
            ->orderBy('order', 'asc')          // lalu urutkan berdasarkan `order` ASC
            ->take(6)
            ->get();

        return view('about', compact('featuredImages'));
    }
}
