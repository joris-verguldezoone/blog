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
                foreach ($users as $key => $value){
                    echo "<tr>";  // droits select nom = id 
                                // login
                                // delete
                                 
                    echo "<td class='tableau_admin'>".$value[0]."</td>"; // id
                    echo "<td class='tableau_admin'>".$value[1]."</td>";
                    echo "<td class='tableau_admin'>".$value[2]."</td>";
                    echo "<td class='tableau_admin'>".$value[3]."</td>";
                    echo "<form method='GET' action=''>
                            <td>
                                <input type='submit' id='Modifier' value='modifier'>
                                <input type='hidden' name='utilisateur' id='hiddenId' value='".$value[0]."'>
                            </td>
                        </form>";

                    echo "<td><input type='submit' value='supprimer'></td>";
                    echo "</tr>";
                }
              ?>
        </table>
        <?php
        var_dump($users);
        if(isset($_GET['utilisateur'])){ // sans isset = undefined 'modifier' + j'ai pas mis de name a l'input id='Modifier' pour avoir un url plus clair
            // echo "ta grosse mere";
            echo $_GET['utilisateur'];
            $modelAdmin = new \Models\Admin();
            echo $modelAdmin->userModify($_GET['utilisateur']);
        }
        
        ?>


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
                foreach ($articles as $value){      
                    echo "<tr>";
                    // titre
                    // article
                    // id categorie
                    // DELETE 
                        echo "<td class='tableau_admin'>$value[0]</td>";
                        echo "<td class='tableau_admin'>$value[1]</td>";
                        echo "<td class='tableau_admin'>$value[2]</td>";
                        echo "<td class='tableau_admin'>$value[3]</td>";
                        echo "<td class='tableau_admin'>$value[4]</td>";
                        echo "<td class='tableau_admin'>$value[5]</td>";
                        echo "<td><input type='submit' value='modifier'></td>";
                        echo "<td><input type='submit' value='supprimer'></td>";

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