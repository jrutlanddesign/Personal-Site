function transitionBox(t,l){function e(){var t;t=l.is(":last-child")?l.closest(".testimonial").children("div").first():l.next(),l.fadeIn(500,function(){setTimeout(function(){transitionBox(l,t)},7e3)})}t?t.fadeOut(500,e):e()}console.log("Hi curious people. Hope you like my site. follow me on twitter @jrutlanddesign"),$(".menu-icon").on("click",function(){$(".menu-icon").toggleClass("open"),$("#fullNav").toggleClass("showNav"),$("#main").toggleClass("shift")});var allBoxes=$("div.testimonial").children("div");transitionBox(null,allBoxes.first());var $target=$("[data-scroll-effect]"),scrollDataAttr="scroll-effect",scrollHiddenClass="scroll-effect-hidden",scrollVisibleClass="visible",animateClass="animated",scrollOffset=100;$target.each(function(){var t=$(this).data(scrollDataAttr);$(this).addClass(scrollHiddenClass).attr("aria-hidden",!0).viewportChecker({classToAdd:scrollVisibleClass+" "+animateClass+" "+t,offset:scrollOffset,callbackFunction:function(t){t.removeAttr("aria-hidden")}})}),$(function(){$('a[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html, body").animate({scrollTop:t.offset().top},1e3),!1}})});
