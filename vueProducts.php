<?php
require_once('database.php');

if (isset($_GET['identCat'])) {
    $id = $_GET['identCat'];
   
    $db=dbconnect();
    
    
    $sqlQuery = 'SELECT * FROM categories INNER JOIN sub_categories ON id_categories= categories.id WHERE categories.id = :id';
    $subCategories = $db->prepare($sqlQuery);
    $subCategories->bindValue(':id', $id, PDO::PARAM_INT);
    
    $subCategories->execute();
    $data =json_encode( $subCategories->fetchAll());




    echo $data;
} else {
    echo 'missing parameter';
}


    