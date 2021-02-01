<?php
namespace Models;

require_once("Model.php");

class Commentaire extends Model{

    public function insertComment($id_utilisateur, $commentaire, $id_article){

        $temps = time();
        $today = date('Y-m-d H:i', $temps);

        $sql = "INSERT INTO commentaire (id_utilisateur, commentaire, id_article, date) VALUES (:id_utilisateur, :commentaire, :id_article, :date)";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue("id_utilisateur",$id_utilisateur,\PDO::PARAM_INT);
        $result->bindvalue("commentaire",$commentaire,\PDO::PARAM_STR);
        $result->bindvalue("id_article",$id_article,\PDO::PARAM_INT);
        $result->bindvalue("date",$today,\PDO::PARAM_INT);
        $result->execute();
        
    }
    public function commentDisplay(){
// SELECT c.commentaire, u.login, d.nom, c.date FROM `commentaires` AS c LEFT OUTER JOIN `utilisateurs` AS u
// LEFT OUTER JOIN `droits` AS d LEFT OUTER JOIN `articles` AS a ON c.id_article = a.id AND u.id = c.id_utilisateur AND u.id_droits = d.id
    }


}


?>