jQuery(document).ready(function () {

    jQuery('.navbar-toggler-icon .fa-bars').click(function() {
        jQuery(this).toggleClass('fa-times');
        jQuery('.navbar-collapse').toggle();
	});

	    // toggle footer nav
  if( jQuery(window).width() < 768 ) {
        // footer toggle
        jQuery(document).on('click', '.footer-nav h5', function () {
            jQuery(this).toggleClass('open');
            jQuery(this).next().toggle();
        });

        //section header container
        jQuery('section header').parent().parent().parent().css('padding','0');
    }

    jQuery('.navbar-collapse .fa-search').click(function() {
        jQuery(this).toggleClass('fa-times');
        jQuery('.navbar-nav').toggle();
        jQuery('.search .search-bar').toggle();
        jQuery('.search').toggleClass('open');

    });

});

jQuery(document).ready(function () {

  jQuery('.eoh-content-tabs .nav-tabs').slick({
      infinite: false,
      slidesToShow: 6,
      slidesToScroll: 1,
      variableWidth: false,
      arrows: false,
      responsive: [
          {
              breakpoint: 1200,
              settings: {
                  slidesToShow: 4,
                  variableWidth: false,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 1024,
              settings: {
                  slidesToShow: 3,
                  variableWidth: false,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 960,
              settings: {
                  slidesToShow: 3,
                  variableWidth: false,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 640,
              settings: {
                  slidesToShow: 3,
                  variableWidth: false,
                  slidesToScroll: 1
              }
          },
          {
              breakpoint: 480,
              settings: {
                  slidesToShow: 2,
                  variableWidth: false,
                  slidesToScroll: 1
              }
          }
      ]
	  
  });

    /* slick configs */
    jQuery('.partners .clients').slick({
        infinite: false,
        slidesToShow: 7,
        slidesToScroll: 2,
        variableWidth: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 7,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 5,
                    variableWidth: true,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 4,
                    variableWidth: true,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 3,
                    variableWidth: true,
                    slidesToScroll: 1
                }
            }
        ]
    });
	jQuery('.eoh-content-tabs .nav-tabs .nav-link.active').parent().addClass('eoh-tab-active');
    jQuery('.eoh-content-tabs .nav-tabs .nav-link').on('click', function(){
        jQuery(this).parent().siblings().removeClass('eoh-tab-active');
        jQuery(this).parent().addClass('eoh-tab-active');
    });

     jQuery('.eoh-at-glance .glance').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        variableWidth: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 960,
                settings: {
                    slidesToShow: 3,
                    variableWidth: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    variableWidth: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    variableWidth: false,
                    slidesToScroll: 1
                }
            }
        ]
    });



});
