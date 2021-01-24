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
        <input type="text" id="modifyDeleteCategory" name="textCategory" value="">
        <select name="selectCategory">
        <?php
        $modelArticle = new \Models\Admin();
        $tableau = $modelArticle->findAllCategories();
        foreach ($tableau as $key => $value) 
        {
            $nom = $value[0]; // 0 = nom 1 = id
            echo "<option value=".$nom.">".$nom."</option>"; // faire les droits admin 
        }
        ?> 

            </select>

<table class="tableau_admin">
            <tr>
                <th class="tableau_admin">ID</th>
                <th class="tableau_admin">LOGIN</th>
                <th class="tableau_admin">EMAIL</th>
                <th class="tableau_admin">DROITS</th>
            </tr>
            <?php
            $users = $modelArticle->findAllUsers();
            var_dump($users);
                  foreach ($users as $key){
                      echo "<tr>";
                      foreach ($key as $value){
                          echo "<td class='tableau_admin'>$value</td>";
                      }
                      echo "</tr>";
                  }
              ?>
        </table>


        <table class="">
            <tr>
                <th class="tableau_admin">ID</th>
                <th class="tableau_admin">TITRE</th>
                <th class="tableau_admin">CONTENU</th>
                <th class="tableau_admin">ID CREATEUR</th>
                <th class="tableau_admin">ID CATEGORIE</th>
            </tr>
            <?php
                    $articles = $modelArticle->findAllArticles();
                    var_dump($articles);
                          foreach ($articles as $key){
                              echo "<tr>";
                              foreach ($key as $value){
                                  echo "<td class='tableau_admin'>$value</td>";
                              }
                              echo "</tr>";
                          }            
            ?>
        </table>





    <input type="submit" id="submitModify" name="modify" value="Modifier">
    <input type="submit" id="submitDelete" name="delete" value="Supprimer">
    <p>Cette page permet aux administrateurs de gérer l’ensemble du site
(modification et suppression d’articles, création/modification et suppression
de catégories, d’utilisateurs, droits…)
</p>
    </form>
</main> 