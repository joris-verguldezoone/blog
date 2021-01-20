<?php
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require('../libraries/controller/Profil.php');
require('../libraries/models/Profil.php');
require_once($utils);
//CSS
$bootstrap = "../css/bootstrap.min.css";
$headerCss = "../css/header.css";
$pagesCss = "../css/profil.css";
$footerCss = "../css/footer.css";

//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation-form.php";
$index = "../index.php";
//HEADER
require('../require/html_/header.php');


?>
<main>
    <section>
            <form class="block" method="POST" action="">
            <h2>Profil</h2>

                <label name="login">Nouveau login</label>
                <input type="text" id="profilLogin" name="login" value="<?php echo $_SESSION['utilisateur']['login'];?>">

                <label name="password">Nouveau password</label>
                <input type="password" id="profilPassword" name="password">

                <label name="confirm_password">Nouveau confirm password</label>
                <input type="password" id="profilConfirm_password" name="confirm_password">

                <label name="email">Nouveau Email</label>
                <input type="text" id="profilEmail" name="email" value="<?php echo $_SESSION['utilisateur']['email'];?>">

                <input type="submit" id="inscriptionSubmit" value="register" name="register">
            <?php

    if (isset($_POST['register'])) {
        
        $newUser = new \Controller\Profil(); // prend pas le bon
        $newUser->profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email']);
    }
    ?>
        </form>
    </section>
</main>
    <?php
    //FOOTER
    $img_signature = '../images/netero.png';
    require_once('../require/html_/footer.php');
    ?>