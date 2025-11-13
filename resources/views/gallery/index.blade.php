@extends('layouts.adminmain')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Gallery Management</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola foto dokumentasi training dan kegiatan</p>
                </div>
                <button onclick="galleryAdmin_openAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Gambar
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Images</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Active</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['active'] }}</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-red-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Featured</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['featured'] }}</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-full">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-amber-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Years</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">{{ $stats['years']->count() }}</p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-full">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <form method="GET" action="{{ route('galleryadmin.index') }}" class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari gambar..." class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <select name="year" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Tahun</option>
                    @foreach($stats['years'] as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                    @endforeach
                </select>
                <select name="status" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <button type="submit" class="px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm font-medium">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'year', 'status']))
                <a href="{{ route('galleryadmin.index') }}" class="px-4 py-2.5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition text-sm font-medium">
                    Reset
                </a>
                @endif
            </form>
        </div>

        <!-- Gallery Grid -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden p-6">
            <div class="mb-4">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Gambar Gallery</h2>
            </div>

            @if($images->count() > 0)
            <div id="galleryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($images as $image)
                <div class="gallery-item group relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                    data-id="{{ $image->id }}"
                    data-order="{{ $image->order }}">
                    <!-- Image Container -->
                    <div class="relative h-48 overflow-hidden bg-slate-100">
                        <!-- Drag Handle Icon -->
                        <div class="absolute top-2 right-2 cursor-move opacity-0 group-hover:opacity-100 transition-opacity z-10 p-1 bg-slate-200 rounded-full">
                            <svg class="w-4 h-4 text-slate-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                            </svg>
                        </div>
                        <img src="{{ asset('storage/' . $image->image_path) }}"
                            alt="{{ $image->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">

                        <!-- Overlay on hover -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <p class="text-white text-sm line-clamp-2">{{ $image->description }}</p>
                            </div>
                        </div>

                        <!-- Badges -->
                        <div class="absolute top-2 left-2 flex gap-2">
                            @if($image->is_featured)
                            <span class="px-2 py-1 bg-red-600 text-white text-xs font-semibold rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Featured
                            </span>
                            @endif
                            <span class="px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">
                                {{ $image->year }}
                            </span>
                        </div>

                        <!-- Status Badge -->
                        <div class="absolute top-2 right-2">
                            @if($image->is_active)
                            @if($image->is_featured)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-amber-500 to-red-500 text-white flex items-center gap-1">
                                <svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                Featured
                            </span>
                            @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                            @endif
                            @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-slate-200 text-slate-600 line-through">
                                Inactive
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-slate-800 mb-2 line-clamp-2">{{ $image->title }}</h3>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-slate-100">
                            <div class="flex gap-2">
                                <button onclick="galleryAdmin_viewImage({{ $image->id }})"
                                    class="p-2 text-slate-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                    title="View">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button onclick="galleryAdmin_editImage({{ $image->id }})"
                                    class="p-2 text-slate-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition"
                                    title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="galleryAdmin_deleteImage({{ $image->id }})"
                                    class="p-2 text-slate-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                                    title="Delete">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            <!-- 🔔 Tambahkan toggle Active & Featured di kanan -->
                            <div class="flex items-center gap-1">
                                <!-- Toggle Active -->
                                <button onclick="galleryAdmin_toggleActive({{ $image->id }})"
                                    class="p-2 {{ $image->is_active ? 'text-green-600 bg-green-50' : 'text-slate-400 hover:text-green-600 hover:bg-green-50' }} rounded-lg transition"
                                    title="Toggle Active">
                                    <svg class="w-5 h-5" fill="{{ $image->is_active ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <!-- Toggle Featured -->
                                <button onclick="galleryAdmin_toggleFeatured({{ $image->id }})"
                                    class="p-2 {{ $image->is_featured ? 'text-red-600 bg-red-50' : 'text-slate-400 hover:text-red-600 hover:bg-red-50' }} rounded-lg transition"
                                    title="Toggle Featured">
                                    <svg class="w-5 h-5" fill="{{ $image->is_featured ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                @if($images->hasPages())
                {{ $images->withQueryString()->links('pagination.custom') }}
                @endif
            </div>
            @else
            <div class="flex flex-col items-center justify-center py-16">
                <svg class="w-24 h-24 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-slate-500 text-lg font-medium">Tidak ada gambar ditemukan</p>
                <p class="text-slate-400 text-sm mt-1">Silakan tambah gambar baru atau ubah filter pencarian</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Tambah Gambar -->
<div id="addModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah Gambar Baru</h3>
                <button onclick="galleryAdmin_closeAddModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="addImageForm" class="p-6 space-y-6">
            @csrf
            <div class="space-y-4">

                <!-- Title -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Gambar *</label>
                    <input type="text" name="title" id="addTitle" placeholder="Masukkan judul gambar" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" required>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi *</label>
                    <textarea name="description" id="addDescription" rows="3" placeholder="Masukkan deskripsi gambar" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none" required></textarea>
                </div>

                <!-- Year -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun *</label>
                    <input type="number" name="year" id="addYear" min="2000" max="{{ date('Y') + 5 }}" value="{{ date('Y') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" required>
                </div>
                <!-- Order -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Urutan <span class="text-slate-500 font-normal">(opsional, default: 0)</span>
                    </label>
                    <input type="number" name="order" id="addOrder" min="0" value="0"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                    <p class="mt-1 text-xs text-slate-500">
                        📊 Semakin kecil angka, semakin awal tampil. Gambar dengan <strong>Active + Featured</strong> diurutkan berdasarkan angka ini.
                    </p>
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Gambar Baru *</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="imageAdd" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                            <img id="imagePreviewAdd" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            <div class="absolute inset-0 border-2 border-dashed border-purple-400 pointer-events-none"
                                style="aspect-ratio: 16/9;"></div>
                            <div id="imagePlaceholderAdd" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-12 h-12 mb-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload image</span></p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG, WEBP (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="imageAdd" name="image" class="hidden" accept="image/*" onchange="previewImage('Add')" required />
                        </label>
                    </div>
                </div>
                <!-- Di bawah upload image -->
                <div class="mt-2 text-xs text-slate-500">
                    <p>🖼️ Rekomendasi: gunakan gambar landscape (16:9) seperti <code>1920×1080</code> agar tampil optimal di slider.</p>
                    <p>✅ Gambar portrait atau persegi tetap bisa diupload — sistem akan crop otomatis.</p>
                </div>

                <!-- Featured & Active -->
                <!-- Featured & Active -->
                <div class="flex items-center gap-4">
                    <!-- Featured -->
                    <label class="flex items-center cursor-pointer">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" id="addIsFeatured" name="is_featured" value="1"
                            class="w-5 h-5 text-amber-600 border-slate-300 rounded focus:ring-amber-500">
                        <span class="ml-3 text-sm font-medium text-slate-700">Featured</span>
                    </label>
                    <!-- Active -->
                    <label class="flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" id="addIsActive" name="is_active" value="1"
                            class="w-5 h-5 text-green-600 border-slate-300 rounded focus:ring-green-500"
                            checked>
                        <span class="ml-3 text-sm font-medium text-slate-700">Active</span>
                    </label>
                </div>

            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="galleryAdmin_closeAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition duration-200 shadow-lg hover:shadow-xl">
                    Tambah Gambar
                </button>
            </div>
        </form>
    </div>
</div>
<!-- Modal Edit Gambar -->
<!-- Modal Edit Gambar -->
<div id="editModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-start justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Gambar</h3>
                <button onclick="galleryAdmin_closeEditModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="editImageForm" class="p-6 space-y-6">
            @csrf
            <input type="hidden" name="id" id="editImageId">

            <div class="space-y-4">

                <!-- Title -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Gambar *</label>
                    <input type="text" name="title" id="editTitle" placeholder="Masukkan judul gambar" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" required>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi *</label>
                    <textarea name="description" id="editDescription" rows="3" placeholder="Masukkan deskripsi gambar" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm resize-none" required></textarea>
                </div>

                <!-- Year -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun *</label>
                    <input type="number" name="year" id="editYear" min="2000" max="{{ date('Y') + 5 }}" value="{{ date('Y') }}" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm" required>
                </div>
                <!-- Order -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan</label>
                    <input type="number" name="order" id="editOrder" min="0" value="0" class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm">
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Gambar Baru (opsional)</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="imageEdit" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                            <img id="imagePreviewEdit" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            <div class="absolute inset-0 border-2 border-dashed border-purple-400 pointer-events-none"
                                style="aspect-ratio: 16/9;"></div>
                            <div id="imagePlaceholderEdit" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-12 h-12 mb-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload new image</span></p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG, WEBP (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="imageEdit" name="image" class="hidden" accept="image/*" onchange="previewImage('Edit')" />
                        </label>
                    </div>
                </div>
                <!-- Di bawah upload image -->
                <div class="mt-2 text-xs text-slate-500">
                    <p>🖼️ Rekomendasi: gunakan gambar landscape (16:9) seperti <code>1920×1080</code> agar tampil optimal di slider.</p>
                    <p>✅ Gambar portrait atau persegi tetap bisa diupload — sistem akan crop otomatis.</p>
                </div>

                <!-- Active & Featured -->
                <div class="space-y-3">
                    <!-- Active -->
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" id="editIsActive" name="is_active" value="1"
                                class="w-5 h-5 mt-1 text-green-600 border-slate-300 rounded focus:ring-green-500">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-medium text-slate-800">Active</span>
                                    <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded-full">Wajib</span>
                                </div>
                                <p class="mt-1 text-sm text-slate-600">
                                    Gambar <strong>harus aktif</strong> agar bisa muncul di landing page.
                                    Jika tidak aktif, gambar hanya tersimpan di database.
                                </p>
                            </div>
                        </label>
                    </div>

                    <!-- Featured -->
                    <div class="bg-slate-50 p-4 rounded-lg border border-slate-200">
                        <label class="flex items-start gap-3 cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" id="editIsFeatured" name="is_featured" value="1"
                                class="w-5 h-5 mt-1 text-amber-600 border-slate-300 rounded focus:ring-amber-500">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-medium text-slate-800">Featured</span>
                                    <span class="px-2 py-0.5 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">Slider Utama</span>
                                </div>
                                <p class="mt-1 text-sm text-slate-600">
                                    Hanya gambar yang <strong>Active + Featured</strong> yang ditampilkan di slider utama.
                                    Jika tidak aktif, status Featured tidak berpengaruh.
                                </p>
                            </div>
                        </label>
                    </div>

                    <!-- Combined Info -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 text-sm text-blue-800">
                        <div class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span>
                                <strong>Contoh alur tampil:</strong><br>
                                • <span class="font-mono">Active + Featured</span> → slider utama (urut: <code>order ASC</code>)<br>
                                • <span class="font-mono">Active, tidak Featured</span> → hanya muncul jika <em>tidak ada</em> gambar yang Featured<br>
                                • <span class="font-mono">Inactive</span> → tidak pernah muncul
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="galleryAdmin_closeEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition duration-200 shadow-lg hover:shadow-xl">
                    Update Gambar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal View Image -->
<div id="viewModal" class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <div class="bg-gradient-to-r from-slate-700 to-slate-800 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Detail Gambar</h3>
                <button onclick="galleryAdmin_closeViewModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="mb-6">
                <img id="viewImage" src="" alt="" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Judul</label>
                    <p id="viewTitle" class="text-lg font-semibold text-slate-800"></p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Deskripsi</label>
                    <p id="viewDescription" class="text-slate-700"></p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1">Tahun</label>
                        <p id="viewYear" class="text-slate-800"></p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1">Urutan</label>
                        <p id="viewOrder" class="text-slate-800"></p>
                    </div>
                </div>
                <div class="flex gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1">Status</label>
                        <span id="viewStatus" class="px-3 py-1 text-xs font-semibold rounded-full"></span>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-1">Featured</label>
                        <span id="viewFeatured" class="px-3 py-1 text-xs font-semibold rounded-full"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-slate-600 text-center mb-6">Apakah Anda yakin ingin menghapus gambar ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button type="button" onclick="galleryAdmin_closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Global variable untuk delete
    let imageToDelete = null;

    // Modal Functions
    function galleryAdmin_openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addImageForm').reset();
        galleryAdmin_resetImagePreview('Add');
    }

    function galleryAdmin_closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addImageForm').reset();
        galleryAdmin_resetImagePreview('Add');
    }

    function galleryAdmin_closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editImageForm').reset();
        galleryAdmin_resetImagePreview('Edit');
    }

    function galleryAdmin_closeViewModal() {
        document.getElementById('viewModal').classList.add('hidden');
    }

    function galleryAdmin_closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        imageToDelete = null; // Reset
    }

    // Image Preview
    function previewImage(modalType) {
        const fileInput = document.getElementById('image' + modalType);
        const preview = document.getElementById('imagePreview' + modalType);
        const placeholder = document.getElementById('imagePlaceholder' + modalType);

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }

    function galleryAdmin_resetImagePreview(modalType) {
        const fileInput = document.getElementById('image' + modalType);
        const preview = document.getElementById('imagePreview' + modalType);
        const placeholder = document.getElementById('imagePlaceholder' + modalType);

        if (fileInput) fileInput.value = '';
        if (preview) {
            preview.classList.add('hidden');
            preview.src = '';
        }
        if (placeholder) placeholder.classList.remove('hidden');
    }

    // Add Image
    document.getElementById('addImageForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

        try {
            const response = await fetch('/gallery', { // ⚠️ FIX: /gallery bukan /galleryadmin
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                galleryAdmin_showNotification('success', data.message || 'Gambar berhasil ditambahkan');
                galleryAdmin_closeAddModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // Edit Image - Fetch & Show Modal
    async function galleryAdmin_editImage(id) {
        try {
            const response = await fetch(`/gallery/${id}`, { // ⚠️ FIX: /gallery/{id}
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const result = await response.json();

            if (response.ok) {
                const image = result.data;
                document.getElementById('editImageId').value = image.id;
                document.getElementById('editTitle').value = image.title;
                document.getElementById('editDescription').value = image.description;
                document.getElementById('editYear').value = image.year;
                document.getElementById('editOrder').value = image.order;
                document.getElementById('editIsFeatured').checked = image.is_featured;
                document.getElementById('editIsActive').checked = image.is_active;

                if (image.image_path) {
                    const preview = document.getElementById('imagePreviewEdit');
                    const placeholder = document.getElementById('imagePlaceholderEdit');
                    preview.src = `/storage/${image.image_path}`;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }

                document.getElementById('editModal').classList.remove('hidden');
            } else {
                throw new Error(result.message || 'Gagal memuat data gambar');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        }
    }

    // Submit Edit Form
    document.getElementById('editImageForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const imageId = document.getElementById('editImageId').value;
        const formData = new FormData(this);
        formData.append('_method', 'PUT');

        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

        try {
            const response = await fetch(`/gallery/${imageId}`, { // ⚠️ FIX: /gallery/{id}
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const data = await response.json();

            if (response.ok) {
                galleryAdmin_showNotification('success', data.message || 'Gambar berhasil diupdate');
                galleryAdmin_closeEditModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // View Image
    async function galleryAdmin_viewImage(id) {
        try {
            const response = await fetch(`/gallery/${id}`, { // ⚠️ FIX: /gallery/{id}
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            const result = await response.json();

            if (response.ok) {
                const image = result.data;
                document.getElementById('viewImage').src = `/storage/${image.image_path}`;
                document.getElementById('viewImage').alt = image.title;
                document.getElementById('viewTitle').textContent = image.title;
                document.getElementById('viewDescription').textContent = image.description;
                document.getElementById('viewYear').textContent = image.year;
                document.getElementById('viewOrder').textContent = image.order;

                const statusBadge = document.getElementById('viewStatus');
                statusBadge.textContent = image.is_active ? 'Active' : 'Inactive';
                statusBadge.className = `px-3 py-1 text-xs font-semibold rounded-full ${image.is_active ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-800'}`;

                const featuredBadge = document.getElementById('viewFeatured');
                featuredBadge.textContent = image.is_featured ? 'Yes' : 'No';
                featuredBadge.className = `px-3 py-1 text-xs font-semibold rounded-full ${image.is_featured ? 'bg-red-100 text-red-800' : 'bg-slate-100 text-slate-800'}`;

                document.getElementById('viewModal').classList.remove('hidden');
            } else {
                throw new Error(result.message || 'Gagal memuat data gambar');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        }
    }

    // Delete Image - Set ID & Open Modal
    function galleryAdmin_deleteImage(id) {
        imageToDelete = id; // ✅ Sudah diinisialisasi di atas
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    // Confirm Delete
    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!imageToDelete) return;

        const btn = this;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

        try {
            const response = await fetch(`/gallery/${imageToDelete}`, { // ⚠️ FIX: /gallery/{id}
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            });

            const data = await response.json();

            if (response.ok) {
                galleryAdmin_showNotification('success', data.message || 'Gambar berhasil dihapus');
                galleryAdmin_closeDeleteModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
            imageToDelete = null; // Reset
        }
    });
    // Toggle Active — ✅ Baru ditambahkan
    async function galleryAdmin_toggleActive(id) {
        try {
            const response = await fetch(`/gallery/${id}/toggle-active`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            });
            const data = await response.json();
            if (response.ok) {
                // ✅ Update UI langsung tanpa reload
                const card = document.querySelector(`.gallery-item[data-id="${id}"]`);
                if (card) {
                    // Toggle status badge
                    const statusBadge = card.querySelector('.absolute.top-2.right-2 span');
                    if (data.is_active) {
                        statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800';
                        statusBadge.textContent = 'Active';
                        // Toggle tombol active
                        const toggleBtn = card.querySelector('button[onclick*="toggleActive"]');
                        if (toggleBtn) {
                            toggleBtn.classList.remove('text-slate-400', 'hover:text-green-600', 'hover:bg-green-50');
                            toggleBtn.classList.add('text-green-600', 'bg-green-50');
                            toggleBtn.querySelector('svg').setAttribute('fill', 'currentColor');
                        }
                    } else {
                        statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-slate-200 text-slate-600 line-through';
                        statusBadge.textContent = 'Inactive';
                        // Toggle tombol active
                        const toggleBtn = card.querySelector('button[onclick*="toggleActive"]');
                        if (toggleBtn) {
                            toggleBtn.classList.remove('text-green-600', 'bg-green-50');
                            toggleBtn.classList.add('text-slate-400', 'hover:text-green-600', 'hover:bg-green-50');
                            toggleBtn.querySelector('svg').setAttribute('fill', 'none');
                        }
                    }
                }
                galleryAdmin_showNotification('success', data.message);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        }
    }

    // Toggle Featured — ✅ Perbarui agar update UI langsung
    async function galleryAdmin_toggleFeatured(id) {
        try {
            const response = await fetch(`/gallery/${id}/toggle-featured`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            });
            const data = await response.json();
            if (response.ok) {
                // ✅ Update UI langsung
                const card = document.querySelector(`.gallery-item[data-id="${id}"]`);
                if (card) {
                    // Toggle featured badge (atas kiri)
                    const featuredBadges = card.querySelectorAll('.absolute.top-2.left-2 span');
                    featuredBadges.forEach(badge => {
                        if (badge.textContent.trim().includes('Featured')) {
                            badge.classList.toggle('bg-red-600', data.is_featured);
                            badge.classList.toggle('text-white', data.is_featured);
                            badge.classList.toggle('bg-slate-600', !data.is_featured);
                            badge.classList.toggle('text-slate-200', !data.is_featured);
                        }
                    });

                    // Toggle tombol featured (kanan)
                    const toggleBtn = card.querySelector('button[onclick*="toggleFeatured"]');
                    if (toggleBtn) {
                        toggleBtn.classList.toggle('text-red-600', data.is_featured);
                        toggleBtn.classList.toggle('bg-red-50', data.is_featured);
                        toggleBtn.classList.toggle('text-slate-400', !data.is_featured);
                        toggleBtn.classList.toggle('hover:text-red-600', !data.is_featured);
                        toggleBtn.classList.toggle('hover:bg-red-50', !data.is_featured);
                        toggleBtn.querySelector('svg').setAttribute('fill', data.is_featured ? 'currentColor' : 'none');
                    }

                    // Update status badge jika featured berubah (karena ada kondisi khusus featured+active)
                    const statusBadge = card.querySelector('.absolute.top-2.right-2 span');
                    const isActive = statusBadge?.textContent?.trim() === 'Active' ||
                        statusBadge?.classList.contains('bg-gradient-to-r');
                    if (data.is_featured && isActive) {
                        statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-gradient-to-r from-amber-500 to-red-500 text-white flex items-center gap-1';
                        statusBadge.innerHTML = `<svg class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg> Featured`;
                    } else if (!data.is_featured && isActive) {
                        statusBadge.className = 'px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800';
                        statusBadge.textContent = 'Active';
                    }
                }
                galleryAdmin_showNotification('success', data.message);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            galleryAdmin_showNotification('error', error.message);
        }
    }

    // Notification Function
    function galleryAdmin_showNotification(type, message) {
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const icon = type === 'success' ?
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';

        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 z-[9999] animate-slide-in`;
        notification.innerHTML = `${icon}<span class="font-medium">${message}</span>`;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slide-out 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add CSS for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-out {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    `;
    document.head.appendChild(style);
    document.addEventListener('DOMContentLoaded', function() {
        const galleryGrid = document.getElementById('galleryGrid');
        if (!galleryGrid) return;

        // Inisialisasi Sortable
        new Sortable(galleryGrid, {
            animation: 150,
            handle: '.cursor-move', // hanya bisa di-drag dari ikon drag handle
            onEnd: async function(evt) {
                // Ambil urutan baru berdasarkan DOM
                const newOrder = Array.from(galleryGrid.children).map(el => el.dataset.id);

                // Kirim ke server
                try {
                    const res = await fetch('{{ route("galleryadmin.reorder") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: newOrder
                        })
                    });

                    if (!res.ok) throw new Error('Gagal menyimpan urutan');

                    // Beri feedback
                    galleryAdmin_showNotification('success', 'Urutan berhasil diupdate');

                    // Optional: reload halaman agar data terbaru muncul
                    // setTimeout(() => location.reload(), 1000);

                } catch (e) {
                    galleryAdmin_showNotification('error', e.message);
                }
            }
        });
    });
</script>

@endsection