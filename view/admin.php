<?php

ob_start();

$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require("../libraries/controller/Admin.php");
require("../libraries/models/Admin.php");
require('../libraries/Http.php');

?>
<main>
    <form action="" method="POST">
        <label for="newCategorie">Nouvelle catégorie</label>
        <input name="newCategorie" id="idnewCategorie" type="text" placeholder="Ma categorie...">
        
        <input type="submit" id="submitCategorie" name="Submit_newCategorie">
        </form>
        <?php
        if(isset($_POST['Submit_newCategorie'])){

            $newCategorie = new \Controller\Admin();
            $newCategorie->createNewCategorie($_POST['newCategorie']);
        }
        ?>



        <form action='' method='GET'> <!-- je différencie le GET et le POST selon si j'vais avoir besoin de données tel que l'id dans l'url + c pratik pour check -->
            <label for="SelectCategory">Modifier une catégorie</label>
            <select name="selectCategory">
                <option value="">--Choisir--</option> <!-- jmet une option vide pcq sinon il compte pas l'option pré-selectionné ce fdp --> 

                <?php
                $modelArticle = new \Models\Admin();
                $tableau = $modelArticle->findAllCategories();
                foreach ($tableau as $key => $value) 
                {
                    $nom = $value[0]; // 0 = nom 1 = id
                    echo "<option value=".$nom.">".$nom."</option>";  
                }
                ?> 

            </select>
            <input type='submit' id='ModifyCategorySubmitId' name='ModifyCategorySubmit' value='Modifier'>
            <input type='submit' id='DeleteCategorySubmitId' name='DeleteCategorySubmit' value='Supprimer'>
            </form>
        <?php
        var_dump($_GET);
        if(isset($_GET['ModifyCategorySubmit'])){
            
            $previousName = $_GET['selectCategory'];
            echo $_GET['selectCategory']."okchien";
            var_dump($_GET['selectCategory']);
            echo "<form action='' method='POST'>";
            echo "<input type='text' id='modifyDeleteCategory' name='ModifyCategory' value='".$_GET['selectCategory']."'>";
            echo "<input type='submit' id='SendChangesID' name='SendChanges' value='Envoyer'>";
            echo "</form>";
               
        if(isset($_POST['SendChanges'])){
               var_dump($_POST);
               $modelAdmin = new \Models\Admin();
               $modelAdmin->categoryUpdate($_POST['ModifyCategory'],$previousName);
        }
            // $modelHttp = new \Http();
            // $modelHttp->redirect('admin.php');
    }
        // if(isset($_GET['deleteUser'])){
        //     $id = $_GET['idTracker'];
        //     echo "etes vous sur de vouloir supprimer cet utilisateur?";
        //     echo "  <form action='' method=POST>
        //             <input type='submit' name='yes' value='Oui'>
        //             <input type='submit' name='cancel' value='Annuler'>
        //             </form>";
        //             if(isset($_POST['yes'])){
        //                 $modelDelete = new \Models\Admin();
        //                 $modelDelete->deleteUser($id);
        //                 $modelHttp = new \Http();
        //                 $modelHttp->redirect('admin.php');
                
        //             }
        //             elseif(isset($_POST['cancel'])){
        //                 $modelHttp = new \Http();
        //                 $modelHttp->redirect('admin.php');
        //             }
        // }
        
        ?>








<table class="tableau_admin">
            <tr>
                <th class="tableau_admin">ID</th>
                <th class="tableau_admin">LOGIN</th>
                <th class="tableau_admin">EMAIL</th>
                <th class="tableau_admin">DROITS</th>
            </tr>
            <?php
            $users = $modelArticle->findAllUsers();
                foreach ($users as $key => $value){
                

                    echo "<tr>";  // droits select nom = id 
                                // login
                                // delete
                                 
                    echo    "<td class='tableau_admin'>".$value[0]."</td>"; // id
                    echo    "<td class='tableau_admin'>".$value[1]."</td>";
                    echo    "<td class='tableau_admin'>".$value[2]."</td>";
                    echo    "<td class='tableau_admin'>".$value[3]."</td>";

                    echo    "<form method='GET' action=''>
                                <td>
                                    <input type='submit' id='Modifier' value='modifier'>
                                    <input type='hidden' name='utilisateur' id='hiddenId' value='".$value[0]."'>
                                </td>
                                <td>
                                    <input type='submit' name='deleteUser' value='supprimer'>
                                    <input type='hidden' name='idTracker' id='suppr' value='".$value[0]."'>
                                </td>


                                </form>
                                </tr>";
                }
              ?>
        </table>
        <?php
        if(isset($_GET['utilisateur'])){ // sans isset = undefined 'modifier' + j'ai pas mis de name a l'input id='Modifier' pour avoir un url plus clair
            $modelAdmin = new \Models\Admin();
            $id = $_GET['utilisateur'];
            echo $modelAdmin->userModify($id);
        
            if(isset($_POST['adminModifyUser'])){
                $modelUpdate = new \Models\Admin(); // jpourrais créer qu'un seul objet ça serait + opti
                switch($_POST['id_droitsUpdate']){
                    case $_POST['id_droitsUpdate'] == "Utilisateur":
                    $compareRights = "Utilisateur";
                    $id_droitsUpdate = 1;
                    case $_POST['id_droitsUpdate'] == "Moderateur":
                    $compareRights = "Moderateur";
                    $id_droitsUpdate = 42;
                    break;
                   case $_POST['id_droitsUpdate'] == "Administrateur":
                   $id_droitsUpdate = 1337; 
                   break;
                }
                $modelUpdate->adminUpdate($_POST['loginUpdate'], $_POST['emailUpdate'], $id_droitsUpdate, $id);
                $modelHttp = new \Http();
                $modelHttp->redirect('admin.php');
            }
    }
    if(isset($_GET['deleteUser'])){
        $id = $_GET['idTracker'];
        echo "etes vous sur de vouloir supprimer cet utilisateur?";
        echo "  <form action='' method=POST>
                <input type='submit' name='yes' value='Oui'>
                <input type='submit' name='cancel' value='Annuler'>
                </form>";
                if(isset($_POST['yes'])){
                    $modelDelete = new \Models\Admin();
                    $modelDelete->deleteUser($id);
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
            
                }
                elseif(isset($_POST['cancel'])){
                    $modelHttp = new \Http();
                    $modelHttp->redirect('admin.php');
                }
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
</main> 

<?php
ob_end_flush();
?>