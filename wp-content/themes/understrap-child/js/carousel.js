jQuery(function ($) {
  $(document).ready(function () {
    console.log(2)
    
    $(".big-banner-carousel").owlCarousel({
      loop: false,
      nav: true,
      navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1,
        }
      },
    });
  });
});
