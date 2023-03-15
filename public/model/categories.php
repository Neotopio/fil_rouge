<?php
require_once('database.php');

function categoriesVue()
{
    $db = dbconnect();
    $sql = 'SELECT *  FROM categories INNER JOIN sub_categories ON id_categories= categories.id  ';
    $query = $db->prepare($sql);
    $query->execute();
    $categories = $query->fetchAll(PDO::FETCH_ASSOC);
    return $categories;
}
