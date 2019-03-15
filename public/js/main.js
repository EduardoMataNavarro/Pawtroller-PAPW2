$(document).ready(function(){
    $(window).scroll(function(){
        var navbar = $("#main-nav"); 
        var scrollValue = $(this).scrollTop();
        console.log(scrollValue);
        if (scrollValue > 200) {
            navbar.removeClass("floating");
            navbar.addClass("sticky");
          } else {
            navbar.removeClass("sticky");
            navbar.addClass("floating");
          }
    });
});