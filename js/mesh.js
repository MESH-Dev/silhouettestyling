jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

 //stellar parallax - call it, Dood
   // $(window).stellar({
   // 	horizontalScrolling: false,
   // });

var wWidth = $(window).width();

if(wWidth > 768){
var s = skrollr.init();
}

   //Smooth page scroll
  $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          //'top-50' is custom.  limits the offset to top of window plus 50px
          scrollTop: (target.offset().top)
        }, 800);
        return false;
      }
    }
  });
});

$('.service-container ul li').hover(function(){
	$('.service-container ul li').removeClass('active');
	$(this).addClass('active');
});

$('.logo img').hover(function(){
	// setTimeout(function(){
		$('.nav-bg').slideDown('slow');
	// },500);
	
// },function(){
// 	setTimeout(function(){
// 		$('.nav-bg').slideUp('slow');
// 	},1500);
	
});

// $(window).scroll(function(event) {
		    
// 		    // height of the document (total height)
// 		    var d = $(document).height();
		    
// 		    // height of the window (visible page)
// 		    var w = $(window).height();
		    
// 		    // scroll level
// 		    var s = $(this).scrollTop();
		    
// 		    // bottom bound - or the width of your 'big footer'
// 		    var bottomBound = 0; 

// 		    var page_top = $('.fullwidth').offset().top;
// 		    var fullwidth_top = $('.fullwidth').scrollTop();
// 		    var window_top = $(window).scrollTop();

// 		    console.log('Fullwidth offset '+page_top);
// 		    console.log('Fullwidth scrollTop'+fullwidth_top);
// 		    console.log('Window scrolltop ' + window_top);

// 		    // are we beneath the bottom bound?
// 		    if(window_top > page_top-50) {
// 		        // if yes, start scrolling our own way, which is the
// 		        // bottom bound minus where we are in the page
// 		        //$('.nav-wrap').addClass('fixed');
// 		        $('.nav-wrap').slideDown(100);
// 		    } else {
// 		        // if we're beneath the bottom bound, then anchor ourselves
// 		        // to the bottom of the page in traditional footer style
// 		        //$('.nav-wrap').removeClass('fixed');  
// 		        $('.nav-wrap').slideUp(100);         
// 		    }
// 		});

$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){

       var st = $(this).scrollTop();
       var page_top = $('.fullwidth').offset().top;
	    var fullwidth_top = $('.fullwidth').scrollTop();
	    var window_top = $(window).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
		if(window_top > page_top-50) {
			$('.nav-wrap').css({
				'position':'fixed'
			});

			if (st > lastScrollTop ){
			   // downscroll code
			   //console.log('scroll down');
			   //console.log(lastScrollTop + " " + st);
			   $('.nav-bg').stop().slideUp(50);
			} else {
			  // upscroll code
			  //console.log('scroll up');
			  $('.nav-bg').slideDown(50);
			}
		}else{
			$('.nav-wrap').css({
				"position":'absolute'
			});
			$('.nav-bg').stop().slideUp(0);
		}	
       lastScrollTop = st;
    });
});


});
