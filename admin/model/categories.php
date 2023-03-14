<?php
require_once('database.php');




function adCat($categories,$enable)
{
    $db = dbconnect();
    $nom = strip_tags($categories);
    $is_enable = strip_tags($enable);
    $query = 'INSERT INTO categories(name,is_enable) VALUES (:nom,:is_enable)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_INT);
    $req->execute();
}
