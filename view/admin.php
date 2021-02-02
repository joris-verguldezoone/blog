<?php

ob_start();
// LIBRARIES
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
$Http = '../libraries/Http.php';
$Article = '../libraries/Models/Article.php';
require("../libraries/controller/Admin.php");
require("../libraries/models/Admin.php");

$Pagenom = "Admin";


//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/admin.css";
$Pagenom = "Admin";
$footer = "../css/footer.css";

//FORM 
$articlesForm = 'articles.php';

// PATHS
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
    <form action="" method="POST">
        <label for="newCategorie">Nouvelle categorie</label>
        <input name="newCategorie" id="idnewCategorie" type="text" placeholder="Ma categorie...">
        
        <label for='categoryColor'>Couleur de la categorie</label>
        <select name="categoryColor">
            <option value='#ff0022'>Rouge</option>
            <option value='#ff00d4'>Violet</option>
            <option value='#3b00ff'>Bleu Fonc�</option>
            <option value='#00e5ff'>Bleu Clair</option>
            <option value='#00ff37'>Vert Clair</option>
            <option value='#5ea52b'>Vert Fonc�</option>
            <option value='#e9ff00'>Jaune</option>
            <option value='#ffd400'>Orange</option>
            <option value='#211a1a'>Marron</option>

        </select>

        <input type="submit" id="submitCategorie" name="Submit_newCategorie">
        </form>
        <?php
        if(isset($_POST['Submit_newCategorie'])){

            $newCategorie = new \Controller\Admin();
            $newCategorie->createNewCategorie($_POST['newCategorie']);
        }
        ?>
        <form action='' method='GET'> <!-- je differencie le GET et le POST selon si j'vais avoir besoin de donnees tel que l'id dans l'url + c pratik pour check -->
            <label for="SelectCategory">Modifier une categorie</label>
            <select name="selectCategory">
                <option value="">--Choisir--</option> <!-- jmet une option vide pcq sinon il compte pas l'option pre-selectionne ce fdp --> 

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
            echo "etes vous sur de vouloir supprimer la categorie ".$nom."?";
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

$adminController = new \Controller\Admin();
$adminController->userDisplay(); // Sah quel plaisir d'avoir un controller et pas 300 lignes de code 
?>
        </table>
        <?php
        if(isset($_GET['utilisateur'])){ // sans isset = undefined 'modifier' + j'ai pas mis de name a l'input id='Modifier' pour avoir un url plus clair
            // CONTROLLER
            $adminController = new \Controller\Admin();
            $adminController->userModifyDisplay();  
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
                <th class="tableau_admin">CATEGORIE</th>
                <th class="tableau_admin">ID CATEGORIE</th>
                <th class="tableau_admin">DATE</th>
            </tr>
            <?php
               // CONTROLLER
               $adminController->articlesDisplay();
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
            ?>
        </table>
</main> 
<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
ob_end_flush();
?>