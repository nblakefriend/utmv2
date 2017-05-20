$(function(){
 var shrinkHeader = 50;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('#site-logo').attr("src", "images/cognitive-dissonance_logo_no_words.png");
           $('header').addClass('smaller');
           $('.logo').addClass('smaller');
           $('section.body').addClass('smaller');
        }
        else {
            $('#site-logo').attr("src", "images/cognitive-dissonance_logo.png");
            $('header').removeClass('smaller');
            $('.logo').removeClass('smaller');
            $('section.body').removeClass('smaller');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset || document.documentElement.scrollTop;
    }
});
