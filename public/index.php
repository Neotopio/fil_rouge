<?php
session_start();
$ident_client = time();
if (!isset($_SESSION['identClient'])) {
    $_SESSION['identClient'] = $ident_client;
}
if (isset($_GET['action'])) {
    $page = strval($_GET['action']);
    if ($page == 'connection') {
        require_once('../controllers/connection.php');
        connectionVue();
    } elseif ($page == 'createAccount') {
        require_once('../controllers/createAccount.php');
        createAccountVue();
    } elseif ($page == 'products') {
        require_once('../controllers/products.php');
        if (isset($_POST['search'])) {
            productsVueSearch($_POST['search']);
        } else {
            productsVue($_GET['id']);
        }
    } elseif ($page == 'productsDetail') {
        require_once('../controllers/productsDetail.php');
        productsDetailVue($_GET['id']);
    } elseif ($page == 'carts') {
        require_once('../controllers/carts.php');
        carts();
    } elseif ($page == 'contact') {
        require_once('../controllers/contact.php');
        contact();
    } elseif ($page == 'profile') {
        require_once('../controllers/updateProfile.php');
        profile();
    } else {
        require_once('../controllers/accueil.php');
        accueil();
    }
} else {
    require_once('../controllers/accueil.php');
    accueil();
}
