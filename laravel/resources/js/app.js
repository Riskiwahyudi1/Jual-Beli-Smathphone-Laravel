import './bootstrap';
import 'flowbite';

const swiper = new Swiper('.slide-content', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 5000, // Waktu dalam milidetik (ms)
      disableOnInteraction: false, // Menonaktifkan autoplay ketika pengguna berinteraksi dengan swiper
    },
    slidesPerView: 4, // Menampilkan satu card per view
    spaceBetween: 16,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.next-swipe',
      prevEl: '.prev-swipe',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });