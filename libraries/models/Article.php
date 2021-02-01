<?php 

namespace Models;
require_once("Model.php");

class Article extends Model{

    public function insertArticle($titre, $article, $categories)
    {
        $temps = time();
        $today = date('Y-m-d H:i', $temps);

        $id_utilisateur = $_SESSION['utilisateur']['id'] ;
        $sql = "INSERT INTO articles (titre, article, id_utilisateur, id_categorie, date) VALUES (:titre, :article, :id_utilisateur, :id_categorie, :date)";
        $result = $this->pdo->prepare($sql);

        $result->bindvalue(':titre', $titre , \PDO::PARAM_STR); 
        $result->bindvalue(':article', $article , \PDO::PARAM_STR); 
        $result->bindvalue(':id_utilisateur', $id_utilisateur , \PDO::PARAM_INT); 
        $result->bindvalue(':id_categorie', $categories , \PDO::PARAM_INT); 
        $result->bindvalue(':date', $today, \PDO::PARAM_STR); 

        $result->execute();

        return $result;
    }
    

}