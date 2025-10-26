@extends('layouts.app')

@section('title', 'Home | Indonesia Drilling School')

@section('content')

<!-- Hero Section -->
<section class="relative bg-[url('https://images.unsplash.com/photo-1542884748-5ec6ea091f3a?auto=format&fit=crop&w=1600&q=80')] bg-cover bg-center text-white py-24 px-6 text-center">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">
            Professional Oil & Gas Training and Certification Provider
        </h1>
        <p class="text-lg md:text-xl text-gray-200">
            Empowering Indonesia’s Workforce for the Global Energy Industry
        </p>
    </div>
</section>

<!-- About Section -->
<section class="py-16 px-6 text-center">
    <h2 class="text-3xl font-bold text-blue-900 mb-6">About Indonesia Drilling School</h2>
    <p class="max-w-3xl mx-auto text-gray-600">
        To produce a highly competent and professional workforce for the national and international oil and gas industry through superior, competency-based training programs and excellent service.
    </p>
</section>

<!-- Our Training Programs -->
<section class="py-16 bg-gray-50">
    <h2 class="text-3xl font-bold text-blue-900 text-center mb-10">Our Training Programs</h2>

    <div class="swiper programSwiper max-w-6xl mx-auto">
        <div class="swiper-wrapper">
            @foreach ([
                ['Basic Drilling Course', 'Foundation training for aspiring drilling professionals.'],
                ['Rig Inspection & Maintenance', 'Ensuring operational safety and efficiency through expert inspection.'],
                ['Safety & HSE Courses', 'Comprehensive safety protocols for high-risk environments.']
            ] as [$title, $desc])
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">{{ $title }}</h3>
                        <p class="text-gray-600 mb-5">{{ $desc }}</p>
                        <a href="#" class="inline-block bg-blue-800 text-white py-2 px-4 rounded-lg hover:bg-blue-900 transition">
                            Learn More →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination mt-8"></div>
    </div>
</section>

<!-- Latest Insights -->
<section class="py-16">
    <h2 class="text-3xl font-bold text-blue-900 text-center mb-10">Latest Insights & Articles</h2>

    <div class="swiper insightSwiper max-w-6xl mx-auto">
        <div class="swiper-wrapper">
            @foreach ([
                ['Innovations in Drilling Technology for 2024', 'A look into automated drilling systems and AI-powered exploration tools shaping the future.'],
                ['Mastering HSE: Key to a Zero-Accident Workplace', 'Exploring the critical role of Health, Safety, and Environment protocols in offshore operations.'],
                ['Career Pathways in the Modern Oil & Gas Sector', 'From data science to renewable energy integration, discover the new job roles in the industry.']
            ] as [$title, $desc])
                <div class="swiper-slide">
                    <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">{{ $title }}</h3>
                        <p class="text-gray-600 mb-5">{{ $desc }}</p>
                        <a href="#" class="inline-block bg-blue-800 text-white py-2 px-4 rounded-lg hover:bg-blue-900 transition">
                            Read More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination mt-8"></div>
    </div>
</section>

<!-- Accredited Section -->
<section class="py-16 bg-gray-50">
    <h2 class="text-3xl font-bold text-blue-900 text-center mb-10">
        Accredited by International and National Institutions
    </h2>

    <div class="swiper accreditSwiper max-w-5xl mx-auto">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-800 mb-3">International Accreditation</h3>
                    <p class="text-gray-600">Complying with top global safety and quality standards.</p>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="bg-white rounded-2xl shadow-md p-6 text-center">
                    <h3 class="text-xl font-semibold text-blue-800 mb-3">National Accreditation</h3>
                    <p class="text-gray-600">Certified by Indonesia’s official training authorities.</p>
                </div>
            </div>
        </div>
        <div class="swiper-pagination mt-8"></div>
    </div>
</section>

@endsection
