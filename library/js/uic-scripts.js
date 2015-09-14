jQuery(function($){ 
// Slick Carousel for Blog on Front Page
$(document).ready(function(){
	$('.blog-post').slick({
	  dots: true,
	  infinite: false,
	  speed: 300,
	  slidesToShow: 3,
	  touchMove: false,
	  slidesToScroll: 1,
	  arrows: true,
	  autoplay: false,
	  dots: false,
	  responsive: [
	    {
	      breakpoint: 1025,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 641,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        arrows: false
	      }
	    }
	  ]
	});
});

// Slick Post Slider
/*
$(document).ready(function(){
	$('.slider-for').slick({
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    arrows: false,
	    fade: true,
	    asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	    slidesToShow: 3,
	    slidesToScroll: 1,
	    asNavFor: '.slider-for',
	    dots: true,
	    centerMode: true,
	    focusOnSelect: true,
	    autoplay: true,
		autoplaySpeed: 2000,
		arrows: false
	});
});
*/

// Custom Services Dropdown
	function DropDown(el) {
		this.dd = el;
		this.initEvents();
	}
	DropDown.prototype = {
		initEvents : function() {
			var obj = this;

			obj.dd.on('click', function(event){
				$(this).toggleClass('active');
				event.stopPropagation();
			});	
		}
	}

	$(function() {

		var dd = new DropDown( $('#dd') );

		$(document).click(function() {
			// all dropdowns
			$('.wrapper-dropdown-5').removeClass('active');
		});

	});
	
// Isotope (Standard)
/*
	// initialize Isotope
	var container = $('.isotope-container');
	container.isotope({
	  // options
	  itemSelector: '.isotope-item',
	  layoutMode: 'masonry'
	});
	
	// filter items on button click
	$('#filters').on( 'click', 'button', function() {
	  var selector = $(this).attr('data-filter');
	  container.isotope({ filter: selector });
	});
		
	// layout Isotope again after all images have loaded
	container.imagesLoaded( function() {
	  container.isotope('layout');
	});
*/
	
// Isotope (with Infinite Scroll)
  $(function(){
    
    var container = $('.isotope-container');
    
    container.imagesLoaded(function(){
      container.isotope({
        itemSelector: '.isotope-item',
        layoutMode: 'masonry'
      });
    });
    
    // filter items on button click
	$('#filters').on( 'click', 'button', function() {
	  var selector = $(this).attr('data-filter');
	  container.isotope({ filter: selector });
	});
    
    container.infinitescroll({
      navSelector  : '.pagination',    // selector for the paged navigation 
      nextSelector : '.next-post a',  // selector for the NEXT link (to page 2)
      itemSelector : '.isotope-item',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          msgText: "loading new posts",
          img: 'http://uic.slamagency.com/wp-content/uploads/2014/10/uic-loading.gif'
        }
      },
      // trigger Masonry as a callback
      function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they're ready
          $newElems.animate({ opacity: 1 });
          container.isotope( 'appended', $newElems, true ); 
        });
      }
    );
    
  });

// Back to Top Scroll Button
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});

});