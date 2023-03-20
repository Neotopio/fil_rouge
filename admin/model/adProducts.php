<?php
require_once('../database.php');




function adProduct($price, $name, $description, $enable, $sousCat)
{
    $db = dbconnect();
    $ident_time = time();

    $query = 'INSERT INTO products(ident_time,price,name,description,is_enable,id_sous_categories) VALUES (:ident_time,:price,:name,:description,:is_enable,:id_sous_categories)';
    $req = $db->prepare($query);
    $req->bindValue(':ident_time', $ident_time, PDO::PARAM_INT);
    $req->bindValue(':price', $price, PDO::PARAM_STR);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':id_sous_categories', $sousCat, PDO::PARAM_INT);
    $req->execute();
}


function adPicturesProducts()
{
   $files = reArrayImages($_FILES['pictures']);

    $db = dbconnect();
    foreach ($files as $file) {
        if ($file['size'] <= 1000000) {
            $fileInfo = pathinfo($file['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {
               
                move_uploaded_file($file['tmp_name'], '../uploads/' . basename($file['name']));
                $screenshot = 'uploads/' . basename($file['name']);
         
                $query = 'INSERT INTO pictures (chemin,name) VALUES (:chemin,:nom)';
                $pic = $db->prepare($query);
               
                $pic->bindValue(':chemin', $screenshot, PDO::PARAM_STR);
                $pic->bindValue(':nom', basename($file['name']), PDO::PARAM_STR);
                $pic->execute();
  


                $idProducts = getLastIdProducts();
                $idPictures = getLastIdPicture();


                $insert = 'INSERT INTO products_pictures (id_product,id_picture) VALUES (:id_products,:id_pictures)';
                $pro = $db->prepare($insert);
                $pro->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
                $pro->bindValue(':id_pictures', $idPictures, PDO::PARAM_INT);
                $pro->execute();
            } else {
                echo 'Le format du fichier n\'est pas autorisé. Merci de n\'envoyer que des fichiers .jpg, .jpeg, .png ou .gif';

                exit;
            }
        } else {
            echo 'Le fichier dépasse la taille autorisée';
            exit;
        }
    }
}

function getLastIdProducts()
{
    $db = dbconnect();
    $query = 'SELECT id FROM products ORDER BY id DESC LIMIT 1';
    $req = $db->prepare($query);
    $req->execute();
    $idProducts = $req->fetch();
    return $idProducts['0'];
}
function getLastIdPicture()
{
    $db = dbconnect();
    $query = 'SELECT id FROM pictures ORDER BY id DESC LIMIT 1';
    $req = $db->prepare($query);
    $req->execute();
    $idPictures = $req->fetch();
    return $idPictures['0'];
}

function adOption()
{
    $db = dbconnect();
    $idProducts = getLastIdProducts();
    foreach ($_POST['color'] as $color) {
        foreach ($_POST['size'] as $size) {
            $insert = 'INSERT INTO options(id_product,id_size, id_color) VALUES (:id_products,:id_size, :id_color)';
            $query = $db->prepare($insert);
            $query->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
            $query->bindValue(':id_size', $size, PDO::PARAM_INT);
            $query->bindValue(':id_color', $color, PDO::PARAM_INT);
            $query->execute();
        }
    }
    
}

function reArrayImages($file_post)
{
    $file_ary = [];
    $file_keys = array_keys($file_post);
    foreach ($file_post as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $file_ary[$key2][$key] = $value2;
        }
    }
    return $file_ary;
}
