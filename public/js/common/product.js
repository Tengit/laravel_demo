$(function(){
  // 引き継ぎカテゴリーID
  var category = $('#category-id').val();
  var category_child = $('#category-child-id').val();
  var category_grandchild = $('#category-grandchild-id').val();
  // 選択タグの値
  var tag_vals;
  // ソート順の値
  var sort_num;

  // ソートクリック
  $(document).on('click','.sort-select', function(){
    $(this).toggleClass('on');
    $(this).find('ul').stop().slideToggle();
  });

  // ソート項目選択
  $(document).on('click','.sort-select ul li', function(){
    sort_num = $(this).data('sort');
    $('.sort-area .sort .sort-select p').text($(this).text());
    $('#sort-num').val(sort_num);
    $('.product-form').submit();
  });

  // タグチェック
  // $('input[name=checkbox01]').on('change', function(){
  //   tag_vals = $('input[name=checkbox01]:checked').map(function(){
  //     return $(this).val();
  //   }).get();
  //   $('#sort-tag').val(tag_vals);
  //   $('.product-form').submit();
  // });

  // sp 絞り込みクリック
  $(document).on('click','.sp-search-btn .modal-action', function(){
    $('.product-search').css('display', 'block');
    $('.modal-mask').css('display', 'block');
  });

  // 閉じるボタン
  $(document).on('click','.product-search .close-area .close', function(){
    $('.product-search').css('display', 'none');
    $('.modal-mask').css('display', 'none');
  });

  $('.clear').on('click', function() {
    $("input[name='checkbox01[]']").prop('checked', false);
  });

  // ロード時のサイドナビ状態
  $('.side-nav_category .nav-block').each(function(){
    var category_id = $(this).find('.nav-item p a').data('category');
    if (category_id == category) {
      $(this).addClass('open');
      $(this).find('.nav-item-toggle').addClass('on');
      $(this).find('.nav-item-toggle').parent().next('.category-block').css('display','block');
      $('.nav-block.open .nav-category').each(function(){
        var category_child_id = $(this).find('p a').data('category');
        if (category_child_id == category_child) {
          $(this).find('.nav-category-toggle').addClass('on');
          $(this).find('.nav-category-toggle').parent().next('.grandchild-block').css('display','block');
        }
      });
    }
  });

  //サムネイル
  var sliderThumbnail = new Swiper('.slider-thumbnail', {
    slidesPerView: 5.01,
    spaceBetween: 8,
  });

  //スライダー
  var slider = new Swiper('.slider', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: sliderThumbnail
    }
  });

  // 画像モーダル拡大
  if ($(".gallery").length) {
    $(".gallery").colorbox({
      fixed: true,
      rel:'slideshow',
      innerWidth:"90%",
      innerHeight:"50%",
      maxWidth:"960px",
      maxHeight:"720px",
      returnFocus: false,
      opacity: 0.7
    });
  }

  // 全選択
  $('#all').on('click', function() {
    $("input[name='chk[]']").prop('checked', this.checked);
  });

  // チェックボックス押下時の全選択の挙動
  $("input[name='chk[]']").on('click', function() {
    if ($('#boxes :checked').length == $('#boxes :input').length) {
      $('#all').prop('checked', true);
    } else {
      $('#all').prop('checked', false);
    }
  });

  // 同意ボタン
  $('.agree .checkbox-input').on('change', function(){
    if ($('.agree .checkbox-input:checked').length == 2 ) {
      $('.btn-confirm button').prop('disabled', false);
    } else {
      $('.btn-confirm button').prop('disabled', true);
    }
  });

  // オプション選択
  $('.option-area select').change(function() {
    $('.option-form').submit();
  });

  // 記事詳細　ボタン
  if ($('.wp-block-buttons').length) {
    $('.wp-block-button').each(function(){
      var btn_txt = $(this).text();
      $(this).find('a').html("<span>" + btn_txt + "</span>");
    });
  }
  // 記事詳細 大きいボタン
  if ($('.wp-block-button_large').length) {
    $('.wp-block-button_large').each(function(){
      var btn_txt = $(this).find('a').text();
      $(this).find('a').html("<span>" + btn_txt + "</span>");
      var btn_h = $(this).innerHeight();
      $("#stylesheet").html('.wp-block-button_large a:after{border-bottom: ' + btn_h + 'px solid #00AAD6;}');
    });
  }
});