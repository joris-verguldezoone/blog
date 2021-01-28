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
                <ul id='menu'>
                    <a href='#'><li>Gestion</li></a>
                    <a href='#'><li>FPS</li></a>
                    <a href='#'><li>MMORPG</li></a>
                </ul>
            </div>";

if (!isset($_SESSION['connected'])) {

    echo "
        <div class= 'margin'>
            <a class='a_header' href='$index'><img src='images/logo.png' id='logo' alt ='logo'></a>
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
            <a class='a_header' href='$index'><img src='images/logo.png' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
        </div>
        <div class='margin'>
            <a class='a_header' href='$indexoff'>Déconnexion</a>
        </div>";
}

if (isset($_SESSION['modo'])) {
    echo "
        <div class= 'margin'>
            <a class='a_header' href='$index'><img src='images/logo.png' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
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
        <a class='a_header' href='$index'><img src='images/logo.png' id='logo' alt ='logo'></a>
        </div>
        <div class='margin'>    
            <a class='a_header' href='$profil'>Profil</a>
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