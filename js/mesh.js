jQuery(document).ready(function($){

  //Are we loaded?
  console.log('New theme loaded!');

  //Let's do something awesome!

 //stellar parallax - call it, Dood
   // $(window).stellar({
   // 	horizontalScrolling: false,
   // });

var s = skrollr.init();

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



});
