<?php
require_once('../database.php');


function adCarts(){
    $db = dbconnect();
    $ident_clients=$_SESSION['identClient'];
    $product=strip_tags($_POST['id']);
    $price=strip_tags($_POST['price']);
    $quantity=strip_tags($_POST['quantity']);
    $size=strip_tags($_POST['size']);
    $color=strip_tags($_POST['color']);
  
    $query = 'INSERT INTO carts(ident_clients,product,price,quantity,size,color) VALUES (:ident_clients,:product,:price,:quantity,:size,:color)';
    $req = $db->prepare($query);
    $req->bindValue(':ident_clients', $ident_clients, PDO::PARAM_INT);
    $req->bindValue(':product', $product, PDO::PARAM_INT);
    $req->bindValue(':price', $price, PDO::PARAM_INT);
    $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $req->bindValue(':size', $size, PDO::PARAM_STR);
    $req->bindValue(':color', $color, PDO::PARAM_STR);
    $req->execute();
}