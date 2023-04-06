<?php
require_once('../database.php');
if(isset($_GET['id_carts'])){
    $db= dbconnect();
$id =strip_tags($_GET['id_carts']) ;
$query = 'DELETE FROM carts WHERE id_carts=:id'; 
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_STR);
$req->execute();
header("location:../public/index.php?action=carts");
}
else{
    header("location:../public/index.php?action=carts");
}