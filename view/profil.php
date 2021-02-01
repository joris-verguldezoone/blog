<?php
session_start();
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require('../libraries/controller/Profil.php');
require('../libraries/models/Profil.php');
require_once($utils);

<<<<<<< HEAD
=======
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/profil.css";
$Pagenom = "Profil";
$footer = "../css/footer.css";

>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3

//PATHS
$index = "../index.php";
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$admin = "admin.php";
$article = "article.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

<<<<<<< HEAD
//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/profil.css";
$Pagenom = "Profil";
$footer = "../css/footer.css";
=======
>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3
//HEADER
require('../require/html_/header.php');


?>
<main>
    <form class="block" method="POST" action="inscription.php">
        <h1><u>Profil</u></h1>
<<<<<<< HEAD

        <article>
            <label for="login" name="login" class="inp">
                <input type="text" id="profilLogin" name="login" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['login'];?>">
                <span class="label">New Login</span>
                <span class="focus-bg"></span>
            </label>
            <label for="password" name="password" class="inp">
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;">
                <span class="label">New Password</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <input type="password" id="profilConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm New Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <input type="text" id="inscriptionEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">New Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="update" name="register">
            <?php
=======

        <article>
            <label for="login" name="login" class="inp">
                <input type="text" id="profilLogin" name="login" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['login'];?>">
                <span class="label">New Login</span>
                <span class="focus-bg"></span>
            </label>
            <label for="password" name="password" class="inp">
                <input type="password" id="profilPassword" name="password" placeholder="&nbsp;">
                <span class="label">New Password</span>
                <span class="focus-bg"></span>
            </label></br>
            <label for="confirm_password" name="password" class="inp">
                <input type="password" id="profilConfirm_password" name="confirm_password" placeholder="&nbsp;">
                <span class="label">Confirm New Password</span>
                <span class="focus-bg"></span>
            </label>
            <label for="email" name="email" class="inp">
                <input type="text" id="inscriptionEmail" name="email" placeholder="&nbsp;" value="<?php echo $_SESSION['utilisateur']['email'];?>">
                <span class="label">New Email</span>
                <span class="focus-bg"></span>
            </label>
        </article>

        <input type="submit" id="profilSubmit" value="update" name="register">
            <?php
                var_dump($_SESSION['utilisateur']);
>>>>>>> d691bca02c926f82c09777843ab72269ee2382e3

    if (isset($_POST['register'])) {
        
        $newUser = new \Controller\Profil(); // prend pas le bon
        $newUser->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
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