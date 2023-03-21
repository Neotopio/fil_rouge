<?php
session_start();
require_once('../database.php');
$resultat=0;
$db = dbconnect();
$sql = 'SELECT *  FROM carts WHERE ident_clients=:id_client ';
$query = $db->prepare($sql);
$query->bindValue(':id_client', $_SESSION['identClient'], PDO::PARAM_INT);
$query->execute();
$carts = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($carts as $cart){
    $resultat+=$cart['quantity'];
}
var_dump($resultat);
if($resultat>0){
   // $response = array("totalQuantity" => $resultat);
    echo  json_encode($resultat);

} else {

  echo "0 résultats";
}