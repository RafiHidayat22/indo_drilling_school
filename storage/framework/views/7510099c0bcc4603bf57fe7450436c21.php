<?php $__env->startSection('title', $article->meta_title ?? $article->title . ' | Indonesia Drilling School'); ?>

<?php $__env->startSection('meta_description', $article->meta_description ?? $article->excerpt); ?>

<?php $__env->startSection('content'); ?>
<!-- Reading Progress Bar -->
<div id="reading-progress"></div>

<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-[60vh] md:min-h-[65vh] lg:min-h-[70vh] flex items-center">
    <div class="absolute inset-0 opacity-10">
        <?php if($article->featured_image): ?>
        <div class="absolute inset-0" style="background-image: url('<?php echo e(asset('storage/' . $article->featured_image)); ?>'); background-size: cover; background-position: center;"></div>
        <?php endif; ?>
    </div>
    <div class="particles-container"></div>

    <div class="relative z-10 w-full py-16 md:py-20 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Breadcrumb -->
                <div class="mb-6 animate-fade-in-up" style="animation-delay: 0.05s;">
                    <nav class="flex items-center gap-2 text-sm text-gray-300">
                        <a href="/" class="hover:text-red-400 transition">Home</a>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                        <a href="<?php echo e(route('articles.index')); ?>" class="hover:text-red-400 transition">Articles</a>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                        <a href="<?php echo e(route('articles.index', ['category' => $article->category->slug])); ?>" class="hover:text-red-400 transition"><?php echo e($article->category->name); ?></a>
                        <i class="fa-solid fa-chevron-right text-xs"></i>
                        <span class="text-gray-400">Current Article</span>
                    </nav>
                </div>

                <!-- Category Badge -->
                <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <?php
                    $categoryBgClass = match($article->category->color) {
                    'red' => 'bg-red-600 hover:bg-red-700',
                    'orange' => 'bg-orange-600 hover:bg-orange-700',
                    'blue' => 'bg-blue-600 hover:bg-blue-700',
                    'green' => 'bg-green-600 hover:bg-green-700',
                    'purple' => 'bg-purple-600 hover:bg-purple-700',
                    default => 'bg-gray-600 hover:bg-gray-700'
                    };
                    ?>
                    <a href="<?php echo e(route('articles.index', ['category' => $article->category->slug])); ?>" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white <?php echo e($categoryBgClass); ?> backdrop-blur-sm rounded-full shadow-lg transition">
                        <i class="<?php echo e('fa-solid fa-folder'); ?>"></i>
                        <?php echo e($article->category->name); ?>

                    </a>
                </div>

                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-8 leading-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    <?php echo e($article->title); ?>

                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-6 lg:gap-8 text-gray-300 animate-fade-in-up" style="animation-delay: 0.3s;">

                    <div class="hidden md:block h-12 w-px bg-gray-700"></div>

                    <div class="flex flex-wrap items-center gap-4 lg:gap-6 text-sm md:text-base">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-calendar"></i>
                            <?php echo e($article->formatted_date); ?>

                        </span>
                        <span class="hidden sm:inline">•</span>
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-clock"></i>
                            <?php echo e($article->reading_time); ?>

                        </span>
                        <span class="hidden sm:inline">•</span>
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-eye"></i>
                            <?php echo e(number_format($article->views_count)); ?> views
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Article Content -->
<article class="bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">

            <!-- Featured Image -->
            <?php if($article->featured_image): ?>
            <div class="py-12">
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>"
                        alt="<?php echo e($article->title); ?>"
                        class="w-full h-auto object-cover">
                </div>
                <?php if($article->featured_image_caption): ?>
                <p class="mt-4 text-center text-sm text-gray-500 italic">
                    <?php echo e($article->featured_image_caption); ?>

                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>


            <!-- Article Body -->
            <div class="prose prose-lg max-w-prose pb-12 mx-auto">
                <?php echo $article->content; ?>

            </div>


            <!-- Navigation to Previous/Next Articles -->
            <div class="my-12 grid md:grid-cols-2 gap-6">
                <?php
                $prevArticle = \App\Models\Article::published()
                ->where('published_at', '<', $article->published_at)
                    ->orderBy('published_at', 'desc')
                    ->first();
                    $nextArticle = \App\Models\Article::published()
                    ->where('published_at', '>', $article->published_at)
                    ->orderBy('published_at', 'asc')
                    ->first();
                    ?>

                    <?php if($prevArticle): ?>
                    <a href="<?php echo e(route('articles.show', $prevArticle->slug)); ?>" class="group p-6 bg-gray-50 hover:bg-gray-100 rounded-xl border border-gray-200 transition">
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Previous Article</span>
                        </div>
                        <h4 class="font-bold text-gray-900 group-hover:text-red-600 transition line-clamp-2">
                            <?php echo e($prevArticle->title); ?>

                        </h4>
                    </a>
                    <?php else: ?>
                    <div></div>
                    <?php endif; ?>

                    <?php if($nextArticle): ?>
                    <a href="<?php echo e(route('articles.show', $nextArticle->slug)); ?>" class="group p-6 bg-gray-50 hover:bg-gray-100 rounded-xl border border-gray-200 transition text-right">
                        <div class="flex items-center justify-end gap-2 text-sm text-gray-500 mb-2">
                            <span>Next Article</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                        <h4 class="font-bold text-gray-900 group-hover:text-red-600 transition line-clamp-2">
                            <?php echo e($nextArticle->title); ?>

                        </h4>
                    </a>
                    <?php endif; ?>
            </div>

        </div>
    </div>
</article>

<!-- Related Articles Section -->
<?php if($relatedArticles->count() > 0): ?>
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Related Articles</h2>
                <p class="text-gray-600">Continue exploring our knowledge base</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="article-card group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative overflow-hidden h-48">
                        <?php if($related->featured_image): ?>
                        <img src="<?php echo e(asset('storage/' . $related->featured_image)); ?>"
                            alt="<?php echo e($related->title); ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <?php else: ?>
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <i class="fa-solid fa-image text-gray-400 text-4xl"></i>
                        </div>
                        <?php endif; ?>
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold text-white bg-<?php echo e($related->category->color); ?>-600 rounded-full shadow-lg">
                                <i class="<?php echo e($related->category->icon ?? 'fa-solid fa-folder'); ?>"></i>
                                <?php echo e($related->category->name); ?>

                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i>
                                <?php echo e($related->formatted_date); ?>

                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <i class="fa-regular fa-clock"></i>
                                <?php echo e($related->reading_time); ?>

                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                            <?php echo e($related->title); ?>

                        </h3>
                        <a href="<?php echo e(route('articles.show', $related->slug)); ?>"
                            class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all text-sm">
                            Read Article
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<!-- Additional CSS for Article Page -->
<style>
    /* Prose styling */
    .prose {
        color: #374151;
        line-height: 1.75;
    }

    .prose h2 {
        margin-top: 2rem;
        margin-bottom: 1.5rem;
        line-height: 1.3;
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
    }

    .prose h3 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        line-height: 1.4;
        font-size: 1.5rem;
        font-weight: 600;
        color: #374151;
    }

    .prose p {
        margin-bottom: 1.25rem;
    }

    .prose strong {
        font-weight: 600;
        color: #1f2937;
    }

    .prose ul,
    .prose ol {
        margin: 1.25rem 0;
        padding-left: 1.75rem;
    }

    .prose li {
        margin-bottom: 0.5rem;
    }

    .prose a {
        color: #dc2626;
        text-decoration: none;
        font-weight: 500;
    }

    .prose a:hover {
        text-decoration: underline;
    }

    .prose img {
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
        margin: 2rem 0;
    }

    .prose blockquote {
        border-left: 4px solid #dc2626;
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #6b7280;
    }

    .prose code {
        background-color: #f3f4f6;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.875em;
        color: #dc2626;
    }

    /* Line clamp utility */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Reading progress bar */
    #reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(to right, #dc2626, #f97316);
        z-index: 9999;
        transition: width 0.1s ease;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Focus styles for accessibility */
    button:focus-visible,
    a:focus-visible {
        outline: 2px solid #dc2626;
        outline-offset: 2px;
    }
</style>

<!-- JavaScript for Article Page -->
<script>
    // Share functionality
    function shareArticle(platform) {
        const title = '<?php echo e(addslashes($article->title)); ?>';
        const url = window.location.href;
        const text = 'Check out this article: ' + title;

        let shareUrl = '';

        switch (platform) {
            case 'facebook':
                shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                break;
            case 'twitter':
                shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`;
                break;
            case 'linkedin':
                shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`;
                break;
            case 'whatsapp':
                shareUrl = `https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`;
                break;
        }

        if (shareUrl) {
            window.open(shareUrl, '_blank', 'width=600,height=400');
        }
    }

    // Copy link functionality
    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-8 right-8 bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl z-50 animate-fade-in-up';
            notification.innerHTML = '<i class="fa-solid fa-check mr-2"></i>Link copied to clipboard!';
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }).catch(() => {
            alert('Failed to copy link');
        });
    }

    // Newsletter form handler
    function handleNewsletterSubmit(event) {
        event.preventDefault();
        const email = event.target.querySelector('input[type="email"]').value;

        if (email) {
            // Show success notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-8 right-8 bg-green-600 text-white px-6 py-4 rounded-lg shadow-2xl z-50 animate-fade-in-up';
            notification.innerHTML = '<i class="fa-solid fa-check mr-2"></i>Thank you for subscribing!';
            document.body.appendChild(notification);

            event.target.reset();

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        return false;
    }

    // Reading progress indicator
    function updateReadingProgress() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;

        let progressBar = document.getElementById('reading-progress');
        if (progressBar) {
            progressBar.style.width = scrolled + '%';
        }
    }

    window.addEventListener('scroll', updateReadingProgress);

    // Initialize on DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth scroll to anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views\articlespv.blade.php ENDPATH**/ ?>