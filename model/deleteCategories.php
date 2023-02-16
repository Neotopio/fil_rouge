<?php
require('../database.php');
$id = $_GET['id'];
$query = 'DELETE FROM categories WHERE id=:id'; 
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_STR);
$req->execute();
header("location: ../admin.php");
?>