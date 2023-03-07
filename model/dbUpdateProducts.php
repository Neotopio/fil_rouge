<?php
require_once('../database.php');




function updateProducts($id,$price, $name, $description, $enable, $sousCat)
{
    $db = dbconnect();
    $ident_time = time();

    $query = 'UPDATE products SET id=:id , ident_time = :ident_time, is_enable = :is_enable, name=:name,description=:description,id_sous_categories=:id_sous_categories,price=:price WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':ident_time', $ident_time, PDO::PARAM_INT);
    $req->bindValue(':price', $price, PDO::PARAM_STR);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':id_sous_categories', $sousCat, PDO::PARAM_INT);
    $req->execute();
}

function updateOptions($id)
{
    $db = dbconnect();

    foreach ($_POST['color'] as $color) {
        foreach ($_POST['size'] as $size) {
            $insert = 'UPDATE options SET id_product=:id,id_color=:id_color,id_size=:id_size  WHERE id_product=:id  ';
            $query = $db->prepare($insert);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->bindValue(':id_size', $size, PDO::PARAM_INT);
            $query->bindValue(':id_color', $color, PDO::PARAM_INT);
            $query->execute();
        }
    }
}
