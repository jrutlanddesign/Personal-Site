$(".menuToggle").click(function(){
    $(".navItems").toggleClass("open");
});

$("span.close").click(function(){
    $(".navItems").removeClass("open");
});
