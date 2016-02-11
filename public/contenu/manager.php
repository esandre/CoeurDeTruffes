<div class="global_container">

	<div id="manag_content">
    
    
    
        <div class="zone_chene">
        	<h3>Mon chêne</h3>
            <div class="main_btn">
				<button type="button" class="btn_etap_action" id="louer_lightbox">Louer un chêne truffier</button>  
				<button type="button" class="btn_etap_action" id="comand_carte_lightbox">Offrir un chêne en carte cadeau</button>             
        
                  </div>
            <ul class="main_info">
                <li class="info_1">Vous avez <span class="nb_chene">0</span> chêne truffier</li>
                <li class="line_info">
                <span class="intitul_1">Prochain entretient</span><span class="intitul_info date_entretient">Octobre 2015</span>
            	</li>
                
                <li class="line_info">
                <span class="intitul_1">Durée moyenne d'adoption</span><span class="intitul_info duree_moy_adoption">20 ans 3 mois</span>
            	</li>
                
                <li class="line_info">
                <span class="intitul_1">Age moyen</span><span class="intitul_info age_moyen">6 ans 8 mois</span>
                </li>
            	</ul>                                
 
            
        <!--end of zone_chene --></div>
    
        <div class="zone_info">
        	<h3>Infos</h3>
            <div class="tablo_cour">
            	<span class="intitul_1">Cours de la truffe</span>
                 <div class="ss_intitul">Actuel : <span class="nd_cour">1190</span> €</div>
                <img src="images/img_cour_truffe.jpg" alt=""/>
             <!--end of tablo_cour --></div>
            <div class="meteo">
            <span class="intitul_1">Météo du champs</span>
            	<img src="images/img_meteo.jpg" alt=""/>
            <!--end of meteo --> </div>
        
            
        <!--end of zone_info --></div>
    
        <div class="zone_truffe">
        	<h3>Mes truffes</h3>
            <div class="main_btn">
            
				<button type="button" class="btn_etap_action" id="acheter_lightbox">Acheter des truffes</button>  
				<button type="button" class="btn_etap_action" id="livraison_lightbox">Recevoir des truffes</button>  
                
				<button type="button" class="btn_etap_action" id="vendre_lightbox">Vendre des truffes</button>  
            
            </div>
            
             <ul class="main_info">
                <li class="info_1">Vous avez <span class="nb_gramme">0</span> de truffes</li>
                <li class="line_info">
                <span class="intitul_1">Prochaine récolte</span><span class="intitul_info date_entretient">du 01.10.2014</span>
            	</li>
                
                <li class="line_info">
                <span class="intitul_1">Jusqu'à ce jour :</span><span class="pti_info">(en grammes)</span>
                	<ul>
                        <li><span class="intitul_2">Truffes récoltées</span><span class="truf_recolte">450</span></li>               
                    	<li><span class="intitul_2">Truffes achetées</span><span class="truf_achete">2000</span></li>
                    	<li><span class="intitul_2">Truffes reçues</span><span class="truf_recu">850</span></li>
                        <li><span class="intitul_2">Truffes vendues</span><span class="truf_vendu">350</span></li>
                    </ul>
            	</li>
                
  
            	</ul>             
        <!--end of main_info --></div>
                        
        <!--end of zone_truffe --></div>

    
    
    	
	<!--end of manag_content --></div>
    
    <?php  include("manager_menu.php")?>
    


<!--end of global_container --></div>


<script>
$(document).ready(function() {

    
    
    
    
    // Style du bouton du menu manager
	
            $(".btn_acc_manag").addClass("actif");
            $(".btn_acc_manag span").css({
                "color":"#855506"
            });
            $(".btn_acc_manag .box_blanc").hide();
            $(".btn_acc_manag .box_noir").show();
			$(".btn_manag_fleche:eq(0)").show();
            $(".btn_acc_manag .btn_chene_blanc").show();
            $(".btn_acc_manag .btn_chene_noir").hide();
            
            
            
            
   
 });
   </script>     
