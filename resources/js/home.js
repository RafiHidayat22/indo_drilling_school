import Swiper from "swiper";
import "swiper/css";
import "swiper/css/pagination";

document.addEventListener("DOMContentLoaded", () => {
    // Training Programs Slider
    new Swiper(".programSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: { el: ".programSwiper .swiper-pagination", clickable: true },
        breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
    });

    // Latest Insights Slider
    new Swiper(".insightSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: { el: ".insightSwiper .swiper-pagination", clickable: true },
        breakpoints: { 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } },
    });

    // Accreditation Slider
    new Swiper(".accreditSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: { el: ".accreditSwiper .swiper-pagination", clickable: true },
        breakpoints: { 768: { slidesPerView: 2 } },
    });
});
