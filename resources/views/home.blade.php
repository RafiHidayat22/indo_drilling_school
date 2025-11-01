@extends('layouts.app')

@section('title', 'Home | Indonesia Drilling School')


@section('content')
<div class="page-home">
    <!-- ================= HERO SECTION ================= -->
    <section class="relative h-screen bg-gray-900 text-white overflow-hidden pt-12 md:pt-0">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/40 via-transparent to-red-900/30 z-[1]"></div>

        <!-- Background -->
        <div class="absolute inset-0">
            <img src="{{ asset('images/imgHero.jpg') }}"
                alt="Oil Rig Background"
                class="w-full h-full object-cover opacity-60 home-animate-slow-zoom">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <!-- Animated Particles Effect -->
        <div class="absolute inset-0 z-[2]" style="background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px; opacity: 0.3;"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 flex flex-col md:flex-row h-full">
            <!-- Text -->
            <div class="md:w-1/2 flex flex-col justify-center text-center md:text-left home-animate-fadeInUp">
                <div class="inline-block mb-4">
                    <span class="bg-red-600/20 border border-red-500/50 text-red-400 px-4 py-2 rounded-full text-sm font-semibold backdrop-blur-sm">
                        Professional Training Excellence
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight bg-gradient-to-r from-white via-blue-100 to-red-100 bg-clip-text text-transparent">
                    Professional Oil & Gas Training<br class="hidden md:block">
                    and Certification Provider
                </h1>
                <p class="text-gray-300 text-lg md:text-xl mb-8 home-animate-fadeInUp delay-200 leading-relaxed">
                    Empowering Indonesia's Workforce for the Global Energy Industry
                </p>
                <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4 home-animate-fadeInUp delay-300">
                    <a href="#programs" class="group bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <span class="flex items-center justify-center gap-2">
                            Explore Programs
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                    <a href="#contact" class="group bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- Engineer Image -->
            <div class="md:w-1/2 relative flex justify-center items-end mt-8 md:mt-0">
                <div class="absolute inset-0 bg-gradient-to-t from-red-600/20 to-transparent rounded-full blur-3xl"></div>
                <img src="{{ asset('images/EngineerHero.png') }}"
                    alt="Engineer"
                    class="relative w-72 md:w-[400px] lg:w-[480px] drop-shadow-2xl z-10 md:absolute md:bottom-0 md:right-10 home-floating home-hero-engineer" />
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
            <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
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
                    To produce a highly competent and professional workforce for the national and international oil and gas industry through superior, competency-based training programs and excellent service.
                </p>

                <!-- Vision / Mission / Goals Cards -->
                @foreach ([
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
                ] as [$title, $content, $icon])
                <div class="group bg-white border border-gray-200 rounded-2xl p-6 text-left mb-4 home-animate-fadeInUp hover:shadow-xl hover:border-red-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-xl text-gray-900 mb-3">{{ $title }}</h3>
                            <div class="text-gray-600 leading-relaxed">{!! $content !!}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Right Image Section -->
            <div class="flex justify-center home-animate-fadeInUp delay-500">
                <div class="relative group">
                    <div class="absolute -inset-4 bg-gradient-to-r from-red-600 to-blue-600 rounded-3xl opacity-20 group-hover:opacity-30 blur-xl transition duration-500"></div>
                    <img src="{{ asset('images/imgAbout.jpg') }}"
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

            <!-- Scrollable container -->
            <div class="relative">
                <div class="overflow-x-auto overflow-y-hidden home-animate-fadeInUp delay-200 home-scrollbar-hide pb-4" id="programsContainer" style="scroll-behavior: smooth;">
                    <div class="flex gap-6 w-max" id="programsScroll">
                        @foreach ([
                        ['Drilling Program', 'Comprehensive drilling operations training covering equipment, procedures, and safety protocols for drilling professionals.', 'images/DrillingImg.jpg'],
                        ['Safety Program', 'Essential safety training and HSE protocols for high-risk oil and gas environments.', 'images/SafetyImg.jpg'],
                        ['IDS Drilling Program', 'Specialized Indonesia Drilling School curriculum combining theory and hands-on drilling experience.', 'images/IDSImg.jpg'],
                        ['IDS Safety Program', 'Customized safety certification program tailored for Indonesian oil and gas industry standards.', 'images/SafetyTrainIndo.jpg'],
                        ['International Training Program', 'Globally recognized training programs meeting international oil and gas industry standards.', 'images/InternationalTrain.jpg'],
                        ['Local Certification Program', 'BNSP, Kemnaker, and Dinas Perhubungan certified training programs for local workforce development.', 'images/BNSPTrain.jpg'],
                        ['Drilling Program', 'Comprehensive drilling operations training covering equipment, procedures, and safety protocols for drilling professionals.', 'images/DrillingImg.jpg'],
                        ['Safety Program', 'Essential safety training and HSE protocols for high-risk oil and gas environments.', 'images/SafetyImg.jpg'],
                        ['IDS Drilling Program', 'Specialized Indonesia Drilling School curriculum combining theory and hands-on drilling experience.', 'images/IDSImg.jpg'],
                        ['IDS Safety Program', 'Customized safety certification program tailored for Indonesian oil and gas industry standards.', 'images/SafetyTrainIndo.jpg'],
                        ['International Training Program', 'Globally recognized training programs meeting international oil and gas industry standards.', 'images/InternationalTrain.jpg'],
                        ['Local Certification Program', 'BNSP, Kemnaker, and Dinas Perhubungan certified training programs for local workforce development.', 'images/BNSPTrain.jpg']
                        ] as [$title, $desc, $img])
                        <div class="flex-shrink-0 w-80">
                            <div class="group bg-white rounded-3xl shadow-lg overflow-hidden text-center hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 flex flex-col h-full">
                                <div class="relative h-64 overflow-hidden flex-shrink-0">
                                    <img src="{{ asset($img) }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition"></div>
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-semibold text-gray-900">
                                        Professional
                                    </div>
                                </div>
                                <div class="p-8 flex flex-col flex-grow">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4 min-h-[4rem] flex items-center justify-center">{{ $title }}</h3>
                                    <p class="text-gray-600 mb-6 leading-relaxed flex-grow min-h-[6rem]">{{ $desc }}</p>
                                    <a href="#"
                                        class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-red-600 to-red-700 text-white py-3 px-6 rounded-xl shadow-md hover:shadow-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 transform hover:-translate-y-1 font-semibold mt-auto">
                                        Learn More
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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

            <div class="swiper insightSwiper home-animate-fadeInUp delay-200">
                <div class="swiper-wrapper pb-12">
                    @foreach ([
                    ['Innovations in Drilling Technology for 2024', 'A look into automated drilling systems and AI-powered exploration tools shaping the future.', 'images/insight-technology.jpg'],
                    ['Mastering HSE: Key to a Zero-Accident Workplace', 'Exploring the critical role of Health, Safety, and Environment protocols in offshore operations.', 'images/insight-hse.jpg'],
                    ['Career Pathways in the Modern Oil & Gas Sector', 'From data science to renewable energy integration, discover the new job roles in the industry.', 'images/insight-career.jpg']
                    ] as [$title, $desc, $img])
                    <div class="swiper-slide h-auto">
                        <div class="group bg-white border border-gray-200 rounded-3xl overflow-hidden text-left hover:shadow-2xl hover:border-blue-200 transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full">
                            <div class="relative h-56 overflow-hidden flex-shrink-0">
                                <img src="{{ asset($img) }}" alt="{{ $title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                <div class="absolute bottom-4 left-4">
                                    <span class="bg-blue-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold">Industry Insights</span>
                                </div>
                            </div>
                            <div class="p-8 flex flex-col flex-grow">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4 leading-tight min-h-[4.5rem] flex items-center">{{ $title }}</h3>
                                <p class="text-gray-600 mb-6 leading-relaxed flex-grow min-h-[6rem]">{{ $desc }}</p>
                                <a href="#" class="inline-flex items-center gap-2 text-blue-700 font-semibold hover:gap-3 transition-all group mt-auto">
                                    Read More
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
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
                        @php
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
                        @endphp

                        @foreach ($internationalLogos as [$name, $logo])
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-blue-400 transition-all duration-300">
                            <img src="{{ asset($logo) }}" alt="{{ $name }}" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        @endforeach

                        @foreach ($internationalLogos as [$name, $logo])
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-blue-400 transition-all duration-300">
                            <img src="{{ asset($logo) }}" alt="{{ $name }}" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        @endforeach
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
                        @php
                        $nationalLogos = [
                        ['BNSP', 'accredited/bnsp.png'],
                        ['Kemnaker', 'accredited/kemenaker.png'],
                        ['LSP Energi', 'accredited/lspenergi.jpg'],
                        ['LSP Energi', 'accredited/lspikn.jpg'],
                        ['LSP Energi', 'accredited/lsplh.png'],
                        ['LSP Energi', 'accredited/lspmigas.jpg'],
                        ['LSP Energi', 'accredited/lsppim.png'],
                        ['LSP Energi', 'accredited/lsptti.png'],
                        ['LSP Energi', 'accredited/ppsdm2.png'],
                        ['LSP Energi', 'accredited/ppsdm.png'],
                        ['LSP Energi', 'accredited/iccosh.png'],
                        ['LSP Energi', 'accredited/geomigas.png'],
                        ['K3 Nasional', 'accredited/k3nasional.png']
                        ];
                        @endphp

                        @foreach ($nationalLogos as [$name, $logo])
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-red-400 transition-all duration-300">
                            <img src="{{ asset($logo) }}" alt="{{ $name }}" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        @endforeach

                        @foreach ($nationalLogos as [$name, $logo])
                        <div class="flex-shrink-0 w-40 h-32 bg-white rounded-2xl shadow-md p-6 flex items-center justify-center hover:shadow-xl hover:border-2 hover:border-red-400 transition-all duration-300">
                            <img src="{{ asset($logo) }}" alt="{{ $name }}" class="max-w-full max-h-full object-contain hover:scale-110 transition-all duration-300">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection