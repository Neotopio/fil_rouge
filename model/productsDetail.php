<?php
require_once('../database.php');
function productsDetail($id)
{
    $db = dbconnect();
    $sql = 'SELECT products.id,products.name as product_name,products.description,products.id_sous_categories ,products_pictures.id_product,products_pictures.id_product,pictures.chemin,products.id_sous_categories 
            FROM products 
            INNER JOIN products_pictures ON products.id =products_pictures.id_product
            INNER JOIN pictures ON products_pictures.id_picture=pictures.id  
            WHERE products.id=:id
            ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $product = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $product;
}

function optionsDetail($id)
{
    $db = dbconnect();
}
