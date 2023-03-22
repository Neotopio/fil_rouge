<?php


require_once('../database.php');

function cartsVue()
{
    $id=stripslashes($_SESSION['identClient']);
    $db = dbconnect();
    $sql = 'SELECT *  FROM carts INNER JOIN products ON id_product= products.id WHERE ident_clients=:id ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $carts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $carts;
}
function totalCarts(){
    $resultat=0;
    $carts=cartsVue();
    foreach($carts as $cart){
        $resultat+=$cart['price']*$cart['quantity'];
    }
    return $resultat;
}