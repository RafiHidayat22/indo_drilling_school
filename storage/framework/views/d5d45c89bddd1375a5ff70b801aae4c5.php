<?php $__env->startSection('title', 'Home | Indonesia Drilling School'); ?>


<?php $__env->startSection('content'); ?>
<div class="page-home">
    <!-- ================= HERO SECTION ================= -->
    <section class="relative min-h-screen bg-gray-900 text-white overflow-hidden">
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-red-900/30 z-[1]"></div>

    <!-- Background Images Container -->
    <div class="absolute inset-0">
        <!-- Image 1 -->
        <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 opacity-100">
            <img src="<?php echo e(asset('images/imgHero.jpg')); ?>"
                alt="Oil Rig Background"
                class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        
        <!-- Image 2 -->
        <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="<?php echo e(asset('images/imgHeroAbout.jpg')); ?>"
                alt="Oil Rig Background 2"
                class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        
        <!-- Image 3 -->
        <div class="hero-bg-slide absolute inset-0 transition-opacity duration-1000 opacity-0">
            <img src="<?php echo e(asset('images/imgHeroProgram.jpg')); ?>"
                alt="Oil Rig Background 3"
                class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
    </div>

    <!-- Animated Particles Effect -->
    <div class="absolute inset-0 z-[2]" style="background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px; opacity: 0.3;"></div>

        <!-- Content Container -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen">
            <div class="h-full min-h-screen flex flex-col lg:flex-row lg:items-center lg:gap-12 xl:gap-16">

                <!-- Left: Text Content -->
                <div class="flex-shrink-0 text-center lg:text-left space-y-6 sm:space-y-8 pt-32 sm:pt-36 md:pt-40 lg:pt-0 pb-8 lg:pb-0 lg:w-1/2">

                    <!-- Badge -->
                    <div class="home-animate-fadeInUp">
                        <span class="inline-block bg-red-600/20 border border-red-500/50 text-red-400 px-5 py-2.5 rounded-full text-sm font-semibold backdrop-blur-sm shadow-lg">
                            Professional Training Excellence
                        </span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="home-animate-fadeInUp delay-100 text-4xl sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl 2xl:text-7xl font-extrabold leading-tight tracking-tight">
                        <span class="block bg-gradient-to-r from-white via-blue-100 to-red-100 bg-clip-text text-transparent drop-shadow-lg">
                            Professional Oil & Gas
                        </span>
                        <span class="block bg-gradient-to-r from-white via-blue-100 to-red-100 bg-clip-text text-transparent drop-shadow-lg mt-1">
                            Training and Certification
                        </span>
                        <span class="block bg-gradient-to-r from-white via-blue-100 to-red-100 bg-clip-text text-transparent drop-shadow-lg mt-1">
                            Provider
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="home-animate-fadeInUp delay-200 text-gray-300 text-lg sm:text-xl md:text-2xl lg:text-xl xl:text-2xl leading-relaxed max-w-2xl mx-auto lg:mx-0 font-light">
                        Empowering Indonesia's Workforce for the Global Energy Industry
                    </p>

                    <!-- CTA Buttons -->
                    <div class="home-animate-fadeInUp delay-300 flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-4">
                        <a href="#programs" class="group bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <span class="flex items-center justify-center gap-2">
                                Explore Programs
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </span>
                        </a>
                        <a href="/contact" class="group bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            Contact Us
                        </a>
                    </div>
                </div>

                <!-- Right: Engineers Images -->
                <div class="relative flex-1 lg:w-1/2 flex items-end justify-center lg:justify-end pb-0 min-h-[450px] sm:min-h-[500px] lg:min-h-0 lg:self-stretch">
                    <!-- Decorative Background Glow -->
                    <div class="absolute inset-x-0 bottom-0 h-3/4 bg-gradient-to-t from-red-600/40 via-blue-600/20 to-transparent blur-3xl"></div>
                    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-red-500/20 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-1/4 left-1/4 w-80 h-80 bg-blue-500/20 rounded-full blur-3xl"></div>

                    <!-- Engineers Container -->
                    <div class="relative lg:absolute lg:bottom-0 lg:right-0 lg:left-0 w-full h-full flex items-end justify-center lg:justify-end">
                        <div class="relative w-full max-w-lg lg:max-w-none h-[450px] sm:h-[500px] lg:h-[650px] xl:h-[750px] 2xl:h-[820px] flex items-end justify-center lg:justify-end">
                            <!-- Engineer 1 - Female (Left) -->
                            <div class="relative w-[68%] sm:w-[66%] lg:w-[65%] xl:w-[63%] h-full flex items-end home-floating">
                                <img src="<?php echo e(asset('images/EngineerHero.png')); ?>"
                                    alt="Female Engineer"
                                    class="w-full h-auto max-h-full object-contain object-bottom drop-shadow-2xl transform hover:scale-105 transition-transform duration-500 filter brightness-110" />
                            </div>

                            <!-- Engineer 2 - Male (Right, Slightly Forward) -->
                            <div class="relative w-[68%] sm:w-[66%] lg:w-[65%] xl:w-[63%] h-full flex items-end z-10 home-floating home-hero-engineer -ml-[10%] sm:-ml-[8%] lg:-ml-[8%] xl:-ml-[6%]">
                                <img src="<?php echo e(asset('images/cowokenginer1.png')); ?>"
                                    alt="Male Engineer"
                                    class="w-full h-auto max-h-full object-contain object-bottom drop-shadow-2xl transform hover:scale-105 transition-transform duration-500 filter brightness-110" />
                            </div>
                        </div>
                    </div>

                    <!-- Decorative Accent Elements -->
                    <div class="absolute top-10 sm:top-16 lg:top-20 xl:top-24 right-4 sm:right-8 lg:right-12 xl:right-16 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 xl:w-32 xl:h-32 bg-red-500/30 rounded-full blur-2xl animate-pulse"></div>
                    <div class="absolute bottom-24 sm:bottom-28 lg:bottom-32 xl:bottom-36 left-4 sm:left-8 lg:left-12 xl:left-16 w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 xl:w-24 xl:h-24 bg-blue-500/30 rounded-full blur-2xl animate-pulse"></div>
                </div>

            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce hidden lg:block">
            <div class="flex flex-col items-center gap-2">
                <span class="text-white/60 text-xs font-medium tracking-wider uppercase">Scroll Down</span>
                <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </div>
        </div>
    </section>

    <!-- ================= ABOUT SECTION ================= -->
    <section class="py-20 px-6 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden" id="about">
        <!-- Background Decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-red-100 rounded-full filter blur-3xl opacity-20"></div>

        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">
            <!-- Left Text Section -->
            <div class="space-y-6">
                <div class="inline-block">
                    <span class="text-red-600 font-semibold text-sm uppercase tracking-wider">About Us</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 text-left home-animate-fadeInUp leading-tight">
                    About Indonesia Drilling School
                </h2>
                <p class="text-gray-600 text-lg mb-10 text-left home-animate-fadeInUp delay-200 leading-relaxed">
                    Indonesia Drilling School (IDS) is a collaboration between Skills For Technology And Coring (STC), International Training Providers and PT Bormindo Nusantara (Indonesia).
                    Together, we aim to provide professional training and certification in drilling operations, combining international standards with local field expertise focusing on safety, technical competence, and readiness for real oilfield work.
                </p>

                <!-- Vision / Mission / Goals Cards -->
                <?php $__currentLoopData = [
                ['Vision', 'To become an educational institution capable of producing human resources who are competent, responsive, resilient, skilled, independent, professional, and ready to compete in the global workforce.', 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'],
                ['Mission', '<ol class="list-disc ml-5 space-y-2">
                    <li>Produce skilled and professional workers.</li>
                    <li>Provide the best services to society.</li>
                    <li>Design and develop competency-based curricula, education, and training programs that align with labor market needs.</li>
                    <li>Continuously enhance the competence and professionalism of internal human resources, including both educators and administrative staff.</li>
                </ol>', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                ['Goals', '<ol class="list-disc ml-5 space-y-2">
                    <li>Become a nationally recognized model educational institution.</li>
                    <li>Deliver the highest quality services to the community.</li>
                    <li>Conduct job-oriented skill training programs.</li>
                    <li>Achieve at least a 95% job placement rate for graduates.</li>
                    <li>Develop excellent, educated, competent, and professional workers, creating human resources with integrity and expertise in their respective fields.</li>
                    <li>Support government initiatives in human resource development.</li>
                </ol>', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138z']
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$title, $content, $icon]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white border border-gray-200 rounded-2xl p-6 text-left mb-4 home-animate-fadeInUp hover:shadow-xl hover:border-red-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($icon); ?>" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-3"><?php echo e($title); ?></h3>
                            <div class="text-gray-600 leading-relaxed"><?php echo $content; ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Right Image Section -->
            <div class="flex justify-center home-animate-fadeInUp delay-500">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl opacity-20 group-hover:opacity-30 blur-xl transition duration-500"></div>
                    <img src="<?php echo e(asset('images/imgAbout.jpg')); ?>"
                        alt="Engineer working on oil rig"
                        class="relative rounded-3xl shadow-2xl w-full max-w-md object-cover transform group-hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- ================= PROGRAMS SECTION ================= -->
    <section id="programs" class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute top-20 left-0 w-72 h-72 bg-blue-200 rounded-full filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-20 right-0 w-72 h-72 bg-red-200 rounded-full filter blur-3xl opacity-20"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <span class="text-red-600 font-semibold text-sm uppercase tracking-wider">What We Offer</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6 home-animate-fadeInUp">Our Training Programs</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Industry-leading courses designed to elevate your career in the oil and gas sector</p>
            </div>

            <!-- Scrollable container with auto-scroll -->
            <div class="relative">
                <div class="overflow-x-auto overflow-y-hidden home-animate-fadeInUp delay-200 home-scrollbar-hide pb-4" id="programsContainer" style="scroll-behavior: smooth;">
                    <div class="flex gap-6 w-max" id="programsScroll">
                        <?php $__empty_1 = true; $__currentLoopData = $trainingCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex-shrink-0 w-80">
                            <div class="group bg-white rounded-3xl shadow-lg overflow-hidden text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 flex flex-col h-full">
                                <div class="relative h-64 overflow-hidden flex-shrink-0">
                                    <img src="<?php echo e($category->image ? asset('storage/' . $category->image) : asset('images/default-program-img.jpg')); ?>" alt="<?php echo e($category->title); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition"></div>
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold text-gray-900">
                                        Professional
                                    </div>
                                </div>
                                <div class="p-8 flex flex-col flex-grow">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 min-h-[4rem] flex items-center justify-center">
                                        <?php echo e($category->title); ?>

                                    </h3>
                                    <p class="text-gray-600 mb-6 leading-relaxed flex-grow min-h-[6rem] line-clamp-3 break-words overflow-hidden">
                                        <?php echo e($category->description ?? '-'); ?>

                                    </p>
                                    <a href="<?php echo e(route('program.category', ['categorySlug' => $category->slug])); ?>"
                                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 text-white py-3 px-6 rounded-xl shadow-md hover:shadow-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:-translate-y-1 font-semibold mt-auto">
                                        Learn More
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="w-full text-center py-12">
                            <p class="text-gray-500 text-lg">No training programs available at the moment.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Navigation Dots (Optional) -->
                <div class="flex justify-center gap-2 mt-8" id="programsDots"></div>
            </div>
        </div>
    </section>
    <!-- ================= END INSIGHTS SECTION ================= -->

    <!-- ================= INSIGHTS SECTION ================= -->
    <section class="py-24 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
        <div class="absolute top-0 right-1/4 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-20"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Industry Knowledge</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6 home-animate-fadeInUp">
                    Latest Insights & Articles
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Stay informed with the latest trends and developments in the oil and gas industry</p>
            </div>

            <?php if($latestArticles->count() > 0): ?>
            <div class="swiper insightSwiper home-animate-fadeInUp delay-200">
                <div class="swiper-wrapper pb-12">
                    <?php $__currentLoopData = $latestArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide h-auto">
                        <div class="group bg-white border border-gray-200 rounded-3xl overflow-hidden text-left hover:shadow-2xl hover:border-blue-200 transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full">
                            <div class="relative h-56 overflow-hidden flex-shrink-0">
                                <?php if($article->featured_image): ?>
                                <img src="<?php echo e(asset('storage/' . $article->featured_image)); ?>"
                                    alt="<?php echo e($article->title); ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <?php else: ?>
                                <img src="<?php echo e(asset('images/default-article.jpg')); ?>"
                                    alt="<?php echo e($article->title); ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <?php endif; ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <span class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold">
                                        <?php echo e($article->category->name ?? 'Industry Insights'); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight min-h-[4.5rem] flex items-center line-clamp-2">
                                    <?php echo e($article->title); ?>

                                </h3>
                                <p class="text-gray-600 mb-6 leading-relaxed flex-grow min-h-[6rem] line-clamp-3">
                                    <?php echo e($article->excerpt ?? Str::limit(strip_tags($article->content), 150)); ?>

                                </p>
                                <div class="flex items-center justify-between mb-4 text-sm text-gray-500">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <?php echo e($article->published_at->format('M d, Y')); ?>

                                    </span>
                                </div>
                                <a href="<?php echo e(route('articles.show', $article->slug)); ?>"
                                    class="inline-flex items-center gap-2 text-blue-700 font-semibold hover:gap-3 transition-all group mt-auto">
                                    Read More
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- View All Articles Button -->
            <div class="text-center mt-12">
                <a href="<?php echo e(route('articles.index')); ?>"
                    class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl hover:from-blue-700 hover:to-blue-800 transition-all duration-300 transform hover:-translate-y-1">
                    View All Articles
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
            <?php else: ?>
            <div class="text-center py-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="text-gray-500 text-lg">No articles available at the moment.</p>
                <p class="text-gray-400 text-sm mt-2">Check back soon for the latest insights and updates.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ================= ACCREDITATION SECTION ================= -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-red-100 rounded-full filter blur-3xl opacity-20"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <span class="text-red-600 font-semibold text-sm uppercase tracking-wider">Our Credentials</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-4 mb-6 home-animate-fadeInUp">
                    Accredited by International and National Institutions
                </h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Recognized excellence in oil and gas training and certification</p>
            </div>

            <!-- International Accreditation -->
            <div class="mb-16">
                <div class="flex items-center justify-center gap-3 mb-8">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent to-blue-400"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">International Accreditation</h3>
                    </div>
                    <div class="h-px w-16 bg-gradient-to-l from-transparent to-blue-400"></div>
                </div>
                <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">Complying with top global safety and quality standards.</p>
                <div class="home-overflow-hidden">
                    <div class="flex items-center gap-8 home-animate-scroll-left">
                        <?php
                        $internationalLogos = [
                        ['IWCF', 'accredited/iwcflogo.png'],
                        ['OPITO', 'accredited/OPITOlogo.png'],
                        ['AOSH', 'accredited/aoshlogo.jpg'],
                        ['DROPS', 'accredited/dropslogo.png'],
                        ['ECITB', 'accredited/ECITBlogo.png'],
                        ['ECSI', 'accredited/ecsilogo.png'],
                        ['EOSH', 'accredited/eoshlogo.png'],
                        ['IADCDIT', 'accredited/IADCDIT.jpg'],
                        ['IADC Well Sharp', 'accredited/iadcwellsharp.png'],
                        ['IASP', 'accredited/iasplogo.png'],
                        ['IOSH', 'accredited/ioshlogo.png'],
                        ['IQOHS', 'accredited/iqohslogo.png'],
                        ['PECB', 'accredited/pecblogo.png'],
                        ['IADC', 'accredited/iadcrigpass.jpg']
                        ];
                        ?>

                        <?php $__currentLoopData = $internationalLogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$name, $logo]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-blue-400 transition-all duration-300">
                            <img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e($name); ?>" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $internationalLogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$name, $logo]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-blue-400 transition-all duration-300">
                            <img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e($name); ?>" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- National Accreditation -->
            <div>
                <div class="flex items-center justify-center gap-3 mb-8">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent to-red-400"></div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-600 to-red-800 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">National Accreditation</h3>
                    </div>
                    <div class="h-px w-16 bg-gradient-to-l from-transparent to-red-400"></div>
                </div>
                <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">Certified by Indonesia's official training authorities.</p>
                <div class="home-overflow-hidden">
                    <div class="flex items-center gap-8 home-animate-scroll-right">
                        <?php
                        $nationalLogos = [
                        ['BNSP', 'accredited/bnsp.png'],
                        ['Kemnaker', 'accredited/kemenaker.png'],
                        ['LSP Energi', 'accredited/lspenergi.jpg'],
                        ['LSP IKN', 'accredited/lspikn.jpg'],
                        ['LSP LH', 'accredited/lsplh.png'],
                        ['LSP Migas', 'accredited/lspmigas.jpg'],
                        ['LSP PIM', 'accredited/lsppim.png'],
                        ['LSP TTI', 'accredited/lsptti.png'],
                        ['PPSDM', 'accredited/ppsdm2.png'],
                        ['PPSDM', 'accredited/ppsdm.png'],
                        ['ICCOSH', 'accredited/iccosh.png'],
                        ['GEO MIGAS', 'accredited/geomigas.png'],
                        ['K3 Nasional', 'accredited/k3nasional.png'],
                        ['EPS Aryndo', 'accredited/epsaryndo.png']
                        ];
                        ?>

                        <?php $__currentLoopData = $nationalLogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$name, $logo]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-red-400 transition-all duration-300">
                            <img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e($name); ?>" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php $__currentLoopData = $nationalLogos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$name, $logo]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-red-400 transition-all duration-300">
                            <img src="<?php echo e(asset($logo)); ?>" alt="<?php echo e($name); ?>" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('programsContainer');
        const scrollContent = document.getElementById('programsScroll');
        const dotsContainer = document.getElementById('programsDots');

        if (!container || !scrollContent) return;

        const cards = scrollContent.querySelectorAll('.flex-shrink-0');
        const cardCount = cards.length;

        if (cardCount === 0) return;

        const cardWidth = cards[0].offsetWidth;
        const gap = 24; // 6 * 4px (gap-6 in Tailwind)
        const scrollAmount = cardWidth + gap;

        let currentIndex = 0;
        let autoScrollInterval;
        let isHovering = false;

        // Create navigation dots
        for (let i = 0; i < cardCount; i++) {
            const dot = document.createElement('button');
            dot.className = 'w-2 h-2 rounded-full transition-all duration-300 ' + (i === 0 ? 'bg-red-600 w-8' : 'bg-gray-300');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => scrollToIndex(i));
            dotsContainer.appendChild(dot);
        }

        function updateDots() {
            const dots = dotsContainer.querySelectorAll('button');
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.className = 'w-8 h-2 rounded-full bg-red-600 transition-all duration-300';
                } else {
                    dot.className = 'w-2 h-2 rounded-full bg-gray-300 transition-all duration-300';
                }
            });
        }

        function scrollToIndex(index) {
            currentIndex = index;
            container.scrollTo({
                left: scrollAmount * index,
                behavior: 'smooth'
            });
            updateDots();
        }

        function autoScroll() {
            if (isHovering) return;

            currentIndex = (currentIndex + 1) % cardCount;
            scrollToIndex(currentIndex);
        }

        // Start auto-scroll
        function startAutoScroll() {
            autoScrollInterval = setInterval(autoScroll, 3000); // Scroll every 3 seconds
        }

        // Stop auto-scroll
        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Pause on hover
        container.addEventListener('mouseenter', () => {
            isHovering = true;
            stopAutoScroll();
        });

        container.addEventListener('mouseleave', () => {
            isHovering = false;
            startAutoScroll();
        });

        // Pause on touch/scroll interaction
        let scrollTimeout;
        container.addEventListener('scroll', () => {
            stopAutoScroll();
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                if (!isHovering) {
                    startAutoScroll();
                }
            }, 2000);
        });

        // Initialize
        startAutoScroll();

        // Handle visibility change (pause when tab is not active)
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopAutoScroll();
            } else if (!isHovering) {
                startAutoScroll();
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-bg-slide');
    let currentSlide = 0;
    const slideInterval = 5000; // Ganti setiap 5 detik

    function nextSlide() {
        // Fade out current slide
        slides[currentSlide].style.opacity = '0';
        
        // Move to next slide
        currentSlide = (currentSlide + 1) % slides.length;
        
        // Fade in next slide
        slides[currentSlide].style.opacity = '1';
    }

    // Auto slide
    setInterval(nextSlide, slideInterval);
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\indo_drilling_school\resources\views/home.blade.php ENDPATH**/ ?>