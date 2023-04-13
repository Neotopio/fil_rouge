<?php
session_start();
require_once('../model/createClient.php');


if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['first_name']) && !empty($_POST['first_name']))
    && (isset($_POST['email']) && !empty($_POST['email']))
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    && (isset($_POST['adress']) && !empty($_POST['adress']))
    && (isset($_POST['cp']) && !empty($_POST['cp']))
    && (isset($_POST['city']) && !empty($_POST['city']))
    && (isset($_POST['password']) && !empty($_POST['password']))

) {
    if ($_POST['password'] == $_POST['passwordVerify']) {
        if (verifyEmail() == true) {
            $_SESSION['echec_message'] = "Cette email est déja inscris merci de vous connecter ou de rentrer un autre email";
            header('location:../public/index.php?action=createAccount');
        } else {
            adClient();
            $_SESSION['sucess'] = "Votre compte a était crée avec succés";

            header('location:../public/index.php?action=connection');
        }
    } 
    
    else {
        $_SESSION['echec_message'] = "Vos mots de passes sont differents merci d'écrire les memes";
        header('location:../public/index.php?action=createAccount');
    }
    
}
else {
        $_SESSION['echec_message'] = "Merci de remplir tous les champs";
        header('location:../public/index.php?action=createAccount');
    }
