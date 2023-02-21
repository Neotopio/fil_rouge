<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location:template/loginAdmin.php");
    exit();
}

require_once('controllers/vueCategories.php');
require_once('controllers/subCategories.php');
require_once('controllers/adCategories.php');

if (isset($_GET['page'])) {
    $page = strval($_GET['page']);
    if ($page == 'categories') {
        vueCategories();
    } elseif ($page == 'subCategories') {
        vueSubCategories($_GET['id']);
    } elseif ($page == 'adCategories') {
        vueAdCategories();
    } 
    elseif ($page == 'adSubCategories') {
        vueAdSubCategories();
    }
    else {
        vueCategories();
    }
} else {
    vueCategories();
}
