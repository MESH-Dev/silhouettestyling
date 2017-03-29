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
var s = skrollr.init({
	easing:'swing',
	edgeStrategy:'ease',
});
}

//Nav wayfinder

$('.main-navigation ul li a').click(function(){
	$('.main-navigation ul li').removeClass('clicked')
	$(this).parent().addClass('clicked');
});

$('.sidr ul.menu li a').click(function(){
	$('.sidr ul li').removeClass('clicked')
	$(this).parent().addClass('clicked');
});

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

$('.service-container ul.service-items > li').hover(function(){
	$('.service-container ul.service-items > li').removeClass('active');
	$(this).addClass('active');
});

$clk_cnt = 0;
$('.service-container ul.service-items li .read-more-mobile').click(function(){
	// $(this).find('.read-more-mobile').click(function(){
	// 	//$(this).parent().find('.services-nav').slideDown(200);
	// 	$(this).parent().find('services-nav').addClass('working');
	// });
	//$(this).addClass('working');

	$clk_cnt++
	if($clk_cnt == 1){
		console.log($clk_cnt);
		$(this).parent().parent().find('.services-nav').slideDown(200);
	}else{
		$(this).parent().parent().find('.services-nav').slideUp(200);
		$clk_cnt = 0;
	}

	
});

$('.logo img').hover(function(){
		$('.nav-bg').slideDown('slow');
	
});

//Set a variable to use to check for clicks to false
//This is the default state
$clicked = false;
//When we click on a nav link, set the value of the $clicked to true
$('.menu a').click(function(){
	$clicked = true;
	console.log($clicked);
});

//As long as $clicked is false, show/hide (slideUp/slideDown) the div housing our nav links
//based on whether we are scrolling up, or scrolling down. Scrolling down hides, scrolling up shows.
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
			$('.nav-wrap:not(.nav-404)').css({
				'position':'fixed'
			});

			if (st > lastScrollTop ){
			   // downscroll code
			   // Here, we are resetting the $clicked value to false, so that successive scrolling 
			   // provides our show/hide functionality
			   $('.nav-bg:not(.sidr-open)').stop().slideUp(50);
			   $clicked = false;
			} else {
			  // upscroll code
			  // Hijacking the normal functionality to test if $clicked is equal to true, or
			  // whether a nav item has been clicked 			 
				if($clicked != true){
					$('.nav-bg:not(.sidr-open)').slideDown(50);
				}
			}
		}else{
			$('.nav-wrap:not(.nav-404)').css({
				"position":'absolute'
			});
			$('.nav-bg:not(.sidr-open)').stop().slideUp(0);
		}	
       lastScrollTop = st;
    });
});

//Sidr funcitonality
$('.sidr-trigger').sidr({
      name: 'sidr-main',
      source: '.sidr-nav',
      renaming: false,
      side: 'left',
      displace: false,
      onOpen:function(){
      	$('.nav-bg').addClass('sidr-open').slideUp(0);
      	$('.sidr ul.menu li a').click(function(){
			$('.sidr ul li').removeClass('clicked')
			$(this).parent().addClass('clicked');
			//$('.nav-bg').stop().slideUp(0);


		})
      }
  });

 $('.sidr-close').click(
    function(){
      $.sidr('close', 'sidr-main');
      $('.nav-bg').removeClass('sidr-open');
       //console.log("Sidr should be closed");
    });


//---------------------------------------------

});
