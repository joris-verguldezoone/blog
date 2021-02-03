<?php

namespace Controller;

require($Http); // redirect ou refresh
require_once($utils); // session

require($Article);

class Admin {

    public function createNewCategorie($newCategorie){

        $modelAdmin = new \Models\Admin();
        $newCategorie = $modelAdmin->secure($_POST['newCategorie']);
        $categorieColor = $modelAdmin->secure($_POST['categoryColor']);
        $errorLog  = "";
        if(!empty($newCategorie)){
            $newCategorie_Len = strlen($newCategorie);

            if($newCategorie_Len >= 2 && $newCategorie_Len <= 20){
                $count = $modelAdmin->ifExistCategorie($newCategorie);

                if(!$count){ // si n'existe pas 
                    $existColor = $modelAdmin->ifExistColor($categorieColor);
                    if(!$existColor){
                        $max = $modelAdmin->maxCategories();
                        if($max['COUNT(*)']<10){
                            $modelAdmin->insertCategorie($newCategorie,$categorieColor);
                            echo "LA nouvelle catégorie ".$newCategorie." créee avec succès";
                        }
                        else{
                            $errorLog = "Le nombre de categories est limité a 9, supprimez en pour en creer des nouvelles";
                        }
                    }
                    else{
                        $errorLog = "Cette couleur est déjà utilisé par une autre categorie, seul 9 categories peuvent etre créer, a part si on paye plus le dev";
                    }
                    
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

    public function userDisplay(){
        $modelArticle = new \Models\Admin();
        $users = $modelArticle->findAllUsers();
        foreach ($users as $key => $value){

            echo "<tr>";       
            echo    "<td class='tableau_admin'>".$value[0]."</td>"; // id
            echo    "<td class='tableau_admin'>".$value[1]."</td>";
            echo    "<td class='tableau_admin'>".$value[2]."</td>";
            echo    "<td class='tableau_admin'>".$value[3]."</td>";

            echo    "<form method='GET' action=''>
                        <td>
                            <input type='submit' id='Modifier' value='modifier'>
                            <input type='hidden' name='utilisateur' id='hiddenId' value='".$value[0]."'>
                        </td>
                        <td>
                            <input type='submit' name='deleteUser' value='supprimer'>
                            <input type='hidden' name='idTracker' id='suppr' value='".$value[0]."'>
                        </td>


                        </form>
                        </tr>";
        }
    }
    public function userModifyDisplay(){
        $modelAdmin = new \Models\Admin();
            $id = $_GET['utilisateur'];
            echo $modelAdmin->userModify($id);
        
            if(isset($_POST['adminModifyUser'])){
                $modelUpdate = new \Models\Admin(); // jpourrais creer qu'un seul objet ca serait + opti
                switch($_POST['id_droitsUpdate']){
                    case $_POST['id_droitsUpdate'] == "Utilisateur":
                    $compareRights = "Utilisateur";
                    $id_droitsUpdate = 1;
                    case $_POST['id_droitsUpdate'] == "Moderateur":
                    $compareRights = "Moderateur";
                    $id_droitsUpdate = 42;
                    break;
                   case $_POST['id_droitsUpdate'] == "Administrateur":
                   $id_droitsUpdate = 1337; 
                   break;
                }
              $newSession = $modelUpdate->adminUpdate($_POST['loginUpdate'], $_POST['emailUpdate'], $id_droitsUpdate, $id);
                $modelHttp = new \Http();
                $modelHttp->redirect('admin.php');
            }
    }
    public function articlesDisplay(){
        $adminModel = new \Models\Admin();
        $articles = $adminModel->findAllArticles();
            foreach ($articles as $value){      
                echo "<tr>";
               // id // titre // article //id_utilisateur // id categorie // date 
               $contenu = $adminModel->descriptionLimit($value[2]); // on va éviter les gros pavés hein 
                    echo "<td class='tableau_admin'>$value[0]</td>";
                    echo "<td class='tableau_admin'>$value[1]</td>";
                    echo "<td class='tableau_admin'>$contenu</td>";
                    echo "<td class='tableau_admin'>$value[3]</td>";
                    echo "<td class='tableau_admin'>$value[4]</td>";
                    echo "<td class='tableau_admin'>$value[5]</td>";

                echo    "<form method='GET' action=''>
                            <td>
                                <input type='submit' id='Modifier' value='modifier'>
                                <input type='hidden' name='articleName' id='hiddenId' value='".$value[0]."'> 
                            </td>
                            <td>
                                <input type='submit' name='deleteArticle' value='supprimer'>
                                <input type='hidden' name='articleIdTracker' id='suppr' value='".$value[0]."'>
                            </td>
                            </form>
                            </tr>"; // value[0] renvoie l'id
            } 
    }
}

?>