<?php

namespace Controller;
require($Http);
require_once($utils);

class Article{

    public $titre = "";
    public $article = "";
    public $categories = "";


    public function createArticle($titre, $article, $categories){

        $articleModel = new \Models\Article();
        $errorLog = "";

        $this->titre = $articleModel->secure($_POST['titre']);
        $this->article = $articleModel->secure($_POST['article']);
        $this->categories = $articleModel->secure($_POST['categories']); // pas utile mais dans le cas où l'on hack le html 
        
        if(!empty($article) && !empty($categories) && !empty($titre)){
           $article_len = strlen($article);
           $titre_len = strlen($titre);

           if (($article_len >= 10 && $article_len <= 2000) && ($titre_len > 1 && $titre_len <= 30)){
                $resultCategories = $articleModel->findAllCategories();
                foreach ($resultCategories as $key => $value) 
                {
                    $nom = $value[0]; // 0 = nom 1 = id
                    $id = $value[1];
                if($nom == $categories){
                    $categories = $id;
                     break;
                }
                }
            $articleModel->insertArticle($titre, $article,$value[1]);
            echo " votre article a bien été créer";
            }
            else $errorLog = "article doit contenir entre 10 et 500 caracteres";
        } 
        else $errorLog = " veuillez remplir les champs ";

    }

    public function articleByCategorieDisplay($id){
        $articleModel = new \Models\Article();
        $articles =  $articleModel->findArticleByCategories($id);
        echo "<section id='byCategoryContainer'>";
        foreach($articles as $value)
        {
            $id = $value[0];
            $descriptionLimit = $articleModel->descriptionLimit($value[2]);

            echo"<br /><div id='form'><form method='GET' action='article.php'><input type='hidden' name='articleSelected' id='hiddenId' value='".$id."'><button type='submit' id='buttonArticles' style='background:".$value[5].";'><h2><u>".$value[1]."</h2></u><br />"
            . "<i style='font-size: 1.2em'>" .$descriptionLimit."</i><br />";
            echo $value[3].'<br />';
            echo $value[4].'<br />';
            echo $value[6]."</button><br /></form></div>";



        }
        echo "</section>";
    }
}

?>