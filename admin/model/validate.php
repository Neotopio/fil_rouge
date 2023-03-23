<?php
session_start();
require('../database.php');

function clearCart()
{
  $time = time();
  $db = dbconnect();
  $sql = 'SELECT *  FROM carts';
  $cart = $db->prepare($sql);

  $cart->execute();
  $carts = $cart->fetchAll(PDO::FETCH_ASSOC);
  foreach ($carts as $cart) {
    if ($cart['time'] + 86400 < $time) {
      $query = 'DELETE FROM carts WHERE id=:id AND id_client=NULL' ;
      $req = $db->prepare($query);
      $req->bindValue(':id', $cart['id'], PDO::PARAM_STR);
      $req->execute();
    }
  }
}

$db = dbconnect();


$username = ($_POST["nom"]);
$password = ($_POST["password"]);
$stmt = $db->prepare('SELECT * FROM admins WHERE name = :nom');
$stmt->bindValue(":nom", $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();

if (($user['name'] == $username) && (password_verify($password, $user['password']))) {
  $_SESSION['nom'] = $username;
  header("location:../admin.php");
  clearCart();
} else {
  
  header("location:../template/loginAdmin.php");
  die();
}
