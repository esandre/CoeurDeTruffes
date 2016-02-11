

<div class="global_container_2">
  <nav class="ss_nav_manag"> <a href="#" class="active">Mes infos</a></nav>
  
  
  
  
  <div class="manag_content_2">
    <div class="manag_content_2marg">
    <div class="content">
    
<div class="part_1">
        <h3 class="manag_title_2">Mes infos</h3>

        <div class="box_main_3">
            <div class="box_left"> 
            <h4 class="manag_title_3">Informations pesonnelles</h4>  
            
<span class="txt_intitul">Civilité *</span><input type="radio" name="civ" value="Mme" checked="checked"><span>Mme</span><input type="radio" name="civ" value="Mme"><span>Mlle</span><input type="radio" name="civ" value="Mme"><span>Mr</span><br>
            <span class="txt_intitul">Nom *</span><input type="text" value="Ipsum"><br>
            <span class="txt_intitul">Prénom *</span><input type="text" value="Lorette"><br>
            <span class="txt_intitul">Date de naissance</span>
            <select name="jour">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03" >03</option>
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
            <span class="txt_intitul">Adresse e-mail *</span><input type="text" value="loips@ipsum.com"><br>
            <span class="txt_intitul">Numéro de portable</span><input type="text" value="06 10 11 12 13 14">  <br> 
            
<h4 class="manag_title_3" style="padding-top: 30px;">Mot de passe</h4>  
    <p class="form_info">Saisissez au moins <strong>8 caractères</strong>, sans espace, comportant au moins un chiffre et une lettre.</p>
            <span class="txt_intitul">Mot de passe actuel *</span><input type="text">  <br>
            <span class="txt_intitul">Nouveau mot de passe *</span><input type="text">  <br> 
            <span class="txt_intitul">Confirmer mot de passe *</span><input type="text">  <br> 
            <button type="button" class="btn_etap_action" id="valid_password">Valider</button>
            <span class="txt_info">* Champ obligatoire</span>
          <!--end of box_left --></div>
<div class="box_right"> 
                <h4 class="manag_title_3">Gérer mes truffes</h4>

            
             <ul class="main_info">
                <li class="info_1">Adresse de livraison</li>
                <li class="line_info">
                <span class="intitul_1 nom">Lorette Ipsum</span>
                <span class="intitul_1">12 rue de la truffière</span>
                <span class="intitul_1">33000</span><span class="intitul_1">Bordeaux</span>
                <span class="intitul_1">FRANCE Métropolitaine</span>
            	</li>
                <li>                <a href="#" class="modif_nom" id="modif_adress_livraison">Modifier l'adresse de livraison</a> 
</li>
            	</ul> 
                
             <ul class="main_info">
                <li class="info_1">Adresse de facturation</li>
                <li class="line_info">
                <span class="intitul_1 nom">Lorette Ipsum</span>
                <span class="intitul_1">12 rue de la truffière</span>
                <span class="intitul_1">33000</span><span class="intitul_1">Bordeaux</span>
                <span class="intitul_1">FRANCE Métropolitaine</span>
            	</li>
<li>                <a href="#" class="modif_nom" id="modif_adress_facture">Modifier l'adresse de facturation</a>                                        
 </li>
            	</ul> 
                
            <!-- box_right --></div>
             <!--end of box_main_3 --></div>
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
	
            $(".btn_parametre").addClass("actif");
            $(".btn_parametre span").css({
                "color":"#855506"
            });
            $(".btn_parametre .box_blanc").hide();
            $(".btn_parametre .box_noir").show();
			$(".btn_manag_fleche:eq(4)").show();
            $(".btn_parametre .btn_chene_blanc").show();
            $(".btn_parametre .btn_chene_noir").hide();
 });
   </script> 