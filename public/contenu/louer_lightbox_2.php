<div class="contenu_acheter acheter">
    <div class="marq_page">
        <div><span class="etap">étape 1 - </span><span class="etap_title">Choix</span></div>
        <div  class="etap_current"><span class="etap">étape 2 - </span><span class="etap_title">Confirmation</span></div>
    </div>


    <div class="container_scroll grd_contenu_brown">
        <div class="container_fond">
            <div class="container_marg">
                <div class="ss_contenu content">

                    <h3 class="titr_02">Récapitulatif de la commande</h3>
                    <div class="recap_1">
                        <span class="intitul">Chêne</span>
                        <span class="intitul poids">2</span>
                        <span class="intitul type">Unité(s)</span>
                    </div>

                    <div class="recap_3">
                        <span class="intitul">TOTAL</span>
                        <span class="intitul montant">300,00</span>
                        <span class="intitul type">euro</span>
                    </div>

                    <span class="ss_info"></span>
                   <h3 class="titr_02 acha2">Choisissez votre moyen de paiement</h3>
<h4 class="titr_03 acha2">Par carte</h4><span class="info_paiment">Payez par Carte Bleue, VISA, American Express, Master Card</span>

	<div class="radio">
		<input type="radio" id="radio1" name="radio" /><label for="radio1"><img src="images/visa.jpg" alt=""/></label>
		<input type="radio" id="radio2" name="radio" /><label for="radio2"><img src="images/mastercard.jpg" alt=""/></label>
		<input type="radio" id="radio3" name="radio" /><label for="radio3"><img src="images/visa.jpg" alt=""/></label>
	</div>

<h4 class="titr_03 acha2">Paiement partenaire</h4><span class="info_paiment">Payez par PayPal</span>

	<div class="radio">
		<input type="radio" id="radio4" name="radio" /><label for="radio4"><img src="images/paypal.jpg" alt=""/></label>

	</div>

                    <button type="button" class="btn_etap_precedent" id="louer_lightbox">Précédent</button> 

                    <button type="button" class="btn_etap_suivant" id="louer_succes_lightbox">Valider</button> 
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
       //scrollpane parts
        var scrollPane = $('.acheter .container_marg');
        var scrollContent = $('.acheter .content');


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

        var scrollbar = $(".acheter .dragger_container").slider({
            orientation: "vertical",
            value: 100, // Sets the value to the top
            slide: slide_handler,
            change: slide_handler
        });
  
  
        scrollbar.find( ".ui-slider-handle" ).wrap( "<div class='ui-handle-helper-parent'></div>" ).parent(); 
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