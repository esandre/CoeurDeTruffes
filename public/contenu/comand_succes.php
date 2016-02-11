<div class="contenu_acheter">
    <div class="marq_page">
        <div class=""><span class="etap">étape 1 - </span><span class="etap_title">Commande &AMP; livraison</span></div>
        <div><span class="etap_current">étape 2 - </span><span class="etap_title">Paiement &AMP; confirmation</span></div>
    </div>
    <div class="grd_contenu_acheter">
        <div class="ss_contenu_acheter">
            
            <h3 class="titr_02">Récapitulatif</h3>

            <div class="box_recap_command">
            <h4 class="titr_03">La commande</h4>
            
            <span class="intitul">Truffes</span><span class="comand_poi">350</span><span class="comand_typ">grammes</span><br> 
            <span class="bar"></span><br> 
            <span class="montan">Montant</span><span class="pri_montan">2190,00</span><span class="comand_typ">euro</span><br>
            <span class="espace"></span><br> 
            <span class="intitul_livrai">Livraison</span><br>
            <span class="choi_livrai">Normal</span><span class="pri_livrai">8,99</span><span class="comand_typ">euro</span><br> 
            <span class="bar"></span><br>
            <span class="total">Total</span><span class="pri_total">2198,99</span><span class="comand_typ">euro</span><br> 
            </div>
             <div class="box_adress_livre">
            <h4 class="titr_03">Adresse de livraison</h4>
            
            <span class="prenom">Lorette</span><span class="nom">Lorette</span><br> 
            <span class="rue">Complément 1</span><br> 
            <span class="complemt_1">Appartement n°2</span><br> 
            <span class="code_postal">33000</span><span class="ville">Bordeaux</span><br> 
            <span class="pays">France</span>
            <span class="btn_modif_adress">Modifier l’adresse de livraison</span>

            
            </div>  
            
            <h3 class="titr_02">Paiement</h3>
            <h4 class="titr_03">Par carte</h4><span class="btn_modif_adress">Payer par Carte Bleue, VISA, American Express, Master Card</span>
            <img src="" alt="" class="img_paiement"/>
            <img src="" alt="" class="img_paiement"/>
            <img src="" alt="" class="img_paiement"/>
            <img src="" alt="" class="img_paiement"/>
            <h4 class="titr_03">Paiement partenaire</h4><span class="btn_modif_adress">Payer par PayPal</span>
            <img src="" alt="" class="img_paiement"/>
            
            
            <button type="button" class="btn_etap_precedent" id="acheter">Précédent</button> 
            <button type="button" class="btn_etap_suivant" id="comand_succes">Suivant</button> 
            
            
         <!--end of ss_contenu_acheter--></div>

        <!--end of grd_contenu_acheter--></div>



    <!--end of contenu_acheter--></div>

<script>
$(document).ready(function() {
    $(".btn_etap_suivant, .btn_etap_precedent").bind("click",function(){
        var dis = $(this);
        var page=dis.attr("id")+".php";

        
        $.get("contenu/"+page, function(data){
        $("#contenu").fadeOut(500,function(){
            $("#contenu").empty();
            $("#contenu").append(data);
            $("#contenu").fadeIn();
        });
    }); 

        
    });	
});

</script>