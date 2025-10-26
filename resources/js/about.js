import AOS from "aos";
import "aos/dist/aos.css";
import { initSliders } from "./sliders.js";

/**
 * About Page Enhanced JavaScript
 * Menambahkan interaktivitas dan animasi untuk halaman About
 */

document.addEventListener("DOMContentLoaded", () => {
    // Inisialisasi AOS dengan konfigurasi enhanced
    AOS.init({
        duration: 800,
        once: true,
        offset: 100,
        easing: "ease-in-out",
        delay: 50,
        anchorPlacement: 'top-bottom',
    });

    // Auto-increment delay untuk elemen fade-up
    document.querySelectorAll("[data-aos='fade-up']").forEach((el, i) => {
        if (!el.hasAttribute('data-aos-delay')) {
            el.setAttribute("data-aos-delay", i * 80);
        }
    });

    // Inisialisasi Swiper sliders
    initSliders();

    // Counter Animation untuk statistik
    initCounterAnimation();

    // Parallax Effect untuk hero section
    initParallaxEffect();

    // Image gallery hover effects
    initImageGallery();

    // Floating card animation
    initFloatingCards();

    // Smooth scroll dengan offset untuk navigation
    initSmoothScroll();

    // Lazy loading enhancement
    initLazyLoading();

    // Timeline animation
    initTimelineAnimation();
});

/**
 * Counter Animation untuk angka statistik
 */
function initCounterAnimation() {
    const counters = document.querySelectorAll('.stat-item, [data-counter]');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCounter(entry.target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => counterObserver.observe(counter));
}

/**
 * Animate individual counter
 */
function animateCounter(element) {
    const target = element.querySelector('.text-4xl, .text-3xl, [data-count]');
    if (!target) return;

    const finalValue = target.textContent.trim();
    const numericValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
    
    if (isNaN(numericValue)) return;

    const suffix = finalValue.replace(/[0-9]/g, '');
    const duration = 2000;
    const steps = 60;
    const increment = numericValue / steps;
    let current = 0;
    let step = 0;

    const timer = setInterval(() => {
        current += increment;
        step++;
        
        if (step >= steps) {
            current = numericValue;
            clearInterval(timer);
        }

        target.textContent = Math.floor(current) + suffix;
    }, duration / steps);
}

/**
 * Parallax effect untuk hero section
 */
function initParallaxEffect() {
    const hero = document.querySelector('section.relative.h-\\[70vh\\]');
    if (!hero) return;

    const parallaxElements = hero.querySelectorAll('img, .relative.z-10');

    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroHeight = hero.offsetHeight;
        
        if (scrolled <= heroHeight) {
            parallaxElements.forEach((el, index) => {
                const speed = 0.5 + (index * 0.2);
                const yPos = -(scrolled * speed);
                el.style.transform = `translate3d(0, ${yPos}px, 0)`;
            });
        }
    });
}

/**
 * Enhanced image gallery interactions
 */
function initImageGallery() {
    const galleryImages = document.querySelectorAll('.rounded-2xl.overflow-hidden img');
    
    galleryImages.forEach(img => {
        const container = img.closest('.rounded-2xl.overflow-hidden');
        if (!container) return;

        container.classList.add('image-gallery-item');
        
        // Add click to zoom functionality (optional)
        container.addEventListener('click', () => {
            createImageModal(img.src, img.alt);
        });

        // Lazy load enhancement
        if ('loading' in HTMLImageElement.prototype) {
            img.loading = 'lazy';
        }
    });
}

/**
 * Create image modal for gallery
 */
function createImageModal(src, alt) {
    // Create modal overlay
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4 cursor-pointer';
    modal.style.opacity = '0';
    modal.style.transition = 'opacity 0.3s ease';
    
    // Create image
    const img = document.createElement('img');
    img.src = src;
    img.alt = alt;
    img.className = 'max-w-full max-h-full object-contain rounded-lg shadow-2xl';
    
    // Close button
    const closeBtn = document.createElement('button');
    closeBtn.innerHTML = '<i class="fa-solid fa-xmark text-3xl"></i>';
    closeBtn.className = 'absolute top-4 right-4 text-white hover:text-gray-300 transition';
    
    modal.appendChild(img);
    modal.appendChild(closeBtn);
    document.body.appendChild(modal);
    
    // Animate in
    requestAnimationFrame(() => {
        modal.style.opacity = '1';
    });
    
    // Close handlers
    const closeModal = () => {
        modal.style.opacity = '0';
        setTimeout(() => modal.remove(), 300);
    };
    
    modal.addEventListener('click', closeModal);
    closeBtn.addEventListener('click', closeModal);
    
    // Prevent image click from closing
    img.addEventListener('click', (e) => e.stopPropagation());
}

/**
 * Floating animation untuk decorative cards
 */
function initFloatingCards() {
    const floatingElements = document.querySelectorAll('.absolute.-bottom-6.-left-6');
    
    floatingElements.forEach((el, index) => {
        el.classList.add('float-animation');
        el.style.animationDelay = `${index * 0.5}s`;
    });
}

/**
 * Smooth scroll dengan offset
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#' || href === '#!') return;
            
            const target = document.querySelector(href);
            if (!target) return;
            
            e.preventDefault();
            
            const offsetTop = target.offsetTop - 80; // Account for fixed header
            
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        });
    });
}

/**
 * Enhanced lazy loading dengan fade in
 */
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    
                    img.classList.add('fade-in');
                    imageObserver.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px'
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

/**
 * Timeline animation dengan progressive reveal
 */
function initTimelineAnimation() {
    const timelineItems = document.querySelectorAll('.relative > .absolute.-left-24');
    
    if (timelineItems.length === 0) return;
    
    const observerOptions = {
        threshold: 0.3,
        rootMargin: '-50px'
    };

    const timelineObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'scale(0) rotate(-180deg)';
                
                setTimeout(() => {
                    entry.target.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'scale(1) rotate(0deg)';
                }, 100);
                
                timelineObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    timelineItems.forEach(item => {
        timelineObserver.observe(item);
    });
}

/**
 * Add hover sound effect (optional - hanya jika ingin tambah audio feedback)
 */
function initHoverSounds() {
    const interactiveElements = document.querySelectorAll('.group, button, a');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            // Bisa tambahkan subtle audio feedback di sini
            el.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
        });
    });
}

/**
 * Performance monitoring (optional - untuk development)
 */
if (process.env.NODE_ENV === 'development') {
    window.addEventListener('load', () => {
        const perfData = performance.getEntriesByType('navigation')[0];
        console.log('Page Load Time:', perfData.loadEventEnd - perfData.fetchStart, 'ms');
    });
}

/**
 * Utility: Debounce function untuk scroll events
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Export untuk digunakan di file lain jika diperlukan
export {
    initCounterAnimation,
    initParallaxEffect,
    initImageGallery,
    initSmoothScroll
};