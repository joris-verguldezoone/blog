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
$articles = "view/articles.php";
$creerarticle = "view/creer-article.php";
$indexoff = "index.php?off=1";
//HEADER
require('require/html_/header.php');


// if (isset($_GET['off'])){
//     session_unset();
// }
$modelArticleDisplay = new \Models\Article();
$Articles = $modelArticleDisplay->findAllandAffArticles();

?>

<main>
    <section id="articleContainer">
<?php     

if(isset($_SESSION['connected'])){

    $i = 0;
            while ($i<=2)
            {
                $id = $Articles[$i][0];
                $descriptionLimit = $modelArticleDisplay->descriptionLimit($Articles[$i][2]);
                echo "<br /><div id='form'><form class='indexArticlesForm' method='GET' action='article.php'><input type='hidden' name='articleSelected' id='hiddenId' value='".$id."'><button type='submit' id='buttonArticles' style='background:".$Articles[$i][5].";'><h3><u>".$Articles[$i][1]."</h3></u><br />"
                .$descriptionLimit."<br />"
                .$Articles[$i][3]."<br />"
                .$Articles[$i][4]."<br />"
                .$Articles[$i][6]."</button><br /></form></div>";
                $i++;
            }
}else{
            
?>
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

<?php
}?>
        </section>
</main>

<?php

$img_cindy = 'images/rondoudou.png';
$img_joris = 'images/netero.png';
require('require/html_/footer.php');

?>
