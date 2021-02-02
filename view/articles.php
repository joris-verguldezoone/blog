<?php
session_start();
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require_once('../libraries/models/Connexion.php');
require("../libraries/models/Admin.php");
require_once('../libraries/Controller/Article.php');
require_once('../libraries/Models/Article.php');

//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Articles";
$footer = "../css/footer.css";

//FORM 
$articlesForm = 'articles.php';

//PATHS
$inscription = "inscription.php";
$connexion = "connexion.php";
$profil = "profil.php";
$planning = "planning.php";
$reservation = "reservation-form.php";
$index = "../index.php";
$indexoff = "../index.php?off=1";

//HEADER
require('../require/html_/header.php');




if(isset($_GET['idCategorie'])){
    $articleController = new \Controller\Article();
    $articleController->articleByCategorieDisplay($_GET['idCategorie']);
}
if(!isset($_GET['idCategorie'])){
    $modelArticleDisplay = new \Models\Connexion();
$Articles = $modelArticleDisplay->findAllandAffArticles();
}
$page = 1;

if (isset($_GET['page'])){
    $page = $_GET['page'];
}

?>
    <main>
        <?php

        $pageArticles = '';

        // On limite déjà nos articles
        define("parPage", 5);
        // On sélectionne les bons nombres d'articles et les articles correspondant à la page
        $z = -1;
        // var_dump($Articles);
        for ($i = (parPage) * ($page-1); $i < parPage * $page && $i < count($Articles); $i++){
            
            $z = $z +1;
           while (isset($Articles)) {
               $id = $Articles[$i][0];
               $descriptionLimit = $modelArticleDisplay->descriptionLimit($Articles[$i][2]);
               echo 
               "<br /><form method='GET' action='article.php'><input type='hidden' name='articleSelected' id='hiddenId' value='".$id."'><button type='submit'>".$Articles[$i][1]."<br />"
               .$descriptionLimit."<br />"
               .$Articles[$i][3]."<br />"
               .$Articles[$i][4]."<br />"
               .$Articles[$i][5]."</button><br /></form>";
               
                break; // ce break permet de garde la structure de 5 par 5
                
            }
            
        }
        

        // On initialise
        $page_item = '';
        $start = 0;

        $limite = " limite " . $start . "," . parPage;

        $row_count = count($Articles);

        if (!empty($row_count)){
            $page_count = ceil($row_count/parPage);
            if ($page_count>1){
                for ($i=1;$i<=$page_count;$i++) {
                    if ($i == $page) {
                        $page_item .= '<input type="submit" name="page" value="' . $i . '" class="pagination_btn current">';
                    } else {
                        $page_item .= '<input type="submit" name="page" value="' . $i . '" class="pagination_btn">';
                    }
                }
            }
            $page_item .= '</div>';
        }

        echo "<form method='get' action='articles.php'>";

        echo $page_item;

        echo "</form>";
        // $e = 0; 
        // while ($e < 20) {
        //     $limited = $modelArticleDisplay->descriptionLimit($Articles[$e][1]);
        //     var_dump($limited);
        //     echo 
        //     "<br />".$Articles[$e][0]."<br />".
        //      $limited."<br />"
        //      .$Articles[$e][2]."<br />"
        //      .$Articles[$e][3]."<br />"
        //      .$Articles[$e][4]."<br />";
        //     $e++;
        // }
        ?>



    </main>

<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>