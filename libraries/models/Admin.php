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

    public function modifyCategorie(){ // fonction d'affichage

        $modelCategorie = new \Models\Admin();
        $tableauCategorie = $modelCategorie->findAllCategories();
        $i= 0;
        foreach ($tableauCategorie as $key => $value) 
        {
            $nom = $value[0]; // 0 = nom  <---> 1 = id
            $id = $value[1];
          //imprimer dans un select voir si ça marche 
         echo "<option value=".$nom.">".$nom."</option>";
        }
    }
    public function findAllUsers(){
        $sql = "SELECT u.id, u.login, u.email, d.nom FROM utilisateurs AS u INNER JOIN droits AS d ON u.id_droits = d.id";
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $i = 0;
        while($fetch = $result->fetch(\PDO::FETCH_ASSOC)){

            $tableau[$i][] = $fetch['id'];
            $tableau[$i][] = $fetch['login'];
            $tableau[$i][] = $fetch['email'];
            $tableau[$i][] = $fetch['nom'];

            $i++;

        }
        return $tableau;
        }
    
        public function userModify($id){ // on utilise l'id pour modifier utilisateur, il faut echo le return 
            $sql = "SELECT login, email, id_droits FROM utilisateurs WHERE id = '$id' ";
            $result = $this->pdo->prepare($sql);
            $result->bindvalue(':id', $id, \PDO::PARAM_INT);
            $result->execute();
            $compareRights = "";
            $temp1 = "";
            $temp2 = "";
            $i = 0;
            $fetch = $result->fetch(\PDO::FETCH_ASSOC);
                $tableau[$i][] = $fetch['login'];
                $tableau[$i][] = $fetch['email'];
                $tableau[$i][] = $fetch['id_droits'];

                switch($tableau){
                    case $tableau[0][2] == 1:
                    $compareRights = "Utilisateur";
                    $temp1 = "Moderateur";
                    $temp2 = "Administrateur";
                    break;
                    case $tableau[0][2] == 42:
                    $compareRights = "Moderateur";
                    $temp1 = "Utilisateur";
                    $temp2 = "Administrateur";
                    break;
                   case $tableau[0][2] == 1337:
                   $compareRights = "Administrateur";
                   $temp1 = "Utilisateur";
                   $temp2 = "Moderateur";
                   break;
                }
                    
                $tableauDisplay = "<form action='' method=POST>
                <label name='login'>Login</label>
                <input type='text' id='Login' name='loginUpdate' value='".$tableau[0][0]."'>
                <label name='email'>Email</label>
                <input type='text' id='Email' name='emailUpdate' value='".$tableau[0][1]."'>
                <label name='id_droits'>Droits</label>
                <select name='id_droitsUpdate'>
                <option>".$compareRights."</option>
                <option>".$temp1."</option>
                <option>".$temp2."</option>

                </select>

                <input type='submit' name='adminModifyUser' value='Changements'>
                </form>";
                
                return $tableauDisplay; // on imprime l'affichage dans la view
    
            }
            // bon ça commence a faire bcp de fonction ça deuh

            public function adminUpdate($login, $email, $id_droits, $id){ // :) renommer en adminUserUpdate

                $sql = "UPDATE utilisateurs AS u INNER JOIN droits AS d ON u.id =:id SET u.login =:login , u.email = :email, u.id_droits =:id_droits";
                var_dump($sql);
                $result = $this->pdo->prepare($sql);
                $result->bindvalue(':login', $login, \PDO::PARAM_STR);
                $result->bindvalue(':email', $email, \PDO::PARAM_STR);
                $result->bindvalue(':id_droits',$id_droits, \PDO::PARAM_INT);
                $result->bindvalue(':id',$id, \PDO::PARAM_INT);
                $result->execute();
               
            }
            public function deleteUser($id){
                $sql = "DELETE FROM utilisateurs WHERE id = :id";
                $result = $this->pdo->prepare($sql);
                $result->bindvalue(':id', $id, \PDO::PARAM_INT);
                $result->execute();
            }
            public function categoryUpdate($newName, $previousName){
                $sql = "UPDATE categories SET nom = :newName WHERE nom = :previousName";
                $result = $this->pdo->prepare($sql);
                $result->bindValue(':newName', $newName, \PDO::PARAM_STR);
                $result->bindValue(':previousName',$previousName, \PDO::PARAM_STR);
                $result->execute();
                var_dump($result);
            }
            public function deleteCategory($nom){
                $sql = "DELETE FROM categories WHERE nom = :nom";
                $result = $this->pdo->prepare($sql);
                $result->bindvalue(':nom', $nom, \PDO::PARAM_STR);
                $result->execute();

            }

            // Articles

            public function articleModify($id){ // on utilise l'id pour modifier utilisateur, il faut echo le return 
                $sql = "SELECT a.titre, a.article, a.id_utilisateur, c.nom, a.date FROM articles AS a INNER JOIN categories AS c WHERE a.id = '$id' AND a.id_categorie = c.id";
                $result = $this->pdo->prepare($sql);
                $result->bindvalue(':id', $id, \PDO::PARAM_INT);
                $result->execute();
                $modelModifyArticle = new \Models\Admin();
                

                $i = 0;
                $fetch = $result->fetch(\PDO::FETCH_ASSOC);
                    $tableau[$i][] = $fetch['titre'];
                    $tableau[$i][] = $fetch['article'];
                    $tableau[$i][] = $fetch['id_utilisateur'];
                    $tableau[$i][] = $fetch['nom'];
                    $tableau[$i][] = $fetch['date'];

                    for($z = 0; $z < isset($optionDisplay); $z++){

                    }
                    
                    $tableauDisplay = "<form action='' method=POST>
                    <label name='login'>Titre</label>
                    <input type='text' id='Titre' name='titreUpdate' value='".$tableau[0][0]."'>
                    <label name='email'>Article</label>
                    <textarea type='text' id='Article' name='articleUpdate' rows='5' cols='33'>".$tableau[0][1]."</textarea>
                    <label name='id_droits'>id_utilisateur</label>
                    <input type='text' id='id_utilisateur' name='id_utilisateurUpdate' value='".$tableau[0][2]."'>
                    <label name='id_droits'>id_categorie</label>
                    <input type='text' id='idCategoryModifyArticle' name='catagorieUpdate' value='".$tableau[0][3]."'>
                    <label name='date'>Date</label>
                    <input type='datetime' id='date' name='dateUpdate' value='".$tableau[0][4]."'>
    
                    <input type='submit' name='adminModifyArticle' value='Changements'>
                    </form>";
                    
                    return $tableauDisplay; // on imprime l'affichage dans la view
        
                }
                public function adminArticleUpdate($titre, $article, $id_utilisateur, $id_categorie, $date,$id){ // :)

                    $sql = "UPDATE articles SET titre =:titre , article = :article, id_utilisateur =:id_utilisateur, id_categorie = :id_categorie, date=:date WHERE id=:id"; // c.nom et a.id_categorie = c.id
                    var_dump($sql);
                    $result = $this->pdo->prepare($sql);
                    $result->bindvalue(':titre', $titre, \PDO::PARAM_STR);
                    $result->bindvalue(':article', $article, \PDO::PARAM_STR);
                    $result->bindvalue(':id_utilisateur',$id_utilisateur, \PDO::PARAM_INT);
                    $result->bindvalue(':id_categorie',$id_categorie, \PDO::PARAM_INT);
                    $result->bindvalue(':date',$date, \PDO::PARAM_STR); // modified
                    $result->bindvalue(':id',$id, \PDO::PARAM_INT);
                    $result->execute();
                   
                }
                public function deleteArticle($id){
                    $sql = "DELETE FROM articles WHERE id = :id";
                    $result = $this->pdo->prepare($sql);
                    $result->bindvalue(':id', $id, \PDO::PARAM_INT);
                    $result->execute();
                }

}

