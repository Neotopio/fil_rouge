<?php
require_once('../database.php');




function updateProducts($id, $price, $name, $description, $enable, $sousCat)
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
    $idProducts = $id;
    $query = $db->prepare('SELECT id_size, id_color FROM options WHERE id_product = :id_product');
    $query->bindValue(':id_product', $idProducts, PDO::PARAM_INT);
    $query->execute();
    $currentOptions = $query->fetchAll(PDO::FETCH_ASSOC);

    $selectedOptions = array();
    foreach ($_POST['color'] as $color) {
        foreach ($_POST['size'] as $size) {
            $selectedOptions[] = array('id_size' => $size, 'id_color' => $color);
        }
    }

    $optionsToDelete = array();
    foreach ($currentOptions as $option) {
        if (!in_array($option, $selectedOptions)) {
            $optionsToDelete[] = $option;
        }
    }

    foreach ($optionsToDelete as $option) {
        $delete = 'DELETE FROM options WHERE id_product = :id_product AND id_size = :id_size AND id_color = :id_color';
        $query = $db->prepare($delete);
        $query->bindValue(':id_product', $idProducts, PDO::PARAM_INT);
        $query->bindValue(':id_size', $option['id_size'], PDO::PARAM_INT);
        $query->bindValue(':id_color', $option['id_color'], PDO::PARAM_INT);
        $query->execute();
    }

    $optionsToAdd = array();
    foreach ($selectedOptions as $option) {
        if (!in_array($option, $currentOptions)) {
            $optionsToAdd[] = $option;
        }
    }

    foreach ($optionsToAdd as $option) {
        $insert = 'INSERT INTO options(id_product,id_size, id_color) VALUES (:id_products,:id_size, :id_color)';
        $query = $db->prepare($insert);
        $query->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
        $query->bindValue(':id_size', $option['id_size'], PDO::PARAM_INT);
        $query->bindValue(':id_color', $option['id_color'], PDO::PARAM_INT);
        $query->execute();
    }
}
