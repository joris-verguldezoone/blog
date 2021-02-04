<?php

ob_start();
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
$Commentaire = '../libraries/models/Commentaire.php';
$Admin = '../libraries/models/Admin.php';
require_once('../libraries/models/Article.php');
require_once('../libraries/controller/Commentaire.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Article";
$footer = "../css/footer.css";

//FORM 
$articlesForm = 'articles.php';

// PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$admin = "admin.php";
$articles = "articles.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

//HEADER
require('../require/html_/header.php');
?>
<main>
    <div id="pageArticle">
    <?php

    $articleModel = new \Models\Article();
    $article = $articleModel->findOneArticle($_GET['articleSelected']); // on prend le name de l'input du formulaire envoyé ici
        echo "<div><h1 style='background:".$article[0][5].";'><div id='titre_article'>".$article[0][1]."</div></h1><br />";
        echo "<div id='description_article'>". $article[0][2]."</div><br />";
        echo "<div id='flex_articles'><div id= 'login_article'><p>Par :"." ".$article[0][3]."</p></div><br />";
        echo "<div id='nom_article'><p>Type :"." ".$article[0][4]."</p></div><br />";
        echo "<div id='date_article'><p>Le"." ".$article[0][6]."</div></div></div><br />";
        echo "<hr id='trait_article'>";

        echo "        
        <div>
            <form action='' method='POST'>
            <label for='newComment' id='ecrire'>Ecrire un commentaire</label><br>
            <textarea name='newComment' id='idNewComment' rows='5' cols='33' placeholder='Les caratères maximums sont de 500.'></textarea><br>
            <input id='idSubmitComment' name='submitComment' type='submit'>
            </form>
        </div><br>";

        $count = $articleModel->commentaireVerify($_GET['articleSelected']);
        // var_dump($count);
        if($count){
            $commentController = new \Controller\Commentaire();
            $commentController->commentDisplay($_GET['articleSelected']);
        }
    ?>



    <?php

    $adresse = 'article.php?articleSelected='.$_GET['articleSelected'];
    if(isset($_POST['submitComment'])){
        $commentaireController = new \Controller\Commentaire();
        $commentaireController->writeCommentary($_SESSION['utilisateur']['id'], $_POST['newComment'], $_GET['articleSelected']);
        $Http = new Http();
        $Http->redirect($adresse);
    }
         ?>
    </div>
</main>

<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');

ob_end_flush();