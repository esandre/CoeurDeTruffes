<div class="contenu_acheter vendre">
    <div class="marq_page">
        <div><span class="etap">étape 1 - </span><span class="etap_title">Choix</span></div>
        <div  class="etap_current"><span class="etap">étape 2 - </span><span class="etap_title">Confirmation</span></div>
    </div>


    <div class="container_scroll grd_contenu_brown">
        <div class="container_fond">
            <div class="container_marg">
                <div class="ss_contenu content">


                    <h3 class="titr_02">Confirmer votre choix</h3>
                    <div class="info_cours_2">Vous avez choisi de mettre en vente :</div>
                    <div class="recap_choix">
                        <span class="intitul poids">1100</span><span class="intitul"> grammes de truffes d'une valeur de </span><span class="intitul choix_valeur">2190,00</span><span class="intitul"> euros</span>
                    </div>
                    <span class="ss_info">Une fois la vente terminée, la valeur sera reversée sur votre compte PayPal, ou
vous recevrez un chèque.</span>
                   

                    <button type="button" class="btn_etap_precedent" id="vendre_lightbox">Précédent</button> 

                    <button type="button" class="btn_etap_suivant" id="vente_succes_lightbox">Valider</button> 
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
        
        //Style des boutons radios
        $( ".radio" ).buttonset();

        //Remove class open
        $(".tool_nav .btn_li").removeClass("open");


        // ---------------------------------------------------------
        // ---------------------------------------------------------
        // NAVIGATION TEMPORAIRE
   
        $(".btn_etap_suivant, .btn_etap_precedent").bind("click",function(){
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