

<div class="global_container_2">
  <nav class="ss_nav_manag"> <a href="#" class="active">Mes truffes</a></nav>
  
  
  
  
  <div class="manag_content_2">
    <div class="manag_content_2marg">
    <div class="content">
    
      <div class="part_1">
        <h3 class="manag_title_2">Mes truffes</h3>
        <div class="manag_option">
          <div class="info_truffe">Vous avez <span class="gr_truff">850</span> g de truffe pour une valeur de : <span class="val_mes_truffes">877</span> €</div>
          <!-- manag_option --></div>
        <div class="box_main_1">
            <div class="box_left"> 
                <h4 class="manag_title_3">Récolte 2015/2016</h4>
                <img class="carte"src="images/truff3.jpg" alt="" /> 
                
             <ul class="main_info">
                <li class="info_1">Informations sur la récolte 2015/2016</li>
                <li class="line_info">
                <span class="intitul_1">Total de truffes</span><span class="intitul_info total_truffes">850 g</span>
                <ul class="ss_main_info">
                    <li class="line_info">
                        <span class="intitul_1">Semaine du 26/09 au 02/10</span><span class="intitul_info total_truffes">250 g</span>
                    </li>
                    <li class="line_info">
                        <span class="intitul_1">Semaine du 26/09 au 02/10</span><span class="intitul_info total_truffes">50 g</span>
                    </li>
                    <li class="line_info">
                        <span class="intitul_1">Semaine du 26/09 au 02/10</span><span class="intitul_info total_truffes">100 g</span>
                    </li>  
                    <li class="line_info">
                        <span class="intitul_1">Semaine du 26/09 au 02/10</span><span class="intitul_info total_truffes">250 g</span>
                    </li>
                    <li class="line_info">
                        <span class="intitul_1">Semaine du 26/09 au 02/10</span><span class="intitul_info total_truffes">250 g</span>
                    </li>
                    
                </ul>
                
            	</li>
                <li class="line_info">
                <span class="intitul_1">Prochaine récolte</span><span class="intitul_info">06/01/2016</span>
            	</li>               
            
                
            	</ul> 
                
                
                
                
                
                <!-- box_left --></div>
            
          <div class="box_right"> 
                <h4 class="manag_title_3">Gérer mes truffes</h4>

            
             <ul class="main_info">
                <li class="info_1">Ventes</li>
                <li class="line_info">
                <span class="intitul_1">En cours</span><span class="intitul_info vente_cours">2</span>
                <ul class="ss_main_info">
                    <li class="line_info">
                        <span class="intitul_1 num_vente">Vente n°12</span><span class="intitul_info gram_vente">420 g</span>
                    </li>
                    <li class="line_info">
                        <span class="intitul_1 num_vente">Vente n°13</span><span class="intitul_info gram_vente">200 g</span>
                    </li>                 
                </ul>
                
            	</li>
                <li class="line_info">
                <span class="intitul_1">Poids total</span><span class="intitul_info poids_total_vente">990 g</span>
            	</li>               
                <li class="line_info">
                <span class="intitul_1">Valeur</span><span class="intitul_info valeur_envente">640 (euro)</span>
            	</li> 
                <li class="line_info">
                <span class="intitul_1">Vendu</span><span class="intitul_info gram_vendu">0 g</span>
            	</li> 
                
                
            	</ul> 
                <button type="button" class="btn_etap_action" id="vendre_lightbox">Vendre mes truffes</button> 
                
             <ul class="main_info">
                <li class="info_1">Achats</li>
                <li class="line_info">
                <span class="intitul_1">Poids total</span><span class="intitul_info achat_poid_total">1,175 kg</span>
            	</li>
                <li class="line_info">
                <span class="intitul_1">Montant</span><span class="intitul_info achat_montant">2390 (euro)</span>
            	</li>                                            
            	</ul> 
                <button type="button" class="btn_etap_action" id="acheter_lightbox">Acheter des truffes</button>      
                
             <ul class="main_info">
                <li class="info_1">Livraison</li>
                <li class="line_info">
                <span class="intitul_1">En cours</span><span class="intitul_info nb_livraison_encours">1</span>
                <ul class="ss_main_info">
                    <li class="line_info">
                        <span class="intitul_1">Poids</span><span class="intitul_info gram_livraison_encours">420 g</span>
                    </li>               
                </ul>
                
            	</li>
               <li class="line_info">
                <span class="intitul_1">Déjà livré</span><span class="intitul_info nb_livraison_deja">2</span>
                <ul class="ss_main_info">
                    <li class="line_info">
                        <span class="intitul_1">Poids</span><span class="intitul_info gram_livraison_encours">420 g</span>
                    </li>               
                </ul>
                
            	</li>                                          
            	</ul> 
                <button type="button" class="btn_etap_action" id="livraison_lightbox">Recevoir mes truffes</button>   
                
            <!-- box_right --></div>
             <!-- box_main_1 --></div>         
          <!--end of part_1 --></div>
          


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
       
	
            $(".btn_truffe").addClass("actif");
            $(".btn_truffe span").css({
                "color":"#855506"
            });
            $(".btn_truffe .box_blanc").hide();
            $(".btn_truffe .box_noir").show();
			$(".btn_manag_fleche:eq(2)").show();
            $(".btn_truffe .btn_chene_blanc").show();
            $(".btn_truffe .btn_chene_noir").hide();
 });
   </script> 