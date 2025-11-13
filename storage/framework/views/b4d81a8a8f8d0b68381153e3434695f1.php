<?php $__env->startSection('title', 'About | Indonesia Drilling School'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section with Overlay -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 pb-16">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-blue-900 to-red-900">
        <img src="<?php echo e(asset('images/imgHeroAbout.jpg')); ?>"
            alt="Oil Rig Background"
            class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
        <div class="absolute inset-0 bg-black/60"></div>
    </div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-block px-4 py-2 bg-red-600/20 backdrop-blur-sm border border-red-500/30 rounded-full mb-6" data-aos="fade-up" data-aos-delay="100">
            <span class="text-red-400 font-semibold text-sm tracking-wider uppercase">About IDS</span>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 text-white leading-tight px-4" data-aos="fade-up" data-aos-delay="200">
            Indonesia Drilling School
        </h1>
        <p class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-4xl mx-auto leading-relaxed mb-12 px-4" data-aos="fade-up" data-aos-delay="300">
            Empowering Indonesia's Oil & Gas Workforce with World-Class Training and Certification
        </p>
        <!-- Enhanced Stats Cards with Icons & Better Design -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 max-w-6xl mx-auto px-4" data-aos="fade-up" data-aos-delay="400">
            <!-- Card 1: International -->
            <div class="group relative overflow-hidden rounded-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600/30 to-blue-900/30 backdrop-blur-md border border-blue-400/40"></div>
                <div class="relative p-6 sm:p-8 text-center transform group-hover:scale-[1.02] transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-blue-500/30 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition duration-300 shadow-lg shadow-blue-500/20">
                        <i class="fa-solid fa-globe text-4xl text-blue-200"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold text-white mb-3 tracking-tight">
                        International
                    </div>
                    <div class="text-xs text-gray-300 font-medium">
                        IADC • IWCF • OPITO • IOSH
                    </div>
                </div>
            </div>

            <!-- Card 2: Modern -->
            <div class="group relative overflow-hidden rounded-2xl">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-600/30 to-purple-900/30 backdrop-blur-md border border-purple-400/40"></div>
                <div class="relative p-6 sm:p-8 text-center transform group-hover:scale-[1.02] transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-purple-500/30 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition duration-300 shadow-lg shadow-purple-500/20">
                        <!-- Icon: fa-microchip (tech foundation). Alternatives: fa-vr-cardboard, fa-graduation-cap, fa-laptop-code -->
                        <i class="fa-solid fa-graduation-cap text-4xl text-purple-200"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold text-white mb-3 tracking-tight">
                        Innovative
                    </div>
                    <div class="text-xs text-gray-300 font-medium">
                        Practical Simulations • Immersive Training
                    </div>
                </div>
            </div>

            <!-- Card 3: Expert -->
            <div class="group relative overflow-hidden rounded-2xl sm:col-span-2 lg:col-span-1">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600/30 to-red-900/30 backdrop-blur-md border border-red-400/40"></div>
                <div class="relative p-6 sm:p-8 text-center transform group-hover:scale-[1.02] transition duration-300">
                    <div class="w-16 h-16 mx-auto mb-4 bg-red-500/30 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition duration-300 shadow-lg shadow-red-500/20">
                        <i class="fa-solid fa-users-gear text-4xl text-red-200"></i>
                    </div>
                    <div class="text-3xl sm:text-4xl font-bold text-white mb-3 tracking-tight">
                        Expert
                    </div>
                    <div class="text-xs text-gray-300 font-medium">
                        Certified • Experienced • Dedicated
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Feature Badges -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mt-8 sm:mt-10 px-4" data-aos="fade-up" data-aos-delay="500">
            <div class="px-3 sm:px-4 py-2 bg-white/5 backdrop-blur-sm border border-white/20 rounded-full hover:bg-white/10 transition duration-300">
                <span class="text-white text-xs sm:text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-certificate text-yellow-400"></i>
                    <span class="hidden sm:inline">Accredited Training</span>
                    <span class="sm:hidden">Accredited</span>
                </span>
            </div>
            <div class="px-3 sm:px-4 py-2 bg-white/5 backdrop-blur-sm border border-white/20 rounded-full hover:bg-white/10 transition duration-300">
                <span class="text-white text-xs sm:text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-award text-green-400"></i>
                    <span class="hidden sm:inline">ISO Certified</span>
                    <span class="sm:hidden">ISO</span>
                </span>
            </div>
            <div class="px-3 sm:px-4 py-2 bg-white/5 backdrop-blur-sm border border-white/20 rounded-full hover:bg-white/10 transition duration-300">
                <span class="text-white text-xs sm:text-sm font-medium flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved text-blue-400"></i>
                    <span class="hidden sm:inline">Safety First</span>
                    <span class="sm:hidden">Safety</span>
                </span>
            </div>
        </div>
    </div>
</section>


<!-- Who We Are - Enhanced -->
<section class="py-20 px-6 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Content -->
            <div class="space-y-6" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full">
                    <div class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></div>
                    <span class="text-blue-900 font-semibold text-sm">WHO WE ARE</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 leading-tight">
                    Leading Training Institution in
                    Oil & Gas Sector
                </h2>

                <div class="h-1 w-20 bg-gradient-to-r from-blue-600 to-red-600 rounded-full"></div>

                <p class="text-lg text-gray-700 leading-relaxed">
                    Indonesia Drilling School (IDS) is a nationally oriented vocational training institution located at Jl. Lintas Sumatera Duri-Dumai No. KM 6, Balai Makam, Mandau District, Bengkalis Regency, Riau 28983.
                    Founded with a clear mission: to develop competent, professional, and integrity-driven human resources for Indonesia’s energy sector through high-quality, job-oriented training programs aligned with national and international standards.
                </p>

                <p class="text-lg text-gray-700 leading-relaxed">
                    We are committed to becoming a <span class="font-semibold text-blue-600">model educational institution</span> by delivering excellence in skills development particularly in Drilling, Workover, Well Control, Health-Safety-Environment (HSE), and Offshore Operations.
                    Through modern simulation facilities, industry-experienced instructors, and a curriculum designed in collaboration with sector stakeholders, IDS ensures that over <span class="font-semibold text-blue-600">95% of our graduates secure meaningful employment</span> within six months of completion.
                    Our programs directly support national efforts in human resource development and empower communities through accessible, future-ready vocational education.
                </p>

                <div class="flex flex-wrap gap-3 pt-4">
                    <span class="px-4 py-2 bg-blue-100 text-blue-900 rounded-full text-sm font-medium">IADC Certified</span>
                    <span class="px-4 py-2 bg-blue-100 text-blue-900 rounded-full text-sm font-medium">IWCF Certified</span>
                    <span class="px-4 py-2 bg-blue-100 text-blue-900 rounded-full text-sm font-medium">OPITO Certified</span>
                    <span class="px-4 py-2 bg-blue-100 text-blue-900 rounded-full text-sm font-medium">IOSH Certified</span>
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="relative" data-aos="fade-left">
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <div class="rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=800&q=80"
                                alt="Drilling Rig" class="w-full h-64 object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1581094271901-8022df4466f9?auto=format&fit=crop&w=800&q=80"
                                alt="Training Facility" class="w-full h-48 object-cover">
                        </div>
                    </div>
                    <div class="space-y-4 pt-8">
                        <div class="rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=800&q=80"
                                alt="Students" class="w-full h-48 object-cover">
                        </div>
                        <div class="rounded-2xl overflow-hidden shadow-xl transform hover:scale-105 transition duration-300">
                            <img src="https://cdn.pixabay.com/photo/2014/09/13/21/46/milling-444493_1280.jpg"
                                alt="Equipment" class="w-full h-64 object-cover">
                        </div>
                    </div>
                </div>

                <!-- Floating Card -->
                <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-2xl p-6 max-w-xs" data-aos="zoom-in" data-aos-delay="300">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-award text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-slate-900">ISO 9001</div>
                            <div class="text-sm text-gray-600">Certified Quality</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission - Modern Cards -->
<section class="py-20 px-6 bg-slate-900 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Vision & Mission</h2>
            <p class="text-gray-400 text-lg">Our commitment to excellence and professional development</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Vision Card -->
            <div class="group relative" data-aos="fade-right">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl transform group-hover:scale-105 transition duration-300"></div>
                <div class="relative bg-slate-800 rounded-3xl p-8 lg:p-10 border border-blue-500/20 transform group-hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition duration-300">
                        <i class="fa-solid fa-eye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Our Vision</h3>
                    <div class="h-1 w-16 bg-blue-500 rounded-full mb-6"></div>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        To become an educational institution capable of producing human resources who are competent, responsive, resilient, skilled, independent, professional, and ready to compete in the global workforce.
                    </p>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="group relative" data-aos="fade-left">
                <div class="absolute inset-0 bg-gradient-to-br from-red-600 to-red-800 rounded-3xl transform group-hover:scale-105 transition duration-300"></div>
                <div class="relative bg-gradient-to-br from-red-700 to-red-900 rounded-3xl p-8 lg:p-10 border border-red-500/20 transform group-hover:-translate-y-2 transition duration-300">
                    <div class="w-16 h-16 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition duration-300">
                        <i class="fa-solid fa-bullseye text-white text-3xl"></i>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-4">Our Mission</h3>
                    <div class="h-1 w-16 bg-white/50 rounded-full mb-6"></div>
                    <ul class="space-y-4 text-gray-100">
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-white text-xl mt-1 flex-shrink-0"></i>
                            <span class="text-lg leading-relaxed">Produce skilled and professional workers.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-white text-xl mt-1 flex-shrink-0"></i>
                            <span class="text-lg leading-relaxed">Provide the best services to society.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-white text-xl mt-1 flex-shrink-0"></i>
                            <span class="text-lg leading-relaxed">Design and develop competency-based curricula, education, and training programs that align with labor market needs.
                            </span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i class="fa-solid fa-check-circle text-white text-xl mt-1 flex-shrink-0"></i>
                            <span class="text-lg leading-relaxed">Continuously enhance the competence and professionalism of internal human resources, including both educators and administrative staff.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Legal Basis - Timeline Style -->
<section class="py-20 px-6 bg-white">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Legal Foundation</h2>
            <p class="text-gray-600 text-lg">Operating under full compliance with Indonesian regulations</p>
        </div>

        <div class="relative" data-aos="fade-up" data-aos-delay="200">
            <div class="absolute left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-blue-600 to-red-600"></div>

            <div class="space-y-8 ml-20">
                <div class="relative">
                    <div class="absolute -left-24 top-0 w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-gavel text-white text-2xl"></i>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Law No. 22 of 2001</h3>
                        <p class="text-gray-700">Oil and Gas (UU Migas) - Fundamental regulation for upstream and downstream oil & gas operations</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -left-24 top-0 w-16 h-16 bg-gradient-to-br from-blue-700 to-blue-900 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-landmark text-white text-2xl"></i>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-white border border-blue-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">Government Regulation No. 35 of 2004</h3>
                        <p class="text-gray-700">Upstream Oil and Gas Activities - Technical and operational standards</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -left-24 top-0 w-16 h-16 bg-gradient-to-br from-red-600 to-red-800 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-shield-halved text-white text-2xl"></i>
                    </div>
                    <div class="bg-gradient-to-br from-red-50 to-white border border-red-100 rounded-2xl p-6 shadow-lg hover:shadow-xl transition duration-300">
                        <h3 class="text-xl font-bold text-red-900 mb-2">Ministerial Decree No. 517.K/73/M.PE/2020</h3>
                        <p class="text-gray-700">Occupational Safety and Health (K3) in Oil and Gas Operations</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="inline-block bg-gradient-to-r from-blue-50 to-red-50 border border-gray-200 rounded-2xl p-6">
                <p class="text-gray-700 text-lg">
                    <i class="fa-solid fa-building-columns text-blue-600 mr-2"></i>
                    Regulated by <span class="font-semibold text-blue-900">Ministry of Energy and Mineral Resources (ESDM)</span> and
                    <span class="font-semibold text-red-900">Ministry of Manpower</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Accreditation & Partners (Diperbarui menjadi ISO Certifications) -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full mb-4">
                <i class="fa-solid fa-check-circle text-blue-600"></i> <!-- Ganti ikon jadi check circle untuk sertifikasi -->
                <span class="text-blue-900 font-semibold text-sm">INTERNATIONAL STANDARDS</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">ISO Certifications</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Indonesia Drilling School is committed to excellence through internationally recognized standards in quality, environment, and occupational health & safety management.
            </p>
        </div>

        <!-- Grid untuk 3 Kartu ISO -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="200">
            <!-- Kartu ISO 9001 -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:scale-105 transition duration-300 border border-gray-100 feature-card">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fa-solid fa-check-circle text-red-500 text-xl"></i>
                    <h3 class="text-xl font-bold text-red-600">ISO 9001:2015</h3>
                </div>
                <p class="text-gray-700 text-sm">
                    Quality Management System — Ensuring consistent service quality and customer satisfaction.
                </p>
            </div>

            <!-- Kartu ISO 14001 -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:scale-105 transition duration-300 border border-gray-100 feature-card">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fa-solid fa-leaf text-green-500 text-xl"></i>
                    <h3 class="text-xl font-bold text-green-600">ISO 14001:2015</h3>
                </div>
                <p class="text-gray-700 text-sm">
                    Environmental Management — Managing environmental impact and sustainability initiatives.
                </p>
            </div>

            <!-- Kartu ISO 45001 -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl hover:scale-105 transition duration-300 border border-gray-100 feature-card">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fa-solid fa-shield-alt text-blue-500 text-xl"></i>
                    <h3 class="text-xl font-bold text-blue-600">ISO 45001:2018</h3>
                </div>
                <p class="text-gray-700 text-sm">
                    Occupational Health & Safety — Protecting people and creating safer workplaces.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Showcase -->
<!-- <section class="py-20 bg-slate-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="<?php echo e(asset('images/imgHeroAbout2.jpg')); ?>"
            alt="Oil Rig Background"
            class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">World-Class Facilities</h2>
            <p class="text-gray-300 text-lg max-w-3xl mx-auto">
                State-of-the-art infrastructure designed to provide comprehensive hands-on training experience
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $facilities = [
            ['Multimedia Classrooms', 'fa-chalkboard-user', 'Interactive learning with modern AV equipment'],
            ['Drilling Simulators', 'fa-oil-well', 'Industry-standard simulation technology'],
            ['Training Rigs', 'fa-hard-hat', 'Full-scale operational practice rigs'],
            ['HSE Training Area', 'fa-shield-halved', 'Dedicated safety and emergency response zone'],
            ['Fire Safety Zone', 'fa-fire-extinguisher', 'Firefighting training and certification'],
            ['Accommodation', 'fa-building', 'Comfortable on-site lodging facilities'],
            ['Computer Lab', 'fa-computer', 'CBT and digital assessment systems'],
            ['Workshop Area', 'fa-wrench', 'Hands-on equipment maintenance training'],
            ['Conference Hall', 'fa-users', 'Professional meeting and seminar space'],
            ];
            ?>

            <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => [$title, $icon, $desc]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group" data-aos="zoom-in" data-aos-delay="<?php echo e($index * 50); ?>">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 hover:border-white/20 transition duration-300 h-full">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-red-500 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-6 transition duration-300">
                        <i class="fa-solid <?php echo e($icon); ?> text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2"><?php echo e($title); ?></h3>
                    <p class="text-gray-400"><?php echo e($desc); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>-->

<!-- Photo Documentation Gallery - Dynamic from Database -->
<section class="py-20 bg-white px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 rounded-full mb-4">
                <i class="fa-solid fa-camera text-blue-600"></i>
                <span class="text-blue-900 font-semibold text-sm">GALLERY</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Training in Action</h2>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Witness the real-world training experience at Indonesia Drilling School through our comprehensive documentation
            </p>
        </div>

        <?php if($featuredImages->count() > 0): ?>
        <!-- Main Featured Slider -->
        <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
            <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                <div class="gallery-slider w-full aspect-video max-h-[500px]">
                    <div class="gallery-track flex">
                        <?php $__currentLoopData = $featuredImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="gallery-slide min-w-full h-[500px]">
                            <img src="<?php echo e(asset('storage/' . $image->image_path)); ?>"
                                alt="<?php echo e($image->title); ?>"
                                loading="<?php echo e($index === 0 ? 'eager' : 'lazy'); ?>"
                                class="w-full h-full object-cover">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                <!-- Slide Info -->
                <div class="absolute bottom-4 left-0 right-0 p-4 md:p-8">
                    <?php $__currentLoopData = $featuredImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="gallery-content <?php echo e($index === 0 ? '' : 'hidden'); ?>" data-slide="<?php echo e($index); ?>">
                        <div class="flex items-center gap-3 mb-3">
                            <?php if($image->is_featured): ?>
                            <span class="px-3 py-1 bg-red-600 text-white text-sm font-semibold rounded-full">Featured</span>
                            <?php endif; ?>
                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold rounded-full"><?php echo e($image->year); ?></span>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-2"><?php echo e($image->title); ?></h3>
                        <p class="text-gray-200 text-lg"><?php echo e(Str::limit($image->description, 120)); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Navigation Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-10 hidden md:block">
                    <?php $__currentLoopData = $featuredImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button class="gallery-dot w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-all duration-300 <?php echo e($index === 0 ? 'active' : ''); ?>" data-slide="<?php echo e($index); ?>"></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- Arrows -->
                <button class="gallery-prev absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all duration-300 z-10 hidden md:block">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="gallery-next absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition-all duration-300 z-10 hidden md:block">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <?php else: ?>
        <!-- Fallback -->
        <div class="mb-8 text-center py-16 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
            <div class="inline-block p-4 bg-slate-100 rounded-full mb-6">
                <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-700 mb-2">Gallery Sedang Dipersiapkan</h3>
            <p class="text-slate-500 max-w-md mx-auto">
                Dokumentasi pelatihan akan segera tersedia.
            </p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Reuse CSS & JS from your existing gallery slider -->
<style>
    /* Slider Container */
    .gallery-slider {
        height: auto;
        max-height: 500px;
        /* ✅ Dari 500px jadi 500px */
    }

    /* Responsive untuk Mobile */
    @media (max-width: 768px) {
        .gallery-slider .bg-gradient-to-t {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.2));
        }

        .gallery-slider {
            max-height: 300px;
            /* Tetap 300px untuk mobile */
        }
    }

    /* Track Animation */
    .gallery-track {
        transition: transform 0.8s ease-in-out;
    }

    /* Dot Navigation */
    .gallery-dot {
        transition: all 0.3s;
    }

    .gallery-dot.active {
        background-color: white;
        width: 2rem;
        border-radius: 9999px;
    }

    /* Slide Content Transition */
    .gallery-content {
        transition: opacity 0.3s ease-in-out;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const track = document.querySelector('.gallery-track');
        const dots = document.querySelectorAll('.gallery-dot');
        const contents = document.querySelectorAll('.gallery-content');
        const prevBtn = document.querySelector('.gallery-prev');
        const nextBtn = document.querySelector('.gallery-next');

        if (!track || dots.length === 0) return;

        let currentSlide = 0;
        const totalSlides = dots.length;
        let autoSlideInterval;

        function goToSlide(index) {
            currentSlide = index;
            track.style.transform = `translateX(-${currentSlide * 100}%)`;
            dots.forEach((dot, i) => dot.classList.toggle('active', i === currentSlide));
            contents.forEach((content, i) => {
                content.classList.toggle('hidden', i !== currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            goToSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            goToSlide(currentSlide);
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 4000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlideInterval);
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => {
                goToSlide(i);
                stopAutoSlide();
                startAutoSlide();
            });
        });

        prevBtn?.addEventListener('click', () => {
            prevSlide();
            stopAutoSlide();
            startAutoSlide();
        });
        nextBtn?.addEventListener('click', () => {
            nextSlide();
            stopAutoSlide();
            startAutoSlide();
        });

        const slider = document.querySelector('.gallery-slider');
        slider?.addEventListener('mouseenter', stopAutoSlide);
        slider?.addEventListener('mouseleave', startAutoSlide);

        goToSlide(0);
        startAutoSlide();
    });
</script>

<!-- Why Choose IDS - Feature Grid -->
<section class="py-20 bg-gradient-to-b from-white to-gray-50 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-4">Why Choose Indonesia Drilling School?</h2>
            <p class="text-gray-600 text-lg">The IDS advantage: excellence in every aspect of oil & gas training</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $advantages = [
            ['Internationally Accredited', 'fa-certificate', 'IADC, IWCF, OPITO, IOSH certified programs', 'blue'],
            ['Expert Instructors', 'fa-user-tie', 'Certified professionals with industry experience', 'red'],
            ['Industry-Based Curriculum', 'fa-industry', 'Aligned with real-world operational needs', 'blue'],
            ['Theory & Practice Balance', 'fa-book-open', 'Comprehensive hands-on training approach', 'red'],
            ['Career-Oriented', 'fa-briefcase', 'Direct pathway to employment opportunities', 'blue'],
            ['Modern Equipment', 'fa-cogs', 'Latest simulators and training technology', 'red'],
            ];
            ?>

            <?php $__currentLoopData = $advantages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => [$title, $icon, $desc, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group relative" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                <!-- Overlay gradient untuk hover effect -->
                <div class="absolute inset-0 bg-gradient-to-br from-<?php echo e($color); ?>-600 to-<?php echo e($color); ?>-800 rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300 transform group-hover:scale-105"></div>
                <!-- Kartu utama -->
                <div class="relative bg-white border-2 border-gray-100 rounded-2xl p-8 hover:border-<?php echo e($color); ?>-500 transition duration-300 h-full">
                    <!-- Ikon -->
                    <div class="w-16 h-16 bg-gradient-to-br from-<?php echo e($color); ?>-100 to-<?php echo e($color); ?>-200 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-white/20 transition duration-300">
                        <i class="fa-solid <?php echo e($icon); ?> text-3xl text-<?php echo e($color); ?>-600 group-hover:text-<?php echo e($color); ?>-700 transition duration-300"></i> <!-- Ubah warna ikon saat hover -->
                    </div>
                    <!-- Judul dan Deskripsi -->
                    <h3 class="text-xl font-bold text-slate-900 group-hover:text-slate-900 mb-3 transition duration-300"><?php echo e($title); ?></h3> <!-- Ubah group-hover:text-white menjadi group-hover:text-slate-900 -->
                    <p class="text-gray-600 group-hover:text-gray-800 transition duration-300"><?php echo e($desc); ?></p> <!-- Ubah group-hover:text-white/90 menjadi group-hover:text-gray-800 -->
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\indo_drilling_school\resources\views/about.blade.php ENDPATH**/ ?>