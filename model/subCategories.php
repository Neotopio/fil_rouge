<?php
require("../database.php");
$nom = "";


$req = '';


if (
    (!isset($_POST['sub_categories']) || empty($_POST['sub_categories']))
    || (!isset($_POST['subCategoriesCategories']) || empty($_POST['subCategoriesCategories']))
       
) {
} else {
    $nom = strip_tags($_POST['sub_categories']);
  
    $id_categories = strip_tags($_POST['subCategoriesCategories']);
    echo 'les information sont envoyer';
    $query = 'INSERT INTO sub_categories(name,id_categories) VALUES (:nom,:id_categories)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
   
    $req->bindValue(':id_categories', $id_categories, PDO::PARAM_STR);
    $req->execute();
    header('location: ../admin.php');
}