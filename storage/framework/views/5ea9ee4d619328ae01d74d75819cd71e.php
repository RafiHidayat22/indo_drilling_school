<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <!-- Flash Messages -->
    <?php if(session('success')): ?>
    <div class="max-w-7xl mx-auto mb-4">
        <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p class="text-sm font-medium text-green-800"><?php echo e(session('success')); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
    <div class="max-w-7xl mx-auto mb-4">
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <p class="text-sm font-medium text-red-800"><?php echo e(session('error')); ?></p>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
    <div class="max-w-7xl mx-auto mb-4">
        <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-sm">
            <div class="flex">
                <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <div>
                    <p class="text-sm font-medium text-red-800 mb-1">Terdapat kesalahan:</p>
                    <ul class="list-disc list-inside text-sm text-red-700">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Kategori Program</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola kategori untuk program & pelatihan</p>
                </div>
                <button id="categoriesBtnAddCategory" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold rounded-lg shadow-lg hover:from-indigo-700 hover:to-indigo-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Kategori
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Kategori -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Kategori</p>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e(count($categories)); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Kategori aktif</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Kategori Aktif -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Kategori Aktif</p>
                        <?php
                        $activeCategories = \App\Models\TrainingCategory::where('status', 'Active')->count();
                        ?>
                        <p class="text-3xl font-bold text-green-600"><?php echo e($activeCategories); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Sedang digunakan</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Kategori Tidak Aktif -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Kategori Tidak Aktif</p>
                        <?php
                        $inactiveCategories = \App\Models\TrainingCategory::where('status', 'Inactive')->count();
                        ?>
                        <p class="text-3xl font-bold text-red-600"><?php echo e($inactiveCategories); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Tidak digunakan</p>
                    </div>
                    <div class="p-3 bg-red-100 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Program Terkait -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Program Terkait</p>
                        <?php
                        $totalPrograms = $categories->sum('programs_count');
                        ?>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($totalPrograms); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Total program</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <form method="GET" action="<?php echo e(route('categories.index')); ?>" class="flex flex-wrap items-center gap-4">
                <!-- Pencarian -->
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            id="categoriesSearchInput"
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Cari kategori..."
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Filter Status -->
                <div class="min-w-[200px]">
                    <select
                        name="status"
                        id="categoriesStatusFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm">
                        <option value="">Semua Status</option>
                        <option value="Active" <?php echo e(request('status') == 'Active' ? 'selected' : ''); ?>>Active</option>
                        <option value="Inactive" <?php echo e(request('status') == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                </div>

                <!-- Button Filter & Reset -->
                <button type="submit" class="px-6 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-sm font-medium">
                    Filter
                </button>

                <?php if(request('search') || request('status')): ?>
                <a href="<?php echo e(route('categories.index')); ?>" class="px-6 py-2.5 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition text-sm font-medium">
                    Reset
                </a>
                <?php endif; ?>
            </form>
        </div>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <h2 class="text-lg font-semibold text-slate-800">Daftar Kategori</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-12">No</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-16">Icon</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Nama Kategori</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Deskripsi</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-20">Gambar</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-24">Status</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">Tanggal Dibuat</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-20">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                                <?php echo e(($categories->currentPage() - 1) * $categories->perPage() + $index + 1); ?>

                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center h-10 w-10 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-600 shadow-sm">
                                    <?php echo $category['icon']; ?>

                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm font-semibold text-slate-900"><?php echo e($category->title); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e($category['slug'] ?? '-'); ?></div>
                            </td>
                            <!-- Setelah Perbaikan -->
                            <td class="px-4 py-4 max-w-[300px]">
                                <p class="text-sm text-slate-600 line-clamp-2 break-words">
                                    <?php echo e($category['description'] ?? '-'); ?>

                                </p>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <?php if($category->image): ?>
                                <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="<?php echo e($category->title); ?>" class="h-10 w-10 object-cover rounded-lg border border-slate-200">
                                <?php else: ?>
                                <span class="text-xs text-slate-400">Tidak ada</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-center">
                                <?php if($category->status === 'Active'): ?>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    Active
                                </span>
                                <?php else: ?>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                    Inactive
                                </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-slate-900"><?php echo e(\Carbon\Carbon::parse($category['created_at'])->format('d M Y')); ?></div>
                                <div class="text-xs text-slate-500"><?php echo e(\Carbon\Carbon::parse($category['created_at'])->format('H:i')); ?></div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center gap-1">
                                    <button onclick='categoriesOpenEditModal(<?php echo json_encode($category, 15, 512) ?>)'
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick='categoriesOpenDeleteModal(<?php echo json_encode($category, 15, 512) ?>)'
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                <p class="mt-2 text-sm text-slate-500">Tidak ada data kategori.</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                <?php if($categories->hasPages()): ?>
                <?php echo e($categories->withQueryString()->links('pagination.custom')); ?>

                <?php else: ?>
                <div class="flex items-center justify-between">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-semibold"><?php echo e($categories->count()); ?></span> dari <span class="font-semibold"><?php echo e($categories->total()); ?></span> data
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div> <!-- End max-w-7xl mx-auto -->

    <!-- Modal Tambah Kategori -->
    <div id="categoriesAddModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
            <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 px-6 py-4 rounded-t-2xl flex-shrink-0">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Tambah Kategori Baru</h3>
                    <button onclick="categoriesCloseAddModal()" class="text-white hover:text-slate-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <form class="p-6 space-y-6 overflow-y-auto flex-1" method="POST" action="<?php echo e(route('categories.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <!-- Nama Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori *</label>
                    <input
                        type="text"
                        name="name"
                        required
                        value="<?php echo e(old('name')); ?>"
                        placeholder="Contoh: Keselamatan Kerja, Teknik & Operasional"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-slate-500">Masukkan nama kategori yang jelas dan deskriptif</p>
                </div>
                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                    <textarea
                        name="description"
                        rows="3"
                        placeholder="Deskripsi singkat tentang kategori ini"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent resize-none"><?php echo e(old('description')); ?></textarea>
                    <p class="mt-1 text-xs text-slate-500">Opsional. Jelaskan jenis program yang termasuk dalam kategori ini</p>
                </div>
                <!-- Icon Selection -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Icon *</label>
                    <p class="text-xs text-slate-500 mb-3">Pilih icon yang sesuai dengan kategori</p>
                    <div id="categoriesIconSelection" class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-3 max-h-[300px] overflow-y-auto p-4 border border-slate-200 rounded-lg bg-slate-50">
                        <!-- Icon Options akan di-generate oleh JavaScript -->
                    </div>
                    <input type="hidden" name="icon" id="categoriesSelectedIcon" required>
                    <p class="mt-2 text-xs text-slate-500">Icon dipilih akan ditampilkan dengan latar belakang indigo</p>
                </div>
                <!-- Gambar -->
                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Gambar</label>
                    <input
                        type="file"
                        name="image"
                        id="categoriesImageInput"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        onchange="previewImage(this)">
                    <p class="mt-1 text-xs text-slate-500">Opsional. Format: JPEG, PNG, JPG, GIF, SVG. Maksimal 2MB.</p>
                    <!-- Preview Gambar -->
                    <div id="imagePreviewContainer" class="mt-3 hidden">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Preview Gambar:</label>
                        <img id="imagePreview" src="" alt="Preview" class="max-w-full h-auto rounded-lg shadow-md">
                    </div>
                </div>
                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status *</label>
                    <select
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        <option value="Active" <?php echo e(old('status') == 'Active' ? 'selected' : ''); ?>>Active</option>
                        <option value="Inactive" <?php echo e(old('status') == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Kategori aktif akan ditampilkan dalam pilihan program</p>
                </div>
                <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                    <button type="button" onclick="categoriesCloseAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white rounded-lg font-semibold hover:from-indigo-700 hover:to-indigo-800 transition shadow-lg">
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    <div id="categoriesEditModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
            <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl flex-shrink-0">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Edit Kategori</h3>
                    <button onclick="categoriesCloseEditModal()" type="button" class="text-white hover:text-slate-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <form id="categoriesEditForm" class="p-6 space-y-6 overflow-y-auto flex-1" method="POST" action="<?php echo e(route('categories.update', ':id')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" id="categoriesEditId" name="id">
                <!-- Nama Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Kategori *</label>
                    <input
                        type="text"
                        id="categoriesEditName"
                        name="name"
                        required
                        placeholder="Contoh: Keselamatan Kerja, Teknik & Operasional"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <input type="hidden" name="delete_image" id="deleteImageFlag" value="0">
                    <p class="mt-1 text-xs text-slate-500">Masukkan nama kategori yang jelas dan deskriptif</p>
                </div>
                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                    <textarea
                        id="categoriesEditDescription"
                        name="description"
                        rows="3"
                        placeholder="Deskripsi singkat tentang kategori ini"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none"></textarea>
                    <p class="mt-1 text-xs text-slate-500">Opsional. Jelaskan jenis program yang termasuk dalam kategori ini</p>
                </div>
                <!-- Icon Selection -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pilih Icon *</label>
                    <p class="text-xs text-slate-500 mb-3">Pilih icon yang sesuai dengan kategori</p>
                    <div id="categoriesEditIconSelection" class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-3 max-h-[300px] overflow-y-auto p-4 border border-slate-200 rounded-lg bg-slate-50">
                        <!-- Icons akan di-render di sini oleh JavaScript -->
                    </div>
                    <input type="hidden" name="icon" id="categoriesEditSelectedIcon" required>
                    <p class="mt-2 text-xs text-slate-500">Icon dipilih akan ditampilkan dengan latar belakang amber</p>
                </div>
                <!-- Gambar -->
                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Upload Gambar</label>
                    <!-- Di dalam modal edit -->
                    <input
                        type="file"
                        name="image"
                        id="categoriesEditImageInput"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-slate-500">Opsional. Format: JPEG, PNG, JPG, GIF, SVG. Maksimal 2MB.</p>
                    <!-- Preview Gambar -->
                    <div id="editImagePreviewContainer" class="mt-3 hidden">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Preview Gambar:</label>
                        <img id="editImagePreview" src="" alt="Preview" class="max-w-full h-auto rounded-lg shadow-md">
                    </div>
                    <!-- Di dalam modal edit, setelah div preview -->
                    <div class="mt-3">
                        <button
                            type="button"
                            id="categoriesEditClearImageButton"
                            class="text-xs text-red-600 hover:text-red-800 font-medium">
                            ⌫ Hapus Gambar
                        </button>
                    </div>
                </div>
                <!-- Status -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Status *</label>
                    <select
                        id="categoriesEditStatus"
                        name="status"
                        required
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    <p class="mt-1 text-xs text-slate-500">Kategori aktif akan ditampilkan dalam pilihan program</p>
                </div>
                <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                    <button type="button" onclick="categoriesCloseEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition shadow-lg">
                        Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="categoriesDeleteModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
                <p class="text-slate-600 text-center mb-6">
                    Apakah Anda yakin ingin menghapus kategori <span id="categoriesDeleteCategoryName" class="font-semibold text-slate-900"></span>? Tindakan ini tidak dapat dibatalkan.
                </p>
                <div class="flex space-x-3">
                    <button type="button" onclick="categoriesCloseDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">
                        Batal
                    </button>
                    <form id="categoriesDeleteForm" method="POST" style="flex: 1;" action="<?php echo e(route('categories.destroy', ':id')); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <input type="hidden" id="categoriesDeleteId" name="id">
                        <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition shadow-lg">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Preview Gambar -->
    <div id="categoriesImagePreviewModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="relative max-w-4xl max-h-[90vh]">
            <button id="categoriesCloseImagePreviewBtn" class="absolute -top-12 right-0 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="categoriesImagePreviewModalImg" src="" alt="Preview Gambar" class="rounded-lg shadow-2xl max-w-full max-h-[80vh] object-contain">
        </div>
    </div>
</div>

<script>
    (function() {
        'use strict';
        console.log('🚀 Categories Icon Selection Script Loading...');

        // --- 1. DEKLARASI FUNGSI PREVIEW DAN CLEAR IMAGE DI ATAS ---
        // Fungsi preview gambar - DIPERBAIKI DAN DIJAMIN BEKERJA
        function previewImage(input, mode = 'add') {
            const previewContainerId = mode === 'edit' ? 'editImagePreviewContainer' : 'imagePreviewContainer';
            const previewImgId = mode === 'edit' ? 'editImagePreview' : 'imagePreview';

            const previewContainer = document.getElementById(previewContainerId);
            const previewImg = document.getElementById(previewImgId);

            // Selalu reset preview sebelumnya
            previewContainer.classList.add('hidden');
            previewImg.src = '';

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Fungsi untuk menghapus gambar di modal edit
        function clearImage(mode) {
            const inputId = mode === 'edit' ? 'categoriesEditImageInput' : 'categoriesImageInput';
            const previewContainerId = mode === 'edit' ? 'editImagePreviewContainer' : 'imagePreviewContainer';
            const previewImgId = mode === 'edit' ? 'editImagePreview' : 'imagePreview';

            const input = document.getElementById(inputId);
            const previewContainer = document.getElementById(previewContainerId);
            const previewImg = document.getElementById(previewImgId);

            if (input) {
                input.value = ''; // Reset file input
            }
            if (previewImg) {
                previewImg.src = ''; // Clear preview image
            }
            if (previewContainer) {
                previewContainer.classList.add('hidden'); // Hide preview container
            }

            console.log(`✅ Image cleared for mode: ${mode}`);
        }

        // --- 2. ICON LIBRARY ---
        // Icon Library (SVG Icons)
        const categoriesIconLibrary = {
            'safety': '<svg class="w-6 h-6 text-white" fill="none" stroke="white" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>',
            'technical': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
            'management': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
            'certificate': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>',
            'book': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
            'clipboard': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>',
            'chart': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>',
            'globe': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>',
            'lightning': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>',
            'fire': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z" /></svg>',
            'star': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" /></svg>',
            'badge': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>',
            'briefcase': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
            'users': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>',
            'academic': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /></svg>',
            'code': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>',
            'document': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>',
            'building': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>',
            'chip': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>',
            'cube': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>',
            'flag': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" /></svg>',
            'light': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>',
            'heart': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>',
            'truck': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" /></svg>',
            'wrench': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>',
            'science': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>',
            'paint': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" /></svg>',
            'puzzle': '<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" /></svg>',
        };

        console.log(`✓ Icon library loaded: ${Object.keys(categoriesIconLibrary).length} icons`);

        // Fungsi untuk mencari key berdasarkan SVG
        function categoriesFindIconKeyBySvg(svgStr) {
            if (!svgStr) return null;

            const extractPathData = (svg) => {
                const pathMatches = svg.match(/d="([^"]+)"/g);
                return pathMatches ? pathMatches.join('|') : '';
            };

            const inputPaths = extractPathData(svgStr);

            for (const [key, svg] of Object.entries(categoriesIconLibrary)) {
                const libraryPaths = extractPathData(svg);
                if (inputPaths === libraryPaths) {
                    return key;
                }
            }
            return null;
        }

        // Fungsi universal untuk render icon selection
        function categoriesRenderIconSelection(containerId, selectedKey, colorScheme) {
            console.log(`📦 Rendering icons in #${containerId}...`);

            const container = document.getElementById(containerId);
            if (!container) {
                console.error(`❌ Container #${containerId} not found!`);
                return;
            }

            // Clear existing content
            container.innerHTML = '';

            const colors = {
                indigo: {
                    hover: 'hover:border-indigo-500',
                    selected: 'border-indigo-600',
                    gradient: 'bg-gradient-to-br from-indigo-500 to-indigo-600'
                },
                amber: {
                    hover: 'hover:border-amber-500',
                    selected: 'border-amber-600',
                    gradient: 'bg-gradient-to-br from-amber-500 to-amber-600'
                }
            };

            const scheme = colors[colorScheme] || colors.indigo;
            // Support both 'iconSelection' and 'categoriesIconSelection' for Add Modal
            const hiddenInputId = containerId === 'categoriesEditIconSelection' ?
                'categoriesEditSelectedIcon' :
                'categoriesSelectedIcon';
            let iconCount = 0;
            Object.entries(categoriesIconLibrary).forEach(([key, svg]) => {
                const iconDiv = document.createElement('div');
                const isSelected = selectedKey && key === selectedKey;

                iconDiv.className = `categories-icon-option flex items-center justify-center h-14 w-14 rounded-lg cursor-pointer transition-all duration-200 hover:scale-110 hover:shadow-md border-2`;

                if (isSelected) {
                    iconDiv.className += ` ${scheme.selected} ${scheme.gradient} shadow-lg scale-110`;
                    const hiddenInput = document.getElementById(hiddenInputId);
                    if (hiddenInput) {
                        hiddenInput.value = svg;
                        console.log(`✓ Pre-selected icon: ${key}`);
                    }
                } else {
                    iconDiv.className += ` border-slate-200 bg-white ${scheme.hover}`;
                }

                iconDiv.dataset.icon = svg;
                iconDiv.dataset.key = key;
                iconDiv.innerHTML = svg;

                iconDiv.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    container.querySelectorAll('.categories-icon-option').forEach(el => {
                        el.className = `categories-icon-option flex items-center justify-center h-14 w-14 rounded-lg cursor-pointer transition-all duration-200 hover:scale-110 hover:shadow-md border-2 border-slate-200 bg-white ${scheme.hover}`;
                    });

                    this.className = `categories-icon-option flex items-center justify-center h-14 w-14 rounded-lg cursor-pointer transition-all duration-200 hover:scale-110 hover:shadow-md border-2 ${scheme.selected} ${scheme.gradient} shadow-lg scale-110`;

                    const hiddenInput = document.getElementById(hiddenInputId);
                    if (hiddenInput) {
                        hiddenInput.value = this.dataset.icon;
                        console.log(`✓ Icon selected: ${this.dataset.key}`);
                    }
                });

                container.appendChild(iconDiv);
                iconCount++;
            });

            console.log(`✅ Rendered ${iconCount} icons successfully`);
        }

        // Modal functions
        window.categoriesOpenAddModal = function() {
            console.log('🟣 Opening Add Modal');
            const modal = document.getElementById('categoriesAddModal');
            if (!modal) return;
            const form = modal.querySelector('form');
            if (form) form.reset();
            const hiddenInput = document.getElementById('categoriesSelectedIcon');
            if (hiddenInput) hiddenInput.value = '';
            modal.classList.remove('hidden');

            // Render icons directly
            requestAnimationFrame(() => {
                categoriesRenderIconSelection('categoriesIconSelection', null, 'indigo');
            });
        };

        window.categoriesCloseAddModal = function() {
            const modal = document.getElementById('categoriesAddModal');
            if (modal) modal.classList.add('hidden');
        };

        window.categoriesOpenEditModal = function(data) {
            console.log('🟨 Opening Edit Modal', data);
            const modal = document.getElementById('categoriesEditModal');
            if (!modal) return;

            // Fill form fields
            if (document.getElementById('categoriesEditId'))
                document.getElementById('categoriesEditId').value = data.id || '';
            if (document.getElementById('categoriesEditName'))
                document.getElementById('categoriesEditName').value = data.title || data.name || '';
            if (document.getElementById('categoriesEditDescription'))
                document.getElementById('categoriesEditDescription').value = data.description || '';
            if (document.getElementById('categoriesEditStatus'))
                document.getElementById('categoriesEditStatus').value = data.status || 'Active';

            // Update form action
            const form = document.getElementById('categoriesEditForm');
            if (form) {
                const action = form.getAttribute('action').replace(':id', data.id);
                form.setAttribute('action', action);
            }

            // Show modal
            modal.classList.remove('hidden');

            // Find and render icons
            const selectedKey = categoriesFindIconKeyBySvg(data.icon);
            console.log('🟩 Selected icon key:', selectedKey);

            // Render icons
            requestAnimationFrame(() => {
                categoriesRenderIconSelection('categoriesEditIconSelection', selectedKey, 'amber');
                // Set hidden input value
                if (document.getElementById('categoriesEditSelectedIcon')) {
                    document.getElementById('categoriesEditSelectedIcon').value = data.icon || '';
                }
            });

            // Load current image preview if exists
            const currentImage = data.image;
            const editImagePreviewContainer = document.getElementById('editImagePreviewContainer');
            const editImagePreview = document.getElementById('editImagePreview');
            const editImageInput = document.getElementById('categoriesEditImageInput');

            if (currentImage) {
                // Set preview
                editImagePreview.src = `/storage/${currentImage}`;
                editImagePreviewContainer.classList.remove('hidden');

                // Clear file input to avoid issues
                editImageInput.value = '';
            } else {
                editImagePreviewContainer.classList.add('hidden');
                editImagePreview.src = '';
            }
        };

        window.categoriesCloseEditModal = function() {
            const modal = document.getElementById('categoriesEditModal');
            if (modal) modal.classList.add('hidden');
        };

        window.categoriesOpenDeleteModal = function(data) {
            console.log('🔴 Opening Delete Modal');
            const modal = document.getElementById('categoriesDeleteModal');
            if (!modal) return;

            // Set category name
            const categoryNameElement = document.getElementById('categoriesDeleteCategoryName');
            if (categoryNameElement) {
                categoryNameElement.textContent = data.title || data.name || 'Kategori';
            }

            // Set form action
            const form = document.getElementById('categoriesDeleteForm');
            if (form) {
                const action = form.getAttribute('action').replace(':id', data.id);
                form.setAttribute('action', action);
            }

            // Show modal
            modal.classList.remove('hidden');
        };

        window.categoriesCloseDeleteModal = function() {
            const modal = document.getElementById('categoriesDeleteModal');
            if (modal) modal.classList.add('hidden');
        };

        // Initialize
        // Initialize
        function categoriesInit() {
            console.log('✅ Initializing Categories...');

            // Setup add button
            const btnAdd = document.getElementById('categoriesBtnAddCategory');
            if (btnAdd) {
                btnAdd.addEventListener('click', (e) => {
                    e.preventDefault();
                    categoriesOpenAddModal();
                });
                console.log('✅ Add button initialized');
            }

            // --- EVENT LISTENERS UNTUK PREVIEW DAN CLEAR IMAGE ---
            // Event listener untuk input file di modal Add
            const addImageInput = document.getElementById('categoriesImageInput');
            if (addImageInput) {
                addImageInput.addEventListener('change', function() {
                    previewImage(this, 'add');
                });
            }

            // Event listener untuk input file di modal Edit
            const editImageInput = document.getElementById('categoriesEditImageInput');
            if (editImageInput) {
                editImageInput.addEventListener('change', function() {
                    previewImage(this, 'edit');
                });
            }

            // Event listener untuk tombol "Hapus Gambar" di modal Edit
            const editClearButton = document.getElementById('categoriesEditClearImageButton');
            if (editClearButton) {
                editClearButton.addEventListener('click', function() {
                    clearImage('edit');
                });
            }
            categoriesInitImagePreview();

            console.log('✅ Categories ready!');
        }
        // Preview image saat klik di tabel
        function categoriesInitImagePreview() {
            // Tangkap semua gambar di kolom tabel
            document.querySelectorAll('tbody img[alt]').forEach(img => {
                img.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const src = this.src;
                    const modal = document.getElementById('categoriesImagePreviewModal');
                    const modalImg = document.getElementById('categoriesImagePreviewModalImg');

                    if (src && modal && modalImg) {
                        modalImg.src = src;
                        modal.classList.remove('hidden');
                        document.body.classList.add('overflow-hidden'); // Cegah scroll background
                    }
                });
            });

            // Tutup modal saat klik tombol X
            const closeBtn = document.getElementById('categoriesCloseImagePreviewBtn');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    document.getElementById('categoriesImagePreviewModal').classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });
            }

            // Tutup modal saat klik di luar gambar
            const modal = document.getElementById('categoriesImagePreviewModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            }

            // Tutup dengan tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            });
        }

        // Jalankan init saat DOM siap
        document.addEventListener('DOMContentLoaded', categoriesInit);

    })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\categories.blade.php ENDPATH**/ ?>