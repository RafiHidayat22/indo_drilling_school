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

// Floating Buttons: Scroll to Top + Contact Us
// HAPUS semua kode contact widget yang lama di file Anda
// GANTI dengan kode ini di dalam fungsi initFloatingButtons()

function initFloatingButtons() {
    // Buat container utama
    const container = document.createElement('div');
    container.id = 'floating-buttons-container';
    container.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        z-index: 1000;
        opacity: 0;
        pointer-events: none;
        transition: all 0.3s ease;
    `;

    // Tombol Scroll to Top (BIRU) - DI ATAS
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.className = 'detailProgram-scroll-to-top';
    scrollToTopBtn.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 19V5M5 12l7-7 7 7" />
        </svg>
    `;
    scrollToTopBtn.style.cssText = `
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        transition: all 0.3s ease;
    `;

    scrollToTopBtn.addEventListener('mouseenter', () => {
        scrollToTopBtn.style.transform = 'translateY(-5px)';
        scrollToTopBtn.style.boxShadow = '0 6px 20px rgba(37, 99, 235, 0.5)';
    });
    scrollToTopBtn.addEventListener('mouseleave', () => {
        scrollToTopBtn.style.transform = 'translateY(0)';
        scrollToTopBtn.style.boxShadow = '0 4px 12px rgba(37, 99, 235, 0.4)';
    });

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ========================================
    // CONTACT WIDGET - FIXED VERSION
    // ========================================
    
    const contactContainer = document.createElement('div');
    contactContainer.className = 'contact-container-widget-v2';
    contactContainer.style.cssText = `
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        gap: 0;
        position: relative;
    `;

    const contactMenu = document.createElement('div');
    contactMenu.className = 'contact-menu-widget-v2';
    contactMenu.style.cssText = `
        display: none;
        align-items: center;
        gap: 16px;
        opacity: 0;
        transform: translateX(80px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        pointer-events: none;
        padding-right: 16px;
        position: absolute;
        right: 60px;
    `;

    // WhatsApp Button
    const whatsappBtn = document.createElement('a');
    whatsappBtn.href = 'https://wa.me/6285194604893';
    whatsappBtn.target = '_blank';
    whatsappBtn.rel = 'noopener noreferrer';
    whatsappBtn.className = 'menu-item-widget-wa';
    whatsappBtn.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    `;
    whatsappBtn.style.cssText = `
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #25D366;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
        transition: all 0.3s ease;
        text-decoration: none;
        cursor: pointer;
        flex-shrink: 0;
    `;

    // Email Button
    const emailBtn = document.createElement('a');
    emailBtn.href = '#';
    emailBtn.className = 'menu-item-widget-email';
    emailBtn.innerHTML = `
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
    `;
    emailBtn.style.cssText = `
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #ea4335;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(234, 67, 53, 0.4);
        transition: all 0.3s ease;
        text-decoration: none;
        cursor: pointer;
        flex-shrink: 0;
    `;

    emailBtn.addEventListener('click', function (e) {
    e.preventDefault();
    e.stopPropagation();

    const email = 'info@idrillingschool.com';
    const subject = encodeURIComponent('Permintaan Informasi'); // opsional, bisa disesuaikan
    const body = encodeURIComponent('Halo Indonesia Drilling School,\n\n'); // opsional

    // --- Strategi: Coba buka Gmail dulu (UX terbaik), fallback ke mailto jika gagal ---
    const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=${encodeURIComponent(email)}&su=${subject}&body=${body}`;

    // Buka di tab baru — tidak mengganggu halaman utama
    const win = window.open(gmailUrl, '_blank', 'noopener,noreferrer,width=700,height=600');

    // Deteksi kegagalan: popup blocker atau pembukaan gagal
    if (!win || win.closed || typeof win.closed === 'undefined') {
        // Fallback: gunakan mailto (akan pakai client default: Outlook, Apple Mail, dll)
        const mailtoUrl = `mailto:${email}?subject=${subject}&body=${body}`;
        window.location.href = mailtoUrl;
    }
});

    // Hover effects
    [whatsappBtn, emailBtn].forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'scale(1.1)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'scale(1)';
        });
    });

    contactMenu.appendChild(emailBtn);
    contactMenu.appendChild(whatsappBtn);

    // Main Contact Button
    const contactBtn = document.createElement('button');
    contactBtn.className = 'detailProgram-contact-button-main';
    contactBtn.innerHTML = `
        <svg class="icon-chat-main" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
        </svg>
        <svg class="icon-close-main" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    `;
    contactBtn.style.cssText = `
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #dc2626;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        position: relative;
        flex-shrink: 0;
        z-index: 2;
    `;

    // Contact Widget State - dengan namespace unik
    const widgetState = {
        isOpen: false,
        toggleInProgress: false
    };

    // Toggle Function - SINGLE DEFINITION
    function toggleContactMenu(e) {
        if (e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
        }

        if (widgetState.toggleInProgress) return;
        widgetState.toggleInProgress = true;

        const iconChat = contactBtn.querySelector('.icon-chat-main');
        const iconClose = contactBtn.querySelector('.icon-close-main');

        if (!widgetState.isOpen) {
            // OPEN MENU
            widgetState.isOpen = true;
            contactMenu.style.display = 'flex';
            
            requestAnimationFrame(() => {
                contactMenu.style.opacity = '1';
                contactMenu.style.transform = 'translateX(0)';
                contactMenu.style.pointerEvents = 'auto';
            });

            if (iconChat && iconClose) {
                iconChat.style.display = 'none';
                iconClose.style.display = 'block';
            }
        } else {
            // CLOSE MENU
            widgetState.isOpen = false;
            contactMenu.style.opacity = '0';
            contactMenu.style.transform = 'translateX(80px)';
            contactMenu.style.pointerEvents = 'none';
            
            setTimeout(() => {
                if (!widgetState.isOpen) {
                    contactMenu.style.display = 'none';
                }
            }, 300);

            if (iconChat && iconClose) {
                iconChat.style.display = 'block';
                iconClose.style.display = 'none';
            }
        }

        setTimeout(() => {
            widgetState.toggleInProgress = false;
        }, 100);
    }

    // Event Listeners
    contactBtn.addEventListener('click', toggleContactMenu);

    contactBtn.addEventListener('mouseenter', () => {
        contactBtn.style.transform = 'translateY(-5px)';
        contactBtn.style.boxShadow = '0 6px 20px rgba(220, 38, 38, 0.5)';
    });

    contactBtn.addEventListener('mouseleave', () => {
        contactBtn.style.transform = 'translateY(0)';
        contactBtn.style.boxShadow = '0 4px 12px rgba(220, 38, 38, 0.4)';
    });

    // Close on outside click - dengan delay
    setTimeout(() => {
        document.addEventListener('click', (e) => {
            if (widgetState.isOpen && 
                !contactContainer.contains(e.target) && 
                !contactMenu.contains(e.target) &&
                !contactBtn.contains(e.target)) {
                toggleContactMenu();
            }
        }, { capture: true });
    }, 500);

    // Assemble contact widget
    contactContainer.appendChild(contactMenu);
    contactContainer.appendChild(contactBtn);

    // Add to main container
    container.appendChild(scrollToTopBtn);
    container.appendChild(contactContainer);

    // Add to body
    document.body.appendChild(container);

    // Show/Hide based on scroll
    function toggleButtons() {
        if (window.scrollY > 400) {
            container.style.opacity = '1';
            container.style.pointerEvents = 'auto';
            container.style.transform = 'translateY(0)';
        } else {
            container.style.opacity = '0';
            container.style.pointerEvents = 'none';
            container.style.transform = 'translateY(20px)';
        }
    }

    toggleButtons();
    window.addEventListener('scroll', toggleButtons);
}

// Call the function
initFloatingButtons();