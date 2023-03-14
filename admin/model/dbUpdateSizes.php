<?php
require_once('../database.php');
function updateSizes($a, $b, $c)
{
    $db = dbconnect();
    $nom = strip_tags($a);
    $enable = strip_tags($b);
    $id = $c;
    $query = 'UPDATE sizes SET id=:id , size = :nom, is_enable = :is_enable WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->execute();
}
