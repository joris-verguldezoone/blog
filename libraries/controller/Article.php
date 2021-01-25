<?php

namespace Controller;
require($Http);
require_once($utils);

class Article{

    public $article = "";
    public $categories = "";


    public function createArticle($titre, $article, $categories){

        $articleModel = new \Models\Article();
        $errorLog = "";

        $this->article = $articleModel->secure($_POST['titre']);
        $this->article = $articleModel->secure($_POST['article']);
        $this->categories = $articleModel->secure($_POST['categories']); // pas utile mais dans le cas où l'on hack le html 
        
        if(!empty($article) && !empty($categories)){
           $article_len = strlen($article);
           
           if ($article_len >= 10 && $article_len <= 500){
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

// declarer un objet model 

    }


}

?>