<?php $__env->startSection('title', 'Training Programs | Indonesia Drilling School'); ?>


<?php $__env->startSection('content'); ?>
<div class="program-portal">
    <!-- Hero Section -->
    <section class="pp-hero-section">
        <div class="pp-hero-overlay">
            <img src="<?php echo e(asset('images/imgHeroProgram.jpg')); ?>"
                alt="Oil Rig Background"
                class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="pp-hero-content">
            <div class="pp-container">
                <div class="pp-hero-text" data-aos="fade-up">
                    <h1 class="pp-hero-title">Welcome to the Indonesia Drilling School Training Portal</h1>
                    <p class="pp-hero-subtitle">Your gateway to professional development and certification.</p>
                    <button class="pp-cta-button" onclick="scrollToPrograms()">
                        <span>Explore Programs</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="pp-hero-scroll-indicator">
            <div class="pp-scroll-line"></div>
            <span>Scroll</span>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="pp-programs-section" id="programs">
        <div class="pp-container">
            <div class="pp-section-header" data-aos="fade-up">
                <h2 class="pp-section-title">Select a Training Category</h2>
                <p class="pp-section-subtitle">Choose from our comprehensive range of professional training programs</p>
            </div>

            <div class="pp-programs-grid">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pp-program-card" data-aos="fade-up">
                    <div class="pp-program-icon">
                        <?php echo $category->icon; ?>

                    </div>
                    <div class="pp-program-content">
                        <h3 class="pp-program-title"><?php echo e($category->title); ?></h3>
                        <p class="pp-program-description"><?php echo e($category->description); ?></p>
                        <a href="<?php echo e(route('program.category', $category->slug)); ?>" class="pp-program-link">
                            <span>Learn More</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fix AOS animation issue on back navigation
        const programCards = document.querySelectorAll('.pp-program-card');

        // Ensure all cards are clickable immediately
        programCards.forEach(card => {
            // Force enable pointer events
            card.style.pointerEvents = 'auto';
            card.style.opacity = '1';

            // Remove any transition delays that might cause issues
            const link = card.querySelector('.pp-program-link');
            if (link) {
                link.style.pointerEvents = 'auto';
            }
        });

        // Handle page visibility change (when user comes back to page)
        document.addEventListener('visibilitychange', function() {
            if (!document.hidden) {
                // Re-enable all cards when page becomes visible
                programCards.forEach(card => {
                    card.style.pointerEvents = 'auto';
                    card.style.opacity = '1';
                    card.classList.remove('aos-animate');
                    setTimeout(() => {
                        card.classList.add('aos-animate');
                    }, 10);
                });
            }
        });

        // Handle browser back button
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                // Page was loaded from cache (back button)
                programCards.forEach(card => {
                    card.style.pointerEvents = 'auto';
                    card.style.opacity = '1';
                    card.style.transform = 'none';

                    // Force reflow
                    void card.offsetWidth;

                    // Re-initialize AOS for this element
                    if (typeof AOS !== 'undefined') {
                        card.classList.remove('aos-animate');
                        setTimeout(() => {
                            card.classList.add('aos-animate');
                        }, 10);
                    }
                });
            }
        });

        // Ensure links are always clickable
        const programLinks = document.querySelectorAll('.pp-program-link');
        programLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Prevent any potential blocking
                e.stopPropagation();
            });
        });

        // Additional safeguard: force refresh AOS after a short delay
        setTimeout(function() {
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }

            // Double-check all cards are interactive
            programCards.forEach(card => {
                card.style.pointerEvents = 'auto';
                card.style.opacity = '1';
            });
        }, 500);

        // Handle hash navigation (if coming back with #programs)
        if (window.location.hash) {
            setTimeout(function() {
                programCards.forEach(card => {
                    card.style.pointerEvents = 'auto';
                    card.style.opacity = '1';
                });
            }, 100);
        }
    });

    // Global function to ensure cards remain clickable
    function ensureCardsClickable() {
        const cards = document.querySelectorAll('.pp-program-card');
        cards.forEach(card => {
            card.style.pointerEvents = 'auto';
            card.style.opacity = '1';
        });
    }

    // Call this function periodically as a safeguard
    setInterval(ensureCardsClickable, 1000);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/program.blade.php ENDPATH**/ ?>