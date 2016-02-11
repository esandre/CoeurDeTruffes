<div class="contenu_acheter vendre">
    <div class="marq_page">
        <div  class="etap_current"><span class="etap">étape 1 - </span><span class="etap_title">Choix</span></div>
        <div><span class="etap">étape 2 - </span><span class="etap_title">Confirmation</span></div>
    </div>

 

    <div class="container_scroll grd_contenu_brown">
        <div class="container_fond">
            <div class="container_marg">
                <div class="ss_contenu content">


                    <h3 class="titr_02">VOTRE MISE EN VENTE</h3>
                    <div class="info_cours"><span>Prix du kilogramme de la truffe sur le marché : </span><span class="cour_de_truf">730</span><span> €</span></div>
                    <div class="box_poids"><span class="title">Poids</span><span class="ss_title">gramme</span></div>
                    <div class="content_poids"><span class="btn_augmen_poi btn_incre"></span><input class="zone_choix" type="text" value="0"><span class="btn_diminu_poi btn_incre"></span></div>
                    <div class="box_prix"><span class="title">Montant : <span class="valeur_choix">0</span><span> €</span></span></div>

                    
                    <button type="button" class="btn_etap_suivant" id="vendre_lightbox_2">Suivant</button> 
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
                var newVal = parseFloat(oldValue) + 100;
                // AJAX save would go here
            } else {

                if (oldValue <= 100) {
                    var newVal = 0;
                    // AJAX save would go here
                }
          
                if (oldValue >100) {
                    var newVal = parseFloat(oldValue) - 100;
                    // AJAX save would go here
                }  
          
            }
            var cour = $(".cour_de_truf").text();
            var price = Math.round(newVal/1000*cour);
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
                        $("#zone").fadeIn();
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