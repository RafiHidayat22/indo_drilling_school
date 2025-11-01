@extends('layouts.app')

@section('title', 'Training Programs | Indonesia Drilling School')


@section('content')
<div class="program-portal">
    <!-- Hero Section -->
    <section class="pp-hero-section">
        <div class="pp-hero-overlay">
                        <img src="{{ asset('images/imgHeroProgram.jpg') }}"
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
                @foreach($categories as $category)
                <div class="pp-program-card" data-aos="fade-up">
                    <div class="pp-program-icon">
                        {!! $category->icon !!}
                    </div>
                    <div class="pp-program-content">
                        <h3 class="pp-program-title">{{ $category->title }}</h3>
                        <p class="pp-program-description">{{ $category->description }}</p>
                        <a href="{{ route('program.category', $category->slug) }}" class="pp-program-link">
                            <span>Learn More</span>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection