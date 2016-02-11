	<div class="manag_menu">
    
        <a href="#" id="manager"><div class="btn_menu_manag btn_acc_manag">
        	<img class="btn_manag_fleche" src="images/btn_manag_fleche.png" alt="">
            <img class="btn_chene_blanc" src="images/btn_acc_manag_blanc.png" alt="">
            <img class="btn_chene_noir" src="images/btn_acc_manag_noir.png" alt="">
            <span class="btn_titre_top">Accueil</span>
            <span class="btn_titre">Manager</span>
          <div class="box_noir"></div>
            <div class="box_blanc"></div>

        <!--end of btn_acc_manag --></div></a>
    
         <a href="#" id="manager_chene"><div class="btn_menu_manag btn_chene">
        	<img class="btn_manag_fleche" src="images/btn_manag_fleche.png" alt="">
            <img class="btn_chene_blanc" src="images/btn_chene_blanc.png" alt="">
            <img class="btn_chene_noir" src="images/btn_chene_noir.png" alt="">
            <span class="btn_titre btn_titre_only">Chêne</span>
           <div class="box_noir"></div>
            <div class="box_blanc"></div>
            
        <!--end of btn_chene --></div></a>
    
        <a href="#" id="manager_truffe"> <div class="btn_menu_manag btn_truffe">
        	<img class="btn_manag_fleche" src="images/btn_manag_fleche.png" alt="">
            <img class="btn_chene_blanc" src="images/btn_truffe_blanc.png" alt="">
            <img class="btn_chene_noir" src="images/btn_truffe_noir.png" alt="">
            <span class="btn_titre btn_titre_only">Truffe</span>
          <div class="box_noir"></div>
            <div class="box_blanc"></div>
            
        <!--end of btn_truffe --></div></a>
    
         <a href="#" id="manager_paiement"><div class="btn_menu_manag btn_paiement">
        	<img class="btn_manag_fleche" src="images/btn_manag_fleche.png" alt="">
            <img class="btn_chene_blanc" src="images/btn_paiment_blanc.png" alt="">
            <img class="btn_chene_noir" src="images/btn_paiment_noir.png" alt="">
            <span class="btn_titre btn_titre_only">Paiement</span>
           <div class="box_noir"></div>
            <div class="box_blanc"></div>
            
        <!--end of btn_paiement --></div></a>
    
         <a href="#" id="manager_parametre"><div class="btn_menu_manag btn_parametre">
        	<img class="btn_manag_fleche" src="images/btn_manag_fleche.png" alt="">
            <img class="btn_chene_blanc" src="images/btn_parametre_blanc.png" alt="">
            <img class="btn_chene_noir" src="images/btn_parametre_noir.png" alt="">
            <span class="btn_titre btn_titre_only">Paramètre</span>
           <div class="box_noir"></div>
            <div class="box_blanc"></div>
            
        <!--end of btn_parametre --></div></a>
    

    	
	<!--end of manag_menu --></div>
<script>
$(document).ready(function() {
	
	$(".zone_truffe .line_info:last, .zone_chene .line_info:last").css({"border-bottom-color":"#FFF"});
	
        

// ---------------------------------------------------------
// ---------------------------------------------------------
// NAVIGATION Scroll

    
        $(".encyclo_slideshow img:first").show();
        var totalpic = $(".encyclo_slideshow img").length;


        $(".num_this_pic").append("<span>1</span>");

        $(".num_total_pic").append("<span>"+totalpic+"</span>");
        $(".comand_slide_show").fadeIn("fast");
	
        comandSlideShow();




  //scrollpane parts
  var scrollPane = $('.manag_content_2marg');
  var scrollContent = $('.content');


  //build slider
  var slide_handler = function(e, ui) {
    if (scrollContent.height() > scrollPane.height()) {
        var mo = Math.round(((100 - ui.value) / 100) * (scrollPane.height() - scrollContent.height()));
      scrollContent.css('margin-top', mo + 'px');
    
      var mmo = -1*mo;
      
      
        if($(".part_1")[0]){
            var Hpart1 =  $(".part_1").position();
            var HP1 = Hpart1.top+395;    
    }
        if($(".part_2")[0]){
            var part2 =$(".part_2");
            var Hpart2 =  part2.position();
            var HP2 = Hpart2.top+395;
    }
        if($(".part_3")[0]){
            var Hpart3 =  $(".part_3").position();
            var HP3 = Hpart3.top+395;
    }
        if($(".part_4")[0]){
            var Hpart4 =  $(".part_4").position();
            var HP4 = Hpart4.top+395;  
    }

    if($(".part_5")[0]){
            var Hpart5 =  $(".part_5").position();
            var HP5 = Hpart5.top+395;     
    }    

	if(mmo<HP1){
            	$(".ss_nav_manag a").removeClass("active")
		$(".ss_nav_manag a:eq(0)").addClass("active");
        }
	if(mmo>HP1 && mmo<HP2){
            	$(".ss_nav_manag a").removeClass("active")
		$(".ss_nav_manag a:eq(1)").addClass("active");
        }      
	if(mmo>HP2 && mmo<HP3){
            	$(".ss_nav_manag a").removeClass("active")
		$(".ss_nav_manag a:eq(2)").addClass("active");
        }     
	if(mmo>HP3 && mmo<HP4){
            	$(".ss_nav_manag a").removeClass("active")
		$(".ss_nav_manag a:eq(3)").addClass("active");
        }
	if(mmo>HP4 && mmo<HP5){
            	$(".ss_nav_manag a").removeClass("active")
		$(".ss_nav_manag a:eq(4)").addClass("active");
        }
    }
    else {
      scrollContent.css('margin-top', 0);
    }
  };
  


scrollPane.mousewheel(function(event, delta) {
  var value = scrollbar.slider('option', 'value');

  if (delta > 0) { value += 10; }
  else if (delta < 0) { value -= 10; }

  // Ensure that its limited between 0 and 100
  value = Math.max(0, Math.min(100, value));
  scrollbar.slider('option', 'value', value);
  event.preventDefault();
}); 

  var scrollbar = $(".dragger_container").slider({
    orientation: "vertical",
    value: 100, // Sets the value to the top
    slide: slide_handler,
	change: slide_handler
  });
  
  
	scrollbar.find( ".ui-slider-handle" ).wrap( "<div class='ui-handle-helper-parent'></div>" ).parent(); 
	
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // NAVIGATION sous menu manager
		
	
	$(".ss_nav_manag a").bind("click",function(){
        var dis = $(this);
		var eq = dis.index()+1;
		var Hc = $(".manag_content_2 .content").height();
		var part = ".part_"+eq;
		var Hpart = $(part).position();
		var HP = Hpart.top;
		$(".ss_nav_manag a").removeClass("active")
		dis.addClass("active");
		
		var x = Math.round(((HP*100)/(scrollPane.height() - scrollContent.height()))+100);
		
	    scrollbar.slider('option', 'value', x);
		return false;
	});
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // NAVIGATION TEMPORAIRE
   
      $(".manag_menu a").bind("click",function(){
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
            if($(".global_container_2 .content").height()>$(".manag_content_2marg").height()){
                $(".dragger_container, .dragger, .dragger_fond").fadeIn();
		

            }
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
        // NAVIGATION TEMPORAIRE lightbox
        
        // LightBox
    $(".btn_etap_action,.manag_option a").bind("click",function(){
        openlight();
    });      
        
        
   
        $(".btn_etap_action,.manag_option a").bind("click",function(){
            var dis = $(this);
            var page=dis.attr("id")+".php";

        
            $.ajax({
                url:"contenu/"+page,
                cache:false,
                success:function(data){

                        $("#zone").append(data);
 if($(".acheter .container_scroll .content").height()>$(".acheter .container_scroll .container_marg").height()){
     
                                $(".acheter .dragger_container,.acheter .dragger, .acheter .dragger_fond").fadeIn();}
                
  if($(".livraison .container_scroll .content").height()>$(".livraison .container_scroll .container_marg").height()){
     
                                $(".livraison .dragger_container,.livraison .dragger, .livraison .dragger_fond").fadeIn();}
                            
                            
  if($(".vendre .container_scroll .content").height()>$(".vendre .container_scroll .container_marg").height()){
     
                                $(".vendre .dragger_container,.vendre .dragger, .vendre .dragger_fond").fadeIn();}               
                               
                
                },
                
                
                
                
                
                error:function(XMLHttpRequest,textStatus, errorThrown){
                    afficher("erreur lors du chagement de la page");
                }
            });
				
            return false;
        });
        
 
    
    
    
 });
 
 


   </script>     

