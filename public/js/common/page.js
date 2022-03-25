$(function(){
  // sp ヘッダー 検索
  $(document).on('click','header .action-area .search-box', function(){
    $(this).toggleClass('on');
    if ($(this).hasClass('on')) {
      $(this).find('p').text('閉じる');
    } else {
      $(this).find('p').text('検索');
      $('header .action-area .search form .search-select').removeClass('on');
      $('header .action-area .search form .search-select ul').slideUp();
    }
    $('header .action-area .search').stop().slideToggle();
  });
  // sp 検索 項目選択
  $(document).on('click','header .action-area .search form .search-select, .mv-area .search form .search-select', function(){
    $(this).toggleClass('on');
    $(this).find('ul').stop().slideToggle();
  });

  // sp 検索 項目データ設定
  $(document).on('click','header .action-area .search form .search-select ul li', function(){
    $("#head-search").val($(this).data('search'));
    $('header .action-area .search form .search-select p').text($(this).text());
  });

  // トップ 検索 項目データ設定
  $(document).on('click','.mv-area .search form .search-select ul li', function(){
    $("#head-search_top").val($(this).data('search'));
    $('.mv-area .search form .search-select p').text($(this).text());
  });

  // sp メニュー内 項目アコーディオン
  $(document).on('click','.nav-block .nav-item .nav-item-toggle', function(){
    $(this).toggleClass('on');
    $(this).parent().next('.category-block').stop().slideToggle();
  });
  // sp メニュー内 カテゴリー
  $(document).on('click','.nav-block .category-block .nav-category .nav-category-toggle', function(){
    $(this).toggleClass('on');
    $(this).parent().next('.grandchild-block').stop().slideToggle();
  });
  // sp メニュー内 子カテゴリー
  $(document).on('click','.nav-block .grandchild-block .nav-grandchild .nav-grandchild-toggle', function(){
    $(this).toggleClass('on');
    $(this).parent().next('.greatgrandson-block').stop().slideToggle();
  });
  // メニュー
  $(document).on('click','header .action-area ul.head-btn li.menu', function(){
    var win_w = window.innerWidth;
    nav_open(true);
    if (win_w < 1024) {
      $('.sp-nav').slideDown();
    } else {
      $('.pc-nav').slideDown(350, function() {
        $('.pc-nav .pc-nav_wrap ul,.pc-nav .pc-nav_wrap .nav-right').fadeIn();
      });
    }
  });
  // sp ナビクローズ
  $(document).on('click','.sp-nav .nav-head .nav-close', function(){
    nav_open(false);
    $('.sp-nav').slideUp();
  });
  // pc ナビクローズ
  $(document).on('click','.pc-nav .nav-close', function(){
    nav_open(false);
    $('.pc-nav .pc-nav_wrap ul,.pc-nav .pc-nav_wrap .nav-right').fadeOut(200, function() {
      $('.pc-nav').slideUp();
    });
  });

  // pc ヘッダー お気に入りボタン（未ログイン時）
  $(document).on('click','.head-btn .not_login a', function(){
    $('.mask').css('display', 'block');
    $('.exclusive-modal').css('display', 'block');
    return false;
  });

  // マスク クリック
  $(document).on('click','.mask, .exclusive-modal .close', function(){
    $('.mask').css('display', 'none');
    $('.exclusive-modal').css('display', 'none');
  });

  // カテゴリクリック時
  $(document).on('click', '.btn-category', function(e){
    e.preventDefault();
    var category_id = $(this).data('category');
    $('#category').val(category_id);
    $('.product-form').submit();
  });

  // タグクリック時
  $(document).on('click', '.btn-tag', function(e){
    e.preventDefault();
    var tag_id = $(this).data('tag');
    $('#tag').val(tag_id);
    $('.product-form').submit();
  });

  // pc ナビホバー時
  $('.pc-nav_search .pc-nav_search_btm li').hover(function(){
    if ($(this).hasClass('on')) {
      return;
    } else {
      $(this).siblings().removeClass('on');
      $(this).addClass('on');
    }
    if ($(this).hasClass('on')) {
      $('.header-mask').css('display', 'block');
    } else {
      $('.header-mask').css('display', 'none');
    }
    if ($('.pc-nav_search .pc-nav_search_btm li').hasClass('on')) {
      nav_open(true);
    } else {
      nav_open(false);
    }
    $('.pc-nav_search_detail').stop().slideUp();
    $('.search-grandchild-list,.search-greatgrandson-list').css('display','none');
    var index = $('.pc-nav_search .pc-nav_search_btm li').index(this);
    if (index === 0) {
      $('.pc-nav_search_detail.search-article').stop().slideDown();
    } else if (index === 1) {
      $('.pc-nav_search_detail.search-scene').stop().slideDown();
    } else if (index === 2) {
      $('.pc-nav_search_detail.search-item').stop().slideDown();
    } else {
      $('.pc-nav_search_detail.search-company').stop().slideDown();
    }
  },function(){
    var flg = false;
    $(":hover").each(function() {
      var className = $(this).attr("class");
      if (typeof className != "undefined") {
        if (className.indexOf('pc-nav_search_detail') != -1) {
          flg = true;
          return false;
        }
      }
    });
    if (!flg) {
      $('.header-mask').css('display', 'none');
      nav_open(false);
      $('.pc-nav_search_detail').stop().slideUp();
      $('.search-grandchild-list,.search-greatgrandson-list').css('display','none');
      $('.pc-nav_search .pc-nav_search_btm li,.pc-nav_search_detail .search-category-list ul li').removeClass('on');
    }
  });

  // pc ナビからホバーが外れた場合
  $('.pc-nav_search_detail').hover(function(){

  },function(){
    $('.header-mask').css('display', 'none');
    nav_open(false);
    $('.pc-nav_search_detail').stop().slideUp();
    $('.search-grandchild-list,.search-greatgrandson-list').css('display','none');
    $('.pc-nav_search .pc-nav_search_btm li,.pc-nav_search_detail .search-category-list ul li').removeClass('on');
  });

  var pc_cate_index = 0;
  // pc 探す カテゴリー選択
  $(document).on('click','.pc-nav_search_detail .search-category-list ul li:not(".link")', function(){
    $('.pc-nav_search_detail .search-category-list ul li').removeClass('on');
    $(this).addClass('on');
    $('.search-grandchild-list,.search-greatgrandson-list').css('display','none');
    pc_cate_index = $(this).parents('.pc-nav_search_detail_wrap').find('.search-category-list ul li:not(".link")').index(this);
    $(this).parents('.pc-nav_search_detail_wrap').find('.search-grandchild-list').css('display', 'none');
    $(this).parents('.pc-nav_search_detail_wrap').find('.search-grandchild-list').eq(pc_cate_index).css('display', 'block');
  });

  // pc 探す 孫カテゴリー選択
  $(document).on('click','.pc-nav_search_detail .search-grandchild-list ul li:not(".link")', function(){
    $('.pc-nav_search_detail .search-grandchild-list ul li').removeClass('on');
    $(this).addClass('on');
    $('.search-greatgrandson-list').css('display','none');
    var index = $(this).parents('.pc-nav_search_detail_wrap').find('.search-grandchild-list ul li:not(".link")').index(this);
    $(this).parents('.pc-nav_search_detail_wrap').find('.search-greatgrandson-list').css('display', 'none');
    $(this).parents('.pc-nav_search_detail_wrap').find('.search-greatgrandson-list').eq(index).css('display', 'block');
  });

  function nav_open(state) {
    var pos;
    if (state) {
      pos = $(window).scrollTop();
      $('body').addClass('fixed').css({'top': -pos});
      state = true;
    } else {
      $('body').removeClass('fixed').css({'top': 0});
      window.scrollTo(0, pos);
      state = false;
    }
  }

  // お気に入り押下
  $(document).on('click','.favorite,.item-favorite span',function(){
    // ログイン/未ログイン判定
    $('.mask').css('display', 'block');
    $('.exclusive-modal').css('display', 'block');

    var selecter;
    if ($(this).prop("tagName") === "SPAN") {
      selecter = $(this).prev();
    } else {
      selecter = $(this);
    }
    var id = selecter.data('id');
    var url;
    if(selecter.hasClass('on')) {
      selecter.removeClass('on');
      url = "/delete/" + id;
      $.ajax({
        type: 'post',
        dataType:'text',
        cache: false,
        url: url
      }).done(function(data){
        
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        
      });
    } else {
      selecter.addClass('on');
      url = "/create/" + id;
      $.ajax({
        type: 'post',
        dataType:'text',
        cache: false,
        url: url
      }).done(function(data){
        
      }).fail(function(XMLHttpRequest, textStatus, errorThrown){
        
      });
    }
  });

  var swipe_sp;
  $(window).on('load resize', function(){
    var win_w = window.innerWidth;
    if (win_w < 1024) {
      $('.pc-nav').css('display','none');
      $('.pc-nav_search_detail').css('display','none');
      $('.header-mask').css('display','none');
    } else {
      $('.sp-nav').css('display','none');
    }
    if (win_w < 768) {
      if ($('.swipe_sp').length) {
        if (swipe_sp) {
          // swiperが存在している場合は処理なし
        } else {
          swipe_sp = new Swiper('.swipe_sp .swiper-container', {
            slidesPerView: 1.3,
            centeredSlides : false,
            spaceBetween: 16,
            initialSlide: 0,
            pagination: {
                el: ".swipe_sp .swiper-pagination"
            },
            navigation: {
                nextEl: ".swipe_sp .swiper-button-next",
                prevEl: ".swipe_sp .swiper-button-prev"
            },
            breakpoints: {
              540: {
                slidesPerView: 2,
                centeredSlides : true,
                spaceBetween: 16,
                initialSlide: 1
              }
            }
          });
        }
      }
    } else {
      if (swipe_sp) {
        swipe_sp.destroy();
        swipe_sp = undefined;
      }
    }
  });

  $(window).on('scroll resize', function(){
    var scroll = $(document).scrollTop();
    var win_w = window.innerWidth;
    var header_h = $('header').innerHeight();
    if (win_w < 1024) {
      if (scroll > 60) {
        $('header .action-area .search').addClass('fixed');
      } else {
        $('header .action-area .search').removeClass('fixed');
      }
    } else {
      if (scroll > 100) {
        $('header .action-area .search').addClass('fixed');
      } else {
        $('header .action-area .search').removeClass('fixed');
      }
    }
    if (scroll > 100) {
      $('.to-top').fadeIn();
    } else {
      $('.to-top').fadeOut();
    }
    $('h2.top').each(function(){
      var elemPos = $(this).offset().top,
          scroll = $(window).scrollTop(),
          windowHeight = $(window).height();
      if (scroll > elemPos - windowHeight){
        $(this).addClass('fade');
      }
    });
    if ($('.search-select').length) {
      $('.search-select').removeClass('on');
      $('.search-select ul').slideUp();
    }
    if ($('.sort-select').length) {
      $('.sort-select').removeClass('on');
      $('.sort-select ul').slideUp();
    }
  });

  // スムーススクロール
  $(document).on("click", 'a[href^="#"]', function () {
    var win_w = window.innerWidth;
    var speed = 650;
    var href= $(this).attr("href");
    if ( href.indexOf('/') != -1) {
      var pos = href.split("#");
      href = "#" + pos[1];
    }
    var target = $(href === "#" || href === "" ? 'html' : href);
    if (win_w < 768) {
      var position = target.offset().top - 30;
    } else {
      var position = target.offset().top;
    }
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
  });

  // 共通 最近チェックしたコンテンツ
  var swiper_card_item = new Swiper('.swiper-card_item .swiper-container', {
    slidesPerView: 1.3,
    centeredSlides : false,
    spaceBetween: 16,
    initialSlide: 0,
    pagination: {
        el: ".swiper-card_item .swiper-pagination"
    },
    navigation: {
        nextEl: ".swiper-card_item .swiper-button-next",
        prevEl: ".swiper-card_item .swiper-button-prev"
    },
    breakpoints: {
      540: {
        slidesPerView: 2,
        centeredSlides : false,
        spaceBetween: 22,
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

  // 関連商品
  var swiper_card_connection = new Swiper('.swiper-card_connection .swiper-container', {
    slidesPerView: 1.3,
    centeredSlides : false,
    spaceBetween: 16,
    initialSlide: 0,
    pagination: {
        el: ".swiper-card_connection .swiper-pagination"
    },
    navigation: {
        nextEl: ".swiper-card_connection .swiper-button-next",
        prevEl: ".swiper-card_connection .swiper-button-prev"
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

  // 記事で紹介した情報
  var swiper_card_introduction = new Swiper('.swiper-card_introduction .swiper-container', {
    slidesPerView: 1.3,
    centeredSlides : false,
    spaceBetween: 16,
    initialSlide: 0,
    pagination: {
        el: ".swiper-card_introduction .swiper-pagination"
    },
    navigation: {
        nextEl: ".swiper-card_introduction .swiper-button-next",
        prevEl: ".swiper-card_introduction .swiper-button-prev"
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

});