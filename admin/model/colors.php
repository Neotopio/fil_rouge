<?php
require_once('database.php');
function color()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `colors`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $colors = $query->fetchAll(PDO::FETCH_ASSOC);
    return $colors;
}