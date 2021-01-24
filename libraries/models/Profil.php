<?php

namespace Models {

    require_once("Model.php");

    class Profil extends Model
    {
        public function update($login,$password,$email,$id){ // :)

            $sql = "UPDATE utilisateurs SET login = :login, password = :password, email = :email WHERE id = :id";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':login', $login, \PDO::PARAM_STR);
            $result->bindvalue(':password',$password , \PDO::PARAM_STR);
            $result->bindvalue(':email', $email, \PDO::PARAM_STR);
            $result->bindvalue(':id',$_SESSION['utilisateur']['id'], \PDO::PARAM_INT);
            $result->execute();
           
        }
        
    }
}