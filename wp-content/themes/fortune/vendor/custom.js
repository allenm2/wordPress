/**
    * @package Fortune Theme
	
    1. Main Navigation
    2. Magnific Popup
    3. Carousel (based on owl carousel plugin)
    4. Content Slider (based on owl carousel plugin)
    5. FitVid (responsive video)
    6. Sticky Header
*/

;(function($){
  "use strict";


$(window).load(function() {
$('#slider').nivoSlider({
effect: 'random',
slices: 15,
boxCols: 8,
boxRows: 4,
animSpeed: 500,
pauseTime: 3000,
startSlide: 0,
directionNav: true,
controlNav: false,
controlNavThumbs: false,
pauseOnHover: true,
manualAdvance: false,
prevText: 'Prev',
nextText: 'Next',
randomStart: false,
});
});



  /* ----------------------------------------------------------- */
  /*  1. Main Navigation
  /* ----------------------------------------------------------- */


  // Menu drop down effect
  $('.dropdown-toggle').dropdownHover().dropdown();
  $(document).on('click', '.fhmm .dropdown-menu', function(e) {
      e.stopPropagation()
  });

  $('.navbar-toggle').on('click', function () {
    $('.navbar-collapse').collapse('toggle');
  });


  
  /* ----------------------------------------------------------- */
  /*  3. Magnific Popup
  /* ----------------------------------------------------------- */
  $('.popup-link').magnificPopup({
      type:'image',
      // Delay in milliseconds before popup is removed
      removalDelay: 300,

      gallery:{
          enabled:true
      },

      // Class that is added to popup wrapper and background
      // make it unique to apply your CSS animations just to this exact popup
      mainClass: 'mfp-fade'
  });


  /* ----------------------------------------------------------- */
  /*  5. Carousel (based on owl carousel plugin)
  /* ----------------------------------------------------------- */
  var owl = $("#owl-carousel");

  owl.owlCarousel({
      items : 4, //4 items above 1000px browser width
      itemsDesktop : [1000,4], //4 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // 4 items betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0;
      itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
      pagination : false,
      scrollPerPage: false
  });

  // Custom Navigation Events
  $("#carousel-next").click(function(){
      owl.trigger('owl.next');
  });
  $("#carousel-prev").click(function(){
      owl.trigger('owl.prev');
  });


  // carousel with 3 elements
  (function($) {
      var owl = $(".owl-carousel-3");

      owl.owlCarousel({
          items : 3, //3 items above 1000px browser width
          itemsDesktop : [1000,2], //4 items between 1000px and 901px
          itemsDesktopSmall : [900,2], // 4 items betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0;
          itemsMobile : [480,1], // itemsMobile disabled - inherit from itemsTablet option
          pagination : false
      });

      // Custom Navigation Events
      $("#carousel-next-alt").click(function(){
          owl.trigger('owl.next');
      });
      $("#carousel-prev-alt").click(function(){
          owl.trigger('owl.prev');
  });
  })(jQuery);



  /* ----------------------------------------------------------- */
  /*  6. Content Slider (based on owl carousel plugin)
  /* ----------------------------------------------------------- */
  $(".owl-slider").owlCarousel({

      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
      pagination: true,
      autoPlay : false
      
  });



  /* ----------------------------------------------------------- */
  /*  7. FitVid (responsive video)
  /* ----------------------------------------------------------- */
  $(".video-holder, .audio-holder").fitVids();


  /* ----------------------------------------------------------- */
  /*  -- Misc
  /* ----------------------------------------------------------- */

  $('.title-accent > h3').each(function(){
      var me = $(this);
      me.html(me.html().replace(/^(\w+)/, '<span>$1</span>'));
  });

  // Back to Top
  $("#back-top").hide();
  
  if($(window).width() > 991) {
      $('body').append('<div id="back-top"><a href="#top"><i class="fa fa-chevron-up"></i></a></div>')
      $(window).scroll(function () {
          if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
          } else {
              $('#back-top').fadeOut();
          }
      });

      // scroll body to 0px on click
      $('#back-top a').click(function(e) {
          e.preventDefault();
          $('body,html').animate({
              scrollTop: 0
          }, 400);
          return false;
      });
  };

  // Animation on scroll
  var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
  if (isMobile == false) {
      
      $("[data-animation]").each(function() {

      var $this = $(this);

      $this.addClass("animation");

      if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {

          $this.appear(function() {

              var delay = ($this.attr("data-animation-delay") ? $this.attr("data-animation-delay") : 1);

              if(delay > 1) $this.css("animation-delay", delay + "ms");
              $this.addClass($this.attr("data-animation"));

              setTimeout(function() {
                  $this.addClass("animation-visible");
              }, delay);

          }, {accX: 0, accY: -170});

      } else {

          $this.addClass("animation-visible");

      }

  });  
  }


  /* ----------------------------------------------------------- */
  /*  8. Sticky Header
  /* ----------------------------------------------------------- */

  // Set options
  var headerSticky = $('header.header');
  // Check for sticky header
  if ( ( headerSticky.hasClass('header-default') || headerSticky.hasClass('header-transparent') || headerSticky.hasClass('menu-colored') || headerSticky.hasClass('menu-pills') ) && header.is_sticky==1 ) {
    var options = {

      offset: 400, // OR — offset: '.classToActivateAt',

      // Callbacks
      onInit: function() {
        // Menu drop down effect
        $('.dropdown-toggle').dropdownHover().dropdown();
        $(document).on('click', '.fhmm .dropdown-menu', function(e) {
            e.stopPropagation()
        });
      },

      throttle: 200,

      onStick: function() {},
      onUnstick: function() {},
      onDestroy: function() {},

    };
    // Create a new instance of Headhesive
    var headhesive = new Headhesive('header.header', options);
  }

  /* ----------------------------------------------------------- */
  /*  13. Header Transparent
  /* ----------------------------------------------------------- */
  if($('.header').hasClass('header-transparent') || $('.header').hasClass('header-fixed')) {
    $(window).scroll(function() {    
      var scroll = $(window).scrollTop();

      if (scroll >= 400) {
          $(".header:not(.headhesive)").addClass("hidden");
      } else {
          $(".header:not(.headhesive)").removeClass("hidden");
      }
    });
  };

})(jQuery);
  
  
  
  
  
  
  
  