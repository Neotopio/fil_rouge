<?php
require_once('../database.php');
$id=20;
$db = dbconnect();
$query = 'SELECT id_picture FROM products_pictures WHERE id_product = :id';
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();
$dels = $req->fetchAll();

foreach ($dels as $del) {

    $pict = 'SELECT * FROM pictures WHERE id = :id';
    $picture = $db->prepare($pict);
    $picture->bindValue(':id', $del, PDO::PARAM_INT);
    $picture->execute();
    $pictures = $picture->fetchAll();

    foreach ($pictures as $value) {
 echo file_exists('../'.$value['chemin']);
    }
}