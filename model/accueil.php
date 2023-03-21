<?php
require_once('../database.php');
function accueilVue()
{
    $db = dbconnect();
    $sql = 'SELECT id_sous_categories, products.id,products.name as product_name,products.description,products_pictures.id_product,products_pictures.id_product,pictures.chemin  
            FROM products 
            INNER JOIN products_pictures ON products.id =products_pictures.id_product
            INNER JOIN pictures ON products_pictures.id_picture=pictures.id  
            GROUP BY products.name
            ORDER BY products.id DESC LIMIT 8';
    $query = $db->prepare($sql);
    $query->execute();
    $product = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $product;
}
