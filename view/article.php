<?php
session_start();
//PATHS
$index = "../index.php";
$connexion = "connexion.php";
$inscription = "inscription.php";
$profil = "profil.php";
$admin = "admin.php";
$article = "article.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Article";
$footer = "../css/footer.css";

//HEADER
require('../require/html_/header.php');

?>

<main>

</main>

<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>