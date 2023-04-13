<?php
require_once('../database.php');
function updateProfil()
{

    $db = dbconnect();
    $sql = 'SELECT*
            FROM client 
            
            WHERE email=:email
            ';
    $query = $db->prepare($sql);
    $query->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
    $query->execute();

    $clients = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $clients;
}

function updateClient()
{
    $db = dbconnect();
    $id = strip_tags($_POST['id']);
    $name = strip_tags($_POST['name']);
    $first_name = strip_tags($_POST['first_name']);
    $email = strip_tags($_POST['email']);
    $adress = strip_tags($_POST['adress']);
    $cp = strip_tags($_POST['cp']);
    $city = strip_tags($_POST['city']);

    $query = 'UPDATE client SET id=:id , name = :name, first_name = :first_name,email=:email,adress=:adress,cp=:cp,city=:city WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':adress', $adress, PDO::PARAM_STR);
    $req->bindValue(':cp', $cp, PDO::PARAM_INT);
    $req->bindValue(':city', $city, PDO::PARAM_STR);
    $req->execute();
}
