<?php

namespace Controller;

require($Http); // redirect ou refresh
require_once($utils); // session

class Commentaire{



    public function writeCommentary($id_utilisateur, $commentaire, $id_article){

        $modelTools = new \Models\Admin(); // on pourrait appeler n'importe laquelle
        $id_utilisateur = $modelTools->secure($id_utilisateur);
        $commentaire = $modelTools->secure($commentaire);
        $id_article = $modelTools->secure($id_article);
        
        $errorLog = "";

        if(!empty($id_utilisateur) && !empty($commentaire) && !empty($id_article)){
            $commentaire_len = strlen($commentaire);
            if($commentaire_len <500){

                $modelCommentaire = new \Models\Commentaire();
                $modelCommentaire->insertComment($id_utilisateur, $commentaire, $id_article);
                $modelHttp = new \Http();
                $modelHttp->redirect("");
            }else $errorLog = "La limite de caractere est fixée a 500";

        }else $errorLog = "Veuillez entrer des caracteres dans les champs";
        
        
        
        echo $errorLog;
    }

}
?>