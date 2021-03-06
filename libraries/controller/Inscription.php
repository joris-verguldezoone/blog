<?php

namespace Controller;

require_once($Http);
require_once($utils);

class Inscription // s'appel User
{
    public $login = "";
    public $password = "";
    public $email = "";
    public $id_droits;

    public function register($login, $password, $confirm_password, $email)
    {
        $modelInscription = new \Models\Inscription();
        $this->login = $modelInscription->secure($_POST['login']);
        $this->password = $modelInscription->secure($_POST['password']);        //securisé    
        $this->email = $modelInscription->secure($_POST['email']);

        $confirm_password = $modelInscription->secure($_POST['confirm_password']);                 // récupération valeurs $_POST, son droit est utilisateur a l'inscription
        $id_droits = 1; // initialisation a utilisateur classique

        

        $errorLog = null;
        if (!empty($login) && !empty($password) && !empty($confirm_password) && !empty($email)) { // si les champs sont vides alors $errorLog

            $login_len = strlen($login);
            $password_len = strlen($password);
            $confirm_password_len = strlen($confirm_password);
            $email_len = strlen($email);
            if (($login_len >= 2) && ($password_len  >= 5) && ($confirm_password_len >= 4) && ($email_len>=7)) 
            { // limite minimum de caractere

                if (($login_len <= 30) && ($password_len <= 30) && ($confirm_password_len <= 30) && ($email_len<=30)) 
                { // limite maximum de caractere
                    $existLogin = $modelInscription->ifExist($login); // l'utilisateur existe-t-il ? 
                    $existEmail = $modelInscription->ifExist($email); // l'email est-il déjà utilisé ?
                    if (!$existLogin) 
                    {
                        if (!$existEmail) 
                        {
                            if ($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                            {
                                
                                $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                                $modelInscription->insert($login, $cryptedpass,$email, $id_droits);

                                $Http = new \Http();
                                $Http->redirect('connexion.php'); // GG WP
                            } else $errorLog = "<p class='alert alert-danger' role='alert'>Confirmation du mot de passe incorrect</p>";
                            
                        } else $errorLog = "<p class='alert alert-danger' role='alert'>Email déjà utilisé</p>";
                        
                    } else $errorLog = "<p class='alert alert-danger' role='alert'>Identifiant déjà utilisé</p>";
                    
                } else $errorLog = "<p class='alert alert-danger' role='alert'>mdp et identifiant limités a 30 caractères</p>";
                
            } else $errorLog = "<p class='alert alert-danger' role='alert'>login, doit avoir 2 caracteres minimum, le mdp doit avoir 5 caracteres minimum</p>";
            
        } else  {$errorLog = "<p class='alert alert-danger' role='alert'>Champs non remplis</p>";
                }
    echo $errorLog;
    }


    

    
}
