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
  slidesPerView: 4, // jumlah slide yang kelihatan
  spaceBetween: 30,
  loop: true,
  speed: 2000, // kecepatan perpindahan (semakin besar semakin lambat)
  autoplay: {
    delay: 0, // delay antar slide
    disableOnInteraction: false,
  },
  allowTouchMove: false, // biar ga bisa di-drag manual
  freeMode: true, // biar transisi halus dan tidak lompat
  freeModeMomentum: false, // biar tidak ngebut di akhir
  breakpoints: {
    640: { slidesPerView: 2 },
    768: { slidesPerView: 3 },
    1024: { slidesPerView: 4 },
  },
});


});
