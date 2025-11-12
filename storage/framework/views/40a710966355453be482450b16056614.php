

<?php $__env->startSection('title', $project->title . ' | Indonesia Drilling School'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-project-detail">
    <!-- ================= HERO SECTION ================= -->
    <section class="relative min-h-[70vh] bg-gray-900 text-white overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <?php if($project->featured_image): ?>
            <img src="<?php echo e(asset('storage/' . $project->featured_image)); ?>" 
                alt="<?php echo e($project->title); ?>" 
                class="w-full h-full object-cover opacity-40">
            <?php else: ?>
            <img src="<?php echo e(asset('images/default-project.jpg')); ?>" 
                alt="<?php echo e($project->title); ?>" 
                class="w-full h-full object-cover opacity-40">
            <?php endif; ?>
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/60 to-black/80"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex flex-col justify-center min-h-[70vh] py-20">
                <!-- Breadcrumb -->
                <div class="mb-8">
                    <nav class="flex items-center gap-2 text-sm text-gray-300">
                        <a href="/" class="hover:text-white transition-colors">Home</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <a href="<?php echo e(route('projects.index')); ?>" class="hover:text-white transition-colors">Projects</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                        <span class="text-white"><?php echo e($project->title); ?></span>
                    </nav>
                </div>

                <div class="max-w-4xl">
                    <!-- Badges -->
                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="<?php echo e($project->status_badge_color); ?> px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm">
                            <?php echo e(ucfirst($project->status)); ?>

                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                        <?php echo e($project->title); ?>

                    </h1>

                    <!-- Meta Info -->
                    <div class="flex flex-wrap gap-6 text-gray-300">
                        <?php if($project->location): ?>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span><?php echo e($project->location); ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if($project->client): ?>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span><?php echo e($project->client); ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if($project->start_date): ?>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span><?php echo e($project->start_date->format('M Y')); ?> 
                                <?php if($project->end_date): ?>
                                - <?php echo e($project->end_date->format('M Y')); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg class="w-full h-16 sm:h-20" viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z" fill="#F9FAFB"/>
            </svg>
        </div>
    </section>

    <!-- ================= PROJECT CONTENT ================= -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Description -->
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Project Overview</h2>
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            <?php echo nl2br(e($project->description)); ?>

                        </div>
                    </div>

                    <!-- Challenges -->
                    <?php if($project->challenges): ?>
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">Challenges</h2>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            <?php echo nl2br(e($project->challenges)); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Solutions -->
                    <?php if($project->solutions): ?>
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">Solutions</h2>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-600 leading-relaxed">
                            <?php echo nl2br(e($project->solutions)); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Results -->
                    <?php if($project->results): ?>
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-3xl shadow-lg p-8 border border-green-200">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900">Results & Impact</h2>
                        </div>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <?php echo nl2br(e($project->results)); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Gallery -->
                    <?php if($project->gallery_images && count($project->gallery_images) > 0): ?>
                    <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Project Gallery</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <?php $__currentLoopData = $project->gallery_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group relative overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                                <img src="<?php echo e(asset('storage/' . $image)); ?>" 
                                    alt="Gallery Image" 
                                    class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        <!-- Project Info Card -->
                        <div class="bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Project Information</h3>
                            <div class="space-y-4">
                                <?php if($project->client): ?>
                                <div class="pb-4 border-b border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Client</p>
                                    <p class="font-semibold text-gray-900"><?php echo e($project->client); ?></p>
                                </div>
                                <?php endif; ?>

                                <?php if($project->location): ?>
                                <div class="pb-4 border-b border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Location</p>
                                    <p class="font-semibold text-gray-900"><?php echo e($project->location); ?></p>
                                </div>
                                <?php endif; ?>

                                <div class="pb-4 border-b border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Status</p>
                                    <span class="<?php echo e($project->status_badge_color); ?> px-3 py-1.5 rounded-full text-sm font-semibold">
                                        <?php echo e(ucfirst($project->status)); ?>

                                    </span>
                                </div>

                                <?php if($project->start_date): ?>
                                <div class="pb-4">
                                    <p class="text-sm text-gray-500 mb-1">Timeline</p>
                                    <p class="font-semibold text-gray-900">
                                        <?php echo e($project->start_date->format('F Y')); ?>

                                        <?php if($project->end_date): ?>
                                        <br><span class="text-gray-400">to</span><br>
                                        <?php echo e($project->end_date->format('F Y')); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- CTA Card -->
                        <div class="bg-gradient-to-br from-red-600 to-red-700 rounded-3xl shadow-lg p-8 text-white">
                            <h3 class="text-2xl font-bold mb-4">Interested in Similar Projects?</h3>
                            <p class="text-red-100 mb-6">Let's discuss how we can help you achieve your training goals.</p>
                            <a href="/contact" 
                                class="block w-full bg-white text-red-600 font-semibold py-3 px-6 rounded-xl text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                Contact Us
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= RELATED PROJECTS ================= -->
    <?php if($relatedProjects->count() > 0): ?>
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
            <div class="text-center mt-12">
                <a href="<?php echo e(route('projects.index')); ?>" 
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:-translate-y-1">
                    View All Projects
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\indo_drilling_school\resources\views/projects/show.blade.php ENDPATH**/ ?>