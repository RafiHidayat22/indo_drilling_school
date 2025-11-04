<?php $__env->startSection('title', $programTitle . ' | Indonesia Drilling School'); ?>

<?php $__env->startSection('content'); ?>
<div class="program-detail">
    <!-- Hero Section -->
    <section class="pd-hero-section">
        <div class="pd-hero-overlay"></div>
        <div class="pd-hero-content">
            <div class="pd-container">
                <div class="pd-breadcrumb" data-aos="fade-down">
                    <a href="/">Home</a>
                    <span>/</span>
                    <a href="/program">Training Programs</a>
                    <span>/</span>
                    <span><?php echo e($programTitle); ?></span>
                </div>
                <div class="pd-hero-text" data-aos="fade-up">
                    <div class="pd-hero-icon">
                        <?php echo $programIcon; ?>

                    </div>
                    <h1 class="pd-hero-title"><?php echo e($programTitle); ?></h1>
                    <p class="pd-hero-subtitle"><?php echo e($programDescription); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="pd-courses-section">
        <div class="pd-container">
            <div class="pd-section-header" data-aos="fade-up">
                <h2 class="pd-section-title">Training by Company</h2>
                <p class="pd-section-subtitle">Click a company to view available training courses</p>
            </div>

            <div class="pd-courses-list">
                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pd-course-item" data-aos="fade-up">
                    <div class="pd-item-header" onclick="toggleSubcategory(<?php echo e($loop->index); ?>)">
                        <div class="pd-item-title-wrapper">
                            <div class="pd-expand-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="pd-item-title"><?php echo e($subcategory->title); ?></h3>
                                <p class="pd-item-subtitle"><?php echo e($subcategory->description); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pd-item-content" id="subcategory-content-<?php echo e($loop->index); ?>">
                        <div class="pd-training-detail">
                            <div class="pd-company-trainings">
                                <?php $__currentLoopData = $subcategory->trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pd-training-item">
                                    <h4 class="pd-training-title"><?php echo e($training->title); ?></h4>
                                    <p class="pd-training-description"><?php echo e($training->description); ?></p>
                                    <a href="<?php echo e(route('program.training', [$programSlug, $subcategory->slug, $training->slug])); ?>" 
                                    class="pd-enroll-button">
                                        <span>Enroll Now</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="pd-cta-section" data-aos="fade-up">
        <div class="pd-container">
            <div class="pd-cta-content">
                <h2>Ready to Start Your Journey?</h2>
                <p>Join thousands of professionals who have advanced their careers with our training programs</p>
                <div class="pd-cta-buttons">
                    <a href="/contact" class="pd-cta-primary">Contact Us</a>
                    <a href="/programs" class="pd-cta-secondary">View All Programs</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function toggleSubcategory(index) {
    const content = document.getElementById('subcategory-content-' + index);
    const item = content.closest('.pd-course-item');
    const icon = item.querySelector('.pd-expand-icon svg');
    
    // Tutup item lain (opsional)
    document.querySelectorAll('.pd-course-item.active').forEach(activeItem => {
        if (activeItem !== item) {
            activeItem.classList.remove('active');
            const activeContent = activeItem.querySelector('.pd-item-content');
            activeContent.style.maxHeight = '0';
        }
    });
    
    // Toggle item saat ini
    item.classList.toggle('active');
    
    if (item.classList.contains('active')) {
        content.style.maxHeight = content.scrollHeight + 'px';
    } else {
        content.style.maxHeight = '0';
    }
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\indo_drilling_school\resources\views/programDetail.blade.php ENDPATH**/ ?>