<?php
require_once('database.php');

function subCategories($id){

$db=dbconnect();


$sqlQuery = 'SELECT * FROM categories INNER JOIN sub_categories ON id_categories= categories.id WHERE categories.id = :id';
$subCategories = $db->prepare($sqlQuery);
$subCategories->bindValue(':id', $id, PDO::PARAM_INT);

$subCategories->execute();
$subs = $subCategories->fetchAll();
return  $subs;
}