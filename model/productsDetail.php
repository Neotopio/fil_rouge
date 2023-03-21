<?php
require_once('../database.php');
function productsDetail($id)
{
    $db = dbconnect();
    $sql = 'SELECT*
            FROM products 
            
            WHERE products.id=:id
            ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $product = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $product;
}

function pictureProducts($id)
{
    $db=dbconnect();
    $sqlQuery = 'SELECT * FROM pictures INNER JOIN products_pictures ON id = id_picture WHERE id_product =:id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    
    $productsStatement->execute();
    $photos = $productsStatement->fetchAll();


    return $photos;
}

function optionsDetail($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM options WHERE id_product = :id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
   
    $productsStatement->execute();
    $options = $productsStatement->fetchAll(PDO::FETCH_ASSOC);


    return $options;
}

function colors(){
    $db = dbconnect();
    $sql = 'SELECT * FROM `colors`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $colors = $query->fetchAll(PDO::FETCH_ASSOC);
    return $colors;

}
function sizes(){
    $db = dbconnect();
    $sql = 'SELECT * FROM `sizes`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $colors = $query->fetchAll(PDO::FETCH_ASSOC);
    return $colors;
}