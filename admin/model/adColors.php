<?php
require_once('database.php');




function adColor($colors,$enable)
{
    $db = dbconnect();
    $nom = strip_tags($colors);
    $is_enable = strip_tags($enable);
    $query = 'INSERT INTO colors(color,is_enable) VALUES (:nom,:is_enable)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_STR);
    $req->execute();
}
