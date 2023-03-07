<?php
require_once('../model/dbUpdateProducts.php');
require_once('../model/adProducts.php');



if ((isset($_POST['price']) || !empty($_POST['price']))
    || (isset($_POST['name']) || !empty($_POST['name']))
    || (isset($_POST['enable']) || !empty($_POST['enable']))
    || (isset($_POST['description']) || !empty($_POST['description']))
    || (isset($_POST['souscategories']) || !empty($_POST['sousCategories']))
    || (isset($_POST['color']) || !empty($_POST['color']))
    || (isset($_POST['size']) || !empty($_POST['size']))
) {
    $id = $_POST['id'];
    $price = strip_tags($_POST['price']);
    $name = strip_tags($_POST['name']);
    $description = strip_tags($_POST['description']);
    $enable = strip_tags($_POST['enable']);
    $sousCat = strip_tags($_POST['sousCategories']);
    updateProducts($id, $price, $name, $description, $enable, $sousCat);
    updateOptions($id);
   
    if ($_FILES['pictures']['name'][0] !== '') {

        adPicturesProducts();
    } else {
        header('location:../admin.php?page=products');
    }
} else {
    header('location:../admin.php?page=prodcuts');
}
