(function ($) {
    "use strict"; var $slimScrolls = $('.slimscroll'); var $wrapper = $('.main-wrapper'); if ($(window).width() <= 991) {
        var Sidemenu = function () { this.$menuItem = $('.main-nav a'); }; function init() {
            var $this = Sidemenu; $('.main-nav a').on('click', function (e) {
                if ($(this).parent().hasClass('has-submenu')) { e.preventDefault(); }
                if (!$(this).hasClass('submenu')) { $('ul', $(this).parents('ul:first')).slideUp(350); $('a', $(this).parents('ul:first')).removeClass('submenu'); $(this).next('ul').slideDown(350); $(this).addClass('submenu'); } else if ($(this).hasClass('submenu')) { $(this).removeClass('submenu'); $(this).next('ul').slideUp(350); }
            });
        }
        init();
    }
    $('body').append('<div class="sidebar-overlay"></div>'); $(document).on('click', '#mobile_btn', function () { $('main-wrapper').toggleClass('slide-nav'); $('.sidebar-overlay').toggleClass('opened'); $('html').addClass('menu-opened'); return false; }); $(document).on('click', '.sidebar-overlay', function () { $('html').removeClass('menu-opened'); $(this).removeClass('opened'); $('main-wrapper').removeClass('slide-nav'); }); $(document).on('click', '#menu_close', function () { $('html').removeClass('menu-opened'); $('.sidebar-overlay').removeClass('opened'); $('main-wrapper').removeClass('slide-nav'); }); if ($('.select').length > 0) { $('.select').select2({ minimumResultsForSearch: -1, width: '100%' }); }
    if ($('.category-select').length > 0) { $(".category-select").select2({ placeholder: "Choose Category", allowClear: false }); }
    if ($('.loc-select').length > 0) { $(".loc-select").select2({ placeholder: "Choose Location", allowClear: false }); }
    if ($('.region select').length > 0) { $(".region select").select2({ placeholder: "Region", allowClear: false }); }
    if ($('.main-wrapper .aos').length > 0) { AOS.init({ duration: 1200, once: true }); }
    if ($('.datetimepicker').length > 0) { $('.datetimepicker').datetimepicker({ format: 'DD-MM-YYYY', icons: { up: "fas fa-angle-up", down: "fas fa-angle-down", next: 'fas fa-angle-right', previous: 'fas fa-angle-left' } }); }
    if ($('.timepicker').length > 0) { $('.timepicker').datetimepicker({ format: "hh:mm:ss", icons: { up: "fa fa-angle-up", down: "fa fa-angle-down", next: 'fa fa-angle-right', previous: 'fa fa-angle-left' } }); }
    $('.price-down').on('click', function () { $('html, body').animate({ scrollTop: $("#price").offset().top - 85 }, 150); }); if ($(window).width() > 767) { if ($('.theiaStickySidebar').length > 0) { $('.theiaStickySidebar').theiaStickySidebar({ additionalMarginTop: 30 }); } }
    if ($('.input-range').length > 0) { $(".input-range").ionRangeSlider({ type: "single", grid: true, min: 0, max: 100, from: 50, to: 100 }); }
    $('.input-range').on('input', function () { $('.demo span').html(this.value); }); $(".btn.filterbtn").on('click', function () { $(".showfilter").toggleClass("filter-open"); }); $('.toggle-password').on('click', function () { $(this).toggleClass("feather-eye"); var input = $(".pass-input"); if (input.attr("type") === "password") { input.attr("type", "text"); } else { input.attr("type", "password"); } }); $('.toggle-password-two').on('click', function () { $(this).toggleClass("feather-eye"); var input = $(".pass-input-two"); if (input.attr("type") === "password") { input.attr("type", "text"); } else { input.attr("type", "password"); } }); if ($('.popular-cartype-slider').length > 0) { $('.popular-cartype-slider').owlCarousel({ loop: true, margin: 24, nav: true, dots: false, autoplay: true, smartSpeed: 2000, navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"], responsive: { 0: { items: 1 }, 550: { items: 1 }, 700: { items: 3 }, 1000: { items: 4 }, 1200: { items: 5 } } }) }
    if ($('.rental-deal-slider').length > 0) { $('.rental-deal-slider').owlCarousel({ loop: true, margin: 24, nav: true, dots: false, autoplay: true, smartSpeed: 2000, navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"], responsive: { 0: { items: 1 }, 550: { items: 1 }, 700: { items: 2 }, 1000: { items: 3 } } }) }
    if ($('.about-testimonials').length > 0) { $('.about-testimonials').owlCarousel({ loop: true, margin: 24, nav: false, dots: true, navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], responsive: { 0: { items: 1 }, 550: { items: 1 }, 700: { items: 2 }, 1000: { items: 2 } } }) }
    if ($('.detail-bigimg').length > 0) { $('.detail-bigimg').slick({ slidesToShow: 1, slidesToScroll: 1, arrows: true, fade: true, asNavFor: '.slider-nav-thumbnails' }); }
    if ($('.slider-nav-thumbnails').length > 0) { $('.slider-nav-thumbnails').slick({ slidesToShow: 4, slidesToScroll: 1, asNavFor: '.detail-bigimg', dots: false, arrows: false, centerMode: false, focusOnSelect: true }); }
    if ($('.car-details-slider').length > 0) { $('.car-details-slider').owlCarousel({ items: 4, margin: 24, nav: true, dots: false, rtl: false, navText: ["<i class='fa-solid fa-arrow-left'></i>", "<i class='fa-solid fa-arrow-right'></i>"], responsiveClass: true, responsive: { 0: { items: 1 }, 768: { items: 2 }, 1170: { items: 3, loop: true }, 1200: { items: 3, loop: true } } }); }
    $('.fav-icon').on('click', function () { $(this).toggleClass('selected'); }); if ($('.customer-count .counterUp').length > 0) { $('.customer-count .counterUp, h4 span').counterUp({ delay: 15, time: 1500 }); }
})(jQuery);