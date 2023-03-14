<?php
require('../database.php');
$db= dbconnect();
$id = $_GET['id'];
$query = 'DELETE FROM sizes WHERE id=:id'; 
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_STR);
$req->execute();
header("location:../admin.php?page=sizes");
