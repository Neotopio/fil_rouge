<?php
require_once('database.php');




function adColor($colors)
{
    $db = dbconnect();
    $nom = strip_tags($colors);
    $query = 'INSERT INTO colors(color) VALUES (:nom)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->execute();
}
