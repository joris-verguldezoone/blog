<?php
namespace Models;

require_once("Model.php");

class Commentaire extends Model{

    public function insertComment($id_utilisateur, $commentaire, $id_article){

        $temps = time();
        $today = date('Y-m-d H:i', $temps);

        $sql = "INSERT INTO commentaires (id_utilisateur, commentaire, id_article, date) VALUES (:id_utilisateur, :commentaire, :id_article, :date)";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue("id_utilisateur",$id_utilisateur,\PDO::PARAM_INT);
        $result->bindvalue("commentaire",$commentaire,\PDO::PARAM_STR);
        $result->bindvalue("id_article",$id_article,\PDO::PARAM_INT);
        $result->bindvalue("date",$today,\PDO::PARAM_STR);
        $result->execute();
        
    }
    public function commentDisplay($id_article){
        $sql = 'SELECT c.commentaire, u.login, d.nom, c.date FROM `commentaires` AS c 
        LEFT OUTER JOIN `utilisateurs` AS u ON c.id_utilisateur = u.id
        LEFT OUTER JOIN `droits` AS d ON u.id_droits = d.id
        LEFT OUTER JOIN `articles` AS a ON a.id = :id_article WHERE a.id = c.id_article';

        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id_article',$id_article, \PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tab[$i][] = $fetch['login'];
            $tab[$i][] = $fetch['commentaire']; // attribut qui va etre utilisé en GET
            $tab[$i][] = $fetch['nom'];
            $tab[$i][] = $fetch['date'];
            
            $i++;
        }
        return $tab;
            
    }
    


}


?>