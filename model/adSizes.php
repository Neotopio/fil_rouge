<?php
require_once('database.php');




function adSize($sizes)
{
    $db = dbconnect();
    $nom = strip_tags($sizes);
    $query = 'INSERT INTO sizes(size) VALUES (:nom)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->execute();
}
