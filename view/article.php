<?php
<<<<<<< HEAD
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
$Commentaire = '../libraries/models/Commentaire.php';
$Admin = '../libraries/models/Admin.php';
require_once('../libraries/models/Article.php');
require_once('../libraries/controller/Commentaire.php');

=======
session_start();
>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Article";
$footer = "../css/footer.css";

<<<<<<< HEAD
=======

>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3
//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation-form.php";
$index = "../index.php";
$indexoff = "../index.php?off=1";

//HEADER
require('../require/html_/header.php');

<<<<<<< HEAD


=======
>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3
?>

<main>

<<<<<<< HEAD
<?php 
$articleModel = new \Models\Article();
$article = $articleModel->findOneArticle($_GET['articleSelected']); // on prend le name de l'input du formulaire envoyé ici
    echo $article[0][1]."<br />";
    echo $article[0][2]."<br />";
    echo $article[0][3]."<br />";
    echo $article[0][4]."<br />";
    echo $article[0][5]."<br />";

    $commentModel = new \Controller\Commentaire();
    $commentModel->commentDisplay($_GET['articleSelected']);
    
?>
    <form action='' method='POST'>
    
    <label for="newComment">Ecrire un commentaire</label>
    <input name='newComment' id='idNewComment' type='text'>
    
    <input id='idSubmitComment' name='submitComment' type='submit'>
    </form>



<?php

if(isset($_POST['submitComment'])){
     $commentaireController = new \Controller\Commentaire();
     $commentaireController->writeCommentary($_SESSION['utilisateur']['id'], $_POST['newComment'], $_GET['articleSelected']);
    
}
     ?>

=======
>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3
</main>

<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>