jQuery(document).ready(function ($) {
  if ($(".showcase-carousel").length) {
    jQuery(".showcase-carousel").owlCarousel({
      loop: true,
      margin: 20,
      autoplay: true,
      autoplayTimeout: 10000,
      dots: false,
      nav: false,
      navText: [
        /*"<i class='fa fa-angle-left'></i>",*/
        "<i class=''><</i>",
        "<i class=''>></i>",
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
    });
  }
});

jQuery(document).ready(function ($) {
  $(window).on("load", function () {
    $(".ubermenu-responsive-toggle-main").html(
      '<label for="check"><input type="checkbox" id="check"/><span></span><span></span><span></span></label>'
    );
  });
  $(".search-btn").click(function () {
    $(".main-header .search-bar input").focus();
  });
});

jQuery(".profile-dropdown a").click(function (e) {
  if (jQuery(document).width() > 768) {
    e.preventDefault();
    var url = jQuery(this).attr("href");
    if (url !== "#") {
      window.location.href = url;
    }
  }
});

jQuery(document).ready(function ($) {
  $(".slider").slick({
    dots: false,
    infinite: true,
    speed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    centerMode: true,
    centerPadding: 0,
    autoplaySpeed: 4000,
    arrows: false,
    responsive: [
      {
        breakpoint: 960,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 400,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

jQuery(window).on("load", function () {
  console.log("first");
  jQuery(".slick-current").prev().addClass("transform-125");
  jQuery(".slick-current").next().addClass("transform-125");
  setInterval(() => {
    jQuery(".transform-125").removeClass("transform-125");
    jQuery(".slick-current").prev().addClass("transform-125");
    jQuery(".slick-current").next().addClass("transform-125");
    console.log("hit");
  }, 3000);
});
