document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('programsContainer');
    
    if (!container) return;
    
    let isDown = false;
    let startX;
    let scrollLeft;
    let autoScrollInterval;
    let isPaused = false;

    // Auto scroll function
    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            if (!isPaused && !isDown) {
                container.scrollLeft += 1;
                
                // Reset ke awal jika sudah sampai setengah (untuk infinite loop)
                const maxScroll = container.scrollWidth / 2;
                if (container.scrollLeft >= maxScroll) {
                    container.scrollLeft = 0;
                }
            }
        }, 20);
    }

    // Mouse drag events
    container.addEventListener('mousedown', (e) => {
        isDown = true;
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
        container.style.scrollBehavior = 'auto';
    });

    container.addEventListener('mouseleave', () => {
        isDown = false;
    });

    container.addEventListener('mouseup', () => {
        isDown = false;
        setTimeout(() => {
            container.style.scrollBehavior = 'smooth';
        }, 100);
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2;
        container.scrollLeft = scrollLeft - walk;
    });

    // Pause auto-scroll on hover
    container.addEventListener('mouseenter', () => {
        isPaused = true;
    });

    container.addEventListener('mouseleave', () => {
        isPaused = false;
    });

    // Touch events for mobile
    let touchStartX = 0;
    let touchScrollLeft = 0;

    container.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].pageX;
        touchScrollLeft = container.scrollLeft;
        isPaused = true;
        container.style.scrollBehavior = 'auto';
    });

    container.addEventListener('touchmove', (e) => {
        const touchX = e.touches[0].pageX;
        const walk = (touchStartX - touchX) * 2;
        container.scrollLeft = touchScrollLeft + walk;
    });

    container.addEventListener('touchend', () => {
        setTimeout(() => {
            isPaused = false;
            container.style.scrollBehavior = 'smooth';
        }, 1000);
    });

    // Wheel scroll support
    container.addEventListener('wheel', (e) => {
        e.preventDefault();
        container.scrollLeft += e.deltaY;
    }, { passive: false });

    // Start auto-scroll
    startAutoScroll();
});