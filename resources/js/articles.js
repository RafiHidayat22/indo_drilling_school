/**
 * Articles Page Custom JavaScript
 * Include this in your resources/js/app.js or add as separate file
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================================
    // COUNTER ANIMATION FOR STATS
    // ============================================
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;

        const updateCounter = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target + '+';
            }
        };

        updateCounter();
    }

    // Observe counter elements and trigger animation when visible
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                animateCounter(entry.target);
                entry.target.classList.add('counted');
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter-number').forEach(counter => {
        counterObserver.observe(counter);
    });

    // ============================================
    // SEARCH FUNCTIONALITY
    // ============================================
    const searchInput = document.getElementById('searchArticles');
    const articlesGrid = document.getElementById('articlesGrid');
    
    if (searchInput && articlesGrid) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const articles = articlesGrid.querySelectorAll('.article-card');

            articles.forEach(article => {
                const title = article.querySelector('h3').textContent.toLowerCase();
                const description = article.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    article.style.display = 'block';
                    // Add fade-in animation
                    article.style.animation = 'fade-in-up 0.5s ease-out';
                } else {
                    article.style.display = 'none';
                }
            });

            // Show "No results" message if no articles found
            const visibleArticles = Array.from(articles).filter(a => a.style.display !== 'none');
            if (visibleArticles.length === 0 && !document.getElementById('noResults')) {
                const noResults = document.createElement('div');
                noResults.id = 'noResults';
                noResults.className = 'col-span-2 text-center py-12';
                noResults.innerHTML = `
                    <div class="text-gray-400 text-6xl mb-4">
                        <i class="fa-solid fa-search"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No articles found</h3>
                    <p class="text-gray-500">Try different keywords or browse all categories</p>
                `;
                articlesGrid.appendChild(noResults);
            } else if (visibleArticles.length > 0) {
                const noResultsEl = document.getElementById('noResults');
                if (noResultsEl) noResultsEl.remove();
            }
        });
    }

    // ============================================
    // CATEGORY FILTER
    // ============================================
    const categoryFilter = document.getElementById('categoryFilter');
    
    if (categoryFilter && articlesGrid) {
        categoryFilter.addEventListener('change', function(e) {
            const selectedCategory = e.target.value;
            const articles = articlesGrid.querySelectorAll('.article-card');

            articles.forEach((article, index) => {
                const articleCategory = article.getAttribute('data-category');
                
                if (selectedCategory === 'all' || articleCategory === selectedCategory) {
                    article.style.display = 'block';
                    // Staggered animation
                    article.style.animation = `fade-in-up 0.5s ease-out ${index * 0.1}s both`;
                } else {
                    article.style.display = 'none';
                }
            });
        });
    }

    // ============================================
    // SIDEBAR CATEGORY FILTER
    // ============================================
    const sidebarCategories = document.querySelectorAll('aside a[href="#"]');
    
    sidebarCategories.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const categoryText = this.querySelector('span').textContent.trim().toLowerCase();
            
            // Map category text to data-category values
            const categoryMap = {
                'training': 'training',
                'hse': 'safety',
                'certification': 'certification',
                'career': 'career',
                'news': 'news'
            };

            const category = categoryMap[categoryText] || 'all';
            
            // Update select dropdown
            if (categoryFilter) {
                categoryFilter.value = category;
                categoryFilter.dispatchEvent(new Event('change'));
            }

            // Smooth scroll to articles
            articlesGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // ============================================
    // SCROLL REVEAL ANIMATION
    // ============================================
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    document.querySelectorAll('[data-aos]').forEach(element => {
        element.classList.add('reveal');
        revealObserver.observe(element);
    });

    // ============================================
    // READ TIME CALCULATOR
    // ============================================
    function calculateReadTime(text) {
        const wordsPerMinute = 200;
        const words = text.trim().split(/\s+/).length;
        const readTime = Math.ceil(words / wordsPerMinute);
        return readTime;
    }

    // Apply to all articles (if you have full content)
    document.querySelectorAll('.article-card p').forEach(paragraph => {
        const readTime = calculateReadTime(paragraph.textContent);
        // This is already set in the HTML, but you can dynamically update it
    });

    // ============================================
    // NEWSLETTER FORM HANDLING
    // ============================================
    const newsletterForm = document.querySelector('.newsletter-form');
    
    if (newsletterForm) {
        const submitButton = newsletterForm.querySelector('button[type="submit"], button');
        
        if (submitButton) {
            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                const emailInput = newsletterForm.querySelector('input[type="email"]');
                const email = emailInput.value;

                if (validateEmail(email)) {
                    // Show success message
                    showNotification('Success! You\'ve been subscribed to our newsletter.', 'success');
                    emailInput.value = '';
                } else {
                    showNotification('Please enter a valid email address.', 'error');
                }
            });
        }
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `fixed top-24 right-6 px-6 py-4 rounded-xl shadow-2xl z-50 transform transition-all duration-500 ${
            type === 'success' 
                ? 'bg-green-600 text-white' 
                : 'bg-red-600 text-white'
        }`;
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} text-2xl"></i>
                <span class="font-semibold">${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 500);
        }, 3000);
    }

    // ============================================
    // LAZY LOADING IMAGES
    // ============================================
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    }, {
        rootMargin: '50px'
    });

    document.querySelectorAll('.article-card img').forEach(img => {
        imageObserver.observe(img);
    });

    // ============================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '#!') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // ============================================
    // PAGINATION HANDLING
    // ============================================
    const paginationButtons = document.querySelectorAll('.pagination-button');
    
    paginationButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all buttons
            paginationButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-red-600', 'text-white');
                btn.classList.add('border-2', 'border-gray-300');
            });
            
            // Add active class to clicked button
            this.classList.add('active', 'bg-red-600', 'text-white');
            this.classList.remove('border-2', 'border-gray-300');
            
            // Scroll to top of articles
            articlesGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            // Here you would typically load new articles via AJAX
            // For demo purposes, we'll just show a loading state
            showLoadingState();
        });
    });

    function showLoadingState() {
        const articles = articlesGrid.querySelectorAll('.article-card');
        
        articles.forEach((article, index) => {
            article.style.opacity = '0.3';
            setTimeout(() => {
                article.style.opacity = '1';
                article.style.animation = `fade-in-up 0.5s ease-out ${index * 0.1}s both`;
            }, 500);
        });
    }

    // ============================================
    // STICKY SIDEBAR ON SCROLL
    // ============================================
    const sidebar = document.querySelector('aside .sticky');
    const sidebarParent = document.querySelector('aside');
    
    if (sidebar && sidebarParent) {
        let lastScrollTop = 0;
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const sidebarRect = sidebarParent.getBoundingClientRect();
            
            // Check if sidebar should stick
            if (window.innerWidth >= 1024) { // lg breakpoint
                if (sidebarRect.top <= 144) { // top-36 (9rem = 144px)
                    sidebar.style.position = 'sticky';
                    sidebar.style.top = '144px';
                } else {
                    sidebar.style.position = 'relative';
                    sidebar.style.top = '0';
                }
            }
            
            lastScrollTop = scrollTop;
        });
    }

    // ============================================
    // READING PROGRESS BAR (Optional)
    // ============================================
    function createProgressBar() {
        const progressBar = document.createElement('div');
        progressBar.id = 'readingProgress';
        progressBar.className = 'fixed top-0 left-0 h-1 bg-gradient-to-r from-red-600 to-orange-600 z-50 transition-all duration-300';
        progressBar.style.width = '0%';
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', () => {
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight - windowHeight;
            const scrolled = window.scrollY;
            const progress = (scrolled / documentHeight) * 100;
            
            progressBar.style.width = `${Math.min(progress, 100)}%`;
        });
    }

    // Uncomment to enable reading progress bar
    // createProgressBar();

    // ============================================
    // ARTICLE CARD TILT EFFECT (Optional)
    // ============================================
    const cards = document.querySelectorAll('.article-card');
    
    cards.forEach(card => {
        card.addEventListener('mousemove', function(e) {
            if (window.innerWidth >= 1024) { // Only on desktop
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px) scale(1.02)`;
            }
        });
        
        card.addEventListener('mouseleave', function() {
            card.style.transform = '';
        });
    });

    // ============================================
    // SEARCH SUGGESTIONS (Optional Enhancement)
    // ============================================
    const searchSuggestions = [
        'drilling techniques',
        'safety protocols',
        'IADC certification',
        'well control',
        'offshore training',
        'HSE guidelines',
        'career development',
        'IWCF certification'
    ];

    if (searchInput) {
        const suggestionBox = document.createElement('div');
        suggestionBox.className = 'absolute top-full left-0 right-0 bg-white border-2 border-gray-200 rounded-2xl mt-2 shadow-xl hidden z-50 max-h-64 overflow-y-auto';
        searchInput.parentElement.appendChild(suggestionBox);
        searchInput.parentElement.style.position = 'relative';

        searchInput.addEventListener('focus', function() {
            if (this.value.length === 0) {
                showSuggestions(searchSuggestions);
            }
        });

        searchInput.addEventListener('input', function() {
            const value = this.value.toLowerCase();
            if (value.length > 0) {
                const filtered = searchSuggestions.filter(s => s.includes(value));
                showSuggestions(filtered);
            } else {
                showSuggestions(searchSuggestions);
            }
        });

        function showSuggestions(suggestions) {
            if (suggestions.length === 0) {
                suggestionBox.classList.add('hidden');
                return;
            }

            suggestionBox.innerHTML = suggestions.map(suggestion => `
                <div class="px-6 py-3 hover:bg-red-50 cursor-pointer transition duration-200 flex items-center gap-3 suggestion-item">
                    <i class="fa-solid fa-search text-gray-400"></i>
                    <span class="text-gray-700">${suggestion}</span>
                </div>
            `).join('');
            
            suggestionBox.classList.remove('hidden');

            // Add click handlers to suggestions
            suggestionBox.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function() {
                    searchInput.value = this.querySelector('span').textContent;
                    searchInput.dispatchEvent(new Event('input'));
                    suggestionBox.classList.add('hidden');
                });
            });
        }

        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.classList.add('hidden');
            }
        });
    }

    // ============================================
    // ARTICLE BOOKMARK FUNCTIONALITY (Optional)
    // ============================================
    function initBookmarks() {
        const bookmarkButtons = document.querySelectorAll('.bookmark-btn');
        
        bookmarkButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const articleId = this.dataset.articleId;
                const isBookmarked = this.classList.contains('bookmarked');
                
                if (isBookmarked) {
                    this.classList.remove('bookmarked');
                    this.innerHTML = '<i class="fa-regular fa-bookmark"></i>';
                    removeBookmark(articleId);
                } else {
                    this.classList.add('bookmarked');
                    this.innerHTML = '<i class="fa-solid fa-bookmark"></i>';
                    addBookmark(articleId);
                }
            });
        });
    }

    function addBookmark(articleId) {
        let bookmarks = JSON.parse(localStorage.getItem('articleBookmarks') || '[]');
        if (!bookmarks.includes(articleId)) {
            bookmarks.push(articleId);
            localStorage.setItem('articleBookmarks', JSON.stringify(bookmarks));
            showNotification('Article bookmarked!', 'success');
        }
    }

    function removeBookmark(articleId) {
        let bookmarks = JSON.parse(localStorage.getItem('articleBookmarks') || '[]');
        bookmarks = bookmarks.filter(id => id !== articleId);
        localStorage.setItem('articleBookmarks', JSON.stringify(bookmarks));
        showNotification('Bookmark removed!', 'success');
    }

    // Uncomment to enable bookmarks
    // initBookmarks();

    // ============================================
    // PERFORMANCE OPTIMIZATION
    // ============================================
    
    // Debounce function for search
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

    // Apply debounce to search
    if (searchInput) {
        const debouncedSearch = debounce(function(e) {
            // Search logic here (already implemented above)
        }, 300);
        
        searchInput.addEventListener('input', debouncedSearch);
    }

    // ============================================
    // CONSOLE WELCOME MESSAGE
    // ============================================
    console.log('%c🛢️ Indonesia Drilling School - Articles Page', 'color: #dc2626; font-size: 20px; font-weight: bold;');
    console.log('%cWelcome to our knowledge hub! 📚', 'color: #3b82f6; font-size: 14px;');
    
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Format date helper
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('en-US', options);
}

// Truncate text helper
function truncateText(text, maxLength) {
    if (text.length <= maxLength) return text;
    return text.substr(0, maxLength) + '...';
}

// Share article function (for social sharing)
function shareArticle(title, url) {
    if (navigator.share) {
        navigator.share({
            title: title,
            url: url
        }).catch(err => console.log('Error sharing:', err));
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(url);
        showNotification('Link copied to clipboard!', 'success');
    }
}
