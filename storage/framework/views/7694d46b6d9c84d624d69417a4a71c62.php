<?php $__env->startSection('title', 'Articles & Training Insights | Indonesia Drilling School'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section with Dynamic Background -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden pt-20 pb-16">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-700 to-slate-900">
        <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80"
            alt="Articles Background" class="w-full h-full object-cover mix-blend-overlay opacity-40">
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-800/30 to-transparent"></div>

    <!-- Subtle red accent overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/10 via-transparent to-blue-900/10"></div>

    <!-- Animated particles background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="particles-container"></div>
    </div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block px-4 py-2 bg-red-500/15 backdrop-blur-sm border border-red-400/20 rounded-full mb-6 animate-fade-in-up" data-aos="fade-up" data-aos-delay="100">
            <span class="text-red-300 font-semibold text-sm tracking-wider uppercase">Knowledge Hub</span>
        </div>
        <h1 class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold mb-6 text-white leading-tight px-4 animate-fade-in-up" data-aos="fade-up" data-aos-delay="200">
            Latest Articles & <br>
            <span class="bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 bg-clip-text text-transparent">Training Insights</span>
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed mb-8 px-4 animate-fade-in-up" data-aos="fade-up" data-aos-delay="300">
            Stay informed with the latest updates, safety knowledge, and oil & gas training trends
        </p>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto mt-12 px-4" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="<?php echo e($stats['total_articles']); ?>">0</div>
                <div class="text-sm text-gray-300">Articles</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="<?php echo e($stats['categories']); ?>">0</div>
                <div class="text-sm text-gray-300">Categories</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1 counter-number" data-count="<?php echo e($stats['total_views']); ?>">0</div>
                <div class="text-sm text-gray-300">Readers</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-4 hover:bg-white/15 transition duration-300">
                <div class="text-3xl font-bold text-white mb-1">Weekly</div>
                <div class="text-sm text-gray-300">Updates</div>
            </div>
        </div>
    </div>
</section>

<!-- Search & Filter Section -->
<section class="py-12 bg-gradient-to-b from-gray-50 to-white px-4">
    <div class="max-w-7xl mx-auto">
        <form action="<?php echo e(route('articles.index')); ?>" method="GET">
            <div class="grid lg:grid-cols-4 gap-6">
                <!-- Search Bar -->
                <div class="lg:col-span-3" data-aos="fade-right">
                    <div class="relative">
                        <input type="text"
                            id="searchArticles"
                            name="search"
                            value="<?php echo e(request('search')); ?>"
                            placeholder="Search articles, topics, keywords..."
                            class="w-full px-6 py-4 pl-14 bg-white border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-4 focus:ring-red-100 transition duration-300 text-lg shadow-lg">
                        <i class="fa-solid fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-xl"></i>
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 bg-red-700 text-white px-6 py-2 rounded-xl hover:bg-red-800 hover:shadow-lg transition duration-300 font-semibold">
                            Search
                        </button>
                    </div>
                </div>

                <!-- Quick Filter -->
                <div class="lg:col-span-1" data-aos="fade-left">
                    <select name="category"
                        id="categoryFilter"
                        onchange="this.form.submit()"
                        class="w-full px-6 py-4 bg-white border-2 border-gray-200 rounded-2xl focus:border-red-500 focus:ring-4 focus:ring-red-100 transition duration-300 text-lg shadow-lg appearance-none cursor-pointer">
                        <option value="all" <?php echo e(request('category') == 'all' ? 'selected' : ''); ?>>All Categories</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->slug); ?>" <?php echo e(request('category') == $cat->slug ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Main Content: Articles Grid with Sidebar -->
<section class="py-20 bg-white px-4">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-12">

            <!-- Articles Grid (Main Content) -->
            <div class="lg:col-span-2">
                <div class="grid md:grid-cols-2 gap-8" id="articlesGrid">

                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <article class="article-card group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
                        data-aos="fade-up"
                        data-category="<?php echo e($article->category->slug); ?>">
                        <div class="relative overflow-hidden aspect-video">
                            <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>"
                                alt="<?php echo e($article->title); ?>"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 left-4">
                                <span class="inline-flex items-center gap-2 px-3 py-1 bg-<?php echo e($article->category->color); ?>-600 text-white text-xs font-bold rounded-full uppercase tracking-wide">
                                    <i class="<?php echo e('fa-solid fa-folder'); ?>"></i>
                                    <?php echo e($article->category->name); ?>

                                </span>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-4 text-sm text-gray-500 mb-3">
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-calendar"></i>
                                    <?php echo e($article->formatted_date); ?>

                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    <?php echo e($article->reading_time); ?>

                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-red-600 transition duration-300 line-clamp-2">
                                <?php echo e($article->title); ?>

                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                                <?php echo strip_tags($article->excerpt); ?>

                            </p>
                            <a href="<?php echo e(route('articles.show', $article->slug)); ?>"
                                class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all duration-300">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-2 text-center py-12">
                        <div class="inline-block p-8 bg-gray-50 rounded-2xl">
                            <i class="fa-solid fa-newspaper text-6xl text-gray-300 mb-4"></i>
                            <p class="text-xl text-gray-500 font-semibold">No articles found.</p>
                            <p class="text-gray-400 mt-2">Try adjusting your search or filter criteria.</p>
                            <a href="<?php echo e(route('articles.index')); ?>" class="inline-block mt-4 px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                Clear Filters
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>

                <!-- Pagination -->
                <?php if($articles->hasPages()): ?>
                <div class="flex justify-center items-center gap-2 mt-12" data-aos="fade-up">
                    <div class="flex items-center gap-2">
                        
                        <?php if($articles->onFirstPage()): ?>
                        <button disabled class="w-10 h-10 rounded-lg border-2 border-gray-200 flex items-center justify-center text-gray-300 cursor-not-allowed">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <?php else: ?>
                        <a href="<?php echo e($articles->previousPageUrl()); ?>" class="w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-red-600 transition duration-300">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = range(1, $articles->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $articles->currentPage()): ?>
                        <button class="w-10 h-10 rounded-lg bg-red-600 text-white font-bold"><?php echo e($page); ?></button>
                        <?php elseif($page == 1 || $page == $articles->lastPage() || abs($page - $articles->currentPage()) <= 2): ?>
                            <a href="<?php echo e($articles->url($page)); ?>" class="w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-red-600 transition duration-300">
                            <?php echo e($page); ?>

                            </a>
                            <?php elseif(abs($page - $articles->currentPage()) == 3): ?>
                            <span class="px-2 text-gray-500">...</span>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            <?php if($articles->hasMorePages()): ?>
                            <a href="<?php echo e($articles->nextPageUrl()); ?>" class="w-10 h-10 rounded-lg border-2 border-gray-300 flex items-center justify-center hover:border-red-600 hover:text-red-600 transition duration-300">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                            <?php else: ?>
                            <button disabled class="w-10 h-10 rounded-lg border-2 border-gray-200 flex items-center justify-center text-gray-300 cursor-not-allowed">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                            <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="sticky top-36 space-y-8">

                    <!-- Categories Widget -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 shadow-xl border border-gray-100" data-aos="fade-left">
                        <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-folder-open" style="color: #b91c1c;"></i>
                            Categories
                        </h3>
                        <ul class="space-y-3">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <?php
                                $isActive = request('category') == $category->slug;
                                $bgClass = match($category->color) {
                                'red' => $isActive ? 'bg-red-50' : 'hover:bg-red-50',
                                'orange' => $isActive ? 'bg-orange-50' : 'hover:bg-orange-50',
                                'blue' => $isActive ? 'bg-blue-50' : 'hover:bg-blue-50',
                                'green' => $isActive ? 'bg-green-50' : 'hover:bg-green-50',
                                'purple' => $isActive ? 'bg-purple-50' : 'hover:bg-purple-50',
                                default => 'hover:bg-gray-50'
                                };
                                $textClass = match($category->color) {
                                'red' => 'group-hover:text-red-600',
                                'orange' => 'group-hover:text-orange-600',
                                'blue' => 'group-hover:text-blue-600',
                                'green' => 'group-hover:text-green-600',
                                'purple' => 'group-hover:text-purple-600',
                                default => 'group-hover:text-gray-600'
                                };
                                $badgeBgClass = match($category->color) {
                                'red' => 'bg-red-100',
                                'orange' => 'bg-orange-100',
                                'blue' => 'bg-blue-100',
                                'green' => 'bg-green-100',
                                'purple' => 'bg-purple-100',
                                default => 'bg-gray-100'
                                };
                                $badgeTextClass = match($category->color) {
                                'red' => 'text-red-600',
                                'orange' => 'text-orange-600',
                                'blue' => 'text-blue-600',
                                'green' => 'text-green-600',
                                'purple' => 'text-purple-600',
                                default => 'text-gray-600'
                                };
                                ?>
                                <a href="<?php echo e(route('articles.index', ['category' => $category->slug])); ?>"
                                    class="flex items-center justify-between p-3 rounded-xl <?php echo e($bgClass); ?> transition duration-300 group">
                                    <span class="flex items-center gap-2 text-gray-700 <?php echo e($textClass); ?> font-medium">
                                        <i class="<?php echo e('fa-solid fa-folder'); ?>"></i>
                                        <?php echo e($category->name); ?>

                                    </span>
                                    <span class="text-sm <?php echo e($badgeBgClass); ?> <?php echo e($badgeTextClass); ?> px-3 py-1 rounded-full font-bold">
                                        <?php echo e($category->published_articles_count); ?>

                                    </span>
                                </a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <!-- Recent Articles Widget -->
                    <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-6 shadow-xl" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="text-2xl font-bold text-white mb-6 flex items-center gap-2">
                            <i class="fa-solid fa-fire text-orange-400"></i>
                            Recent Articles
                        </h3>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $recentArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('articles.show', $recent->slug)); ?>" class="flex gap-4 group">
                                <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>"
                                    alt="<?php echo e($recent->title); ?>"
                                    class="w-20 h-20 object-cover rounded-xl group-hover:scale-110 transition duration-300">
                                <div class="flex-1">
                                    <h4 class="text-white font-semibold mb-1 line-clamp-2 group-hover:text-red-400 transition duration-300">
                                        <?php echo e($recent->title); ?>

                                    </h4>
                                    <p class="text-gray-400 text-sm"><?php echo e($recent->formatted_date); ?></p>
                                </div>
                            </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-br from-slate-900 via-red-900 to-slate-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 text-center relative z-10" data-aos="zoom-in">
        <div class="inline-block px-4 py-2 bg-red-600/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-6">
            <span class="text-red-400 font-semibold text-sm tracking-wider uppercase">Take Action</span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
            Interested in learning more about<br>
            our training programs?
        </h2>
        <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto">
            Discover comprehensive courses designed by industry experts to advance your career in oil & gas
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo e(route('program.index')); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 text-white font-bold rounded-xl hover:shadow-2xl hover:shadow-red-600/50 transition-all duration-300 transform hover:scale-105">
                Explore Programs
                <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="/contact" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/20 transition-all duration-300">
                <i class="fa-solid fa-phone"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Counter Animation Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter-number');

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current);
                }
            }, 16);
        };

        // Intersection Observer for counter animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        counters.forEach(counter => observer.observe(counter));
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\articles.blade.php ENDPATH**/ ?>