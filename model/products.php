<?php
require_once('../database.php');
function products($id)
{
    $db = dbconnect();
    $sql = 'SELECT products.id as pid,products.name as pn,products.description,products.id_sous_categories ,products_pictures.id_product,products_pictures.id_product,pictures.chemin,products.id_sous_categories 
            FROM products 
            INNER JOIN products_pictures ON products.id =products_pictures.id_product
            INNER JOIN pictures ON products_pictures.id_picture=pictures.id  
            WHERE products.id_sous_categories=:id AND products.is_enable=1
            GROUP BY products.name
            ORDER BY products.id 
            ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $product = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $product;
}

function productsSearch($search)
{

    $db = dbconnect();
    $sql = 'SELECT p.id as pid,p.name as pn,p.description,p.id_sous_categories ,pp.id_product,pp.id_product,pc.chemin,p.id_sous_categories 
    FROM products as p 
    INNER JOIN products_pictures as pp ON p.id = pp.id_product 
    INNER JOIN pictures as pc ON pp.id_picture = pc.id 
    WHERE p.name 
    LIKE "%'.$search.'%" AND p.is_enable = 1 
    GROUP BY pn 
    ORDER BY p.id;';
    $query = $db->prepare($sql);
    $query->bindValue(':search', $search, PDO::PARAM_STR);
    $query->execute();
    $product = $query->fetchAll(PDO::FETCH_ASSOC);  
    return  $product;
}
