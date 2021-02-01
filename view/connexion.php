<?php
session_start();
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require('../libraries/controller/Connexion.php');
require('../libraries/models/Connexion.php');

//CSS
$footer = "../css/footer.css";
$headerCss = "../css/header.css";
$pageCss = "../css/connexion.css";
$Pagenom = "Connexion";

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$admin = "admin.php";
$article = "article.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

//HEADER
require('../require/html_/header.php');

?>
<main>
        <form class="block" method="POST" action="connexion.php">
            <h1><u>Connexion</u></h1>

            <article>
                <label for="login" name="login" class="inp">
                    <input type="text" id="ConnexionLogin" name="login" placeholder="&nbsp;">
                    <span class="label">Login</span>
                    <span class="focus-bg"></span>
                </label>
                <label for="password" name="password" class="inp">
                    <input type="password" id="ConnexionLogin" name="password" placeholder="&nbsp;">
                    <span class="label">Password</span>
                    <span class="focus-bg"></span>
                </label>
            </article>

            <input type="submit" id="ConnexionSubmit" value="register" name="register">
        </form>
        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Connexion(); // prend pas le bon
    $newUser->connect($_POST['login'], $_POST['password']);
}

?>


</main>
<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>