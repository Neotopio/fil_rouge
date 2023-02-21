<?php
require_once('database.php');




function adCat($categories)
{
    $db = dbconnect();
    $nom = strip_tags($categories);
    $query = 'INSERT INTO categories(name) VALUES (:nom)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->execute();
}
