<div class="confirm_box">

        <div class="ss_confirm_box">
            
            <span class="info_1">Votre commande a été réalisée avec succés !</span>
            <span class="info_2">Vous allez recevoir un mail de confirmation.</span>
            <button type="button" class="btn_fermer" id="home">Fermer</button> 
            


        <!--end of ss_confirm_box--></div>

    <!--end of confirm_box--></div>

<script>
$(document).ready(function() {
    // ---------------------------------------------------------
    // ---------------------------------------------------------
    // NAVIGATION TEMPORAIRE
   
      $(".btn_fermer").bind("click",function(){
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
            if($(".container_scroll .content").height()>$(".container_scroll .container_marg").height()){
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
	
	
	
	
	});

</script>