<?php
//LIBRARIES
$Http = "libraries/Http.php";
$database = 'libraries/database.php';
$utils = 'libraries/utils.php';
$Commentaire = 'libraries/models/Commentaire.php';
$Admin = 'libraries/models/Admin.php';
require_once('libraries/models/Article.php');
require_once('libraries/controller/Commentaire.php');

//CSS
$headerCss = "css/header.css";
$pageCss = "css/index.css";
$Pagenom = "Accueil";
$footer = "css/footer.css";

//FORM 
$articlesForm = 'view/articles.php';

//PATHS
$index = "index.php";
$inscription = "view/inscription.php";
$connexion = "view/connexion.php";
$profil = "view/profil.php";
$admin = "view/admin.php";
$article = "view/article.php";
$creerarticle = "view/creer-article.php";
$indexoff = "index.php?off=1";
//HEADER
require('require/html_/header.php');


if (isset($_GET['off'])){
    session_unset();
}

?>

<main>

    <h1>Bienvenue sur notre blog de Jeux-Vidéos !</h1>

    <article>
        <div>
            <p><b>Vous souhaitez vous inscrire ? <br>
                    Cliquez <a class="a_index" href="view/inscription.php">ici</a></b></p>
        </div>
        <div>
            <p><b>Vous souhaitez vous connecter ? <br>
                    Cliquez <a class="a_index" href="view/connexion.php">ici</a></b></p>
        </div>
    </article>


</main>

<?php

$img_cindy = 'images/rondoudou.png';
$img_joris = 'images/netero.png';
require('require/html_/footer.php');

?>
