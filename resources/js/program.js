/**
 * Training Portal Interactive Script - Scoped
 * Namespace: .program-portal
 * Handles animations, scroll effects, and user interactions
 */

// ===================================
// Initialize on DOM Load
// ===================================

document.addEventListener('DOMContentLoaded', function() {
    // Check if program portal exists on page
    const programPortal = document.querySelector('.program-portal');
    if (!programPortal) return;

    initAOS();
    initSmoothScroll();
    initProgramCards();
    initStatsCounter();
    initScrollIndicator();
    initParallax();
});

// ===================================
// AOS (Animate On Scroll) Init
// ===================================

function initAOS() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
                
                // Add stagger delay for grid items
                const delay = entry.target.getAttribute('data-aos-delay');
                if (delay) {
                    entry.target.style.transitionDelay = delay + 'ms';
                }
            }
        });
    }, observerOptions);

    // Observe all elements with data-aos attribute inside program-portal
    document.querySelectorAll('.program-portal [data-aos]').forEach(element => {
        observer.observe(element);
    });
}

// ===================================
// Smooth Scroll Function
// ===================================

function scrollToPrograms() {
    const programsSection = document.getElementById('programs');
    if (programsSection) {
        const offsetTop = programsSection.offsetTop - 80;
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Make function global for button onclick
window.scrollToPrograms = scrollToPrograms;

function initSmoothScroll() {
    document.querySelectorAll('.program-portal a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===================================
// Program Cards Interactions
// ===================================

function initProgramCards() {
    const cards = document.querySelectorAll('.program-portal .pp-program-card');
    
    cards.forEach(card => {
        // Add hover effect with tilt
        card.addEventListener('mousemove', handleCardTilt);
        card.addEventListener('mouseleave', resetCardTilt);
        
        // Add click ripple effect
        card.addEventListener('click', createRipple);
    });
}

function handleCardTilt(e) {
    const card = e.currentTarget;
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    
    const rotateX = (y - centerY) / 20;
    const rotateY = (centerX - x) / 20;
    
    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.01)`;
}

function resetCardTilt(e) {
    const card = e.currentTarget;
    card.style.transform = '';
}

function createRipple(e) {
    const card = e.currentTarget;
    
    // Don't create ripple if clicking on a link
    if (e.target.closest('.pp-program-link')) return;
    
    const ripple = document.createElement('span');
    const rect = card.getBoundingClientRect();
    
    const size = Math.max(rect.width, rect.height);
    const x = e.clientX - rect.left - size / 2;
    const y = e.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('pp-ripple');
    
    card.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// ===================================
// Stats Counter Animation
// ===================================

function initStatsCounter() {
    const statsSection = document.querySelector('.program-portal .pp-stats-section');
    if (!statsSection) return;
    
    let hasAnimated = false;
    
    const observerOptions = {
        threshold: 0.5
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                hasAnimated = true;
                animateStats();
            }
        });
    }, observerOptions);
    
    observer.observe(statsSection);
}

function animateStats() {
    const statNumbers = document.querySelectorAll('.program-portal .pp-stat-number');
    
    const stats = [
        { element: statNumbers[0], target: 2500, suffix: '+' },
        { element: statNumbers[1], target: 15, suffix: '+' },
        { element: statNumbers[2], target: 98, suffix: '%' },
        { element: statNumbers[3], target: 50, suffix: '+' }
    ];
    
    stats.forEach((stat) => {
        if (!stat.element) return;
        
        let current = 0;
        const increment = stat.target / 50;
        const duration = 2000;
        const stepTime = duration / 50;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= stat.target) {
                current = stat.target;
                clearInterval(timer);
            }
            stat.element.textContent = Math.floor(current).toLocaleString() + stat.suffix;
        }, stepTime);
    });
}

// ===================================
// Scroll Indicator
// ===================================

function initScrollIndicator() {
    const scrollIndicator = document.querySelector('.program-portal .pp-hero-scroll-indicator');
    if (!scrollIndicator) return;
    
    const throttledScroll = throttle(() => {
        const scrollPosition = window.scrollY;
        const fadeStart = 100;
        const fadeEnd = 300;
        
        if (scrollPosition < fadeStart) {
            scrollIndicator.style.opacity = '1';
        } else if (scrollPosition >= fadeStart && scrollPosition <= fadeEnd) {
            const opacity = 1 - (scrollPosition - fadeStart) / (fadeEnd - fadeStart);
            scrollIndicator.style.opacity = opacity.toString();
        } else {
            scrollIndicator.style.opacity = '0';
        }
    }, 100);
    
    window.addEventListener('scroll', throttledScroll);
}

// ===================================
// Parallax Effect for Hero Section
// ===================================

function initParallax() {
    const heroContent = document.querySelector('.program-portal .pp-hero-content');
    const heroOverlay = document.querySelector('.program-portal .pp-hero-overlay');
    
    if (!heroContent) return;
    
    const throttledParallax = throttle(() => {
        const scrolled = window.scrollY;
        
        if (heroContent) {
            heroContent.style.transform = `translateY(${scrolled * 0.5}px)`;
            heroContent.style.opacity = Math.max(0, 1 - scrolled / 500);
        }
        
        if (heroOverlay) {
            heroOverlay.style.opacity = Math.min(0.7 + scrolled / 1000, 1);
        }
    }, 16);
    
    window.addEventListener('scroll', throttledParallax);
}

// ===================================
// Loading State for Program Links
// ===================================

document.addEventListener('click', function(e) {
    const link = e.target.closest('.program-portal .pp-program-link');
    if (!link) return;
    
    const card = link.closest('.pp-program-card');
    if (card && !e.ctrlKey && !e.metaKey) {
        e.preventDefault();
        card.classList.add('loading');
        
        // Create loading spinner
        const spinner = document.createElement('div');
        spinner.className = 'pp-loading-spinner';
        spinner.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <circle cx="12" cy="12" r="10" stroke-width="3" stroke-dasharray="31.4 31.4" 
                        stroke-linecap="round" opacity="0.3"/>
                <circle cx="12" cy="12" r="10" stroke-width="3" stroke-dasharray="15.7 31.4" 
                        stroke-linecap="round">
                    <animateTransform attributeName="transform" type="rotate" from="0 12 12" 
                                    to="360 12 12" dur="1s" repeatCount="indefinite"/>
                </circle>
            </svg>
        `;
        card.appendChild(spinner);
        
        // Navigate after a short delay
        setTimeout(() => {
            window.location.href = link.href;
        }, 300);
    }
});

// ===================================
// Keyboard Navigation for Cards
// ===================================

document.querySelectorAll('.program-portal .pp-program-card').forEach(card => {
    card.setAttribute('tabindex', '0');
    
    card.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            const link = card.querySelector('.pp-program-link');
            if (link) {
                link.click();
            }
        }
    });
    
    // Add focus effect
    card.addEventListener('focus', () => {
        card.style.transform = 'translateY(-8px) scale(1.01)';
    });
    
    card.addEventListener('blur', () => {
        card.style.transform = '';
    });
});

// ===================================
// Performance Optimization Utilities
// ===================================

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

function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ===================================
// Enhanced Card Hover Effects
// ===================================

document.querySelectorAll('.program-portal .pp-program-card').forEach(card => {
    const icon = card.querySelector('.pp-program-icon');
    
    card.addEventListener('mouseenter', () => {
        if (icon) {
            icon.style.transition = 'transform 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
        }
    });
});

// ===================================
// Intersection Observer for Performance
// ===================================

function observeVisibility() {
    const cards = document.querySelectorAll('.program-portal .pp-program-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.willChange = 'transform, opacity';
            } else {
                entry.target.style.willChange = 'auto';
            }
        });
    }, {
        rootMargin: '100px'
    });
    
    cards.forEach(card => observer.observe(card));
}

// Initialize visibility observer
observeVisibility();

// ===================================
// Prevent Animation Lag on Mobile
// ===================================

if ('ontouchstart' in window) {
    document.querySelectorAll('.program-portal .pp-program-card').forEach(card => {
        card.addEventListener('touchstart', function() {
            this.classList.add('touch-active');
        });
        
        card.addEventListener('touchend', function() {
            setTimeout(() => {
                this.classList.remove('touch-active');
            }, 300);
        });
    });
    
    // Add touch-specific styles
    const touchStyles = document.createElement('style');
    touchStyles.textContent = `
        .program-portal .pp-program-card.touch-active {
            transform: scale(0.98);
            transition: transform 0.2s;
        }
    `;
    document.head.appendChild(touchStyles);
}

// ===================================
// Console Welcome Message
// ===================================

console.log('%c 🎓 Indonesia Drilling School Training Portal ', 
    'background: linear-gradient(135deg, #c41e3a 0%, #ff6b35 100%); color: white; font-size: 16px; padding: 10px 20px; border-radius: 8px;');
console.log('%c Developed with ❤️ for excellence in training ', 
    'color: #666; font-size: 12px;');

// ===================================
// Export for Global Access
// ===================================

window.ProgramPortal = {
    scrollToPrograms: scrollToPrograms,
    version: '1.0.0'
};