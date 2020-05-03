$(document).ready(function ($) {
    wow = new WOW(
      {
          animateClass: 'animated',
          offset: 100,
          callback: function (box) {
              console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
          }
      }
    );
    wow.init();

    /*Back to top*/
    $('.back-to-top').html("<span>Top</span>");
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});
