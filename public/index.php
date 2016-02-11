<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="robots" content="index, follow" />
        <meta content="Louer un chêne truffier pendant 20ans et bénéficier des truffes chaque année." name="description" />
        <meta content="truffe, chene truffier, location, achat" name="keywords" />
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="style.css">
        <title>Accueil - Coeur de Truffes</title>
        <!--[if lte IE 8]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="global_fond">
            <div class="fond">
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td><img src="images/fond.jpg" alt=""/></td>
                    </tr>
                </table>
            </div>
        </div>
        <header>
            <h1 class="logo_cdt"><a href="index.php"><img src="images/logo-coeur-de-truffes.png" alt="Logo Coeur de Truffes"/></a></h1>
            <ul class="tool_nav">

                <li class="btn_log btn_li"><a class="btn_a" href="#">S'identifier</a>
                    <div class="box_identif tool_ss_menu">    
                        <div class="identif_left">
                            <span class="identif_title">Déj&Aacute; client</span>
                            <span class="identif_span">Identifiant</span><input class="identif_input"></input>
                            <span class="identif_span">Mot de passe</span><input class="identif_input"></input>
                            <a  id="motdepasseoublie" class="identif_code_oublie">Mot de passe oublié ?</a>
                            <button type="button" id="identification"class="identif_identifier">Identifiez-vous</button> 
                            
                        </div>
                        <div class="identif_right ">
                            <span class="identif_title">Nouveau client</span>
                            <button id="inscription_1" type="button" class="identif_inscrir">Inscrivez-vous</button>                
                        </div>
                    </div>
                </li>
                <li class="btn_panier btn_li"><a class="btn_a" href="#"><img src="images/btn_panier.png" alt=""/><span class="poids_panier">350</span><span class="gram_panier">gr de truffe</span></a>
                    <ul class="tool_ss_menu">
                        <li><a id="acheter" href="#">Acheter</a></li>
                        <li><a href="#">Vider le panier</a></li>
                    </ul>
                </li>
                <li class="btn_rech btn_li"><a class="btn_a" href="#"><img src="images/btn_rech.png" alt=""/></a>
                    <div class="box_search tool_ss_menu">

                        <form action="?" method="get">
                            <input class="search_text" type="text" />
                            <input class="search_ok" type="submit" value="OK" />
                        </form>

                    </div></li>
                <li class="btn_lang btn_li"><a class="btn_a" href="#">FR</a>
                    <ul class="tool_ss_menu">
                        <li>
                            <a href="#">EN</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <nav class="main_nav">
                <ul>
                    <li><a href="">A propos</a>
                        <ul>
                            <li><a href="coeur_de_truffe.php">Coeur de Truffes</a></li>
                            <li><a href="fonctionnement.php">Fonctionnement</a></li>
                        </ul>   
                    </li>
                    <li><a href="acheter.php">Acheter</a></li>
                    <li><a href="manager.php">Manager</a></li>
                    <li><a href="#">Encyclopédie</a>
                        <ul>
                            <li><a href="truffe.php">Truffe</a></li>
                            <li><a href="chene_truffier.php">Chêne truffier</a></li>
                            <li><a href="truffiere.php">Truffière</a></li>
                        </ul>   
                    </li>
                </ul>
            </nav>

            <div class="bar_nav"></div>
            <span class="indic_menu"><span class="indic_bar"></span><span class="indic_flech"></span></span>

        </header>
        <div id="contenu">

            <?php
            $d = "contenu/";
            if (isset($_GET['p'])) {
                $p = strtolower($_GET['p']);
                if (preg_match("/^[a-z0-9\-]+$/", $p) && file_exists($d . $p . ".html")) {
                    include $d . $p . ".html";
                } else {
                    include $d . "404.html";
                }
            } else {
                include $d . "home.php";
            }
            ?>
        </div>
        <footer>
            <ul class="foot_nav">

                <li><a href="contact.php">Contactez-nous</a></li>
                <li><a href="plandusite.php">Plan du site</a></li>
                <li><a href="cgv.php">Conditions Générales de Vente</a>
                <li><a href="mentionslegales.php">Mentions légales</a></li>
                <li class="copy">&copy; Coeur de truffes</li>
            </ul>
        </footer>

        <script src="js/jquery-1.7.1.min.js"></script> 
        <script src="js/jquery-ui-1.8.20.custom.min.js"></script>
        <script src="js/mousewheel.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/plugin.js"></script>

    </body>
</html>