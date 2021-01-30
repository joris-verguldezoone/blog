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
                    $nom = str_replace(' ', '_', $nom); // a refactoriser plus tard en fonction d'appel \Models\
                    $id = $value[1];

                    echo "<option value=".$nom.">".$nom."</option>";  
                }
                ?> 

            </select>
            <input type='submit' id='ModifyCategorySubmitId' name='ModifyCategorySubmit' value='Modifier'>
            <input type='submit' id='DeleteCategorySubmitId' name='DeleteCategorySubmit' value='Supprimer'>

            </form>
        <?php
        if(isset($_GET['ModifyCategorySubmit'])){
            $previousName = $_GET['selectCategory'];
            echo "<form action='' method='POST'>";
            echo "<input type='text' id='modifyDeleteCategory' name='ModifyCategory' value='".$_GET['selectCategory']."'>";
            echo "<input type='submit' id='SendChangesID' name='SendChanges' value='Envoyer'>";
            echo "</form>";
               
        if(isset($_POST['SendChanges'])){
               $modelAdmin = new \Models\Admin();
               $modelAdmin->categoryUpdate($_POST['ModifyCategory'],$previousName);
               $modelHttp = new \Http();
               $modelHttp->redirect('admin.php');
        }
    }
        if(isset($_GET['DeleteCategorySubmit'])){
            $nom = $_GET['selectCategory'];
            $nom = str_replace('_', ' ', $nom);
            echo "etes vous sur de vouloir supprimer la catégorie ".$nom."?";
            echo "  <form action='' method=POST>
                    <input type='submit' name='yes' value='Oui'>
                    <input type='submit' name='cancel' value='Annuler'>
                    </form>";
                    if(isset($_POST['yes'])){
                        $modelDelete = new \Models\Admin();
                        $modelDelete->deleteCategory($nom);
                        
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                    }
                    elseif(isset($_POST['cancel'])){
                        $modelHttp = new \Http();
                        $modelHttp->redirect('admin.php');
                    }
        }
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
    
                    echo "<tr>";       
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
            //     $modelCategory = new \Models\Admin();<select name='selectCategoryArticle'>$categoryList</select>
            //    echo $categoryList = $modelCategory->modifyCategorie();
                foreach ($articles as $value){      
                    echo "<tr>";
                   // id // titre // article //id_utilisateur // id categorie // date 
                   
                        echo "<td class='tableau_admin'>$value[0]</td>";
                        echo "<td class='tableau_admin'>$value[1]</td>";
                        echo "<td class='tableau_admin'>$value[2]</td>";
                        echo "<td class='tableau_admin'>$value[3]</td>";
                        echo "<td class='tableau_admin'>$value[4]</td>";
                        echo "<td class='tableau_admin'>$value[5]</td>";

                    echo    "<form method='GET' action=''>
                                <td>
                                    <input type='submit' id='Modifier' value='modifier'>
                                    <input type='hidden' name='articleName' id='hiddenId' value='".$value[0]."'> 
                                </td>
                                <td>
                                    <input type='submit' name='deleteArticle' value='supprimer'>
                                    <input type='hidden' name='articleIdTracker' id='suppr' value='".$value[0]."'>
                                </td>
                                </form>
                                </tr>"; // value[0] renvoie l'id
                } 
                //ok
                if(isset($_GET['articleName'])){ // sans isset = undefined 'modifier' + j'ai pas mis de name a l'input id='Modifier' pour avoir un url plus clair
                    $modelAdmin = new \Models\Admin();
                    $id = $_GET['articleName']; // valeur[0] renvoie l'id de l'article
                    echo "<table>";
                    echo $modelAdmin->ArticleModify($id);
                
                        if(isset($_POST['adminModifyArticle']))
                        $modelAdmin->adminArticleUpdate($_POST['titreUpdate'], $_POST['articleUpdate'], $_POST['id_utilisateurUpdate'],$_POST['catagorieUpdate'] ,$_POST['dateUpdate'] ,$id);
                        // $modelHttp = new \Http();
                        // $modelHttp->redirect('admin.php');
                    }
            if(isset($_GET['deleteArticle'])){
                $id = $_GET['articleIdTracker'];
                echo "etes vous sur de vouloir supprimer cet article?";
                echo "  <form action='' method=POST>
                            <input type='submit' name='yesArticle' value='Oui'>
                            <input type='submit' name='cancelArticle' value='Annuler'>
                        </form>";
                        if(isset($_POST['yesArticle'])){
                            $modelDelete = new \Models\Admin();
                            $modelDelete->deleteArticle($id);
                            $modelHttp = new \Http();
                            $modelHttp->redirect('admin.php');
                        }
                        elseif(isset($_POST['cancelArticle'])){
                            $modelHttp = new \Http();
                            $modelHttp->redirect('admin.php');
                        }
            }
            // ok           
            ?>
        </table>
</main> 

<?php
ob_end_flush();
?>