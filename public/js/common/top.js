$(function(){
  // top swiper
  var swiper_card_article = new Swiper('.swiper-card_article .swiper-container', {
    slidesPerView: 1.3,
    centeredSlides : false,
    spaceBetween: 16,
    initialSlide: 0,
    pagination: {
        el: ".swiper-card_article .swiper-pagination"
    },
    navigation: {
        nextEl: ".swiper-card_article .swiper-button-next",
        prevEl: ".swiper-card_article .swiper-button-prev"
    },
    breakpoints: {
      540: {
        slidesPerView: 2,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      768: {
        slidesPerView: 3,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      1024: {
        slidesPerView: 4,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      1240: {
        slidesPerView: 5,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      }
    }
  });

  // top swiper
  var swiper_card_company = new Swiper('.swiper-card_company .swiper-container', {
    slidesPerView: 1.3,
    centeredSlides : false,
    spaceBetween: 16,
    initialSlide: 0,
    pagination: {
        el: ".swiper-card_company .swiper-pagination"
    },
    navigation: {
        nextEl: ".swiper-card_company .swiper-button-next",
        prevEl: ".swiper-card_company .swiper-button-prev"
    },
    breakpoints: {
      540: {
        slidesPerView: 2,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      768: {
        slidesPerView: 3,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      1024: {
        slidesPerView: 4,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      },
      1240: {
        slidesPerView: 5,
        centeredSlides : false,
        spaceBetween: 16,
        initialSlide: 0
      }
    }
  });

  // top news
  var top_news_swiper = new Swiper('.top-news .swiper-container', {
    slidesPerView: 1,
    autoplay: {
        delay: 3000,
    },
    navigation: {
        nextEl: ".top-news .swiper-button-next",
        prevEl: ".top-news .swiper-button-prev"
    },
  });

  $('.stopbtn').on('click', function() {
    top_news_swiper.autoplay.stop();
  });
});