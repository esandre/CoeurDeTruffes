<div class="contenu_fonction_2 container_scroll">
    
    
    
            <div class="container_marg">
                <div class=" content">
    
    
    
	<h2>Fonctionnement</h2>
        

<h3>Conditions</h3>
<p>Le Bénéficiaire verse à la signature du présent contrat à l’exploitant une somme correspondant au prix d’acquisition de la production de truffes d’un ou plusieurs chênes truffiers (mycorhizés) sur la parcelle (« la souscription »). Les conditions particulières déterminent le nombre de chênes truffiers (mycorhizés) dont la totalité  de la production reviendra au Bénéficiaire selon les modalités visées ci-après ainsi que le prix unitaire de souscription.</p>
<p>La souscription financière est réputée définitive et irrévocable et ne pourra donner lieu à aucune restitution de la part de l’exploitant au profit du Bénéficiaire. Elle est destinée notamment à permettre l’entretien et l’exploitation du ou des chênes truffiers (mycorhizés) par l’exploitant en vu de la production de truffes.</p>
<h3>Droits du Bénéficiaire sur la production annuelle de truffes sur la parcelle</h3>
<p>En contrepartie, de sa souscription financière, le Bénéficiaire aura pendant la durée du contrat de 20 ans, 2 possibilités :</p>
<h4>A. Récupérer les Truffes</h4>
<p>La totalité du poids de la production de truffes issue annuellement de l’exploitation de la parcelle au prorata du nombre de chênes financés par ses soins par rapport au nombre de chênes implantés sur la parcelle.
Exemple : Nombre de chênes parrainés : 2= Nombre de chênes sur la parcelle : 400. Poids de truffes revenant au Bénéficiaire (PB): PB = 2/400  x PT où (PT est égal au poids total de production de truffes annuelle de la parcelle)
Les frais de port seront à la charge du Bénéficiaire
</p>
<h4>B. Recevoir l’argent de la vente des truffes au prorata de la quote part investit</h4>
<p>A la fin de la saison de récolte et au plus tard le 31 mars de chaque année ;le prix moyen au kilo obtenu sera retenu comme barème de cotation de la quote part.
Exemple : Nombre de chênes parrainés : 2 ; Nombre de chênes sur la parcelle : 400. 
Prix moyen de vente sur une saison : 800 €/kg
Récolte de 40Kg pour 400 chênes truffiers
Rémunération revenant au Bénéficiaire (RB): RB = 2/400  x 40Kg x 800€ = 160 €

</p>
<h3>Durée du contrat</h3>
<p>En vertu du présent contrat le Bénéficiaire bénéficiera de la production de truffes à compter de la 1ère  année suivant la plantation des chênes truffiers sur la parcelle et pendant les 20 années qui suivent, sauf cas de force majeure.</p>
<h3>Estimation de la Production</h3>
<p>Le calcul de la production de truffes de la parcelle (PT) sera effectué au plus tard le 31 mars de chaque année à l’issue de chaque récolte intervenant au mois décembre précédent.</p>
        
<h3>Information du Bénéficiaire et livraison éventuelle de truffes</h3>
<h4>Cas n°1 : Le bénéficiaire souhaite obtenir tout ou partie de la production de truffes qui lui revient</h4>
<p>a)	Le Bénéficiaire devra prendre ses dispositions pour venir chercher sur le lieu de la Parcelle dans les 15 jours de la réception de la lettre d’information la part qui lui revient ou si le Bénéficiaire, souhaite qu’elle lui soit adressée, il devra en informer l’exploitant à réception de la lettre d’information en lui précisant le lieu d'envoi de sa part de production.Les frais de port seront à la charge du Bénéficiaire.</p>
<p>b)	La lettre d’information précisera également qu’à défaut de quérir sa production dans les 15 jours de sa réception, ou d’en avoir sollicité l’envoi, la production annuelle revenant au Bénéficaire sera alors vendu. Le produit de la vente sera remis au Bénéficiaire.</p>


<h4>Cas n°2 : Le bénéficiaire souhaite recevoir l’argent de la vente de truffes au prorota de la quote part investit</h4>
<p>a) L’exploitant informera annuellement le Bénéficiaire au courant du mois d’avril suivant la production du montant de la vente de truffes lui revenant, par tout moyen d’information (télécopie, courrier électronique, lettre simple). La lettre d’information précisera la date de plantation des chênes truffiers sur la parcelle, le nombre total de chênes truffiers plantés sur la parcelle, le poids de la production annuelle de la Parcelle, que le mode de calcul du montant de la vente des truffes revenant au Bénéficiaire.</p>
<p>b) La lettre d’information sera adressée au Bénéficiaire à l’adresse mentionnée dans les conditions particulières. Le Bénéficiaire informera l’exploitant de toute modification de son adresse, afin que ce dernier ne puisse être jugé responsable de tout problème d’envoi.</p>


<h4>Pour plus d'informations, consulter nos conditions générales de ventes</h4>









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
    