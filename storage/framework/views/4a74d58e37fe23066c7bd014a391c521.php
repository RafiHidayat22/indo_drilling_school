<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Program & Pelatihan</h1>
                    <p class="mt-2 text-sm text-slate-600">Kelola program & pelatihan berdasarkan kategori</p>
                </div>
                <button onclick="trainOpenAddModal()" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white font-semibold rounded-lg shadow-lg hover:from-purple-700 hover:to-purple-800 transform transition hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Program
                </button>
            </div>
        </div>

        <!-- Flash Messages -->
        <?php if(session('success')): ?>
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline"><?php echo e(session('error')); ?></span>
        </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

        <!-- Stats Cards - Database Driven -->
        <!-- Stats Cards - Database Driven -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Kategori -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Kategori</p>
                        <?php
                        $totalCategories = \App\Models\TrainingCategory::where('status', 'Active')->count();
                        ?>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($totalCategories); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Kategori aktif</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-lg">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Program (Subcategory) -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Program</p>
                        <?php
                        $totalSubcategories = \App\Models\TrainingSubcategory::where('status', 'Active')->count();
                        ?>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($totalSubcategories); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Program aktif</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Pelatihan -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Pelatihan</p>
                        <?php
                        $totalTrainings = \App\Models\Training::where('status', 'Active')->count();
                        ?>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($totalTrainings); ?></p>
                        <p class="text-xs text-slate-500 mt-1">Pelatihan aktif</p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Kategori Terbanyak -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Kategori Terbanyak</p>
                        <?php
                        $topCategory = \App\Models\TrainingCategory::withCount(['subcategories' => function($query) {
                        $query->where('status', 'Active');
                        }])->where('status', 'Active')
                        ->orderBy('subcategories_count', 'desc')
                        ->first();
                        ?>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($topCategory->subcategories_count ?? 0); ?></p>
                        <p class="text-xs text-slate-500 mt-1 truncate" title="<?php echo e($topCategory->title ?? 'Belum ada'); ?>">
                            <?php echo e($topCategory->title ?? 'Belum ada'); ?>

                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-md p-4 mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <!-- Pencarian Teks -->
                <div class="flex-1 min-w-[250px]">
                    <div class="relative">
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari kategori, program atau pelatihan..."
                            class="w-full pl-10 pr-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <svg class="w-5 h-5 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Dropdown Filter Kategori -->
                <div class="min-w-[200px]">
                    <select
                        id="categoryFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">Semua Kategori</option>
                        <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->title); ?>"><?php echo e($cat->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <!-- Dropdown Filter Status -->
                <div class="min-w-[150px]">
                    <select
                        id="statusFilter"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <option value="">Semua Status</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Reset Button -->
                <button
                    id="resetFilters"
                    class="px-4 py-2.5 bg-slate-100 text-slate-600 rounded-lg hover:bg-slate-200 transition text-sm font-medium inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Reset
                </button>
            </div>

            <!-- Filter Results Info -->
            <div id="filterInfo" class="mt-3 text-sm text-slate-600 hidden">
                Menampilkan <span id="visibleCount" class="font-semibold">0</span> dari <span id="totalCount" class="font-semibold">0</span> data
            </div>
        </div>

        <!-- Table Section -->
        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Daftar Program & Pelatihan</h2>
                    <div class="text-sm text-slate-600">
                        Total: <span class="font-semibold text-purple-600"><?php echo e($trainings->total()); ?></span> program
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-12">No</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-48">Kategori</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-64">Program</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Pelatihan</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-28">Status</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">Aktif/Total</th>
                            <th class="px-4 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider w-32">Tanggal</th>
                            <th class="px-4 py-4 text-center text-xs font-semibold text-slate-600 uppercase tracking-wider w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        <?php
                        $groupedByCategory = [];
                        foreach($trainings as $training) {
                        $categoryName = $training['category'] ?? 'Tidak ada';
                        if (!isset($groupedByCategory[$categoryName])) {
                        $groupedByCategory[$categoryName] = [];
                        }
                        $groupedByCategory[$categoryName][] = $training;
                        }

                        // Add empty categories (categories without any programs)
                        foreach($allCategories as $cat) {
                        if (!isset($groupedByCategory[$cat->title])) {
                        $groupedByCategory[$cat->title] = [];
                        }
                        }

                        $categoryIndex = 0;
                        ?>

                        <?php $__empty_1 = true; $__currentLoopData = $groupedByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $categoryTrainings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $categoryIndex++; ?>

                        <?php if(count($categoryTrainings) === 0): ?>
                        
                        <tr class="hover:bg-slate-50 transition filterable-row"
                            data-category="<?php echo e(strtolower($categoryName)); ?>"
                            data-category-name="<?php echo e($categoryName); ?>"
                            data-category-original-index="<?php echo e($categoryIndex); ?>"
                            data-provider=""
                            data-status="empty"
                            data-is-first-row="true"
                            data-is-empty="true"
                            data-category-programs-count="0">

                            <!-- No -->
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-700 font-medium category-number-cell">
                                <div class="text-black font-bold text-sm">
                                    <?php echo e($categoryIndex); ?>

                                </div>
                            </td>

                            <!-- Kategori -->
                            <td class="px-4 py-4 whitespace-nowrap category-name-cell">
                                <div class="flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-slate-400 to-slate-500 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900"><?php echo e($categoryName); ?></div>
                                        <div class="text-xs text-slate-500">0 program</div>
                                    </div>
                                </div>
                            </td>

                            <!-- Empty Message spanning multiple columns -->
                            <td colspan="6" class="px-4 py-8">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-slate-700 mb-1">Kategori ini belum memiliki program & pelatihan</p>
                                    <p class="text-xs text-slate-500 mb-3">Silakan tambahkan program untuk kategori "<?php echo e($categoryName); ?>"</p>
                                    <button
                                        onclick="trainOpenAddModalWithCategory('<?php echo e($categoryName); ?>')"
                                        class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-xs rounded-lg hover:bg-purple-700 transition shadow-sm">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Tambah Program
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php else: ?>
                        
                        <?php $__currentLoopData = $categoryTrainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subIndex => $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50 transition filterable-row <?php echo e($subIndex > 0 ? 'border-t-0' : ''); ?>"
                            data-category="<?php echo e(strtolower($training['category'] ?? '')); ?>"
                            data-category-name="<?php echo e($training['category'] ?? ''); ?>"
                            data-category-original-index="<?php echo e($categoryIndex); ?>"
                            data-provider="<?php echo e(strtolower($training['provider'] ?? '')); ?>"
                            data-status="<?php echo e(strtolower($training['status'] ?? 'active')); ?>"
                            data-is-first-row="<?php echo e($subIndex === 0 ? 'true' : 'false'); ?>"
                            data-is-empty="false"
                            data-category-programs-count="<?php echo e(count($categoryTrainings)); ?>">

                            <!-- No - Hanya tampil di baris pertama kategori -->
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-slate-700 font-medium category-number-cell <?php echo e($subIndex > 0 ? 'border-t-0' : ''); ?>">
                                <?php if($subIndex === 0): ?>
                                <div class="text-black font-bold text-sm">
                                    <?php echo e($categoryIndex); ?>

                                </div>
                                <?php endif; ?>
                            </td>

                            <!-- Kategori - Hanya tampil di baris pertama kategori -->
                            <td class="px-4 py-4 whitespace-nowrap category-name-cell <?php echo e($subIndex > 0 ? 'border-t-0' : ''); ?>">
                                <?php if($subIndex === 0): ?>
                                <div class="flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-900"><?php echo e($categoryName); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e(count($categoryTrainings)); ?> program</div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </td>

                            <!-- Program -->
                            <td class="px-4 py-4 <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <div class="flex items-start gap-3">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-sm"><?php echo e(strtoupper(substr($training['provider'], 0, 2))); ?></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="text-sm font-bold text-slate-900 mb-0.5"><?php echo e($training['provider']); ?></div>
                                        <?php if(!empty($training['provider_description'])): ?>
                                        <div class="text-xs text-slate-600 line-clamp-2"><?php echo e($training['provider_description']); ?></div>
                                        <?php else: ?>
                                        <div class="text-xs text-slate-400 italic">Tidak ada deskripsi</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>

                            <!-- Pelatihan -->
                            <td class="px-4 py-4 <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <?php if($training['trainings'] && count($training['trainings']) > 0): ?>
                                <div class="space-y-2">
                                    <!-- Summary Button -->
                                    <button
                                        type="button"
                                        onclick="trainToggleDropdown('<?php echo e($training['id']); ?>')"
                                        class="w-full flex items-center justify-between px-4 py-2.5 bg-gradient-to-r from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 rounded-lg border border-purple-200 transition-all duration-200 group">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                                                <span class="text-white font-bold text-sm"><?php echo e(count($training['trainings'])); ?></span>
                                            </div>
                                            <div class="text-left">
                                                <div class="text-sm font-bold text-slate-900"><?php echo e(count($training['trainings'])); ?> Pelatihan</div>
                                                <div class="text-xs text-slate-600">
                                                    <?php echo e(collect($training['trainings'])->where('status', 'active')->count()); ?> aktif,
                                                    <?php echo e(collect($training['trainings'])->where('status', 'inactive')->count()); ?> inactive
                                                </div>
                                            </div>
                                        </div>
                                        <svg
                                            id="dropdown-icon-<?php echo e($training['id']); ?>"
                                            class="w-5 h-5 text-purple-600 transition-transform duration-200 flex-shrink-0 group-hover:text-purple-700"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown Content -->
                                    <div
                                        id="dropdown-menu-<?php echo e($training['id']); ?>"
                                        class="hidden bg-white rounded-lg shadow-xl border border-slate-200 max-h-80 overflow-y-auto">
                                        <div class="p-3">
                                            <div class="space-y-2">
                                                <?php $__currentLoopData = $training['trainings']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tIndex => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="flex items-start gap-3 p-3 hover:bg-purple-50 rounded-lg transition-colors border border-transparent hover:border-purple-200">
                                                    <!-- Number Badge -->
                                                    <div class="flex-shrink-0">
                                                        <div class="h-7 w-7 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center shadow-sm">
                                                            <span class="text-white font-bold text-xs"><?php echo e($tIndex + 1); ?></span>
                                                        </div>
                                                    </div>

                                                    <!-- Content -->
                                                    <div class="flex-1 min-w-0">
                                                        <div class="flex items-start justify-between gap-2 mb-1">
                                                            <h4 class="text-sm font-semibold text-slate-900 leading-tight">
                                                                <?php echo e($t['name']); ?>

                                                            </h4>
                                                            <?php if(($t['status'] ?? 'active') === 'active'): ?>
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 flex-shrink-0">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                                </svg>
                                                                Active
                                                            </span>
                                                            <?php else: ?>
                                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-700 flex-shrink-0">
                                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                                Inactive
                                                            </span>
                                                            <?php endif; ?>
                                                        </div>
                                                        <?php if(!empty($t['description'])): ?>
                                                        <p class="text-xs text-slate-600 leading-relaxed"><?php echo e($t['description']); ?></p>
                                                        <?php else: ?>
                                                        <p class="text-xs text-slate-400 italic">Tidak ada deskripsi</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>

                                        <!-- Footer Info -->
                                        <div class="px-4 py-2.5 bg-slate-50 border-t border-slate-200">
                                            <div class="flex items-center justify-between text-xs text-slate-600">
                                                <span class="font-medium">Total Pelatihan</span>
                                                <span class="font-semibold text-purple-600"><?php echo e(count($training['trainings'])); ?> items</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="flex items-center gap-2 text-slate-400 text-sm italic px-4 py-3 bg-slate-50 rounded-lg border border-slate-200">
                                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                    </svg>
                                    <span>Belum ada pelatihan</span>
                                </div>
                                <?php endif; ?>
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-4 whitespace-nowrap text-center <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <?php if(($training['status'] ?? 'active') === 'active'): ?>
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-1.5"></span>
                                    Active
                                </span>
                                <?php else: ?>
                                <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-1.5"></span>
                                    Inactive
                                </span>
                                <?php endif; ?>
                            </td>

                            <!-- Aktif/Total -->
                            <td class="px-4 py-4 whitespace-nowrap text-center <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 rounded-lg border border-slate-200">
                                    <span class="text-sm font-bold text-green-600">
                                        <?php echo e(collect($training['trainings'] ?? [])->where('status', 'active')->count()); ?>

                                    </span>
                                    <span class="text-xs text-slate-400">/</span>
                                    <span class="text-sm font-semibold text-slate-600">
                                        <?php echo e(count($training['trainings'] ?? [])); ?>

                                    </span>
                                </div>
                            </td>

                            <!-- Tanggal -->
                            <td class="px-4 py-4 whitespace-nowrap <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <div class="text-sm font-medium text-slate-900">
                                    <?php echo e(\Carbon\Carbon::parse($training['created_at'])->format('d M Y')); ?>

                                </div>
                                <div class="text-xs text-slate-500">
                                    <?php echo e(\Carbon\Carbon::parse($training['created_at'])->format('H:i')); ?> WIB
                                </div>
                            </td>

                            <!-- Aksi -->
                            <td class="px-4 py-4 whitespace-nowrap <?php echo e($subIndex > 0 ? 'border-t border-dashed border-slate-200' : ''); ?>">
                                <div class="flex items-center justify-center gap-1">
                                    <button
                                        onclick='trainOpenEditModal(<?php echo json_encode($training, 15, 512) ?>)'
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors group"
                                        title="Edit Program">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button
                                        onclick='trainOpenDeleteModal(<?php echo json_encode($training, 15, 512) ?>)'
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors group"
                                        title="Hapus Program">
                                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr id="emptyRow">
                            <td colspan="8" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="h-16 w-16 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                    </div>
                                    <p class="text-lg font-semibold text-slate-700 mb-1">Tidak ada data program</p>
                                    <p class="text-sm text-slate-500">Silakan tambahkan program baru dengan klik tombol "Tambah Program"</p>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="bg-white px-6 py-4 border-t border-slate-200">
                <?php if($trainings->isNotEmpty()): ?>
                <?php echo e($trainings->withQueryString()->links('pagination.custom')); ?>

                <?php else: ?>
                <div class="flex items-center justify-between">
                    <div class="text-sm text-slate-600">
                        Menampilkan <span class="font-semibold">0</span> sampai <span class="font-semibold">0</span> dari <span class="font-semibold">0</span> data
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div id="addModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 flex items-center justify-center p-4 overflow-y-auto">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4 rounded-t-2xl flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Tambah Program & Pelatihan</h3>
                        <button onclick="trainCloseAddModal()" class="text-white hover:text-slate-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <form class="p-6 space-y-6 overflow-y-auto flex-1" method="POST" action="<?php echo e(route('training.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                        <select name="category" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">Pilih Kategori</option>
                            <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->title); ?>"><?php echo e($cat->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <p class="mt-1 text-xs text-slate-500">Pilih kategori yang sesuai dengan jenis program pelatihan</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Program *</label>
                        <p class="text-xs text-slate-500 mb-3">Tambahkan program yang tersedia dalam kategori ini</p>
                        <div id="providerInputs" class="space-y-3 max-h-[40vh] overflow-y-auto pr-2">
                            <div class="flex flex-col gap-3 p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border-2 border-purple-200">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-bold text-purple-700">Program #1</span>
                                    <button type="button" onclick="trainRemoveProviderInput(this)" class="p-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex items-start gap-2">
                                    <input type="text" name="providers[0][name]" required placeholder="Nama program (contoh: AOSH, PT Safety Pro)" class="flex-1 px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm bg-white">
                                    <select name="providers[0][status]" class="w-28 px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm bg-white">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <textarea name="providers[0][description]" rows="2" placeholder="Deskripsi program ini (opsional)" class="w-full px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm bg-white"></textarea>

                                <!-- Section Pelatihan per Provider -->
                                <div class="mt-2 pt-3 border-t border-purple-200">
                                    <label class="block text-xs font-semibold text-purple-700 mb-2">Pelatihan untuk program ini *</label>
                                    <div class="training-inputs-0 space-y-2">
                                        <div class="flex flex-col gap-2 p-3 bg-white rounded-lg border border-purple-200">
                                            <div class="flex items-start gap-2">
                                                <input type="text" name="providers[0][trainings][0][name]" required placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                                                <select name="providers[0][trainings][0][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                                <button type="button" onclick="trainRemoveTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <textarea name="providers[0][trainings][0][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" onclick="trainAddTrainingToProvider(0)" class="mt-2 inline-flex items-center px-3 py-1.5 bg-white text-purple-700 rounded-lg hover:bg-purple-50 transition text-xs font-medium border border-purple-200">
                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Tambah Pelatihan
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" onclick="trainAddProviderInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Program
                        </button>
                    </div>

                    <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                        <button type="button" onclick="trainCloseAddModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg font-semibold hover:from-purple-700 hover:to-purple-800 transition shadow-lg">Simpan Program</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        <div id="editModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 z-50 flex items-center justify-center p-4 overflow-y-auto">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full my-8 transform transition-all max-h-[90vh] flex flex-col">
                <div class="bg-gradient-to-r from-amber-500 to-amber-600 px-6 py-4 rounded-t-2xl flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-white">Edit Program & Pelatihan</h3>
                        <button onclick="trainCloseEditModal()" class="text-white hover:text-slate-200 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <form id="editForm" class="p-6 space-y-6 overflow-y-auto flex-1" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" id="editId" name="id">
                    <input type="hidden" id="editCategoryId" name="category_id">

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori *</label>
                        <select id="editCategory" name="category" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            <option value="">Pilih Kategori</option>
                            <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->title); ?>"><?php echo e($cat->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Program *</label>
                        <div id="editProviderInputs" class="space-y-3 max-h-[40vh] overflow-y-auto pr-2"></div>
                        <button type="button" onclick="trainAddEditProviderInput()" class="mt-3 inline-flex items-center px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-medium shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Program
                        </button>
                    </div>

                    <div class="flex space-x-3 pt-4 border-t border-slate-200 flex-shrink-0">
                        <button type="button" onclick="trainCloseEditModal()" class="flex-1 px-6 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-semibold hover:from-amber-600 hover:to-amber-700 transition shadow-lg">Update Program</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-black/30 backdrop-blur-sm z-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all">
                <div class="p-6">
                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 text-center mb-2">Konfirmasi Hapus</h3>
                    <p class="text-slate-600 text-center mb-6">
                        Apakah Anda yakin ingin menghapus program <span id="deleteProviderName" class="font-semibold text-slate-900"></span>? Tindakan ini tidak dapat dibatalkan.
                    </p>
                    <div class="flex space-x-3">
                        <button type="button" onclick="trainCloseDeleteModal()" class="flex-1 px-4 py-3 bg-slate-200 text-slate-700 rounded-lg font-semibold hover:bg-slate-300 transition">Batal</button>
                        <form id="deleteForm" method="POST" style="flex: 1;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="w-full px-4 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg font-semibold hover:from-red-700 hover:to-red-800 transition shadow-lg">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let providerCount = 1;
            let editProviderCount = 0;

            // ========== FILTER FUNCTIONS ==========
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const categoryFilter = document.getElementById('categoryFilter');
                const statusFilter = document.getElementById('statusFilter');
                const resetButton = document.getElementById('resetFilters');
                const filterInfo = document.getElementById('filterInfo');
                const visibleCountSpan = document.getElementById('visibleCount');
                const totalCountSpan = document.getElementById('totalCount');
                const tableRows = document.querySelectorAll('tbody tr.filterable-row');
                const emptyRow = document.getElementById('emptyRow');

                const totalRows = tableRows.length;
                totalCountSpan.textContent = totalRows;

                function trainFilterTable() {
                    const searchTerm = searchInput.value.toLowerCase().trim();
                    const selectedCategory = categoryFilter.value.toLowerCase().trim();
                    const selectedStatus = statusFilter.value.toLowerCase().trim();

                    let visibleCount = 0;
                    let hasActiveFilters = searchTerm || selectedCategory || selectedStatus;
                    let categoryVisibleRows = {};
                    let categoryNumberMap = {};
                    let currentCategoryNumber = 0;

                    // First pass: determine which rows match
                    tableRows.forEach((row) => {
                        const categoryData = row.getAttribute('data-category') || '';
                        const categoryName = row.getAttribute('data-category-name') || '';
                        const providerData = row.getAttribute('data-provider') || '';
                        const statusData = row.getAttribute('data-status') || '';
                        const rowText = row.textContent.toLowerCase();
                        const isEmpty = row.getAttribute('data-is-empty') === 'true';

                        let matchesSearch = !searchTerm ||
                            categoryData.includes(searchTerm) ||
                            providerData.includes(searchTerm) ||
                            rowText.includes(searchTerm);

                        let matchesCategory = !selectedCategory || categoryData.includes(selectedCategory);

                        // Empty categories should not be filtered by status
                        let matchesStatus = isEmpty || !selectedStatus || statusData.includes(selectedStatus);

                        if (matchesSearch && matchesCategory && matchesStatus) {
                            if (!categoryVisibleRows[categoryName]) {
                                categoryVisibleRows[categoryName] = [];
                            }
                            categoryVisibleRows[categoryName].push(row);
                        }
                    });

                    // Assign numbers to categories that have visible rows
                    Object.keys(categoryVisibleRows).forEach(categoryName => {
                        currentCategoryNumber++;
                        categoryNumberMap[categoryName] = currentCategoryNumber;
                    });

                    // Second pass: show/hide rows and update display
                    tableRows.forEach((row) => {
                        const categoryData = row.getAttribute('data-category') || '';
                        const categoryName = row.getAttribute('data-category-name') || '';
                        const categoryProgramsCount = row.getAttribute('data-category-programs-count') || '0';
                        const providerData = row.getAttribute('data-provider') || '';
                        const statusData = row.getAttribute('data-status') || '';
                        const rowText = row.textContent.toLowerCase();
                        const isEmpty = row.getAttribute('data-is-empty') === 'true';

                        let matchesSearch = !searchTerm ||
                            categoryData.includes(searchTerm) ||
                            providerData.includes(searchTerm) ||
                            rowText.includes(searchTerm);

                        let matchesCategory = !selectedCategory || categoryData.includes(selectedCategory);
                        let matchesStatus = isEmpty || !selectedStatus || statusData.includes(selectedStatus);

                        if (matchesSearch && matchesCategory && matchesStatus) {
                            row.style.display = '';

                            const visibleRowsInCategory = categoryVisibleRows[categoryName] || [];
                            const isFirstVisibleInCategory = visibleRowsInCategory[0] === row;

                            const numberCell = row.querySelector('.category-number-cell');
                            const nameCell = row.querySelector('.category-name-cell');

                            // Show category number and name only for first visible row
                            if (isFirstVisibleInCategory) {
                                if (numberCell) {
                                    numberCell.classList.remove('border-t-0');
                                    let numberDiv = numberCell.querySelector('div');
                                    if (!numberDiv) {
                                        numberDiv = document.createElement('div');
                                        numberDiv.className = 'text-black font-bold text-sm';
                                        numberCell.appendChild(numberDiv);
                                    }
                                    numberDiv.textContent = categoryNumberMap[categoryName];
                                }

                                if (nameCell && !isEmpty) {
                                    nameCell.classList.remove('border-t-0');
                                    let nameContent = nameCell.querySelector('.flex.items-center');
                                    if (!nameContent) {
                                        nameContent = document.createElement('div');
                                        nameContent.className = 'flex items-center gap-2';
                                        nameContent.innerHTML = `
                            <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-indigo-500 to-indigo-600 flex items-center justify-center flex-shrink-0">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-sm font-semibold text-slate-900">${categoryName}</div>
                                <div class="text-xs text-slate-500">${categoryProgramsCount} program</div>
                            </div>
                        `;
                                        nameCell.appendChild(nameContent);
                                    } else {
                                        const categoryNameDiv = nameContent.querySelector('.text-sm.font-semibold');
                                        if (categoryNameDiv) categoryNameDiv.textContent = categoryName;
                                        const countDiv = nameContent.querySelector('.text-xs.text-slate-500');
                                        if (countDiv) countDiv.textContent = `${categoryProgramsCount} program`;
                                    }
                                }
                                visibleCount++;
                            } else if (!isEmpty) {
                                // Hide category info for subsequent rows
                                if (numberCell) {
                                    numberCell.classList.add('border-t-0');
                                    numberCell.innerHTML = '';
                                }
                                if (nameCell) {
                                    nameCell.classList.add('border-t-0');
                                    nameCell.innerHTML = '';
                                }
                            }
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    // Show/hide filter info
                    if (hasActiveFilters) {
                        filterInfo.classList.remove('hidden');
                        visibleCountSpan.textContent = visibleCount;
                    } else {
                        filterInfo.classList.add('hidden');
                    }

                    // Show/hide empty state
                    if (emptyRow) {
                        if (visibleCount === 0 && tableRows.length > 0) {
                            emptyRow.style.display = '';
                            const emptyMessage = emptyRow.querySelector('p.text-lg');
                            if (emptyMessage) {
                                emptyMessage.textContent = 'Tidak ada hasil yang sesuai';
                            }
                            const emptySubtext = emptyRow.querySelector('p.text-sm');
                            if (emptySubtext) {
                                emptySubtext.textContent = 'Coba ubah filter atau kata kunci pencarian Anda';
                            }
                        } else {
                            emptyRow.style.display = 'none';
                        }
                    }
                }

                function resetFilters() {
                    searchInput.value = '';
                    categoryFilter.value = '';
                    statusFilter.value = '';
                    trainFilterTable();
                }

                searchInput.addEventListener('input', trainFilterTable);
                categoryFilter.addEventListener('change', trainFilterTable);
                statusFilter.addEventListener('change', trainFilterTable);
                resetButton.addEventListener('click', resetFilters);
            });

            // ========== DROPDOWN TOGGLE ==========
            function trainToggleDropdown(id) {
                const menu = document.getElementById(`dropdown-menu-${id}`);
                const icon = document.getElementById(`dropdown-icon-${id}`);

                // Close all other dropdowns
                document.querySelectorAll('[id^="dropdown-menu-"]').forEach(dropdown => {
                    if (dropdown.id !== `dropdown-menu-${id}`) {
                        dropdown.classList.add('hidden');
                    }
                });
                document.querySelectorAll('[id^="dropdown-icon-"]').forEach(dropdownIcon => {
                    if (dropdownIcon.id !== `dropdown-icon-${id}`) {
                        dropdownIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle current dropdown
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    menu.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('[onclick^="trainToggleDropdown"]') && !event.target.closest('[id^="dropdown-menu-"]')) {
                    document.querySelectorAll('[id^="dropdown-menu-"]').forEach(dropdown => {
                        dropdown.classList.add('hidden');
                    });
                    document.querySelectorAll('[id^="dropdown-icon-"]').forEach(icon => {
                        icon.style.transform = 'rotate(0deg)';
                    });
                }
            });

            // ========== ADD MODAL FUNCTIONS ==========
            function trainAddProviderInput() {
                const container = document.getElementById('providerInputs');
                const index = providerCount;
                const newProvider = document.createElement('div');
                newProvider.className = 'flex flex-col gap-3 p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg border-2 border-purple-200';
                newProvider.innerHTML = `
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-bold text-purple-700">Program #${index + 1}</span>
            <button type="button" onclick="trainRemoveProviderInput(this)" class="p-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex items-start gap-2">
            <input type="text" name="providers[${index}][name]" required placeholder="Nama program" class="flex-1 px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm bg-white">
            <select name="providers[${index}][status]" class="w-28 px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm bg-white">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <textarea name="providers[${index}][description]" rows="2" placeholder="Deskripsi program (opsional)" class="w-full px-3 py-2.5 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm bg-white"></textarea>
        
        <div class="mt-2 pt-3 border-t border-purple-200">
            <label class="block text-xs font-semibold text-purple-700 mb-2">Pelatihan untuk program ini *</label>
            <div class="training-inputs-${index} space-y-2">
                <div class="flex flex-col gap-2 p-3 bg-white rounded-lg border border-purple-200">
                    <div class="flex items-start gap-2">
                        <input type="text" name="providers[${index}][trainings][0][name]" required placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                        <select name="providers[${index}][trainings][0][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <button type="button" onclick="trainRemoveTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <textarea name="providers[${index}][trainings][0][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"></textarea>
                </div>
            </div>
            <button type="button" onclick="trainAddTrainingToProvider(${index})" class="mt-2 inline-flex items-center px-3 py-1.5 bg-white text-purple-700 rounded-lg hover:bg-purple-50 transition text-xs font-medium border border-purple-200">
                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Tambah Pelatihan
            </button>
        </div>
    `;
                container.appendChild(newProvider);
                providerCount++;
            }

            function trainRemoveProviderInput(button) {
                const container = document.getElementById('providerInputs');
                if (container.children.length > 1) {
                    button.closest('.flex.flex-col.gap-3').remove();
                } else {
                    alert('Minimal harus ada satu program!');
                }
            }

            function trainAddTrainingToProvider(providerIndex) {
                const container = document.querySelector(`.training-inputs-${providerIndex}`);
                if (!container) {
                    console.error(`Container untuk provider ${providerIndex} tidak ditemukan.`);
                    return;
                }
                const trainingIndex = container.children.length;
                const newTraining = document.createElement('div');
                newTraining.className = 'flex flex-col gap-2 p-3 bg-white rounded-lg border border-purple-200';
                newTraining.innerHTML = `
        <div class="flex items-start gap-2">
            <input type="text" name="providers[${providerIndex}][trainings][${trainingIndex}][name]" required placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
            <select name="providers[${providerIndex}][trainings][${trainingIndex}][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button type="button" onclick="trainRemoveTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <textarea name="providers[${providerIndex}][trainings][${trainingIndex}][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none text-sm"></textarea>
    `;
                container.appendChild(newTraining);
            }

            function trainRemoveTrainingInput(button) {
                const container = button.closest('.space-y-2');
                if (container.children.length > 1) {
                    button.closest('.flex.flex-col.gap-2').remove();
                } else {
                    alert('Minimal harus ada satu pelatihan per program!');
                }
            }

            // ========== EDIT MODAL FUNCTIONS ==========
            let currentEditData = null;

            function trainAddEditProviderInput() {
                const container = document.getElementById('editProviderInputs');
                const index = editProviderCount;
                const newProvider = document.createElement('div');
                newProvider.className = 'flex flex-col gap-3 p-4 bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg border-2 border-amber-200';
                newProvider.innerHTML = `
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-bold text-amber-700">Program #${index + 1}</span>
                <button type="button" onclick="trainRemoveEditProviderInput(this)" class="p-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-start gap-2">
                <input type="text" name="providers[${index}][name]" required placeholder="Nama program" class="flex-1 px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm bg-white">
                <select name="providers[${index}][status]" class="w-28 px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm bg-white">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <textarea name="providers[${index}][description]" rows="2" placeholder="Deskripsi program (opsional)" class="w-full px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm bg-white"></textarea>
            
            <div class="mt-2 pt-3 border-t border-amber-200">
                <label class="block text-xs font-semibold text-amber-700 mb-2">Pelatihan untuk program ini *</label>
                <div class="edit-training-inputs-${index} space-y-2">
                    <div class="flex flex-col gap-2 p-3 bg-white rounded-lg border border-amber-200">
                        <div class="flex items-start gap-2">
                            <input type="text" name="providers[${index}][trainings][0][name]" required placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                            <select name="providers[${index}][trainings][0][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <button type="button" onclick="trainRemoveEditTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <textarea name="providers[${index}][trainings][0][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm"></textarea>
                    </div>
                </div>
                <button type="button" onclick="trainAddEditTrainingToProvider(${index})" class="mt-2 inline-flex items-center px-3 py-1.5 bg-white text-amber-700 rounded-lg hover:bg-amber-50 transition text-xs font-medium border border-amber-200">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Pelatihan
                </button>
            </div>
        `;
                container.appendChild(newProvider);
                editProviderCount++;
            }

            function trainRemoveEditProviderInput(button) {
                const container = document.getElementById('editProviderInputs');
                if (container.children.length > 1) {
                    button.closest('.flex.flex-col.gap-3').remove();
                    editProviderCount--;
                } else {
                    alert('Minimal harus ada satu program!');
                }
            }

            function trainAddEditTrainingToProvider(providerIndex) {
                const container = document.querySelector(`.edit-training-inputs-${providerIndex}`);
                if (!container) {
                    console.error(`Container untuk pelatihan provider ${providerIndex} tidak ditemukan.`);
                    return;
                }
                const trainingIndex = container.children.length;
                const newTraining = document.createElement('div');
                newTraining.className = 'flex flex-col gap-2 p-3 bg-white rounded-lg border border-amber-200';
                newTraining.innerHTML = `
        <div class="flex items-start gap-2">
            <input type="text" name="providers[${providerIndex}][trainings][${trainingIndex}][name]" required placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
            <select name="providers[${providerIndex}][trainings][${trainingIndex}][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            <button type="button" onclick="trainRemoveEditTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <textarea name="providers[${providerIndex}][trainings][${trainingIndex}][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm"></textarea>
    `;
                container.appendChild(newTraining);
            }

            function trainRemoveEditTrainingInput(button) {
                const container = button.closest('.space-y-2');
                if (container.children.length > 1) {
                    button.closest('.flex.flex-col.gap-2').remove();
                } else {
                    alert('Minimal harus ada satu pelatihan per program!');
                }
            }

            function trainOpenEditModal(data) {
                document.getElementById('editModal').classList.remove('hidden');
                document.getElementById('editId').value = data.id || '';
                document.getElementById('editCategory').value = data.category || '';
                document.getElementById('editCategoryId').value = data.category_id || '';

                const form = document.getElementById('editForm');
                form.action = `/training/${data.id}`;

                const container = document.getElementById('editProviderInputs');
                container.innerHTML = '';
                editProviderCount = 0;

                const providers = [{
                    name: data.provider,
                    description: data.provider_description,
                    status: data.status,
                    trainings: data.trainings || []
                }];

                providers.forEach((provider, pIndex) => {
                    const providerDiv = document.createElement('div');
                    providerDiv.className = 'flex flex-col gap-3 p-4 bg-gradient-to-br from-amber-50 to-amber-100 rounded-lg border-2 border-amber-200';

                    let trainingsHTML = '';
                    (provider.trainings || []).forEach((training, tIndex) => {
                        trainingsHTML += `
                <div class="flex flex-col gap-2 p-3 bg-white rounded-lg border border-amber-200">
                    <div class="flex items-start gap-2">
                        <input type="text" name="providers[${pIndex}][trainings][${tIndex}][name]" required value="${(training.name || '').replace(/"/g, '&quot;')}" placeholder="Nama pelatihan" class="flex-1 px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                        <select name="providers[${pIndex}][trainings][${tIndex}][status]" class="w-24 px-2 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm">
                            <option value="active" ${(training.status || 'active') === 'active' ? 'selected' : ''}>Active</option>
                            <option value="inactive" ${(training.status || 'active') === 'inactive' ? 'selected' : ''}>Inactive</option>
                        </select>
                        <button type="button" onclick="trainRemoveEditTrainingInput(this)" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <textarea name="providers[${pIndex}][trainings][${tIndex}][description]" rows="2" placeholder="Deskripsi pelatihan (opsional)" class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm">${(training.description || '').replace(/"/g, '&quot;')}</textarea>
                </div>
            `;
                    });

                    providerDiv.innerHTML = `
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-bold text-amber-700">Program #${pIndex + 1}</span>
                <button type="button" onclick="trainRemoveEditProviderInput(this)" class="p-1.5 bg-red-100 text-red-600 rounded-lg hover:bg-red-200 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex items-start gap-2">
                <input type="text" name="providers[${pIndex}][name]" required value="${(provider.name || '').replace(/"/g, '&quot;')}" placeholder="Nama program" class="flex-1 px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm bg-white">
                <select name="providers[${pIndex}][status]" class="w-28 px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent text-sm bg-white">
                    <option value="active" ${(provider.status || 'active') === 'active' ? 'selected' : ''}>Active</option>
                    <option value="inactive" ${(provider.status || 'active') === 'inactive' ? 'selected' : ''}>Inactive</option>
                </select>
            </div>
            <textarea name="providers[${pIndex}][description]" rows="2" placeholder="Deskripsi program (opsional)" class="w-full px-3 py-2.5 border border-amber-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent resize-none text-sm bg-white">${(provider.description || '').replace(/"/g, '&quot;')}</textarea>
            
            <div class="mt-2 pt-3 border-t border-amber-200">
                <label class="block text-xs font-semibold text-amber-700 mb-2">Pelatihan untuk program ini *</label>
                <div class="edit-training-inputs-${pIndex} space-y-2">
                    ${trainingsHTML}
                </div>
                <button type="button" onclick="trainAddEditTrainingToProvider(${pIndex})" class="mt-2 inline-flex items-center px-3 py-1.5 bg-white text-amber-700 rounded-lg hover:bg-amber-50 transition text-xs font-medium border border-amber-200">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Pelatihan
                </button>
            </div>
        `;
                    container.appendChild(providerDiv);
                    editProviderCount++;
                });
                currentEditData = data;
            }

            // ========== MODAL CONTROLS ==========
            function trainOpenAddModal() {
                document.getElementById('addModal').classList.remove('hidden');
                providerCount = 1;
                const container = document.getElementById('providerInputs');
                if (container.children.length === 0) {
                    trainAddProviderInput();
                }
            }

            function trainOpenAddModalWithCategory(categoryName) {
                document.getElementById('addModal').classList.remove('hidden');
                providerCount = 1;
                const container = document.getElementById('providerInputs');
                if (container.children.length === 0) {
                    trainAddProviderInput();
                }
                // Pre-select the category
                const categorySelect = document.querySelector('#addModal select[name="category"]');
                if (categorySelect) {
                    categorySelect.value = categoryName;
                }
            }

            function trainCloseAddModal() {
                document.getElementById('addModal').classList.add('hidden');
            }

            function trainCloseEditModal() {
                document.getElementById('editModal').classList.add('hidden');
                editProviderCount = 0;
                currentEditData = null;
            }

            function trainOpenDeleteModal(data) {
                document.getElementById('deleteModal').classList.remove('hidden');
                document.getElementById('deleteProviderName').textContent = data.provider || 'ini';
                const form = document.getElementById('deleteForm');
                form.action = `/training/${data.id}`;
            }

            function trainCloseDeleteModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }

            // Close modal when clicking outside
            document.querySelectorAll('[id$="Modal"]').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) this.classList.add('hidden');
                });
            });
        </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\training.blade.php ENDPATH**/ ?>