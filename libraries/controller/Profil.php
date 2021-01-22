<?php

namespace Controller;

require_once($utils);

class Profil{

    public $login = "";
    public $password = ""; //facultatif

    public function profil($login, $password, $confirm_password, $email)
    {

        $modelInscription = new \Models\Profil();

        $this->login = $modelInscription->secure($_POST['login']);
        $this->password = $modelInscription->secure($_POST['password']);        //securisé    
        $this->email = $modelInscription->secure($_POST['email']);
        $confirm_password = $modelInscription->secure($_POST['confirm_password']);                 

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

                    $modelProfil = new \Models\Profil();
                    $fetch_utilisateur = $modelProfil->findAll($login); // je trouve mon id en dehors des session 
                    $new_name = $modelProfil->ifExist($login); // mon nouveau pseudo existe-t-il ? 
                
                    if (!$new_name) {

                        if ($_POST['password'] == $_POST['confirm_password']) {

                            $cryptedpassword =  password_hash($password, PASSWORD_BCRYPT);
                            $modelProfil->secure($login); 
                            $modelProfil->secure($cryptedpassword);
                            
                            
                            $newSession = $modelProfil->update($login, $cryptedpassword, $email, $fetch_utilisateur['id']); // GG WP
                            echo "changement(s) effectué(s)";
                            $_SESSION['utilisateur'] = $newSession;
                        } 
                        else {
                            $errorLog = "<p class='alert alert-danger' role='alert'>Confirmation du mot de passe incorrect</p>";
                        }
                    } 
                    else {
                        $errorLog = "<p class='alert alert-danger' role='alert'>identifiant déjà pris</p>";
                    }
                } 
                else {
                    $errorLog = "<p class='alert alert-danger' role='alert'>mdp et identifiant limités a 30 caractères</p>";
                }
            } 
            else {
                $errorLog = "<p class='alert alert-danger' role='alert'>2 caracteres minimum pour le login et 5 pour le mot de passe</p>";
            }
        }
         else {
            $errorLog = "<p class='alert alert-danger' role='alert'>Veuillez entrer des caracteres dans les champs</p>";
        }
    echo $errorLog;
    }
}