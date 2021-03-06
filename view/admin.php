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
$articles = "articles.php";
$creerarticle = "creer-article.php";
$indexoff = "../index.php?off=1";

//HEADER
require('../require/html_/header.php');


?>
<main>

    <h2>Afin d'accéder aux changements les utilisateurs doivent se déco reco</h2>

<article>
    <form action="" method="POST">
        <article id="categorie_flex">
        <label for="newCategorie">Nouvelle categorie</label>
        <input name="newCategorie" id="idnewCategorie" type="text" placeholder="Ma categorie...">
        
        <label for='categoryColor'>Couleur de la categorie</label>
        <select name="categoryColor">
            <option value='linear-gradient(to bottom left, #cc0000 57%, #ffff99 100%)'>Rouge</option>
            <option value='linear-gradient(to bottom left, #990099 57%, #ffff99 100%)'>Violet</option>
            <option value='linear-gradient(to bottom left, #000099 57%, #ffff99 100%)'>Bleu Fonce</option>
            <option value='linear-gradient(to bottom left, #33cccc 57%, #ffff99 100%)'>Bleu Clair</option>
            <option value='linear-gradient(to bottom left, #00ff00 57%, #ffff99 100%)'>Vert Clair</option>
            <option value='linear-gradient(to bottom left, #006600 57%, #ffff99 100%)'>Vert Fonce</option>
            <option value='linear-gradient(to bottom left, #003366 0%, #ffff00 100%)'>Jaune</option>
            <option value='linear-gradient(to bottom left, #ff9900 57%, #ffff99 100%)'>Orange</option>
            <option value='linear-gradient(to bottom left, #663300 74%, #ffffcc 100%)'>Marron</option>

        </select>

        <input type="submit" id="submitCategorie" name="Submit_newCategorie">
        </form>
        <?php
        //var_dump($_SESSION);
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
            echo "<label>Modifier : </label>";
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
            echo "Êtes-vous sûr de vouloir supprimer la catégorie ".$nom."?";
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
            </article>
    <hr class="trait">
<h2>Utilisateurs</h2>
    <table class="ensemble_tableau">
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
        echo "<p class='mess_admin'>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>";
        echo " <form action='' method=POST class='form_confirmation'>
                <input type='submit' name='yes' value='Oui' class='bouton_confirmation'>
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
    <hr class="trait">
    <h2>Articles</h2>
        <table class="ensemble_tableau">
            <tr>
                <th class="tableau_admin">ID</th>
                <th class="tableau_admin">TITRE</th>
                <th class="tableau_admin">CONTENU</th>
                <th class="tableau_admin">ID CREATEUR</th>
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
            ?>
        </table>
        <?php
            if(isset($_GET['deleteArticle'])){
                $id = $_GET['articleIdTracker'];
                echo "<p class='mess_admin'>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>";
                echo "  <form action='' method=POST class='form_confirmation'>
                            <input type='submit' name='yesArticle' value='Oui' class='bouton_confirmation'>
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

</main> 
<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
ob_end_flush();
?>