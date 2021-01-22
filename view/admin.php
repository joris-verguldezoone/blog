<?php
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require("../libraries/controller/Admin.php");
require("../libraries/models/Admin.php");


?>


<main>
    <form action="" method="POST">
        <label name="newCategorie">Nouvelle catégorie</label>
        <input name="newCategorie" id="idnewCategorie" type="text">
        
        <input type="submit" id="submitCategorie" name="Submit_newCategorie">

        <?php
        if(isset($_POST['Submit_newCategorie'])){

            $newCategorie = new \Controller\Admin();
            $newCategorie->createNewCategorie($_POST['newCategorie']);
        }
        
        ?> 
    <p>Cette page permet aux administrateurs de gérer l’ensemble du site
(modification et suppression d’articles, création/modification et suppression
de catégories, d’utilisateurs, droits…)
</p>
    </form>
</main> 