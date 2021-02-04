<?php

echo "
<link rel='stylesheet' href='$footer'>
<footer>
<nav id='footer'>";
    
if (isset($_SESSION['connected'])) {
    echo "
    <div class='flex'>
        <div class='margin_foot'>    
            <a class='a_footer' href='$profil'>Profil</a>
        </div>
        <div class='margin_foot'>
            <a class='a_footer' href='$articles'>Articles</a>
        </div>
    </div>";
}
else{
echo "
<div class='flex'>
<div class='margin_foot'>
<a class='a_footer' href='$inscription'>Inscription</a>
</div>
<div class='margin_foot'>
<a class='a_footer' href='$connexion'>Connexion</a>    
</div>
</div>";
}

if (isset($_SESSION['utilisateur']['id_droits']) AND $_SESSION['utilisateur']['id_droits'] == 42) {
echo "
<div class='flex'>
<div class='margin_foot'>    
<a class='a_footer' href='$creerarticle'>Création d'un article</a>
</div>
</div>";

}

if (isset($_SESSION['utilisateur']['id_droits']) AND $_SESSION['utilisateur']['id_droits'] == 1337) {
echo "
<div class='flex'>
<div class='margin_foot'>    
<a class='a_footer' href='$creerarticle'>Création d'un article</a>
</div>
<div class='margin_foot'>    
<a class='a_footer' href='$admin'>Administration</a>
</div>
</div>";
}
echo "
</nav>
</section>";

            echo "
                <section>
                <div class='flex'>
                    <div class='footer_article_signature'>
                        <div>
                            <img alt='Cindy Dev' class='dev_img_dimension' src='$img_cindy'>
                            <p class='signature'>KIRITSHUKO</p>
                        </div>
                        <div>
                            <img alt='Joris Dev' class='dev_img_dimension_jo' src='$img_joris'>
                            <p class='signature'>HARDJOJO</p>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </body>
</html>";
?>