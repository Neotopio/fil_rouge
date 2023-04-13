<?php

require_once('../database.php');


function verifyEmail()
{
    $db = dbconnect();
    $verif = 'SELECT * FROM client';
    $verifEmail = $db->prepare($verif);
    $verifEmail->execute();
    $verifEmails = $verifEmail->fetchAll(PDO::FETCH_ASSOC);

    foreach ($verifEmails as $verify) {
        if ($_POST['email'] == $verify['email']) {
            return true;
        }
    }
}
function adClient()
{
    $db = dbconnect();
    $name = stripslashes($_POST['name']);
    $first_name = stripslashes($_POST['first_name']);
    $email = stripslashes($_POST['email']);
    $adress = stripslashes($_POST['adress']);
    $cp = stripslashes($_POST['cp']);
    $city = stripslashes($_POST['city']);
    $passwords = stripslashes($_POST['password']);
    $password = password_hash($passwords, PASSWORD_DEFAULT);


    $query = "INSERT into `client` (name, first_name,email,adress,cp,city, password)
          VALUES (:name,:first_name,:email,:adress,:cp,:city,:password)";
    $req = $db->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':adress', $adress, PDO::PARAM_STR);
    $req->bindValue(':cp', $cp, PDO::PARAM_INT);
    $req->bindValue(':city', $city, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
    $req->execute();
}
