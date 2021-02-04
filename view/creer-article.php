<?php
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require_once('../libraries/controller/Article.php');
require_once('../libraries/models/Article.php');
require("../libraries/models/Admin.php");

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

//CSS
$footer = "../css/footer.css";
$headerCss = "../css/header.css";
$pageCss = "../css/creer-article.css";
$Pagenom = "creer-article";

//HEADER
require('../require/html_/header.php');

?>


<main>
    <form action="" method="POST" id="bloc_creation">

    <label name="titre">Titre</label>
    <input type="text" id="titreCreerArticle" name="titre">

    <label name="article">Article</label>
    <textarea type="text" id="creerArticle" name="article" value="le contenue de mon article..." rows="10" cols="60" placeholder="2000 caractères maximum."></textarea>

        <label id="categorie">Type</label>
    <select name="categories" id="select_creation">
    
    <?php $modelArticle = new \Models\Article();
           $tableau = $modelArticle->findAllCategories();
           foreach ($tableau as $key => $value) {
               $nom = $value[0]; // 0 = nom 1 = id
            echo "<option>".$nom."</option>";
        }
            
        
        ?>
   
    </select>
    <input type="submit" id="idarticleSubmit" name="articleSubmit">

        <?php
         if(isset($_POST['articleSubmit'])){
            $createArticle = new \Controller\Article();
            $createArticle->createArticle($_POST['titre'],$_POST['article'], $_POST['categories']);
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