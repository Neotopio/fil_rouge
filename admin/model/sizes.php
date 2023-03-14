<?php
require_once('database.php');
function size()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `sizes`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $sizes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $sizes;
}

