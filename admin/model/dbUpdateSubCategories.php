<?php
require_once('../database.php');
function updateSubCategories($a, $b, $c)
{
    $db = dbconnect();
    $nom = strip_tags($a);
    $enable = strip_tags($b);
    $id = $c;
    $query = 'UPDATE sub_categories SET id=:id , name = :nom, is_enable = :is_enable WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->execute();
}
