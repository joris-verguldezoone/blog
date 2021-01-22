<?php
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = "../libraries/utils.php";
require_once('../libraries/controller/Article.php');
require_once('../libraries/models/Article.php');

?>


<main>
    <form action="" method="POST">

    <label name="article">Article</label>
    <textarea type="text" id="creerArticle" name="article" value="le contenue de mon article..."></textarea>

    <select name="categories">
    
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
            $createArticle->createArticle($_POST['article'], $_POST['categories']);
        }
        ?>


    </form>




</main>