<div class="contenu_acheter vendre">
    <div class="marq_page">
        <div  class="etap_current"><span class="etap">étape 1 - </span><span class="etap_title">Choix</span></div>
        <div><span class="etap">étape 2 - </span><span class="etap_title">Confirmation</span></div>
    </div>

 

    <div class="container_scroll grd_contenu_brown">
        <div class="container_fond">
            <div class="container_marg">
                <div class="ss_contenu content">


                    <h3 class="titr_02">Choisissez le nombre de chêne</h3>
                    <div class="info_cours">Pour plus de renseignement, consulter</div>
                    <div class="box_poids"><span class="title">Nombre</span><span class="ss_title">de chêne</span></div>
                    <div class="content_poids"><span class="btn_augmen_poi btn_incre"></span><input class="zone_choix" type="text" value="1"><span class="btn_diminu_poi btn_incre"></span></div>
                    <div class="box_prix"><span class="title">Montant : <span class="valeur_choix">150</span><span> €</span></span></div>

                    
                    <button type="button" class="btn_etap_suivant" id="louer_lightbox_2">Suivant</button> 
<button type="button" class="btn_fermer" id="home">Fermer</button> 

                    <!--end of ss_contenu_  content--></div>
                <!--end of grd_contenu container_marg--></div>
            <!--end of container_fond--></div>

        <div class="dragger_fond scroll-bar-wrap ui-widget-content">
            <div class="dragger_container"></div>        
        </div>
        <!--end of grd_contenu_brown container_scroll--></div>



    <!--end of contenu_acheter--></div>    


<script>
    $(document).ready(function() {
    
        //increment / decrement button
        $(".btn_incre").click(function() {
            var $button = $(this);
            var oldValue =  $("input.zone_choix").val();

            if ($button.hasClass("btn_augmen_poi")) {
                var newVal = parseFloat(oldValue) + 1;
                // AJAX save would go here
            } else {

                if (oldValue <= 1) {
                    var newVal = 0;
                    // AJAX save would go here
                }
          
                if (oldValue >1) {
                    var newVal = parseFloat(oldValue) - 1;
                    // AJAX save would go here
                }  
          
            }
            var cour = 150;
            var price = Math.round(newVal*cour);
            $(".valeur_choix").text(price);
            $("input.zone_choix").val(newVal);
        });
    
        //Remove class open
        $(".tool_nav .btn_li").removeClass("open");


      

        // ---------------------------------------------------------
        // ---------------------------------------------------------
        // NAVIGATION TEMPORAIRE
   
        $(".btn_etap_suivant").bind("click",function(){
            var dis = $(this);
            var page=dis.attr("id")+".php";

        
            $.ajax({
                url:"contenu/"+page,
                cache:false,
                success:function(data){
			
                    $("#zone").fadeOut(500,function(){
                        $("#zone").empty();
                        $("#zone").append(data);
                        $("#zone").fadeIn(function(){
                            if($(".acheter .container_scroll .content").height()>$(".acheter .container_scroll .container_marg").height()){
                                $(".acheter .dragger_container, .acheter .dragger,.acheter .dragger_fond").fadeIn();
		

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
        // Close lightbox
          $("#cache,.btn_fermer").bind("click",function(){
          closelight ();
            return false;
        });
    });

</script>