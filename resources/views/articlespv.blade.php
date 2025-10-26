@extends('layouts.app')

@section('title', 'Advanced Drilling Techniques for Offshore Operations')

@section('content')
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-[60vh] md:min-h-[65vh] lg:min-h-[70vh] flex items-center">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('https://images.unsplash.com/photo-1600864854605-9e0c8e5d5c5e?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;"></div>
    </div>
    <div class="particles-container"></div>

    <div class="relative z-10 w-full py-16 md:py-20 lg:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-5xl mx-auto">
                <!-- Category Badge -->
                <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <span class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-red-600 bg-white/95 backdrop-blur-sm rounded-full shadow-lg">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Training & Education
                    </span>
                </div>

                <!-- Title -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-8 leading-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                    Advanced Drilling Techniques for Offshore Operations
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-6 lg:gap-8 text-gray-300 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="hidden md:block h-12 w-px bg-gray-700"></div>
                    <div class="flex flex-wrap items-center gap-4 lg:gap-6 text-sm md:text-base">
                        <span class="flex items-center gap-2">
                            <i class="fa-solid fa-calendar"></i>
                            October 10, 2025
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
            <div class="py-12">
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <img src="https://cdn.pixabay.com/photo/2019/10/19/16/46/drill-4561730_1280.jpg"
                        alt="Offshore Drilling Platform"
                        class="w-full h-auto object-cover">
                </div>
                <p class="mt-4 text-center text-sm text-gray-500 italic">
                    Modern offshore drilling platform in operation
                </p>
            </div>

            <!-- Article Body -->
            <div class="prose prose-lg max-w-none pb-12">

                <p class="text-gray-700 leading-relaxed mb-6">
                    The oil and gas industry has witnessed remarkable technological advancement in recent years. These innovations have transformed offshore drilling operations, making them safer, more efficient, and environmentally responsible.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Automated drilling systems reduce human error and increase precision through advanced robotics and AI-powered controls. These systems can handle repetitive tasks with remarkable consistency, allowing human operators to focus on critical decision-making and oversight.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Advanced sensor networks and data analytics platforms allow engineers to detect anomalies before they become critical. Real-time monitoring provides unprecedented visibility into drilling operations, enabling proactive maintenance and risk mitigation.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Modern blowout preventers (BOPs) feature redundant control systems and fail-safe mechanisms. These advanced safety systems protect both personnel and the environment, representing the industry's commitment to responsible operations.
                </p>

                <!-- Info Box -->
                <div class="my-10 p-8 bg-gradient-to-r from-red-50 to-orange-50 border-l-4 border-red-600 rounded-r-xl">
                    <p class="text-gray-800 leading-relaxed">
                        <strong class="text-red-600">At Indonesia Drilling School,</strong> we integrate these technologies into our training curriculum to ensure graduates are ready for the field from day one. Our state-of-the-art simulation facilities provide hands-on experience with industry-leading equipment.
                    </p>
                </div>

                <!-- Section 2 -->
                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">
                    The Impact on Industry Standards
                </h2>

                <p class="text-gray-700 leading-relaxed mb-6">
                    These technological advancements have not only improved operational efficiency but have also set new benchmarks for safety and environmental responsibility across the industry. Companies adopting these practices report significant reductions in incidents and environmental impact.
                </p>

                <p class="text-gray-700 leading-relaxed mb-8">
                    The integration of digital technologies has revolutionized how we approach drilling operations. From predictive maintenance to automated decision support systems, the modern drilling rig is a showcase of engineering excellence and technological innovation.
                </p>
                <!-- Section 3 -->
                <h2 class="text-3xl font-bold text-gray-900 mt-12 mb-6">
                    Training for Tomorrow's Challenges
                </h2>

                <p class="text-gray-700 leading-relaxed mb-6">
                    As the industry continues to evolve, staying current with these technologies and best practices is essential for professionals at all levels of the drilling operation. Comprehensive training programs must address both technical competencies and safety awareness.
                </p>

                <p class="text-gray-700 leading-relaxed mb-8">
                    Our curriculum is continuously updated to reflect the latest industry developments, ensuring that our graduates possess the knowledge and skills demanded by today's offshore operators. From classroom instruction to hands-on simulation, every aspect of our training is designed to build confidence and competence.
                </p>

            </div>
        </div>
    </div>
</article>

<!-- Related Articles Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Related Articles</h2>
                <p class="text-gray-600">Continue exploring our knowledge base</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([
                ['title' => 'Essential HSE Protocols Every Driller Must Know', 'category' => 'HSE', 'image' => 'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?auto=format&fit=crop&w=600&h=400&q=80', 'date' => 'Oct 5, 2025', 'read' => '6 min'],
                ['title' => 'How to Prepare for IADC WellSharp Certification', 'category' => 'Certification', 'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&h=400&q=80', 'date' => 'Oct 1, 2025', 'read' => '10 min'],
                ['title' => 'Career Pathways in Oil & Gas Industry', 'category' => 'Career', 'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&h=400&q=80', 'date' => 'Sep 28, 2025', 'read' => '7 min']
                ] as $item)
                <article class="article-card group bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative overflow-hidden h-48">
                        <img src="{{ $item['image'] }}"
                            alt="{{ $item['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-3 left-3">
                            <span class="inline-block px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded-full shadow-lg">
                                {{ $item['category'] }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $item['date'] }}
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <i class="fa-regular fa-clock"></i>
                                {{ $item['read'] }}
                            </span>
                        </div>
                        <h3 class="font-bold text-lg text-gray-900 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                            {{ $item['title'] }}
                        </h3>
                        <a href="/articlespv"
                            class="inline-flex items-center gap-2 text-red-600 font-semibold hover:gap-3 transition-all text-sm">
                            Read Article
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
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
    }

    .prose h3 {
        margin-top: 1.5rem;
        margin-bottom: 1rem;
        line-height: 1.4;
    }

    .prose p {
        margin-bottom: 1.25rem;
    }

    .prose strong {
        font-weight: 600;
        color: #1f2937;
    }

    /* First letter drop cap */
    .prose p.first-letter\:text-6xl::first-letter {
        font-size: 3.75rem;
        font-weight: 700;
        color: #dc2626;
        line-height: 1;
        float: left;
        margin-right: 0.5rem;
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

    /* Responsive images */
    .prose img {
        border-radius: 0.5rem;
        max-width: 100%;
        height: auto;
    }
</style>

<!-- JavaScript for Article Page -->
<script>
    // Share functionality
    function shareArticle(platform) {
        const title = 'Advanced Drilling Techniques for Offshore Operations';
        const url = window.location.href;
        const text = 'Check out this article about offshore drilling techniques';

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
            showNotification('Link copied to clipboard!', 'success');
        }).catch(() => {
            showNotification('Failed to copy link', 'error');
        });
    }

    // Newsletter form handler
    function handleNewsletterSubmit(event) {
        event.preventDefault();
        const email = event.target.querySelector('input[type="email"]').value;

        if (email) {
            showNotification('Thank you for subscribing!', 'success');
            event.target.reset();
        }

        return false;
    }

    // Reading progress indicator
    function updateReadingProgress() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;

        let progressBar = document.getElementById('reading-progress');
        if (!progressBar) {
            progressBar = document.createElement('div');
            progressBar.id = 'reading-progress';
            document.body.appendChild(progressBar);
        }
        progressBar.style.width = scrolled + '%';
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

        // Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                        }
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    });
</script>
@endsection