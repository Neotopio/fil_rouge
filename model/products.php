<?php
require_once('database.php');
function product()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `products`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}