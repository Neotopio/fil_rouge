<?php
require_once('../model/deleteProducts.php');


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $idPicture =  getIdPicture($id);
   
    deleteProductsPicture($id);
    deleteOptions($id);
    deletePictures($idPicture);
    deleteProducts($id);
    header("location: ../admin.php?page=products");
}
