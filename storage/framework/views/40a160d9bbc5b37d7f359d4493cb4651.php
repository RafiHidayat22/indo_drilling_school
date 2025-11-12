<?php $__env->startSection('content'); ?>

<!-- Quill CSS -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Article Management</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola artikel dan konten website</p>
                </div>
                <button onclick="articleAdmin_openAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Artikel
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Total Articles</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($stats['total']); ?></p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-full">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Published</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($stats['published']); ?></p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-full">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-amber-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Draft</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($stats['draft']); ?></p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-full">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Categories</p>
                        <p class="text-3xl font-bold text-slate-800 mt-2"><?php echo e($stats['categories']); ?></p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <form method="GET" action="<?php echo e(route('articleadmin.index')); ?>" class="flex flex-wrap items-center gap-4">
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari artikel..." class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
                <select name="category" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->slug); ?>" <?php echo e(request('category') == $cat->slug ? 'selected' : ''); ?>>
                        <?php echo e($cat->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select name="status" class="px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm" onchange="this.form.submit()">
                    <option value="">Semua Status</option>
                    <option value="published" <?php echo e(request('status') == 'published' ? 'selected' : ''); ?>>Published</option>
                    <option value="draft" <?php echo e(request('status') == 'draft' ? 'selected' : ''); ?>>Draft</option>
                </select>
                <button type="submit" class="px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition text-sm font-medium">
                    Filter
                </button>
                <?php if(request()->hasAny(['search', 'category', 'status'])): ?>
                <a href="<?php echo e(route('articleadmin.index')); ?>" class="px-4 py-2.5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition text-sm font-medium">
                    Reset
                </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Artikel</h2>
            </div>
            <div class="overflow-x-auto">
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
                        <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                <?php echo e(($articles->currentPage() - 1) * $articles->perPage() + $index + 1); ?>

                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-900 max-w-xs truncate"><?php echo e($article->title); ?></div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full category-badge-<?php echo e(strtolower($article->category->slug)); ?>">
                                    <?php echo e($article->category->name); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700"><?php echo e($article->author->name); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php echo e($article->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800'); ?>">
                                    <?php echo e(ucfirst($article->status)); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                                <?php echo e($article->formatted_date); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <button onclick="articleAdmin_viewArticle(<?php echo e($article->id); ?>)" class="text-slate-600 hover:text-slate-900 mr-3 transition" title="View">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <button onclick="articleAdmin_editArticle(<?php echo e($article->id); ?>)" class="text-blue-600 hover:text-blue-900 mr-3 transition" title="Edit">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button onclick="articleAdmin_deleteArticle(<?php echo e($article->id); ?>)" class="text-red-600 hover:text-red-900 transition" title="Delete">
                                    <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-slate-500 text-lg font-medium">Tidak ada artikel ditemukan</p>
                                    <p class="text-slate-400 text-sm mt-1">Silakan tambah artikel baru atau ubah filter pencarian</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                <?php if($articles->hasPages()): ?>
                <?php echo e($articles->withQueryString()->links('pagination.custom')); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Artikel -->
<div id="addModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-start justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto my-8">
        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Tambah Artikel Baru</h3>
                <button onclick="articleAdmin_closeAddModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="addArticleForm" class="p-6 space-y-6">
            <?php echo csrf_field(); ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Artikel *</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition" placeholder="Masukkan judul artikel">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                    <select name="category_id" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status Publikasi *</label>
                    <select name="status" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="draft">Draft</option>
                        <option value="published">Publish</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Thumbnail / Featured Image</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnailAdd" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative">
                            <img id="thumbnailPreviewAdd" class="hidden w-full h-full object-cover rounded-lg" alt="Preview">
                            <div id="thumbnailPlaceholderAdd" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="thumbnailAdd" name="thumbnail" class="hidden" accept="image/*" onchange="previewThumbnail('Add')" />
                        </label>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Konten Artikel <span class="text-red-500">*</span>
                    </label>
                    <div class="border border-slate-300 rounded-lg overflow-hidden bg-white">
                        <div id="editorAdd" style="min-height: 400px;"></div>
                    </div>
                    <input type="hidden" name="content" id="contentAddInput" required>
                    <p class="mt-1.5 text-xs text-slate-500">Minimal 100 karakter</p>
                </div>
            </div>

            <div class="flex space-x-3 pt-4 border-t border-slate-200">
                <button type="button" onclick="articleAdmin_closeAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition duration-200">
                    Batal
                </button>
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition duration-200 shadow-lg hover:shadow-xl">
                    Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Artikel -->
<div id="editModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-start justify-center p-4 overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] overflow-y-auto my-8">
        <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Edit Artikel</h3>
                <button onclick="articleAdmin_closeEditModal()" class="text-white hover:text-slate-200 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <form id="editArticleForm" class="p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="hidden" id="editArticleId" name="article_id">
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Artikel <span class="text-red-500">*</span></label>
                    <input type="text" id="editTitle" name="title" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select id="editCategory" name="category_id" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                            <option value="">Pilih Kategori</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Status Publikasi <span class="text-red-500">*</span></label>
                        <select id="editStatus" name="status" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition">
                            <option value="draft">Draft</option>
                            <option value="published">Publish</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Thumbnail / Featured Image</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="thumbnailEdit" class="flex flex-col items-center justify-center w-full h-48 border-2 border-slate-300 border-dashed rounded-lg cursor-pointer bg-slate-50 hover:bg-slate-100 transition relative overflow-hidden">
                            <img id="thumbnailPreviewEdit" class="hidden absolute inset-0 w-full h-full object-cover" alt="Preview">
                            <div id="thumbnailPlaceholderEdit" class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="mb-2 text-sm text-slate-500"><span class="font-semibold">Click to upload new image</span></p>
                                <p class="text-xs text-slate-500">PNG, JPG, JPEG (MAX. 2MB)</p>
                            </div>
                            <input type="file" id="thumbnailEdit" name="thumbnail" class="hidden" accept="image/*" onchange="previewThumbnail('Edit')" />
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Konten Artikel <span class="text-red-500">*</span></label>
                    <div class="border border-slate-300 rounded-lg overflow-hidden bg-white">
                        <div id="editorEdit" style="min-height: 400px;"></div>
                    </div>
                    <input type="hidden" name="content" id="contentEditInput" required>
                    <p class="mt-2 text-xs text-slate-500">Minimal 100 karakter</p>
                </div>
            </div>
        </form>

        <div class="flex gap-3 px-6 py-4 bg-slate-50 border-t border-slate-200 rounded-b-2xl">
            <button type="button" onclick="articleAdmin_closeEditModal()" class="flex-1 px-6 py-3 bg-white border-2 border-slate-300 text-slate-700 rounded-lg font-semibold hover:bg-slate-50 transition duration-200">
                Batal
            </button>
            <button type="submit" form="editArticleForm" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition duration-200 shadow-lg hover:shadow-xl">
                Update Artikel
            </button>
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
            <p class="text-slate-600 text-center mb-6">Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex space-x-3">
                <button type="button" onclick="articleAdmin_closeDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="flex-1 px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Quill JS -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    // CSRF Token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    // Quill Editors
    let quillAdd, quillEdit;

    // Initialize Quill for Add Modal
    function articleAdmin_initQuillAdd() {
        if (!quillAdd) {
            quillAdd = new Quill('#editorAdd', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        [{
                            'font': []
                        }],
                        [{
                            'size': ['small', false, 'large', 'huge']
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'align': []
                        }],
                        ['blockquote', 'code-block'],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                },
                placeholder: 'Tulis konten artikel di sini...',
            });
        }
    }

    // Initialize Quill for Edit Modal
    function articleAdmin_initQuillEdit() {
        if (!quillEdit) {
            quillEdit = new Quill('#editorEdit', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, 4, 5, 6, false]
                        }],
                        [{
                            'font': []
                        }],
                        [{
                            'size': ['small', false, 'large', 'huge']
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'align': []
                        }],
                        ['blockquote', 'code-block'],
                        ['link', 'image', 'video'],
                        ['clean']
                    ]
                },
                placeholder: 'Tulis konten artikel di sini...',
            });
        }
    }

    // Modal Functions
    function articleAdmin_openAddModal() {
        document.getElementById('addModal').classList.remove('hidden');
        document.getElementById('addArticleForm').reset();
        articleAdmin_resetThumbnailPreview('Add');
        setTimeout(() => {
            articleAdmin_initQuillAdd();
            if (quillAdd) {
                quillAdd.setText('');
            }
        }, 100);
    }

    function articleAdmin_closeAddModal() {
        document.getElementById('addModal').classList.add('hidden');
        document.getElementById('addArticleForm').reset();
        articleAdmin_resetThumbnailPreview('Add');
        if (quillAdd) {
            quillAdd.setText('');
        }
    }

    function articleAdmin_closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editArticleForm').reset();
        articleAdmin_resetThumbnailPreview('Edit');
        if (quillEdit) {
            quillEdit.setText('');
        }
    }

    function articleAdmin_closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

// Thumbnail Preview
// Perbaikan fungsi preview thumbnail
// Perbaikan fungsi preview thumbnail
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
        preview.classList.add('hidden');
        placeholder.classList.remove('hidden');
    }
}

// Perbaikan fungsi reset
function articleAdmin_resetThumbnailPreview(modalType) {
    const fileInput = document.getElementById('thumbnail' + modalType);
    const preview = document.getElementById('thumbnailPreview' + modalType);
    const placeholder = document.getElementById('thumbnailPlaceholder' + modalType);
    
    if (fileInput) fileInput.value = '';
    if (preview) {
        preview.classList.add('hidden');
        preview.src = '';
    }
    if (placeholder) placeholder.classList.remove('hidden');
}

    // Add Article
    document.getElementById('addArticleForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        const content = quillAdd.root.innerHTML;
        document.getElementById('contentAddInput').value = content;
        const textLength = quillAdd.getText().trim().length;
        if (textLength < 100) {
            articleAdmin_showNotification('error', 'Konten artikel minimal 100 karakter');
            return;
        }
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        try {
            const response = await fetch('<?php echo e(route("articleadmin.store")); ?>', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: formData
            });
            const data = await response.json();
            if (response.ok) {
                articleAdmin_showNotification('success', data.message || 'Artikel berhasil ditambahkan');
                articleAdmin_closeAddModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            articleAdmin_showNotification('error', error.message);
        } finally {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    });

    // Edit Article
    async function articleAdmin_editArticle(id) {
        try {
            const response = await fetch(`/articleadmin/${id}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            });
            const result = await response.json();
            if (response.ok) {
                const article = result.data;
                document.getElementById('editArticleId').value = article.id;
                document.getElementById('editTitle').value = article.title;
                document.getElementById('editCategory').value = article.category_id;
                document.getElementById('editStatus').value = article.status;
                setTimeout(() => {
                    articleAdmin_initQuillEdit();
                    if (quillEdit && article.content) {
                        quillEdit.root.innerHTML = article.content;
                    }
                }, 100);
                if (article.featured_image) {
                    const preview = document.getElementById('thumbnailPreviewEdit');
                    const placeholder = document.getElementById('thumbnailPlaceholderEdit');
                    preview.src = `/storage/${article.featured_image}`;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                document.getElementById('editModal').classList.remove('hidden');
            } else {
                throw new Error(result.message || 'Gagal memuat data artikel');
            }
        } catch (error) {
            articleAdmin_showNotification('error', error.message);
        }
    }
    // Perbaikan View Article - gunakan slug bukan id
function articleAdmin_viewArticle(id) {
    // Fetch article data dulu untuk mendapat slug
    fetch(`/articleadmin/${id}`, {
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(response => response.json())
    .then(result => {
        if (result.success && result.data.slug) {
            window.open(`/articles/${result.data.slug}`, '_blank');
        } else {
            articleAdmin_showNotification('error', 'Gagal membuka artikel');
        }
    })
    .catch(error => {
        articleAdmin_showNotification('error', 'Gagal membuka artikel');
    });
}

document.getElementById('editArticleForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const content = quillEdit.root.innerHTML;
    document.getElementById('contentEditInput').value = content;
    const textLength = quillEdit.getText().trim().length;
    if (textLength < 100) {
        articleAdmin_showNotification('error', 'Konten artikel minimal 100 karakter');
        return;
    }
    const articleId = document.getElementById('editArticleId').value;
    const formData = new FormData(this);
    
    // Tambahkan _method untuk PUT
    formData.append('_method', 'PUT');
    
    const submitBtn = this.parentElement.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
    try {
        const response = await fetch(`/articleadmin/${articleId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData
        });
        const data = await response.json();
        if (response.ok) {
            articleAdmin_showNotification('success', data.message || 'Artikel berhasil diupdate');
            articleAdmin_closeEditModal();
            setTimeout(() => location.reload(), 1500);
        } else {
            throw new Error(data.message || 'Terjadi kesalahan');
        }
    } catch (error) {
        articleAdmin_showNotification('error', error.message);
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
});

    // Delete Article
    let articleToDelete = null;

    function articleAdmin_deleteArticle(id) {
        articleToDelete = id;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', async function() {
        if (!articleToDelete) return;
        const btn = this;
        const originalText = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        try {
            const response = await fetch(`/articleadmin/${articleToDelete}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                }
            });
            const data = await response.json();
            if (response.ok) {
                articleAdmin_showNotification('success', data.message || 'Artikel berhasil dihapus');
                articleAdmin_closeDeleteModal();
                setTimeout(() => location.reload(), 1500);
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            articleAdmin_showNotification('error', error.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalText;
            articleToDelete = null;
        }
    });


    // Notification Function
    function articleAdmin_showNotification(type, message) {
        const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
        const icon = type === 'success' ?
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>' :
            '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 z-[9999] animate-slide-in`;
        notification.innerHTML = `
        ${icon}
        <span class="font-medium">${message}</span>
    `;
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.style.animation = 'slide-out 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Add CSS for animations and category badges
    const style = document.createElement('style');
    style.textContent = `
    @keyframes slide-in {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    @keyframes slide-out {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    .animate-slide-in {
        animation: slide-in 0.3s ease-out;
    }
    /* Category Badge Colors */
    .category-badge-training {
        background-color: rgb(243 232 255);
        color: rgb(107 33 168);
    }
    .category-badge-hse {
        background-color: rgb(254 226 226);
        color: rgb(153 27 27);
    }
    .category-badge-certification {
        background-color: rgb(219 234 254);
        color: rgb(30 64 175);
    }
    .category-badge-career {
        background-color: rgb(220 252 231);
        color: rgb(22 101 52);
    }
    .category-badge-news {
        background-color: rgb(254 243 199);
        color: rgb(146 64 14);
    }
    .category-badge-other, .category-badge-lainnya {
        background-color: rgb(241 245 249);
        color: rgb(51 65 85);
    }
    /* Quill Editor Custom Styles */
    .ql-container {
        font-family: inherit;
    }
    .ql-editor {
        min-height: 350px;
        font-size: 15px;
        line-height: 1.6;
    }
    .ql-editor.ql-blank::before {
        font-style: normal;
        color: #94a3b8;
    }
    .ql-toolbar {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
        background-color: #f8fafc;
        border-color: #cbd5e1;
    }
    .ql-container {
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
        border-color: #cbd5e1;
    }
`;
    document.head.appendChild(style);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/articleadmin.blade.php ENDPATH**/ ?>