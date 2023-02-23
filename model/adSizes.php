<?php
require_once('database.php');




function adSize($sizes,$enable)
{
    $db = dbconnect();
    $nom = strip_tags($sizes);
    $is_enable= strip_tags($enable);
    $query = 'INSERT INTO sizes(size,is_enable) VALUES (:nom,:is_enable)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_INT);
    $req->execute();
}
