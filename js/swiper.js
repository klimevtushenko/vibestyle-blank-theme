new Swiper('.c-testimonials-swiper', {
  initialSlide: 0,
  slidesPerView: 2,
  speed: 400,
  centeredSlides: false,
  spaceBetween: 20,
  updateOnWindowResize: true,
  loop: true,

  breakpoints: {
    320: {
      slidesPerView: 1,
    },

    768: {
      slidesPerView: 2,
    },

    1251: {
      slidesPerView: 3,
    },
  },

  navigation: {
    prevEl: '.c-btn-prev',
    nextEl: '.c-btn-next',
  },
});

new Swiper('.company-projects-card-swiper', {
  initialSlide: 0,
  slidesPerView: 1,
  speed: 400,
  centeredSlides: false,
  spaceBetween: 20,
  updateOnWindowResize: true,
  loop: true,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  breakpoints: {
    320: {
      slidesPerView: 1,
    },

    768: {
      slidesPerView: 2,
    },

    1251: {
      slidesPerView: 4,
    },
  },
});
