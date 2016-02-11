<div class="contenu_fonction_2 container_scroll">
    
    
    
            <div class="container_marg">
                <div class=" content">
    
    
    
	<h2>Mentions Légales</h2>
        
        <h3>PROPRIÉTAIRE DU SITE</h3>
        <span>TRUFFLES INVEST</span>
<span>RCS Paris</span>
<span>APE 702B</span>
<span>Siret 493 277 214 00018</span>
<h3>OBJET DU SITE </h3>
<p>Le site a pour objet de présenter et fournir des informations sur la société TRUFFLES INVEST, ses activités et ses produits. La société TRUFFLES INVEST se réserve le droit de corriger ou modifier son contenu, à tout moment et sans préavis.</p>
<h3>COPYRIGHT </h3>
<p>Par ailleurs, sauf mention contraire, les droits de propriété intellectuelle sur les documents contenus dans le site et chacun des éléments créés pour ce site sont la propriété exclusive de la société TRUFFLES INVEST, celle-ci ne concédant aucune licence, ni aucun autre droit que celui de consulter le site.</p>
<h3>CONDITIONS D'UTILISATION </h3>
<p>Afin de profiter pleinement de toutes les fonctionnalités du site Internet Rondsdesorciere, l'utilisation des navigateurs Microsoft Internet Explorer (PC) ou Mozilla Firefox (Mac ou PC) ou Safari (MAC) est vivement conseillée (logiciels gratuits). </p>
<p>Pour visualiser les pages de ce site de façon optimale, nous vous recommandons les paramétrages suivants : Navigateur : Nous vous conseillons vivement de tenir vos navigateurs à jour.
Résolution d'écran : 1024x768 ou supérieure </p>
<h3>DROIT D'AUTEURS</h3>
<p>L'ensemble de ce site relève de la législation française et internationale sur le droit d'auteur et la propriété intellectuelle.
Tous les droits de reproduction sont réservés, y compris pour les documents téléchargeables et les représentations iconographiques et photographiques. La reproduction de tout ou partie de ce site sur un support électronique quel qu'il soit est formellement interdite sauf autorisation expresse du directeur de la publication.
- toutes les marques citées sont la propriété de leurs titulaires respectifs.
- les articles L122-4 et L122-5 du Code de la propriété intellectuelle interdisent toute représentation ou reproduction, intégrale ou partielle, faites en dehors d'un usage privée. Toute représentation ou reproduction intégrale ou partielle de cette œuvre, fait par quelque procédé que ce soit, sans le consentement de l'éditeur ou les ayants droit est illicite et constitue une contrefaçon sanctionné par les articles L335-2 et suivants du Code de la propriété intellectuelle. </p>
<h3>Crédits photos </h3>

<h3>CNIL</h3>
<p>Vous disposez d'un droit d'accès, de modification, de rectification et de suppression des données qui vous concernent (art.34 de la loi "Informatique et Libertés" n° 78-17 du 16 janvier 1978). Pour l'exercer, adressez vous à : </p>
    <p>"adresse"</p>
        

    </div>
                </div>
<div class="dragger_fond scroll-bar-wrap ui-widget-content">
            <div class="dragger_container"></div>        
        </div></div>



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



    });

</script>
    