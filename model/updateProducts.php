<?php

require_once('database.php');

function productsVue($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM products WHERE id = :id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $productsStatement->execute(array(
        'id' => $id,
    ));
    $productsStatement->execute();
    $products = $productsStatement->fetchAll();


    return $products;
}
function photoVue($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM pictures INNER JOIN products_pictures ON id = id_picture WHERE id_product =:id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $productsStatement->execute(array(
        'id' => $id,
    ));
    $productsStatement->execute();
    $photos = $productsStatement->fetchAll();

   
    return $photos;
}

