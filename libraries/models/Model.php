<?php

namespace Models;

require_once($database);
require_once($utils);

abstract class Model // <3
{
    protected $pdo;
    protected $login;
    protected $password;
    // le model est abstrait donc tous ses attributs doivent pouvoir être transmis aux héritiés sans etre public 

    public function __construct()
    {
        $this->pdo = connect(); // initialisation de la connexion pour toutes les fonctions
    }

    public function secure($var) // le sang de la veine
    {
        $var = htmlspecialchars(trim($var));
        return $var;
    }
    public function ifExist($login) // Est ce que l'utilisateur existe ? 
    {
        $sql = "SELECT login FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
    public function ifExistEmail($email) // Est ce que l'utilisateur existe ? 
    {
        $sql = "SELECT email FROM utilisateurs WHERE email = :email";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':email', $email, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);
        return $fetch;
    }
  
    public function passwordVerifySql($login) 
    {
        $sql = "SELECT password FROM utilisateurs WHERE login = '$login'"; // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }
    public function findAll($login) // on repere un utilisateur et on prends toutes ses données
    {
        $sql = "SELECT * FROM utilisateurs WHERE login = :login";
        $result = $this->pdo->prepare($sql);
        $result->bindvalue(':login', $login, \PDO::PARAM_STR);
        $result->execute();
        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
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
   
    public function findAllArticles() // display for admin 
    {
        $sql = "SELECT  a.id, a.titre, a.article, a.id_utilisateur, c.nom, a.date FROM articles AS a INNER JOIN categories AS c WHERE a.id_categorie = c.id ORDER BY date";  
        $result = $this->pdo->prepare($sql);
        $result->execute();

        $i = 0;
         
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC))
        {
            $tableau[$i][] = $fetch['id'];// rajouter un titre
            $tableau[$i][] = $fetch['titre'];
            $tableau[$i][] = $fetch['article'];
            $tableau[$i][] = $fetch['id_utilisateur'];
            $tableau[$i][] = $fetch['nom'];
            $tableau[$i][] = $fetch['date'];

            $i++;
        }
        return $tableau;
    }
    //Cindy 
    public function findAllandAffArticles(){ // display all articles
        $sql = "SELECT a.id, a.titre, a.article, u.login, c.nom, a.date FROM articles AS a LEFT OUTER JOIN utilisateurs AS u 
        ON u.id = a.id_utilisateur LEFT OUTER JOIN categories AS c ON c.id = a.id_categorie ORDER BY date";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        $tab = array();
        
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tab[$i][] = $fetch['id']; // attribut qui va etre utilisé en GET
            $tab[$i][] = $fetch['titre'];
            $tab[$i][] = $fetch['article'];
            $tab[$i][] = $fetch['login'];
            $tab[$i][] = $fetch['nom'];
            $tab[$i][] = $fetch['date'];
            
            $i++;
            $this->description = $fetch['article'];
        }

        
        return $tab;
    }
    public function findOneArticle($id){ // display all articles
        $sql = "SELECT a.id, a.titre, a.article, u.login, c.nom, a.date FROM articles AS a LEFT OUTER JOIN utilisateurs AS u 
        ON u.id = a.id_utilisateur LEFT OUTER JOIN categories AS c ON c.id = a.id_categorie WHERE a.id = '$id'";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(':id',$id,\PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        $tab = array();
        
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){
            $tab[$i][] = $fetch['id']; // attribut qui va etre utilisé en GET
            $tab[$i][] = $fetch['titre'];
            $tab[$i][] = $fetch['article'];
            $tab[$i][] = $fetch['login'];
            $tab[$i][] = $fetch['nom'];
            $tab[$i][] = $fetch['date'];
            
            $i++;
            $this->description = $fetch['article'];
        }
        return $tab;
    }
    
    public function descriptionLimit($value){

         $rest = substr($value, 0, 30);   // limit le nbr de caractere dans une chaine
         $rest = substr_replace($rest, '...', -3);
        return $rest;
    }
    public function commentaireVerify($id_article){ // on le laisse ici pour instancier qu'une fois 
        $sql = "SELECT id FROM commentaires WHERE id_article = :id_article";
        $result = $this->pdo->prepare($sql);
        $result->bindValue(":id_article",$id_article);
        $result->execute();

        $fetch = $result->fetch(\PDO::FETCH_ASSOC);

        return $fetch;
    }

}
