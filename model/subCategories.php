<?php
require_once('database.php');

function adSubCat($nom,$id_categories){
    $db=dbconnect();
    $query = 'INSERT INTO sub_categories(name,id_categories) VALUES (:nom,:id_categories)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
   
    $req->bindValue(':id_categories', $id_categories, PDO::PARAM_STR);
    $req->execute();
    header('location: ../admin.php');
}


