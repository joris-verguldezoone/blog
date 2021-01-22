<?php

namespace Controller;

class Admin {

    public $newCategorie = "";

    public function createNewCategorie($newCategorie){

        $modelAdmin = new \Models\Admin();
        $this->newCategorie = $modelAdmin->secure($_POST['newCategorie']);
        $errorLog  = "";
        if(!empty($newCategorie)){
            $newCategorie_Len = strlen($newCategorie);
            if($newCategorie_Len >= 2 && $newCategorie_Len <= 20){
               $count = $modelAdmin->ifExistCategorie($newCategorie);
               if($count){ // si n'existe pas 
                   $modelAdmin->insertCategorie($newCategorie);
                   echo "Nouvelle catégorie créee avec succès";
               }
               else{
                   $errorLog = "Cette catégorie existe déjà";
               }
            }
            else{
                $errorLog = "Le nom de la catégorie doit faire entre 2 et 20 caracteres";
            }
        }
        else{
            $errorLog = "Veuillez entrer des caracteres";
        }
        echo $errorLog;
    }
}


?>