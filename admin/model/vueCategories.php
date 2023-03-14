<?php
require_once('database.php');
function categories()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `categories`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
