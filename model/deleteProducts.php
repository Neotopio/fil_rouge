<?php

require('../database.php');


function getIdPicture($id)
{
    $db = dbconnect();
    $query = 'SELECT id_picture FROM products_pictures WHERE id_product = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $dels = $req->fetchAll(PDO::FETCH_ASSOC);
    return $dels;
}
function deletePictures($idPicture)
{
    $dels = $idPicture;
    $db = dbconnect();

    foreach ($dels as $val) {
        foreach ($val as $del) {
            var_dump($del);
            $pict = 'SELECT * FROM pictures WHERE id=' . $del . '';
            $picture = $db->prepare($pict);
            // $picture->bindValue(':id', $del, PDO::PARAM_INT);
            $picture->execute();


            while ($value = $picture->fetch(PDO::FETCH_ASSOC)) {
                var_dump($value);
                unlink('../' . $value['chemin']);
                $delPicture = 'DELETE FROM pictures WHERE id=:id';
                $pic = $db->prepare($delPicture);
                $pic->bindValue(':id', $value['id'], PDO::PARAM_INT);
                $pic->execute();
            }
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
function deleteProductsPictureOnly($id)
{
    $db = dbconnect();
    $query = 'DELETE FROM products_pictures WHERE id_picture=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}

function deletePicturesOnly($idPicture)
{
    $dels = $idPicture;
    $db = dbconnect();
    $delPicture = 'DELETE FROM pictures WHERE id=:id';
    $pic = $db->prepare($delPicture);
    $pic->bindValue(':id', $dels, PDO::PARAM_INT);
    $pic->execute();
}
