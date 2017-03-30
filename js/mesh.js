jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

// Controls/instantiates scrollr for image element parallax
// Sniff for window size to avoid issues with devices under 768px
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

//Smooth page scroll + page scroll location control
$(function() {
$('a[href*=#]:not([href=#])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  if (target.length) {
    $('html,body').animate({
      //'top-75' is custom.  limits the offset to top of window plus 75px
      scrollTop: (target.offset().top-75)
    }, 800);
    return false;
  }
}
});
});

// Add active class when hovering over service descriptions on > mobile devices
// Class controls show/hide for service info and other styling
$('.service-container ul.service-items > li').hover(function(){
	$('.service-container ul.service-items > li').removeClass('active');
	$(this).addClass('active');
});

//Show/hide functionality for the service info on mobile devices
$clk_cnt = 0;
$('.service-container ul.service-items li .read-more-mobile').click(function(){

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
var $clicked;
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
			   console.log($clicked);
			} else {
			  // upscroll code
			  // Hijacking the normal functionality to test if $clicked is equal to true, or
			  // whether a nav item has been clicked (in that case we want to force a slide up)	

				if($clicked != true){
					$('.nav-bg:not(.sidr-open)').slideDown(50);
				}else{
					 $('.nav-bg:not(.sidr-open)').slideUp(0);
					//event.stopPropagation();
				}
			}
		}else{
			// If we are scrolling through the home(top) panel, reset the css for the nav to absolute
			// Note that we are avoiding the nav on the 404 page by including :not(.nav-404)
			$('.nav-wrap:not(.nav-404)').css({
				"position":'absolute'
			});
			//Force the nav to slide up if the sidr menu is open
			$('.nav-bg:not(.sidr-open)').stop().slideUp(0);
		}	
       lastScrollTop = st;
       //$clicked = false;
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
      	// Force the nav-bg element to slide up, add a class when sidr is opened
      	$('.nav-bg').addClass('sidr-open').slideUp(0);
      	// Add you-are-here styling to the links in the sidr nav when clicked, 
      	// remove the class from any previously clicked link
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
    });

 $('.sidr a').click(
    function(event){
      $.sidr('close', 'sidr-main');
      $('.nav-bg').removeClass('sidr-open');
       $('.nav-bg:not(.sidr-open)').slideUp(0);
      //event.stopPropagation();
	});
$('.sidr a').click(function(){
			$clicked = true;
			console.log($clicked);
		});

//---------------------------------------------

});
