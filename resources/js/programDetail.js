// Program Detail JavaScript - Indonesia Drilling School

// Initialize AOS (Animate On Scroll)
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS if available
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });
    }

    // Smooth scroll for internal links
    initSmoothScroll();

    // Add parallax effect to hero section
    initParallaxEffect();

    // Add card hover animations
    initCardAnimations();

    // Add price animation on scroll
    initPriceAnimations();

    // Add loading state for enroll buttons
    initEnrollButtons();
});

// Smooth scroll functionality
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Parallax effect for hero section
function initParallaxEffect() {
    const hero = document.querySelector('.detailProgram-hero-section');
    if (!hero) return;

    let ticking = false;

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(function() {
                const scrolled = window.pageYOffset;
                const parallax = scrolled * 0.5;
                hero.style.transform = `translateY(${parallax}px)`;
                
                // Fade out hero content on scroll
                const opacity = 1 - (scrolled / 500);
                const heroContent = hero.querySelector('.detailProgram-hero-content');
                if (heroContent) {
                    heroContent.style.opacity = Math.max(0, opacity);
                }
                
                ticking = false;
            });
            ticking = true;
        }
    });
}

// Card animations
function initCardAnimations() {
    const cards = document.querySelectorAll('.detailProgram-course-card');
    
    cards.forEach(card => {
        // Add floating animation on hover
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
        });

        // Add tilt effect on mouse move
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            this.style.transform = `
                translateY(-8px) 
                perspective(1000px) 
                rotateX(${rotateX}deg) 
                rotateY(${rotateY}deg)
            `;
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) perspective(1000px) rotateX(0) rotateY(0)';
        });

        // Add click ripple effect
        card.addEventListener('click', function(e) {
            if (!e.target.closest('.detailProgram-enroll-button')) {
                createRipple(e, this);
            }
        });
    });
}

// Create ripple effect
function createRipple(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        border-radius: 50%;
        background: rgba(37, 99, 235, 0.3);
        left: ${x}px;
        top: ${y}px;
        transform: scale(0);
        animation: detailProgram-ripple 0.6s ease-out;
        pointer-events: none;
        z-index: 1;
    `;

    // Add animation keyframes if not exists
    if (!document.getElementById('detailProgram-ripple-animation')) {
        const style = document.createElement('style');
        style.id = 'detailProgram-ripple-animation';
        style.textContent = `
            @keyframes detailProgram-ripple {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);

    setTimeout(() => ripple.remove(), 600);
}

// Price animations
function initPriceAnimations() {
    const priceElements = document.querySelectorAll('.detailProgram-price-amount');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animatePrice(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });

    priceElements.forEach(price => observer.observe(price));
}

// Animate price counter
function animatePrice(element) {
    const text = element.textContent;
    const numbers = text.match(/[\d,]+/);
    
    if (!numbers) return;

    const finalNumber = parseInt(numbers[0].replace(/,/g, ''));
    const prefix = text.split(numbers[0])[0];
    const suffix = text.split(numbers[0])[1];
    
    let currentNumber = 0;
    const increment = finalNumber / 50;
    const duration = 1000;
    const stepTime = duration / 50;

    const timer = setInterval(() => {
        currentNumber += increment;
        if (currentNumber >= finalNumber) {
            currentNumber = finalNumber;
            clearInterval(timer);
        }
        element.textContent = prefix + formatNumber(Math.floor(currentNumber)) + suffix;
    }, stepTime);
}

// Format number with commas
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

// Enroll button functionality
function initEnrollButtons() {
    const enrollButtons = document.querySelectorAll('.detailProgram-enroll-button');
    
    enrollButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Add loading state
            const originalContent = this.innerHTML;
            this.innerHTML = `
                <svg class="detailProgram-spinner" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-dasharray="30" stroke-dashoffset="0">
                        <animateTransform attributeName="transform" type="rotate" 
                                        from="0 8 8" to="360 8 8" dur="1s" repeatCount="indefinite"/>
                    </circle>
                </svg>
                <span>Processing...</span>
            `;
            this.style.pointerEvents = 'none';

            // Simulate processing (remove in production)
            setTimeout(() => {
                this.innerHTML = originalContent;
                this.style.pointerEvents = 'auto';
            }, 1500);
        });

        // Add pulse effect
        setInterval(() => {
            button.style.animation = 'detailProgram-pulse 2s ease-in-out';
            setTimeout(() => {
                button.style.animation = '';
            }, 2000);
        }, 5000);
    });

    // Add pulse animation
    if (!document.getElementById('detailProgram-pulse-animation')) {
        const style = document.createElement('style');
        style.id = 'detailProgram-pulse-animation';
        style.textContent = `
            @keyframes detailProgram-pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }
        `;
        document.head.appendChild(style);
    }
}

// Add scroll progress indicator
function initScrollProgress() {
    const progressBar = document.createElement('div');
    progressBar.className = 'detailProgram-scroll-progress';
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        z-index: 9999;
        transition: width 0.1s ease;
    `;
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });
}

// Initialize scroll progress
initScrollProgress();

// Add intersection observer for fade-in animations
const fadeElements = document.querySelectorAll('.detailProgram-course-card, .detailProgram-section-header');
const fadeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, {
    threshold: 0.1
});

fadeElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    fadeObserver.observe(el);
});

// Back to top functionality
function initBackToTop() {
    const backToTop = document.createElement('button');
    backToTop.className = 'detailProgram-back-to-top';
    backToTop.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M12 19V5M5 12L12 5L19 12" stroke="currentColor" stroke-width="2" 
                  stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    `;
    backToTop.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        border: none;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        transition: all 0.3s;
        z-index: 1000;
    `;

    document.body.appendChild(backToTop);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.style.display = 'flex';
        } else {
            backToTop.style.display = 'none';
        }
    });

    backToTop.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    backToTop.addEventListener('mouseenter', () => {
        backToTop.style.transform = 'translateY(-5px)';
        backToTop.style.boxShadow = '0 6px 20px rgba(37, 99, 235, 0.5)';
    });

    backToTop.addEventListener('mouseleave', () => {
        backToTop.style.transform = 'translateY(0)';
        backToTop.style.boxShadow = '0 4px 12px rgba(37, 99, 235, 0.4)';
    });
}



initBackToTop();