$(document).ready(function(){

  var windowHeight = $(window).height();

    $(window).scroll(function(){
        console.log(windowHeight);

        var navbar = $("#main-nav"); 
        var scrollValue = $(this).scrollTop();
    
        let scaleValue = scrollValue / 800
        $("#landing-image").css("opacity", 1 - scaleValue);
        $("#landing-image").css("transform", "scale(" + (1 + scaleValue*0.12) + ")");

        console.log(scrollValue);
        if (scrollValue > 500) {
          navbar.removeClass("floating");
          navbar.addClass("sticky");
        } 
        else {
          navbar.removeClass("sticky");
          navbar.addClass("floating");
        }
        if((scrollValue >= windowHeight) && (scrollValue <= (windowHeight * 2)))
        {
          
          console.log("Entro al area de los perdidos");
            let recentLostCards = $(".recently-lost-card");
            for(i = 0; i < 5; i++)
            {
              $(recentLostCards[i]).css("opacity", 1);
            }
            /*
            recentLostCards.forEach(function(card){
              let increment = 0;
              setTimeout(function(){
                  setTimeout(function(){
                    increment++;
                  }, 60);
                card.css("opcity", increment/60);
              }, 1000);
            });*/
        }
    });
});