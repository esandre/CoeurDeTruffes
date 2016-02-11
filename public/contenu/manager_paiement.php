

<div class="global_container_2">
  <nav class="ss_nav_manag"> <a href="#" class="active">Location</a> <a href="#">Carte cadeau</a> </nav>
  
  
  
  
  <div class="manag_content_2">
    <div class="manag_content_2marg">
    <div class="content">
    
      <div class="part_1">
        <h3 class="manag_title_2">Location</h3>

        <div class="box_main_3">
            <h4 class="manag_title_3">Vos dernières locations de chêne</h4>  
            
<table id="tab_location" width="510" height="115" border="0" cellpadding="0" cellspacing="0">
	<tr class="tab_title">
		<td>N° de commande</td>
		<td>Date de début</td>
		<td>Date de fin</td>
		<td>Durée</td>
		<td>état</td>
	</tr>
	<tr>
		<td>654213987</td>
		<td>25-05-2014</td>
		<td>26-05-2024</td>
		<td>20</td>
		<td>Actif</td>
	</tr>
	<tr>
		<td>321897546</td>
		<td>11-12-2011</td>
		<td>12-12-2051</td>
		<td>12</td>
		<td>Actif</td>
	</tr>
	<tr>
		<td>897213654</td>
		<td>21-09-2011</td>
		<td>22-09-2026</td>
		<td>8</td>
		<td>Actif</td>
	</tr>
	<tr>
		<td>987456123</td>
		<td>08-02-2010</td>
		<td>09-02-2011</td>
		<td>19</td>
		<td>Inactif</td>
	</tr>
</table>
            
<h4 class="manag_title_3">Moyen de paiement</h4>  

         
          <!--end of box_main_1 --></div>
          <!--end of part_1 --></div>
          
          
      <div class="part_2">
        <h3 class="manag_title_2">Carte cadeau</h3>

        <div class="box_main_3">
            <h4 class="manag_title_3">Historique</h4>  
        	<span class="ss_info no_info">Vous n'avez bénéficié d'aucune carte cadeau.</span>
             <h4 class="manag_title_3">Enregistrer une carte cadeau</h4> 
            <span class="ss_info">Indiquer le numéro de carte</span>
            <input type="text">
            <button type="button" class="btn_etap_action" id="valid_carte_lightbox">Valider</button>
<h4 class="manag_title_3">Commander une carte cadeau</h4>  
        	<span class="ss_info">Notre carte cadeau donne droit à une année de location de chêne truffier.</span>
            <button type="button" class="btn_etap_action" id="comand_carte_lightbox">Commander</button>


          <!--end of box_main_1 --></div>
          <!--end of part_2 --></div>   
          
          
        

      <!--end of content --></div>
   <!--end of manag_content_2marg --></div>               
   
      
      <div class="dragger_fond scroll-bar-wrap ui-widget-content">
   <div class="dragger_container"></div>        
          </div>
          
    <!--end of manag_content_2 --></div>
  
  <!--end of global_container_2 --></div>
<?php  include("manager_menu.php")?>

  <script> 
    $(document).ready(function() {
	
            $(".btn_paiement").addClass("actif");
            $(".btn_paiement span").css({
                "color":"#855506"
            });
            $(".btn_paiement .box_blanc").hide();
            $(".btn_paiement .box_noir").show();
			$(".btn_manag_fleche:eq(3)").show();
            $(".btn_paiement .btn_chene_blanc").show();
            $(".btn_paiement .btn_chene_noir").hide();
 });
   </script> 