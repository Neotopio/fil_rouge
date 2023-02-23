<?php
require_once('database.php');

function adSubCat($nom,$id_categories,$enable){
    $db=dbconnect();
    $query = 'INSERT INTO sub_categories(name,is_enable,id_categories) VALUES (:nom,:is_enable,:id_categories)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_STR);
    $req->bindValue(':id_categories', $id_categories, PDO::PARAM_STR);
    $req->execute();
    header('location: ../admin.php');
}


