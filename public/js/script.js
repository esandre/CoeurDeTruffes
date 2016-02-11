

$(document).ready(function() {
	
	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // 
    // )))=====>>>   NAVIGATION 
    // 
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    $(".main_nav li a ").click(function(){
        $("#contenu").append('<div class="loader"></div>'); // On ajoute le loader en haut ou en bas à voir ...
        page=$(this).attr("href");
        $.ajax({
            url: "contenu/"+page,
            cache:false,
            success:function(html){
                afficher(html);
            },
            error:function(XMLHttpRequest,textStatus, errorThrown){
                afficher("erreur lors du chagement de la page");
            }
        })
				
        return false;
    });
	
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // NAVIGATION TEMPORAIRE
    
    $(".tool_nav .btn_li a,.tool_nav .btn_li button").not(".btn_a").click("",function(){
        var dis = $(this);
        var page=dis.attr("id")+".php";

        
        $.ajax({
		url:"contenu/"+page,
		cache:false,
		success:function(data){
			
        $("#contenu").fadeOut(500,function(){
            $("#contenu").empty();
            $("#contenu").append(data);
            $("#contenu").fadeIn(function(){
                $(".dragger_container, .dragger").fadeIn();
            	});
       		 });
    		},
          error:function(XMLHttpRequest,textStatus, errorThrown){
                afficher("erreur lors du chagement de la page");
            }
        })
				
        return false;
    });
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // NAVIGATION TEMPORAIRE  --- footer
    
	
	    $(".foot_nav li a ").click(function(){
        $("#contenu").append('<div class="loader"></div>'); // On ajoute le loader en haut ou en bas à voir ...
        page=$(this).attr("href");
        $.ajax({
            url: "contenu/"+page,
            cache:false,
            success:function(html){
                afficher(html);
            },
            error:function(XMLHttpRequest,textStatus, errorThrown){
                afficher("erreur lors du chagement de la page");
            }
        })
				
        return false;
    });
	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // 
    // )))=====>>>   STOCKAGE DES VARIABLES
    // 
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||

	



	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // 
    // )))=====>>>   RESET
    // 
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||

    $(window).bind("resize",function(){
		
        });
	
	
	
	
	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // 
    // )))=====>>>   HOVER FUNCTION
    // 
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||
	
	

    $(".main_nav, .logo_cdt").hover(function(){
        var bodyw = $("body").width();

        $(".bar_nav").stop(true).animate({
            "width":bodyw
        });
	
    },
	
    function(){

        $(".bar_nav").stop(true,true).delay(200).animate({
            "height":60
        },"slow",function(){
            $(".bar_nav").animate({
                "width":0
            });
        });
    });

    $(".main_nav").hover(
	
        function(){
            $(".indic_menu").stop(true,true).fadeIn();
        },
	
        function(){
		
            $(".indic_menu").stop(true,true).fadeOut();

        });
    $(".main_nav li").has("ul").hover(
	
        function(){
      
            $(".bar_nav").animate({
                "height":100
            }, {
                queue: false
            });
            $("ul",this).fadeIn();
        },
	
        function(){

            $("ul",this).fadeOut(50);
            $(".bar_nav").animate({
                "height":60
            });
        });

    $(".main_nav li a").not(".main_nav li ul li a").hover(
	
        function(){
            if(!$(this)==0){
                var dis = $(this);
                var disW = dis.width();
                var posL = dis.offset().left;
	
                $(".indic_menu").stop(true,true).delay(200).animate({
                    "left":posL,
                    "width":disW
                }).dequeue();

            }
        },
	
        function(){
        });
        
  

    $(".tool_nav .btn_li a.btn_a").bind('click',function(){
		
		
		var par = $(this).parent();
		if(par.hasClass("open")){
			
			par.removeClass("open");
		}
		else{
			$(".tool_nav li.btn_li").removeClass("open");
			par.addClass("open");
		}	
	return false;
        });
		

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 
// )))=====>>>   SLIDE SHOW BOUTON 
// 
// ---------------------------------------------------------
// ---------------------------------------------------------
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||


	
		








});



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// ---------------------------------------------------------
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// 
// )))=====>>>   FUNCTION D'AFFICHAGE DU CONTENU
// 
// ---------------------------------------------------------
// ---------------------------------------------------------
// |||||||||||||||||||||||||||||||||||||||||||||||||||||||||


function afficher(data){
    $(".loader").remove(); // On supprime le loader
    $("#contenu").fadeOut(500,function(){
        $("#contenu").empty();
        $("#contenu").append(data);
        $("#contenu").fadeIn(1000,function(){
			
		
            if($(".container_scroll .content").height()>$(".container_scroll .container_marg").height()){
                $(".dragger_container, .dragger, .dragger_fond").fadeIn();
            }
		

            var totalpic = $(".encyclo_slideshow img").length;
		

            $(".num_this_pic").append("<span>1</span>");

            $(".num_total_pic").append("<span>"+totalpic+"</span>");
            $(".comand_slide_show").fadeIn("fast");
		
		
        });
        $(".encyclo_slideshow img:first").show();
		
        comandSlideShow();			
			
    })
}


function openlight (){
    if(!$("#zone")[0]){
	$("body").append("<div id=\"zone\"></div>");
        $("body").append("<div id=\"cache\"></div>");
        }
        $("#cache").fadeIn();
        $("#zone").fadeIn();
    }
function closelight (){
	$("#zone").empty();
        $("#cache").empty();
	$("#zone").fadeOut();
        $("#cache").fadeOut();
    }


function comandSlideShow (){
	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // /////////////////////////////////////////////////////////
    $(".comand_slide_show .btn_next").click(function () {
        // /////////////////////////////////////////////////////////
        // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||		



		
//        var imgindex = $(".encyclo_slideshow img:visible").index();
        var $image_suivante = $(".encyclo_slideshow img:visible").next("img");
        var isuiv = $image_suivante.index();
		
        if($image_suivante.is(":visible") == false){	
		
            if($image_suivante.length<1){
				
                var isuiv = $(".encyclo_slideshow img:first").index();
                $image_suivante = $(".encyclo_slideshow img:first");

            }
		
		
			
            var numthispic = (isuiv+1);
				
            $(".num_this_pic span").remove();
            $(".num_this_pic").append("<span>"+numthispic+"</span>");	
            $(".encyclo_slideshow img:visible").fadeOut("fast");
            $image_suivante.fadeIn("fast");
			
        }
		
        return false;
    });
	
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // /////////////////////////////////////////////////////////
    $(".btn_prev").click(function() {
        // /////////////////////////////////////////////////////////
        // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||		
		
//        var imgindex = $(".encyclo_slideshow img:visible").index();
        var $image_precedente = $(".encyclo_slideshow img:visible").prev("img");
        var iprev = $image_precedente.index();
		
        if($image_precedente.is(":visible") == false){
			
            if($image_precedente.length<1) {
				
                var iprev = $(".encyclo_slideshow img:last").index();
                $image_precedente = $(".encyclo_slideshow img:last");

            }
			
            var numthispic = (iprev+1);
            $(".num_this_pic span").remove();
            $(".num_this_pic").append("<span>"+numthispic+"</span>");	
            $(".encyclo_slideshow img:visible").fadeOut("fast");
            $image_precedente.fadeIn("fast");
        }
        return false;
	
    });
	
	
	
}
















