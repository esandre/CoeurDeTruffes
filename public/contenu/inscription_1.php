<div class="contenu_inscription">
    <div class="marq_page">
        <div class="etap_current"><span class="etap">étape 1 - </span><span class="etap_title">Inscription</span></div>
        <div><span class="etap">étape 2 - </span><span class="etap_title">Validation</span></div>
    </div>
    <div class="container_scroll grd_contenu_brown">
      <div class="container_fond">
        <div class="container_marg">
        <div class="ss_contenu_inscription content">
            <h3 class="titr_02">Informations personnelles</h3>
            <span class="txt_intitul">Civilité *</span><input type="radio" name="civ" value="Mme"><span>Mme</span><input type="radio" name="civ" value="Mme"><span>Mlle</span><input type="radio" name="civ" value="Mme"><span>Mr</span><br>
            <span class="txt_intitul">Nom *</span><input type="text"><br>
            <span class="txt_intitul">Prénom *</span><input type="text"><br>
            <span class="txt_intitul">Date de naissance</span>
            <select name="jour">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
            </select>
            <select name="mois">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
            </select>            
            <select name="annee">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
            </select>     <br>      
            <span class="txt_intitul">Adresse e-mail *</span><input type="text"><br>
            <span class="txt_intitul">Numéro de portable</span><input type="text">  <br> 

            <h4 class="titr_03">Adresse de livraison</h4>
            <span class="txt_intitul">Adresse *</span><input type="text"><br>
            <span class="txt_intitul">Complément 1</span><input type="text">  <br> 
            <span class="txt_intitul">Complément 2</span><input type="text">  <br> 
            <span class="txt_intitul">Code postal *</span><input type="text"><br>
            <span class="txt_intitul">Ville *</span><input type="text"><br>
            <span class="txt_intitul">Pays *</span><input type="radio" name="civ" value="Mme"><span>France Métropolitaine</span><input type="radio" name="civ" value="Mme"><span>Autres</span><br>
           
            <h4 class="titr_03">Adresse de Facturation</h4>
            <span class="txt_intitul">Adresse *</span><input type="text"><br>
            <span class="txt_intitul">Complément 1</span><input type="text">  <br> 
            <span class="txt_intitul">Complément 2</span><input type="text">  <br> 
            <span class="txt_intitul">Code postal *</span><input type="text"><br>
            <span class="txt_intitul">Ville *</span><input type="text"><br>
            <span class="txt_intitul">Pays *</span><input type="radio" name="civ" value="Mme"><span>France Métropolitaine</span><input type="radio" name="civ" value="Mme"><span>Autres</span><br>
           


            <h3 class="titr_02 suiv">Mot de passe</h3>
            <p class="form_info">Saisissez au moins <strong>8 caractères</strong>, sans espace, comportant au moins un chiffre et une lettre.</p>
            <span class="txt_intitul">Mot de passe *</span><input type="text">  <br> 
            <span class="txt_intitul">Confirmer mot de passe *</span><input type="text">  <br>
            <p class="form_condition">Avant de vous inscrire sachez que coeurdetruffe.fr s'engage à ne divulguer en aucun cas vos informations personnelles
à des tiers sans votre accord préalable, et ce par quelque moyen et sur quelque support que ce soit.<br>
<a href="#" target="_blank">Consulter notre politique de confidentialité.</a></p>
            <input type="radio" name="acceptation" value="accept"><span>J'accepte sans réserve les conditions générales de vente du site coeurdetruffe.fr *</span><br>
             <span class="txt_info">* Champ obligatoire</span>
            <p class="form_condition">Conformément à la loi « informatique et libertés » du 6 janvier 1978 modifiée en 2004, vous bénéficiez d’un droit
d’accès et de rectification aux informations qui vous concernent, que vous pouvez exercer en vous adressant à
<a href="#" target="_blank">modifications@coeurdetruffes.fr</a>
Vous pouvez également, pour des motifs légitimes, vous opposer au traitement des données vous concernant.</p>
            <button type="button" class="btn_etap_suivant" id="inscription_2">Suivant</button> 
            
            
         <!--end of ss_contenu_inscription  content--></div>
        <!--end of container_marg--></div>
       <!--end of container_fond--></div>
       
      <div class="dragger_fond scroll-bar-wrap ui-widget-content">
   <div class="dragger_container"></div>        
          </div>
    <!--end of container_scroll--></div>



    <!--end of contenu_inscription--></div>

<script>
$(document).ready(function() {
    //Remove class open
	$(".tool_nav .btn_li").removeClass("open");

  //scrollpane parts
  var scrollPane = $('.container_marg');
  var scrollContent = $('.content');


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

  var scrollbar = $(".dragger_container").slider({
    orientation: "vertical",
    value: 100, // Sets the value to the top
    slide: slide_handler,
	change: slide_handler
  });
  
  
	scrollbar.find( ".ui-slider-handle" ).wrap( "<div class='ui-handle-helper-parent'></div>" ).parent(); 
   
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