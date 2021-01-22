<?php

namespace Models;

require_once("Model.php");

class Admin extends Model {
    public $newCategorie = "";

    public function ifExistCategorie($nomCategorie) // Est ce que l'utilisateur existe ? 
    {
        $sql = "SELECT nom FROM categories WHERE nom = :nom";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':nom', $nomCategorie, \PDO::PARAM_STR);
        $result->execute();

        return $result;
    }


    public function insertCategorie($newCategorie){

            $sql = "INSERT INTO categories (nom) VALUES (:nom)";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':nom', $newCategorie,\PDO::PARAM_STR);
            $result->execute();
            
            return $result;
        }


    
}


?>