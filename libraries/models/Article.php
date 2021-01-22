<?php 

namespace Models;
require_once("Model.php");

class Article extends Model{

    public function insertArticle($article, $categories)
    {
        $temps = time();
        $today = date('Y-m-d', $temps);

        $id_utilisateur = $_SESSION['utilisateur']['id'] ;
        $sql = "INSERT INTO articles (article, id_utilisateur, id_categorie, date) VALUES (:article, :id_utilisateur, :id_categorie, :date)";
        $result = $this->pdo->prepare($sql);

        $result->bindvalue(':article', $article , \PDO::PARAM_STR); 
        $result->bindvalue(':id_utilisateur', $id_utilisateur , \PDO::PARAM_INT); 
        $result->bindvalue(':id_categorie', $categories , \PDO::PARAM_INT); 
        $result->bindvalue(':date', $today, \PDO::PARAM_STR); 

        $result->execute();

        return $result;
    }
    
    public function findAllCategories() // permet d'afficher toutes les catégories 
    {
        $sql = "SELECT nom ,id FROM categories ORDER BY id";  
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
         
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['id'];

            $i++;
        }
        return $tableau;
    }

}