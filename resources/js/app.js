require('./bootstrap');

!(function($) {
  "use strict";

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 2;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();
        var scrollto = target.offset().top - scrolltoOffset;
        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }
  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
      $('.back-to-top').css('background-color','#ff4d00');
    }
    if($(window).scrollTop() + $(window).height() < $(document).height() - 100) {
      $('.back-to-top').css('background-color','#023f88');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });
  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 1000,
      once: true
    });
  }
  $(window).on('load', function() {
    aos_init();
  });

//Set height for div
var height =  $('.fixed-top').outerHeight();
$('.header_space').css('height',height+'px');

//set height of breadcrumb opacity div
var opacity_height =  $('.breadcrumbs').outerHeight();
$('.opacity-breadcrumbs').css('height',opacity_height+'px');

//height of about us opacity banner
$('.banner-opacity').height($('.about-us-banner').height());

/*//about us page js start old
//$( ".about-us-blocks div:first-child" ).css( "display", "inline" );
$( ".about-us-blocks div:first-child" ).removeAttr("style");

$(".about-us-nav li:first").addClass("active");
//$( ".about-us-blocks" ).first().css( "background-color", "red" );
jQuery('.block-filter').click(function(){
    jQuery('.block-filter').removeClass('active');
    jQuery(this).addClass('active');
    let type = jQuery(this).data('block_type');
    console.log('.block-type-'+type);
    jQuery('.block-type').hide();
    jQuery('.block-type-'+type).show();

});
//about us page js end old */

//about us page js start
//$( ".about-us-blocks div:first-child" ).css( "display", "inline" );
$( ".about-us-blocks div:first-child" ).removeAttr("style");

$(".about-list-group a:first").addClass("active");
jQuery('.block-filter').click(function(){
    jQuery('.block-filter').removeClass('active');
    jQuery(this).addClass('active');
    let type = jQuery(this).data('block_type');
    jQuery('.block-type').hide();
    jQuery('.block-type-'+type).show();
});

$(".open-testimonial-image").on("click", function (event) {
  var modalTitle = $(this).data('name');
  var imageSrc = $(this).data('url');
  $("#testimonialModalTitle").text(modalTitle);
  $('#testimonialModalImage').attr('src', imageSrc);
});
//about us page js end

//products page js start

// $(".product-list-group a:first").addClass("active");
// jQuery('.product-cat').click(function(){
//     jQuery('.product-cat').removeClass('active');
//     jQuery(this).addClass('active');
//     let type = jQuery(this).data('sc_cat');
//     //console.log('.product-cat-filter-'+type);
//     jQuery('.product-cat-filter').hide();
//     jQuery('.product-cat-filter-'+type).show();
// });
//tab is selected and redirect to the category
$('.product-list-group-item , .product-item').on('click', function(e) {
    // Save value in localstorage
    localStorage.setItem("activeTab", $(e.target).attr('href'));
    localStorage.setItem('productCatCD', $(e.target).attr('data-sc_cat'));
});
// get value of localstorage
var activeTab = localStorage.getItem('activeTab');
var productCatCD = localStorage.getItem('productCatCD');
//products page js end

window.onscroll = function() {
  myFunction();
  keyNavbar(); // for product page nav stick
};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

  $(document).ready(function () {
    $('.carousel').slick({
      slidesToShow: 1,
      dots: true,
      autoplay: true,
      autoplaySpeed: 5000,
      infinite: true,
      speed: 300,
    });
  });

//product page js
var productNav = $('.secondary-page-menu');
function keyNavbar() {
  if (window.pageYOffset > sticky) {
    productNav.addClass('sticky_keynav');
  } else {
    productNav.removeClass('sticky_keynav');
  }
}
})(jQuery);

//Home page
$('.round').click(function(e) {
    e.preventDefault();
    e.stopPropagation();
    $('.arrow').toggleClass('bounceAlpha');
});
