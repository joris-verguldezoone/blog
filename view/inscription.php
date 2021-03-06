<?php

//LIBRARIES
$Http = '../libraries/Http.php';
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require("../libraries/models/Admin.php");

//FORM 
$articlesForm = 'articles.php';

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$admin = "admin.php";
$articles = "articles.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

//CSS
$footer = "../css/footer.css";
$headerCss = "../css/header.css";
$pageCss = "../css/Inscription.css";
$Pagenom = "Inscription";

//HEADER
require('../require/html_/header.php');

require_once('../libraries/controller/Inscription.php');
require_once('../libraries/models/Inscription.php');

?>

<main>
    <form class="block" method="POST" action="inscription.php">
        <h1><u>Inscription</u></h1>

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
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <input type="password" id="inscriptionConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <input type="email" id="inscriptionEmail" name="email" placeholder="&nbsp;">
                <span class="label">Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="inscriptionSubmit" value="register" name="register">

        <?php

if (isset($_POST['register'])) {
    
    $newUser = new \Controller\Inscription(); // prend pas le bon
    $newUser->register($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
}

        ?>
        </form>
    </main>
<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>