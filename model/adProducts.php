<?php
require_once('../database.php');




function adProduct($price, $name, $description, $enable, $sousCat)
{
    $db = dbconnect();
    $ident_time = time();

    $query = 'INSERT INTO sizes(size,is_enable) VALUES (:nom,:is_enable)';
    $req = $db->prepare($query);
    $req->bindValue(':nom', $ident_time, PDO::PARAM_INT);
    $req->bindValue(':price', $price, PDO::PARAM_STR);
    $req->bindValue(':nom', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':id_sous_categories', $sousCat, PDO::PARAM_STR);
    $req->execute();
}
var_dump($_FILES['pictures']);
function adPicturesProducts()
{
    $db = dbconnect();
    foreach ($_FILES['pictures'] as $file) {

        if ($file['pictures']['size'] <= 1000000) {

            $fileInfo = pathinfo($file['pictures']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {

                move_uploaded_file($file['pictures']['tmp_name'], 'uploads/' . basename($file['pictures']['name']));
                $screenshot = 'uploads/' . basename($file['pictures']['name']);
                echo "L'envoi a bien été effectué !";
                $query = 'INSERT INTO pictures(chemin,name) VALUES (:chemin,:nom)';
                $req = $db->prepare($query);
                $req->bindValue(':chemin', $screenshot, PDO::PARAM_STR);
                $req->bindValue(':nom', basename($file['pictures']['name']), PDO::PARAM_STR);



                $req->execute();
                
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
