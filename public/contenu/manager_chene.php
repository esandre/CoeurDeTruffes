

<div class="global_container_2">
  <nav class="ss_nav_manag"> <a href="#" class="active">état du chêne</a> <a href="#">chronologies</a> <a href="#">Le champs</a> </nav>
  
  
  
  
  <div class="manag_content_2">
    <div class="manag_content_2marg">
    <div class="content">
    
      <div class="part_1">
        <h3 class="manag_title_2">&Eacute;tat du chêne</h3>
        <div class="manag_option"> <a id="louer_lightbox" href="#">Ajouter un chêne</a>
          <div class="info_nb_chene">Vous avez <span class="nb_chene">2</span> chêne(s)</div>
          <!-- manag_option --></div>
        <div class="box_main_1">
          <div class="box_left"> 
          <img src="images/img_chene.jpg" alt=""/> 
            
            <!-- box_left --></div>
            
          <div class="box_right"> 
              <div class="box_title"><span class="num">N° </span><span class="num_chene">01</span><span class="nom_chene">Nom du chêne</span></div>
            <a href="#" class="modif_nom">Modifier le nom du chêne</a>
            
             <ul class="main_info">
                <li class="info_1">Paramètres d'adoption</li>
                <li class="line_info">
                <span class="intitul_1">Durée d'adoption</span><span class="intitul_info duree_adoption">9 ans 8 mois</span>
            	</li>
                
                <li class="ss_line_info extention_adoption">
                    <a href="#">&Eacute;tendre la durée d'adoption</a>
                </li>               
                
            	</ul>           
            
             <ul class="main_info">
                <li class="info_1">Informations générales</li>
                <li class="line_info">
                <span class="intitul_1">Hauteur</span><span class="intitul_info hauteur_chene">1,50 m</span>
            	</li>
                
                <li class="line_info">
                <span class="intitul_1">Âge</span><span class="intitul_info age_chene">2 ans 6 mois</span>
            	</li>
                
                <li class="line_info">
                <span class="intitul_1">pH du sol</span><span class="intitul_info age_moyen">7</span>
                </li>
                
                <li class="line_info">
                <span class="intitul_1">Bilan de santé</span><span class="intitul_info age_moyen">Etat parfait</span>
                </li>                
                <li class="ss_line_info">
                    <a href="#">En savoir plus sur les chênes truffiers</a>
                </li>
            	</ul>             
            
            <!-- box_right --></div>
             <!-- box_main_1 --></div>         
          <!--end of part_1 --></div>
          
          
          
        <div class="part_2">
        <h3 class="manag_title_2">Chronologies</h3>
        <div class="box_main_2">
            <h4 class="chrono_title">Les évènements majeurs durant la vie de l'arbre</h4>
            <div class="chrono_content">
                <span class="flech_prec"></span>
                <span class="flou_left"></span>
                <div class="chrono_img">
                <img src="images/chrono_vie.jpg" alt=""/>
                <!--chrono_img --></div>
                <span class="flech_suiv"></span>
                <span class="flou_right"></span>            
            <!--chrono_content --></div>
          <!--end of box_main_2 --></div>
        <div class="box_main_2">
            <h4 class="chrono_title">Planing de l'année 2012</h4>
      <div class="chrono_content">
                <span class="flech_prec"></span>
                <span class="flou_left"></span>
                <div class="chrono_img">
                <img src="images/chrono_annee.jpg" alt=""/>
                <!--chrono_img --></div>
                <span class="flech_suiv"></span>
                <span class="flou_right"></span>            
            <!--chrono_content --></div>            
            
          <!--end of box_main_2 --></div>
          
        <!--end of part_2 --></div>         
          
          <div class="part_3">
        <h3 class="manag_title_2">Le champs</h3>
        <div class="box_main_1">
            <div class="box_left"> 
                <h4 class="manag_title_3">Carte</h4>
                <img class="carte"src="images/carte.jpg" alt="" /> 
                <a class="agran"href="#">Agrandir la carte</a>
                
             <ul class="main_info">
                <li class="info_1">Informations</li>
                <li class="line_info">
                <span class="intitul_1">Localisation</span><span class="intitul_info">Saintes - FRANCE</span>
            	</li>
                <li class="line_info">
                <span class="intitul_1">Superficie</span><span class="intitul_info">2 hectares</span>
            	</li>               
            
                
            	</ul> 
                
                
                
                
                
                <!-- box_left --></div>
            <div class="box_right">
                 <h4 class="manag_title_3">Photos</h4>
                 <div class="slide_content">
    <div class="encyclo_slideshow"> 
        <img src="images/champs_2.jpg" alt="" /> 
        <img src="images/champs_1.jpg" alt="" /> 
        <img src="images/champs_3.jpg" alt="" /> 
        <img src="images/champs_4.jpg" alt="" />
      <!-- end .manag_slideshow --></div>
                 
    <div class="comand_slide_show"> <span class="btn_prev"></span> <span class="num_this_pic"></span> <span class="pic_bar">/</span> <span class="num_total_pic"></span> <span class="btn_next"></span> 
      <!--end of comand_slide_show --></div>                 
           <!-- slide_content --></div>      
                <!-- box_right --></div>
          <!--end of box_main_1 --></div>
          <!--end of part_3 --></div>        
          
          
          
          
          
          
          
          
        

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
        
        
   
        
// ---------------------------------------------------------
// ---------------------------------------------------------
// Style bouton

	
            $(".btn_chene").addClass("actif");
            $(".btn_chene span").css({
                "color":"#855506"
            });
            $(".btn_chene .box_blanc").hide();
            $(".btn_chene .box_noir").show();
			$(".btn_manag_fleche:eq(1)").show();
            $(".btn_chene .btn_chene_blanc").show();
            $(".btn_chene .btn_chene_noir").hide();
            
// ---------------------------------------------------------
// ---------------------------------------------------------
// NAVIGATION chronologie


    
            
 });
   </script> 
   
   
   
