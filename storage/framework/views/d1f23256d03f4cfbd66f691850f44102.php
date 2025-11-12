<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800"><?php echo e($pageTitle); ?></h1>
                    <p class="mt-2 text-sm text-slate-600">Selamat datang kembali, <?php echo e(Auth::user()->name ?? 'Admin'); ?>!</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-slate-600"><?php echo e(now()->isoFormat('dddd, D MMMM YYYY')); ?></p>
                    <p class="text-xs text-slate-500 mt-1"><?php echo e(now()->format('H:i')); ?> WIB</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Articles -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Artikel</p>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($stats['totalArticles']); ?></p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-green-600 font-semibold">+<?php echo e($stats['newArticlesThisMonth']); ?></span> bulan ini
                        </p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Programs -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total Program</p>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($stats['totalPrograms']); ?></p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-blue-600 font-semibold"><?php echo e($stats['activePrograms']); ?></span> aktif
                        </p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Total User</p>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($stats['totalUsers']); ?></p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-green-600 font-semibold">+<?php echo e($stats['newUsersThisWeek']); ?></span> minggu ini
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg">
                        <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Inquiries -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-slate-600 mb-1">Inquiry Pending</p>
                        <p class="text-3xl font-bold text-slate-800"><?php echo e($stats['pendingInquiries']); ?></p>
                        <p class="text-xs text-slate-500 mt-2">
                            <span class="text-amber-600 font-semibold"><?php echo e($stats['unreadInquiries']); ?></span> belum dibaca
                        </p>
                    </div>
                    <div class="p-3 bg-amber-100 rounded-lg">
                        <svg class="w-6 h-6 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Recent Articles -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-slate-800">Artikel Terbaru</h2>
                    <a href="<?php echo e(route('articleadmin.index')); ?>" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                        Lihat Semua →
                    </a>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php $__currentLoopData = $recentArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start space-x-4 p-4 bg-slate-50 rounded-lg hover:bg-slate-100 transition">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br <?php echo e($article['colorClass']); ?> rounded-lg flex items-center justify-center">
                                    <span class="text-white font-bold text-lg"><?php echo e(substr($article['title'], 0, 1)); ?></span>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-1">
                                    <h3 class="text-sm font-semibold text-slate-900 truncate"><?php echo e($article['title']); ?></h3>
                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($article['statusClass']); ?>">
                                        <?php echo e($article['status']); ?>

                                    </span>
                                </div>
                                <p class="text-xs text-slate-600 mb-2"><?php echo e($article['category']); ?></p>
                                <div class="flex items-center text-xs text-slate-500">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    <span><?php echo e($article['author']); ?></span>
                                    <span class="mx-2">•</span>
                                    <span><?php echo e($article['date']); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Inquiries -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                        <h2 class="text-lg font-semibold text-slate-800">Quick Actions</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="<?php echo e(route('articleadmin.index')); ?>" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                                <div class="p-2 bg-purple-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah Artikel</span>
                            </a>
                            <a href="<?php echo e(route('categories.index')); ?>" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                                <div class="p-2 bg-blue-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah Program</span>
                            </a>
                            <a href="<?php echo e(route('users.index')); ?>" class="flex items-center p-3 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                                <div class="p-2 bg-green-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Tambah User</span>
                            </a>
                            <a href="<?php echo e(route('contactadmin')); ?>" class="flex items-center p-3 bg-amber-50 hover:bg-amber-100 rounded-lg transition group">
                                <div class="p-2 bg-amber-500 rounded-lg mr-3 group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Lihat Inquiry</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Inquiries -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-slate-800">Inquiry Terbaru</h2>
                        <a href="<?php echo e(route('contactadmin')); ?>" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <?php $__currentLoopData = $recentInquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-start space-x-3 p-3 bg-slate-50 rounded-lg hover:bg-slate-100 transition">
                                <?php if(!$inquiry['is_read']): ?>
                                <span class="inline-block w-2 h-2 bg-blue-600 rounded-full mt-2 flex-shrink-0 animate-pulse"></span>
                                <?php endif; ?>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold text-slate-900 truncate"><?php echo e($inquiry['name']); ?></h4>
                                    <p class="text-xs text-slate-600 truncate"><?php echo e($inquiry['subject']); ?></p>
                                    <p class="text-xs text-slate-500 mt-1"><?php echo e($inquiry['time']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Articles by Category -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                    <h2 class="text-lg font-semibold text-slate-800">Artikel per Kategori</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php $__currentLoopData = $articlesByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-slate-700"><?php echo e($category['name']); ?></span>
                                <span class="text-sm font-semibold text-slate-900"><?php echo e($category['count']); ?></span>
                            </div>
                            <div class="w-full bg-slate-200 rounded-full h-2">
                                <div class="h-2 rounded-full <?php echo e($category['colorClass']); ?>" style="width: <?php echo e($category['percentage']); ?>%"></div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- System Activity -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
                    <h2 class="text-lg font-semibold text-slate-800">Aktivitas Sistem</h2>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <?php $__currentLoopData = $systemActivity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 rounded-full <?php echo e($activity['iconBg']); ?> flex items-center justify-center">
                                    <?php echo $activity['icon']; ?>

                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-slate-800"><?php echo $activity['description']; ?></p>
                                <p class="text-xs text-slate-500 mt-1"><?php echo e($activity['time']); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminmain', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\indo_drilling_school\resources\views/dashboardadmin.blade.php ENDPATH**/ ?>