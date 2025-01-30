/*
Template Name: Sosial - Social Network Mobile Template
Author: Pillarix
Author URI: https://wrapbootstrap.com/user/pillarix
Version: 0.1
*/

/*
- Listing Slider
- Status slider
- Photo slider
- Friend slider
- Online friend slider
*/

(function ($){
    "use strict"; // Start of use strict

    // Listing Slider
    $(window).on('load', function() {
    $('.listing-slider').slick({
        arrows:false,
        autoplay:true,
      });
      $('.listing-slider').fadeIn();
    });

    // status slider
    $(window).on('load', function() {
    $('.status-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows:false,
        infinite:false,
      });
      $('.status-slider').fadeIn();
    });

    // photo slider
    $(window).on('load', function() {
    $('.photo-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows:false,
      infinite:false,
      });
      $('.photo-slider').fadeIn();
    });

    // friend slider
    $(window).on('load', function() {
    $('.friend-slider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows:false,
        infinite:false,
      });
      $('.friend-slider').fadeIn();
    });

    // online friend slider
    $(window).on('load', function() {
    $('.online-friend-slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows:false,
      infinite:false,
      });
      $('.online-friend-slider').fadeIn();
    });

})(jQuery);