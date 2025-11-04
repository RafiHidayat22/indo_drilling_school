// Contact Form Handler
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = form.querySelector('.contact-submit-btn'); // Sesuaikan selektor
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
            const phoneRegex = /^[0-9+\-\s()]{10,}$/; // Atau sesuaikan dengan format yang Anda inginkan
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
        // Sesuaikan dengan kelas CSS di view
        const formGroup = input.closest('.contact-form-group');
        const errorMessage = formGroup.querySelector('.contact-error-message');
        
        // Tidak ada kelas 'error' di view asli, bisa ditambahkan untuk styling jika perlu
        // formGroup.classList.add('error');
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.style.display = 'block'; // Pastikan pesan error ditampilkan
        }
    }
    
    // Clear error message
    function clearError(input) {
        // Sesuaikan dengan kelas CSS di view
        const formGroup = input.closest('.contact-form-group');
        const errorMessage = formGroup.querySelector('.contact-error-message');
        
        // formGroup.classList.remove('error');
        if (errorMessage) {
            errorMessage.textContent = '';
            errorMessage.style.display = 'none'; // Sembunyikan pesan error
        }
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
            // Tidak perlu cek kelas error jika langsung clear
            clearError(this);
        });
    });
    
    // Phone number formatting (Contoh format Indonesia, sesuaikan jika perlu)
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
  // Form submission
 form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Validate form
        if (!validateForm()) {
            const firstError = form.querySelector('.contact-form-group .contact-error-message:not([style*="display: none"])');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            return;
        }

        // Show loading state
        submitBtn.classList.add('loading');
        const loader = submitBtn.querySelector('.contact-btn-loader');
        if (loader) loader.style.display = 'inline-block';
        const btnText = submitBtn.querySelector('.contact-btn-text');
        if (btnText) btnText.textContent = 'Sending...';

        const formData = new FormData(form);
        const csrfToken = document.querySelector('input[name="_token"]').value;
        formData.append('_token', csrfToken);

        try {
            console.log("🚀 Starting form submission..."); // Log awal

            const response = await fetch(window.Laravel.routes.contactStore, {
                method: 'POST',
                body: formData
            });

            console.log("✅ Response received. Status:", response.status); // Log status

            let result;
            try {
                result = await response.json();
                console.log("📄 Parsed JSON result:", result); // Log hasil parsing
            } catch (parseError) {
                console.error("❌ Failed to parse response as JSON:", parseError);
                const text = await response.text();
                console.log("📋 Response as text:", text);
                alert('Server returned an unexpected response. Please check the console.');
                return;
            }

            // --- Cek apakah sukses ---
            if (result && result.success === true) {
                console.log("🎉 Success! Server responded with success: true");

                // Reset form
                form.reset();
                // Sembunyikan pesan error jika ada
                form.querySelectorAll('.contact-error-message').forEach(el => {
                     el.textContent = '';
                     el.style.display = 'none';
                 });

                // --- Cari elemen pesan sukses ---
                const successMessageEl = document.getElementById('successMessage');
                console.log("🔍 Looking for #successMessage element:", successMessageEl);

                if (successMessageEl) {
                    console.log("✅ Found #successMessage element. Setting content and display.");
                    successMessageEl.textContent = result.message || 'Pesan Anda telah berhasil dikirim.';
                    successMessageEl.style.display = 'block';

                    // Sembunyikan pesan setelah 5 detik
                    setTimeout(() => {
                        successMessageEl.style.display = 'none';
                    }, 5000);

                } else {
                    console.error("❌ Element #successMessage not found in the DOM!");
                    alert("Pesan sukses tidak dapat ditampilkan karena elemen tidak ditemukan. Silakan periksa HTML.");
                }

            } else {
                console.error("❌ Server did not return success: true. Result:", result);
                alert('An unexpected error occurred. Please try again.');
            }

        } catch (error) {
            console.error('💥 Network or other error:', error);
            alert('An error occurred while submitting the form. Please check your connection and try again.');
        } finally {
            // Remove loading state
            submitBtn.classList.remove('loading');
            const loader = submitBtn.querySelector('.contact-btn-loader');
            if (loader) loader.style.display = 'none';
            const btnText = submitBtn.querySelector('.contact-btn-text');
            if (btnText) btnText.textContent = 'Send Message';
        }
    });
    
    // Show modal (jika tetap ingin digunakan)
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
    
    // Smooth scroll for anchor links (jika ada)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
    
    // Intersection Observer for animations (Contoh untuk card dan form-group)
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
    document.querySelectorAll('.contact-form-group').forEach((group, index) => {
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
            // Sesuaikan dengan struktur CSS Anda jika perlu
            // this.closest('.contact-form-group').style.transform = 'translateX(3px)';
        });
        
        input.addEventListener('blur', function() {
            // this.closest('.contact-form-group').style.transform = 'translateX(0)';
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
    
    // Add loading animation to map (jika iframe dianggap sebagai wrapper)
    const mapWrapper = document.querySelector('.contact-map-wrapper'); // Sesuaikan kelas
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
    console.log('Contact form initialized successfully from Vite module');
});