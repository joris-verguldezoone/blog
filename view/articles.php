<?php
session_start();
//LIBRARIES
$Http = "../libraries/Http.php";
$database = '../libraries/database.php';
$utils = '../libraries/utils.php';
require_once('../libraries/models/Connexion.php');


//CSS
$headerCss = "../css/header.css";
$pageCss = "../css/article.css";
$Pagenom = "Articles";
$footer = "../css/footer.css";


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

$modelArticleDisplay = new \Models\Connexion();
$Articles = $modelArticleDisplay->findAllandAffArticles();

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
        for ($i = (parPage) * ($page-1); $i < parPage * $page && $i < count($Articles); $i++){
           var_dump($Articles[$i]);
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
        ?>



    </main>

<?php
//FOOTER
$img_cindy = '../images/rondoudou.png';
$img_joris = '../images/netero.png';
require_once('../require/html_/footer.php');
?>