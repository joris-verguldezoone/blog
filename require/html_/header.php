<?php

echo "
<!DOCTYPE HTML>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='$headerCss'>
    <link rel='stylesheet' href='$pageCss'>
    <title>$Pagenom</title>
</head>
<body>
    <header>
        <nav id='navigation'>
            <div id='menuToggle'>
                <input type='checkbox' />
                    <span></span>
                    <span></span>
                    <span></span>
                <ul id='menu'>";
                
               ?>
                <form method='GET' action='<?php echo $articlesForm;?>'> <!-- je differencie le GET et le POST selon si j'vais avoir besoin de donnees tel que l'id dans l'url + c pratik pour check -->
                    <label for="selectSearchCategory">Rechercher une catégorie</label>
                    <select name="selectSearchCategory">
                        <option value="">--Choisir--</option> <!-- jmet une option vide pcq sinon il compte pas l'option pre-selectionne ce fdp --> 

                        <?php
                        $modelArticle = new \Models\Admin();
                        $tableau = $modelArticle->findAllCategories();
                        foreach ($tableau as $key => $value) 
                        {
                            $nom = $value[0]; // 0 = nom 1 = id
                            $nom = str_replace(' ', '_', $nom); // a refactoriser plus tard en fonction d'appel \Models\
                            $nom = strtoupper($nom);
                            $id = $value[1];
        
                            echo "<option value=".$nom.">".$nom."</option>";  
                        }
                        ?> 
        
                    </select>
                    <button type='submit' id='submitSearchId' name='submitSearchCategory'>Rechercher</button>
                    <?php if(isset($_GET['selectSearchCategory'])) $_GET['selectSearchCategory'] = str_replace('_', ' ', $_GET['selectSearchCategory']);
                                                

                    ?>
                    </form>
<?php
                
                echo"
                </ul>
            </div>";

if (!isset($_SESSION['connected'])) {

    echo "
        <div class= 'margin'>
            <a class='a_header' href='$index'><img src='images/' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$inscription'>Inscription</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$connexion'>Connexion</a>    
        </div>";
}
if (isset($_SESSION['connected'])) {
    echo "
        <div class= 'margin'>
            <a class='a_header' href='$index'><img src='images/' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$article'>Articles</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$indexoff'>Déconnexion</a>
        </div>";
}

if (isset($_SESSION['modo'])) {
    echo "
        <div class= 'margin'>
            <a class='a_header' href='$index'><img src='images/' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$article'>Articles</a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$creerarticle'>Création d'un article</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$indexoff'>Déconnexion</a>
        </div>";
}

if (isset($_SESSION['admin'])) {
    echo "
        <div class= 'margin'>
        <a class='a_header' href='$index'><img src='images/' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$article'>Articles</a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$creerarticle'>Création d'un article</a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$admin'>Administration</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$indexoff'>Déconnexion</a>
        </div>";
}
echo "
    </nav>
</header>";
?>