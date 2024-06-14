import './bootstrap';
import 'flowbite';

const swiper4Card = new Swiper('.slide-content-4-card', {
    
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 5000, 
      disableOnInteraction: false, 
    },
    breakpoints: {
      
      640: {
          slidesPerView: 1, 
          spaceBetween: 10 
      },
      
      768: {
          slidesPerView: 3, 
          spaceBetween: 15 
      },
     
      1024: {
          slidesPerView: 4, 
          spaceBetween: 20 
      }
  },
    
    pagination: {
      el: '.swiper-pagination',
    },
  
    
    navigation: {
      nextEl: '.next-swipe',
      prevEl: '.prev-swipe',
    },
  
   
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });
const swiper2Card = new Swiper('.slide-content-2-card', {
    
    direction: 'horizontal',
    loop: true,
    autoplay: {
      delay: 5000, 
      disableOnInteraction: false, 
    },
    breakpoints: {
      
      640: {
          slidesPerView: 1, 
          spaceBetween: 10 
      },
      
      768: {
          slidesPerView: 2, 
          spaceBetween: 15 
      },
     
      1024: {
          slidesPerView: 3, 
          spaceBetween: 10 
      }
  },
    
    pagination: {
      el: '.swiper-pagination',
    },
  
    
    navigation: {
      nextEl: '.next-swipe',
      prevEl: '.prev-swipe',
    },
  
   
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });