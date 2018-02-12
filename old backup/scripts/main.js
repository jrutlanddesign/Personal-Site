console.log('Hi curious people. Hope you like my site. follow me on twitter @jrutlanddesign');

// nav button toggle
$('.menu-icon').on('click', function () {
    $('.menu-icon').toggleClass('open'),
    $('#fullNav').toggleClass('showNav'),
    $('#main').toggleClass('shift');
});


//testimonials fade in out
var allBoxes = $("div.testimonial").children("div");
transitionBox(null, allBoxes.first());

function transitionBox(from, to) {
    function next() {
        var nextTo;
        if (to.is(":last-child")) {
            nextTo = to.closest(".testimonial").children("div").first();
        } else {
            nextTo = to.next();
        }
        to.fadeIn(500, function () {
            setTimeout(function () {
                transitionBox(to, nextTo);
            }, 7000);
        });
    }

    if (from) {
        from.fadeOut(500, next);
    } else {
        next();
    }
}

// https://github.com/dirkgroenen/jQuery-viewport-checker
// https://daneden.github.io/animate.css/
var $target = $("[data-scroll-effect]"),
        scrollDataAttr = "scroll-effect",
        scrollHiddenClass = "scroll-effect-hidden",
        scrollVisibleClass = "visible",
        animateClass = "animated",
        scrollOffset = 100;

        $target.each(function(){
            var effect = $(this).data(scrollDataAttr);
            $(this)
                .addClass(scrollHiddenClass)
                .attr("aria-hidden",true)
                .viewportChecker({
                    classToAdd: scrollVisibleClass+" "+animateClass+" "+effect,
                    offset: scrollOffset,
                    callbackFunction: function(elem, action){
                        elem.removeAttr("aria-hidden")
                    }
                });
        });



// smooth scroll
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
