@extends('layouts.app')

@section('title', $programTitle . ' | Indonesia Drilling School')

@section('content')
<div class="program-detail">
    <!-- Hero Section -->
    <section class="pd-hero-section">
        <div class="pd-hero-overlay"></div>
        <div class="pd-hero-content">
            <div class="pd-container">
                <div class="pd-breadcrumb" data-aos="fade-down">
                    <a href="/">Home</a>
                    <span class="pd-breadcrumb-separator">/</span>
                    <a href="/program">Training Programs</a>
                    <span class="pd-breadcrumb-separator">/</span>
                    <span>{{ $programTitle }}</span>
                </div>
                <div class="pd-hero-text" data-aos="fade-up">
                    <div class="pd-hero-icon">
                        {!! $programIcon !!}
                    </div>
                    <h1 class="pd-hero-title">{{ $programTitle }}</h1>
                    <p class="pd-hero-subtitle line-clamp-3 break-words overflow-hidden">
                        {{ $programDescription }}
                    </p>
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
                @foreach($subcategories as $subcategory)
                <div class="pd-course-item" data-aos="fade-up">
                    <div class="pd-item-header" onclick="toggleSubcategory({{ $loop->index }})">
                        <div class="pd-item-title-wrapper">
                            <div class="pd-expand-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="pd-item-title">{{ $subcategory->title }}</h3>
                                <p class="pd-item-subtitle">{{ $subcategory->description }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="pd-item-content" id="subcategory-content-{{ $loop->index }}">
                        <div class="pd-training-detail">
                            <div class="pd-company-trainings">
                                @foreach($subcategory->trainings as $training)
                                <div class="pd-training-item">
                                    <h4 class="pd-training-title">{{ $training->title }}</h4>
                                    <p class="pd-training-description">{{ $training->description }}</p>
                                    <a href="/contact"
                                        class="pd-enroll-button">
                                        <span>Enroll Now</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M6 12L10 8L6 4" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                    <a href="/program" class="pd-cta-secondary">View All Programs</a>
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

@endsection