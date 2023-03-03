<?php

require('../database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idPicture =  getIdPicture($id);
    deleteProductsPicture($id);
    deleteOptions($id);
    deletePictures($id);
    deleteProducts($id);
}

function getIdPicture($id)
{
    $db = dbconnect();
    $query = 'SELECT id_picture FROM products_pictures WHERE id_product = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $dels = $req->fetchAll();
    return $dels;
}
function deletePictures($idPicture)
{
    $dels = $idPicture;
    $db = dbconnect();

    foreach ($dels as $del) {

        $pict = 'SELECT * FROM pictures WHERE id = :id';
        $picture = $db->prepare($pict);
        $picture->bindValue(':id', $del, PDO::PARAM_INT);
        $picture->execute();
        $pictures = $picture->fetchAll();

        foreach ($pictures as $value) {

            unlink('../' . $value['chemin']);
            $delPicture = 'DELETE FROM pictures WHERE id = :id';
            $pic = $db->prepare($delPicture);
            $pic->bindValue(':id', $value['id'], PDO::PARAM_INT);
            $pic->execute();
        }
    }
}
function deleteProductsPicture($id)
{
    $db = dbconnect();
    $query = 'DELETE FROM products_pictures WHERE id_product=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}

function deleteOptions($id)
{
    $db = dbconnect();
    $query = 'DELETE FROM options WHERE id_product=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}


function deleteProducts($id)
{

    $db = dbconnect();
    $query = 'DELETE FROM products WHERE id=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    header("location: ../admin.php?page=products");
}
