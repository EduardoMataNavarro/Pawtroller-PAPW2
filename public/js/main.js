$(document).ready(function(){

  var windowHeight = $(window).height();

    $(window).scroll(function(){
        console.log(windowHeight);

        var navbar = $("#main-nav"); 
        var scrollValue = $(this).scrollTop();
    
        let scaleValue = scrollValue / windowHeight;
        $(".landing-image").css("opacity", 1 - scaleValue);
        $(".landing-image").css("transform", "scale(" + (1 + scaleValue*0.25) + ")");

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
    $("#change-avatar-btn").click(function () {
      $("#in-avatar-img").trigger("click");
    });
    $("#change-banner-btn").click(function () {
        $("#in-banner-img").trigger("click");
    });
    $("#in-banner-img").on("change", function (e) {
        let reader = new FileReader();
        let file = e.target.files[0];
        let formdata = new FormData();

        formdata.append("type", "banner");
        formdata.append("photo", file);

        $.ajax({
          type: 'POST',
          url: '/uploadphoto',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: formdata,
          processData: false,
          contentType: false,
          success: function(data){
            console.log(data.imgpath);
            $("#user-banner-img").attr("src", data.imgpath);
          },
          error: function(error){
            console.log(error);
          }
        });
    });
    $("#in-avatar-img").on("change", function(e){
        let reader = new FileReader();
        let file = e.target.files[0];
        let formdata = new FormData();

        formdata.append("type", "avatar");
        formdata.append("photo", file);

        $.ajax({
          type: 'POST',
          url: '/uploadphoto',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: formdata,
          processData: false,
          contentType: false,
          success: function(data){
            console.log(data.imgpath);
            $("#user-avatar-img").attr("src", data.imgpath);
          },
          error: function(error){
            console.log(error);
          }
        });
    });

    $(".rate").click(function(){
      let type;
      let textContainer;
      let pstId = $(this).attr("_pst-id");

      if ($(this).hasClass("goodRate")) {
        type = 1;
      }
      if($(this).hasClass("badRate")){
        type = 0;
      }
      
      $.ajax({
        type: 'POST',
        url: '/ratepost',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'id_publicacion' : pstId,
          'tipo' : type,
        },
        success: function(data){
          $("#goodRatings").text(data.goodRatings);
          $("#badRatings").text(data.badRatings)
        },
        error: function (data) {
          console.log(data);
        }
      });
    });


    $(".add-pet-content").click(function(){
      $("#input-pet-media").attr("class", "");

      if($(this).hasClass("add-photo"))
      {
        $("#input-pet-media").addClass("addphoto");
        $("#input-pet-media").attr("accept", "image/*");
      }

      if($(this).hasClass("add-video"))
      {
        $("#input-pet-media").addClass("addvideo");
        $("#input-pet-media").attr("accept", "video/*");
      }

      $("#input-pet-media").trigger("click");
    });

    $("#input-pet-media").on("change", function(e){
      
        let reader = new FileReader();
        let file = e.target.files[0];
        let formdata = new FormData();

        let petId = $(this).attr("_msct-id");

        if($(this).hasClass("addphoto"))
        {
          formdata.append("type", "photo");
          formdata.append("media", file);
        }

        if($(this).hasClass("addvideo"))
        {
          formdata.append("type", "video");
          formdata.append("media", file);
        }

        formdata.append("id_mascota", petId);
        $.ajax({
          type: 'POST',
          url: '/uploadpetmedia',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: formdata,
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          success: function(data){
            console.log(data.element);
            
            if($("#input-pet-media").hasClass("addvideo"))
            {
              console.log("AppendVideo");
              $("#pet-video-container").append(data.element);  
            }

            if($("#input-pet-media").hasClass("addphoto"))
            {
              console.log("AppendPhoto");
              $("#pet-photo-container").append(data.element);  
            }        
          },
          error: function(error){
            console.log(error);
          }
        });
    });
    
    $(".edit-post-btn").click(function(){
      var idPost = $(this).attr("_pst-id");

      $.ajax({
        url: '/post/info/' + idPost,
        method: 'GET',
        success: function(data){
          $("#edit-post-id").val(data.postContent.id_publicacion);
          $("#edit-post-title").val(data.postContent.titulo);
          $("#edit-post-texto").val(data.postContent.texto);

          console.log(Object.keys(data.cats).length);
          //<option value="0">-Seleccione una categoria-</option>
          let frstOpt = new Option("-Seleccione una categoria-", 0);
            $("#edit-post-categoria").append(frstOpt);

          for(let i = 0; i < Object.keys(data.cats).length; i++){
            let newOpt = new Option(data.cats[i].descripcion, data.cats[i].id_categoria);
            $("#edit-post-categoria").append(newOpt);
          }
          $("#edit-post-categoria").val(data.postContent.id_categoria);
          console.log(data);
          $("#edit-post-dialog").modal();
        },
        error: function(data){
          console.log(data);
        }
      });
    });
    
    $("#btn-report-encontrado").click(function(){

      let petId = $(this).attr("_msct-id");

      $.ajax({
        type: 'post',
        url: '/changepetstatus',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
          'id_mascota' : petId,
          'status' : 1
        },
        success: function(data) {
          $("#pet-status-container").text(data.status);

          $("#paw-status-icon").addClass("text-success");
        },
        error: function(data) {
          console.log(data);
        }
      });
    });
    /*
    $(".comment-rate").click(function(){
      var cmntId = $(this).attr("_cmnt-id");
      var tipo;

      if($(this).hasClass("comment-good-rate"))
        tipo = 1;
      if($(this).hasClass("comment-bad-rate"))
        tipo = 0;

        $.ajax({
          type: 'POST',
          url: '/ratecomment',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            'id_comentario' : cmntId,
            'tipo' : tipo,
          },
          success: function(data){
            $("#" + cmntId + "-badrate").text(data.goodRatings);
            $("#" + cmntId + "-goodrate").text(data.badRatings);
          },
          error: function (data) {
            console.log(data);
          }
        });
    });*/
});