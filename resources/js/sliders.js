import Swiper from "swiper";
import "swiper/css";
import "swiper/css/pagination";

/**
 * Inisialisasi semua Swiper carousel di project
 * Didesain agar reusable di setiap page (Home, About, dll)
 */
export const initSliders = () => {
    // Training Programs
    if (document.querySelector(".programSwiper")) {
        new Swiper(".programSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".programSwiper .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    // Insights
    if (document.querySelector(".insightSwiper")) {
        new Swiper(".insightSwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".insightSwiper .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }

    // Accreditations / Partners
    if (document.querySelector(".accreditSwiper")) {
        new Swiper(".accreditSwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".accreditSwiper .swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: { slidesPerView: 3 },
                1024: { slidesPerView: 5 },
            },
        });
    }

    // Optional Facility Carousel
    if (document.querySelector(".facilitySwiper")) {
        new Swiper(".facilitySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            pagination: {
                el: ".facilitySwiper .swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    }
};
