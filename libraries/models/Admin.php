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

    public function modifyCategorie(){

        $modelCategorie = new \Models\Admin();
        $tableauCategorie = $modelCategorie->findAllCategories();
        
        foreach ($tableau as $key => $value) 
        {
            $nom = $value[0]; // 0 = nom  <---> 1 = id
            $id = $value[1];
         echo "<option>".$nom."</option>"; //imprimer dans un select voir si ça marche 
        }
    }
    public function findAllUsers(){
        $sql = "SELECT id, login, email, id_droits FROM utilisateurs ORDER BY id";
        var_dump($sql);
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){

            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['login'];
            $tableau[$i][] = $fetch['email'];
            $tableau[$i][] = $fetch['id_droits'];

            $i++;

        }
        return $tableau;
        }
    
}


?>