@extends('layouts.adminmain')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Article Management</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola artikel dan konten website</p>
                </div>
                <button onclick="openAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Artikel
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500 stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Articles</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">24</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full stats-icon">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500 stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Published</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">18</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full stats-icon">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-amber-500 stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Draft</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">6</p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-full stats-icon">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500 stats-card">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Categories</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2">5</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full stats-icon">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6 filter-section">
            <div class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[250px] search-box-wrapper">
                    <div class="relative">
                        <input type="text" placeholder="Cari artikel..." class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <select class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm category-select">
                    <option value="">Semua Kategori</option>
                    <option value="training">Training</option>
                    <option value="hse">HSE</option>
                    <option value="certification">Certification</option>
                    <option value="career">Career</option>
                    <option value="news">News</option>
                    <option value="other">Lainya..</option>
                </select>
                <select class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                    <option value="">Semua Status</option>
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Artikel</h2>
            </div>
            <div class="overflow-x-auto table-responsive">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Judul</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Author</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-slate-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($articles ?? [] as $index => $article)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                {{ ($articles->currentPage() - 1) * $articles->perPage() + $index + 1 }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-900 max-w-xs truncate">{{ $article->title ?? $article['title'] }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ 'category-badge-' . strtolower($article->category ?? $article['category']) }}">
                                    {{ $article->category ?? $article['category'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">{{ $article->author ?? $article['author'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        @if(($article->status ?? $article['status']) === 'Published') bg-green-100 text-green-800
                                        @else bg-amber-100 text-amber-800 @endif">
                                    {{ $article->status ?? $article['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                {{ ($article->created_at ?? $article['date']) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <!-- tombol aksi tetap sama -->
                                <button data-action="view" class="text-slate-600 hover:text-slate-900 mr-3 transition action-btn" title="View">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button data-action="edit" class="text-blue-600 hover:text-blue-900 mr-3 transition action-btn" title="Edit">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button data-action="delete" class="text-red-600 hover:text-red-900 transition action-btn" title="Delete">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-slate-500">Tidak ada artikel ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination (akan diganti dengan custom view) -->
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                @if(isset($articles) && $articles->isNotEmpty())
                {{ $articles->withQueryString()->links('pagination.custom') }}
                @else
                <!-- TAMPILAN STATIS (HANYA UNTUK PREVIEW) -->
                <div class="flex items-center justify-between">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-semibold">1</span> sampai <span class="font-semibold">8</span> dari <span class="font-semibold">10</span> artikel
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-2 bg-slate-100 text-slate-400 rounded-lg cursor-not-allowed">Previous</button>
                        <button class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium">1</button>
                        <button class="px-4 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200">2</button>
                        <button class="px-3 py-2 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200">Next</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Artikel -->
<div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full my-8 transform transition-all modal-content">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah Artikel Baru</h3>
                <button onclick="closeAddModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Artikel *</label>
                    <input type="text" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Masukkan judul artikel">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                    <select required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition category-select">
                        <option value="">Pilih Kategori</option>
                        <option value="training">Training</option>
                        <option value="hse">HSE</option>
                        <option value="certification">Certification</option>
                        <option value="career">Career</option>
                        <option value="news">News</option>
                        <option value="other">Lainya..</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Publikasi *</label>
                    <select required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="draft">Draft</option>
                        <option value="published">Publish</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Thumbnail / Featured Image</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnailAdd" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative">
                            <!-- Preview Image (sembunyikan awalnya) -->
                            <img id="thumbnailPreviewAdd" class="hidden w-full h-full object-cover rounded-lg" alt="Preview">

                            <!-- Placeholder -->
                            <div id="thumbnailPlaceholderAdd" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>

                            <!-- Input file (sembunyikan) -->
                            <input
                                type="file"
                                id="thumbnailAdd"
                                name="thumbnail"
                                class="hidden"
                                accept="image/*"
                                onchange="previewThumbnail('Add')" />
                        </label>
                    </div>
                </div>

                <!-- Konten Artikel -->
                <!-- Konten Artikel - MODAL TAMBAH -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Konten Artikel <span class="text-red-500">*</span>
                    </label>
                    <div class="border border-slate-300 rounded-lg overflow-hidden bg-white">
                        <div id="editorAdd" class="min-h-[400px]"></div>
                    </div>
                    <input type="hidden" name="content" id="contentAddInput">
                    <p class="mt-1.5 text-xs text-slate-500">Minimal 100 karakter</p>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button
                    type="button"
                    onclick="closeAddModal()"
                    class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button
                    type="submit"
                    class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition duration-200 shadow-lg hover:shadow-xl">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Artikel -->
<!-- Modal Edit Artikel -->
<div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full my-8 transform transition-all modal-content">

        <!-- Header Modal -->
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Artikel</h3>
                <button onclick="closeEditModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Form Content -->
        <form id="editArticleForm" class="p-6">
            <div class="space-y-6">

                <!-- Judul Artikel -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Judul Artikel <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="title"
                        value="Panduan Lengkap Training K3"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <!-- Kategori & Status (Grid 2 Kolom) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select
                            name="category"
                            required
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition category-select">
                            <option value="">Pilih Kategori</option>
                            <option value="training" selected>Training</option>
                            <option value="hse">HSE</option>
                            <option value="certification">Certification</option>
                            <option value="career">Career</option>
                            <option value="news">News</option>
                            <option value="other">Lainnya..</option>
                        </select>
                    </div>

                    <!-- Status Publikasi -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Status Publikasi <span class="text-red-500">*</span>
                        </label>
                        <select
                            name="status"
                            required
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                            <option value="draft">Draft</option>
                            <option value="published" selected>Publish</option>
                        </select>
                    </div>
                </div>

                <!-- Thumbnail / Featured Image -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Thumbnail / Featured Image
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnailEdit" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">

                            <!-- Preview Image -->
                            <img
                                id="thumbnailPreviewEdit"
                                class="hidden absolute inset-0 w-full h-full object-cover"
                                alt="Preview">

                            <!-- Placeholder -->
                            <div id="thumbnailPlaceholderEdit" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500">
                                    <span class="font-semibold">Click to upload new image</span>
                                </p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>

                            <input
                                type="file"
                                id="thumbnailEdit"
                                name="thumbnail"
                                class="hidden"
                                accept="image/*"
                                onchange="previewThumbnail('Edit')" />
                        </label>
                    </div>
                </div>

                <!-- Konten Artikel -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Konten Artikel <span class="text-red-500">*</span>
                    </label>
                    <div class="border border-slate-300 rounded-lg overflow-hidden bg-white">
                        <div id="editorEdit" class="min-h-[400px]">
                            Konten artikel yang sedang diedit...
                        </div>
                    </div>
                    <input type="hidden" name="content" id="contentEditInput">
                    <p class="mt-2 text-xs text-slate-500">Minimal 100 karakter</p>
                </div>

            </div>
        </form>

        <!-- Action Buttons -->
        <div class="flex gap-3 px-6 py-4 bg-slate-50 border-t border-slate-200 rounded-b-2xl">
            <button
                type="button"
                onclick="closeEditModal()"
                class="flex-1 px-6 py-3 bg-white border-2 border-slate-300 text-slate-700 rounded-lg font-semibold hover:bg-slate-50 transition duration-200">
                Batal
            </button>
            <button
                type="submit"
                form="editArticleForm"
                class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition duration-200 shadow-lg hover:shadow-xl">
                Update Artikel
            </button>
        </div>

    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
            <p class="text-slate-600 text-center mb-6">Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="button" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition">Hapus</button>
            </div>
        </div>
    </div>
</div>
<script>
    function previewThumbnail(modalType) {
        const fileInput = document.getElementById('thumbnail' + modalType);
        const preview = document.getElementById('thumbnailPreview' + modalType);
        const placeholder = document.getElementById('thumbnailPlaceholder' + modalType);

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            // Jika tidak ada file (misal: reset), kembalikan ke placeholder
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        }
    }

    // Opsional: Reset preview saat modal ditutup
    function closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        resetThumbnailPreview('Add');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        resetThumbnailPreview('Edit');
    }

    function resetThumbnailPreview(modalType) {
        const fileInput = document.getElementById('thumbnail' + modalType);
        const preview = document.getElementById('thumbnailPreview' + modalType);
        const placeholder = document.getElementById('thumbnailPlaceholder' + modalType);

        fileInput.value = ''; // Reset input file
        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');
    }
</script>
@endsection