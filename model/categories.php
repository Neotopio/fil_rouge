<?php
require("../database.php");
$nom = "";


$req = '';





if (
    (!isset($_POST['categories']) || empty($_POST['categories']))
   



) {
} else {
    $nom = strip_tags($_POST['categories']);
  
    echo 'les information sont envoyer';
    $query = 'INSERT INTO categories(name) VALUES (:nom)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
 
    $req->execute();
    header('location: ../admin.php');
}




