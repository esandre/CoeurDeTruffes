<div class="contenu_acheter livraison">
    <div class="marq_page">
        <div  class="etap_current"><span class="etap">étape 1 - </span><span class="etap_title">Choix</span></div>
        <div><span class="etap">étape 2 - </span><span class="etap_title">CONFIRMATION &AMP; PAIEMENT</span></div>
    </div>



    <div class="container_scroll grd_contenu_brown">
        <div class="container_fond">
            <div class="container_marg">
                <div class="ss_contenu content">


                    <h3 class="titr_02">FAITES VOTRE CHOIX</h3>
                    <div class="info_cours"><span>Prix du kilogramme de la truffe sur le marché : </span><span class="cour_de_truf">730</span><span> €</span></div>
                    <div class="box_poids"><span class="title">Poids</span><span class="ss_title">gramme</span></div>
                    <div class="content_poids"><span class="btn_augmen_poi btn_incre"></span><input class="zone_choix" type="text" value="0"><span class="btn_diminu_poi btn_incre"></span></div>
                    <div class="box_prix"><span class="title">Valeur : <span class="valeur_choix">0</span><span> €</span></span></div>
                    
                    
                    
<h3 class="titr_02" style="padding-top: 60px;"">Livraison</h3>
                    <ul class="main_info">
                        <li class="info_1"><h4 class="titr_03">Adresse de livraison</h4></li>
                        <li class="line_info">
                            <span class="intitul_1 nom prenom">Lorette Ipsum</span>
                            <span class="intitul_1">12 rue de la truffière</span>
                            <span class="intitul_1">33000</span><span class="intitul_1">Bordeaux</span>
                            <span class="intitul_1">FRANCE Métropolitaine</span>
                        </li>
                        <li>                <a href="#" class="modif_nom" id="modif_adress_livraison">Modifier l'adresse de livraison</a> 
                        </li>
                    </ul> 

                    <ul class="main_info">
                        <li class="info_1"><h4 class="titr_03">Adresse de facturation</h4></li>
                        <li class="line_info">
                            <span class="intitul_1 nom">Lorette Ipsum</span>
                            <span class="intitul_1">12 rue de la truffière</span>
                            <span class="intitul_1">33000</span><span class="intitul_1">Bordeaux</span>
                            <span class="intitul_1">FRANCE Métropolitaine</span>
                        </li>
                        <li>                <a href="#" class="modif_nom" id="modif_adress_facture">Modifier l'adresse de facturation</a>                                        
                        </li>
                    </ul> 



                    <h4 class="titr_03">Choisissez le mode de livraison</h4>
                        <input class="livrai" type="radio" name="livraison" value="lent" checked="checked" />
                   <span class="mode_livrai mode_1">Normal - 3 à 4 jours ouvrés - 8,99 €</span>
                    <input class="livrai" type="radio" name="livraison" value="rapide" /><span class="mode_livrai mode_2">Express - 1 à 2 jours ouvrés - 14,99 €</span>                    


                    <button type="button" class="btn_etap_suivant" id="livraison_lightbox_2">Suivant</button> 
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


        //scrollpane parts
        var scrollPane = $('.livraison .container_marg');
        var scrollContent = $('.livraison .content');


        //build slider
        var slide_handler = function(e, ui) {
            if (scrollContent.height() > scrollPane.height()) {
                scrollContent.css('margin-top', Math.round(((100 - ui.value) / 100) * (scrollPane.height() - scrollContent.height())) + 'px');
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

        var scrollbar = $(".livraison .dragger_container").slider({
            orientation: "vertical",
            value: 100, // Sets the value to the top
            slide: slide_handler,
            change: slide_handler
        });
  
  
        scrollbar.find( " .ui-slider-handle" ).wrap( "<div class='ui-handle-helper-parent'></div>" ).parent(); 

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
                            if($(".livraison .container_scroll .content").height()>$(".vendre .container_scroll .container_marg").height()){
                                $(".livraison .dragger_container, .livraison .dragger, .livraison .dragger_fond").fadeIn();
		

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