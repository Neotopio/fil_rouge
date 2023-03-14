<?php
require_once('../model/deleteProducts.php');


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    deleteProductsPictureOnly($id);
    deletePicturesOnly($id);
    header("location: ../admin.php?page=products");
}
