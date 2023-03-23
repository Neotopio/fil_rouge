<?php

require_once('../database.php');



function createOrders()
{
    $ident_orders = time();
    $db = dbconnect();
    $sql = 'SELECT *  FROM client WHERE email=:email  ';
    $user = $db->prepare($sql);
    $user->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
    $user->execute();
    $clients = $user->fetchAll(PDO::FETCH_ASSOC);
    $name = $clients['0']['name'];
    $first_name = $clients['0']['first_name'];
    $adresse = $clients['0']['adress'] . ' ' . $clients['0']['cp'] . ' ' . $clients['0']['city'];



    $query = 'UPDATE carts SET id_client=:id_client,ident_orders=:ident_orders WHERE ident_clients=:ident_clients ';
    $req = $db->prepare($query);
    $req->bindValue(':ident_clients', $_SESSION['identClient'], PDO::PARAM_INT);
    $req->bindValue(':ident_orders', $ident_orders, PDO::PARAM_INT);
    $req->bindValue(':id_client', $clients['0']['id'], PDO::PARAM_INT);
    $req->execute();

    $carts = cartsVue();

    foreach ($carts as $cart) {
        $query = 'INSERT INTO orders(id_product,name_product,description,price,quantity,name_client,first_name_client,adress,email_client,ident_orders,size,color) 
                    VALUES (:id_product,:name_product,:description,:price,:quantity,:name_client,:first_name_client,:adress,:email_client,:ident_orders,:size,:color)';
        $orders = $db->prepare($query);
        $orders->bindValue(':id_product', $cart['id_product'], PDO::PARAM_INT);
        $orders->bindValue(':name_product', $cart['name'], PDO::PARAM_STR);
        $orders->bindValue(':description', $cart['description'], PDO::PARAM_STR);
        $orders->bindValue(':price', $cart['price'], PDO::PARAM_INT);
        $orders->bindValue(':quantity', $cart['quantity'], PDO::PARAM_INT);
        $orders->bindValue(':name_client', $name, PDO::PARAM_STR);
        $orders->bindValue(':first_name_client', $first_name, PDO::PARAM_STR);
        $orders->bindValue(':adress', $adresse, PDO::PARAM_STR);
        $orders->bindValue(':email_client', $_SESSION['email'], PDO::PARAM_STR);
        $orders->bindValue(':ident_orders', $ident_orders, PDO::PARAM_INT);
        $orders->bindValue(':size', $cart['size'], PDO::PARAM_STR);
        $orders->bindValue(':color', $cart['color'], PDO::PARAM_STR);
        $orders->execute();
       
        
    }
}
