<div class="contenu_inscription">
    <div class="marq_page">
        <div><span class="etap">étape 1 - </span><span class="etap_title">Inscription</span></div>
        <div class="etap_current"><span class="etap etap_current">étape 2 - </span><span class="etap_title">Validation</span></div>
    </div>
    <div class="container_scroll grd_contenu_brown">
      <div class="container_fond">
        <div class="container_marg">
        <div class="ss_contenu_validation content">
     
            <p>Votre inscription est valide pendant <span class="temps_restant">10 jours</span><br>
                au delà desquels elle sera annullée.</p>
            <p>Pour valider votre inscription vous devez :</p>
                      <div class="left"> 
            <span class="btn_valid_inscription" id="acheter">ACHETER <br>des truffes</span> <span class="ss_btn_valid">Vous pouvez ACHETER
                des Truffes dans «<strong>Acheter</strong>»
                ou dans «<strong>Manager</strong>».</span>
                <!--end of left--></div>
            <span class="separation_btn">ou</span>
          <div class="right">    
            <span class="btn_valid_inscription" id="louer_chene">LOUER <br>un chêne truffier</span><span class="ss_btn_valid">Vous pouvez LOUER
                un chêne truffier dans «<strong>Manager</strong>».</span>
<!--end of right--></div>
            <button type="button" class="btn_etap_precedent" id="inscription_1">Précédent</button> 
            <button type="button" class="btn_etap_valid" id="home">Valider plus tard</button> 


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
	
 
  //scrollpane parts
  var scrollPane = $('.container_marg');
  var scrollContent = $('.content');


  //build slider
  var slide_handler = function(e, ui) {
 console.log(scrollContent.height()+'et'+scrollPane.height());
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
	
    $(".btn_etap_suivant, .btn_etap_valid, .btn_valid_inscription,.btn_etap_precedent").bind("click",function(){
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