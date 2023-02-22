<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location:template/loginAdmin.php");
    exit();
}

require_once('controllers/vueCategories.php');
require_once('controllers/subCategories.php');
require_once('controllers/adCategories.php');
require_once('controllers/colors.php');
require_once('controllers/sizes.php');
require_once('controllers/adColors.php');
require_once('controllers/adSizes.php');

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
    }elseif ($page == 'updateCategories') {
        vueUpdateCategories($_GET['id']);
    } elseif ($page == 'updateSubCategories') {
        vueUpdateSubCategories($_GET['id']);
    }
    elseif ($page == 'colors') {
        colors();
    }elseif ($page == 'sizes') {
        sizes();
    }elseif ($page == 'adColors') {
        vueAdColors();
    }elseif ($page == 'adSizes') {
        vueAdSizes();
    }
   
    else {
        vueCategories();
    }
} else {
    vueCategories();
}
