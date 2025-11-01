// Contact Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.submit-btn');
    const modal = document.getElementById('successModal');
    
    // Form validation
    const validators = {
        fullName: (value) => {
            if (!value.trim()) return 'Full name is required';
            if (value.trim().length < 3) return 'Name must be at least 3 characters';
            return '';
        },
        email: (value) => {
            if (!value.trim()) return 'Email is required';
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) return 'Invalid email format';
            return '';
        },
        phone: (value) => {
            if (!value.trim()) return 'Phone number is required';
            const phoneRegex = /^[0-9+\-\s()]{10,}$/;
            if (!phoneRegex.test(value)) return 'Invalid phone number format';
            return '';
        },
        subject: (value) => {
            if (!value) return 'Please select a subject';
            return '';
        },
        message: (value) => {
            if (!value.trim()) return 'Message is required';
            if (value.trim().length < 10) return 'Message must be at least 10 characters';
            return '';
        }
    };
    
    // Show error message
    function showError(input, message) {
        const formGroup = input.closest('.form-group');
        const errorMessage = formGroup.querySelector('.error-message');
        
        formGroup.classList.add('error');
        errorMessage.textContent = message;
    }
    
    // Clear error message
    function clearError(input) {
        const formGroup = input.closest('.form-group');
        const errorMessage = formGroup.querySelector('.error-message');
        
        formGroup.classList.remove('error');
        errorMessage.textContent = '';
    }
    
    // Validate single field
    function validateField(input) {
        const validator = validators[input.name];
        if (!validator) return true;
        
        const error = validator(input.value);
        if (error) {
            showError(input, error);
            return false;
        } else {
            clearError(input);
            return true;
        }
    }
    
    // Validate all fields
    function validateForm() {
        let isValid = true;
        const requiredFields = form.querySelectorAll('[required]');
        
        requiredFields.forEach(field => {
            if (!validateField(field)) {
                isValid = false;
            }
        });
        
        return isValid;
    }
    
    // Real-time validation
    form.querySelectorAll('input, select, textarea').forEach(input => {
        // Validate on blur
        input.addEventListener('blur', function() {
            if (this.value) {
                validateField(this);
            }
        });
        
        // Clear error on input
        input.addEventListener('input', function() {
            if (this.closest('.form-group').classList.contains('error')) {
                clearError(this);
            }
        });
    });
    
    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let value = e.target.value.replace(/[^\d]/g, '');
        
        // Format Indonesian phone number
        if (value.startsWith('0')) {
            if (value.length > 4) {
                value = value.slice(0, 4) + '-' + value.slice(4);
            }
            if (value.length > 9) {
                value = value.slice(0, 9) + '-' + value.slice(9, 13);
            }
        } else if (value.startsWith('62')) {
            if (value.length > 4) {
                value = value.slice(0, 4) + '-' + value.slice(4);
            }
            if (value.length > 9) {
                value = value.slice(0, 9) + '-' + value.slice(9, 13);
            }
        }
        
        e.target.value = value;
    });
    
    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validate form
        if (!validateForm()) {
            // Scroll to first error
            const firstError = form.querySelector('.form-group.error');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }
        
        // Show loading state
        submitBtn.classList.add('loading');
        
        // Collect form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        try {
            // Simulate API call (replace with your actual endpoint)
            await new Promise(resolve => setTimeout(resolve, 2000));
            
            // Here you would typically send data to your backend
            // const response = await fetch('/api/contact', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify(data)
            // });
            
            console.log('Form data:', data);
            
            // Show success modal
            showModal();
            
            // Reset form
            form.reset();
            
        } catch (error) {
            console.error('Error submitting form:', error);
            alert('An error occurred. Please try again.');
        } finally {
            // Remove loading state
            submitBtn.classList.remove('loading');
        }
    });
    
    // Show modal
    function showModal() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    
    // Close modal function (called from HTML button)
    window.closeModal = function() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
    
    // Close modal on outside click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });
    
    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe contact cards
    document.querySelectorAll('.contact-card').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `all 0.5s ease ${index * 0.1}s`;
        observer.observe(card);
    });
    
    // Observe form groups
    document.querySelectorAll('.form-group').forEach((group, index) => {
        group.style.opacity = '0';
        group.style.transform = 'translateY(20px)';
        group.style.transition = `all 0.5s ease ${index * 0.05}s`;
        observer.observe(group);
    });
    
    // Auto-resize textarea
    const textarea = document.getElementById('message');
    textarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    
    // Character counter for message (optional)
    const maxChars = 500;
    textarea.setAttribute('maxlength', maxChars);
    
    // Add focus effect to form
    const formInputs = form.querySelectorAll('input, select, textarea');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.closest('.form-group').style.transform = 'translateX(3px)';
        });
        
        input.addEventListener('blur', function() {
            this.closest('.form-group').style.transform = 'translateX(0)';
        });
    });
    
    // Detect if user is on mobile for better UX
    const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    if (isMobile) {
        // Adjust input types for better mobile keyboard
        const emailInput = document.getElementById('email');
        emailInput.setAttribute('inputmode', 'email');
        
        phoneInput.setAttribute('inputmode', 'tel');
    }
    
    // Prefill form from URL parameters (optional)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('subject')) {
        const subjectSelect = document.getElementById('subject');
        const subjectValue = urlParams.get('subject');
        if (subjectSelect.querySelector(`option[value="${subjectValue}"]`)) {
            subjectSelect.value = subjectValue;
        }
    }
    
    // Add loading animation to map
    const mapWrapper = document.querySelector('.map-wrapper');
    if (mapWrapper) {
        const iframe = mapWrapper.querySelector('iframe');
        iframe.addEventListener('load', function() {
            mapWrapper.style.opacity = '1';
        });
        mapWrapper.style.opacity = '0';
        mapWrapper.style.transition = 'opacity 0.5s ease';
    }
    
    // Console log for debugging
    console.log('Contact form initialized successfully');
});