<?php
session_start();
require_once('../database.php');

$db = dbconnect();

$ident_clients = strip_tags($_SESSION['identClient']);
$id = strip_tags($_POST['productId']);
$quantity = strip_tags($_POST['quantity']);

$query = 'UPDATE carts SET quantity=:quantity WHERE ident_clients=:ident_clients AND id_product=:id';
$req = $db->prepare($query);
$req->bindValue(':ident_clients', $ident_clients, PDO::PARAM_INT);
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
$req->execute();


function getTotalCart()
{

    $id = stripslashes($_SESSION['identClient']);
    $db = dbconnect();
    $sql = 'SELECT *  FROM carts  WHERE ident_clients=:id ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $carts = $query->fetchAll(PDO::FETCH_ASSOC);
    $resultat = 0;
    foreach ($carts as $cart) {
        $resultat += $cart['price'] * $cart['quantity'];
    }
    return $resultat;
}



function getCartQuantity()
{
    $resultat = 0;
    $db = dbconnect();
    $sql = 'SELECT *  FROM carts WHERE ident_clients=:id_client ';
    $query = $db->prepare($sql);
    $query->bindValue(':id_client', $_SESSION['identClient'], PDO::PARAM_INT);
    $query->execute();
    $carts = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($carts as $cart) {
        $resultat += $cart['quantity'];
    }
    return $resultat;
}


$cartTotal = getTotalCart();
$cartQuantity = getCartQuantity();
$response = array("cartTotal" => $cartTotal, "cartQuantity" => $cartQuantity);
echo json_encode($response);
