<?php
require_once('../controllers/accueil.php');
require_once('../controllers/connection.php');
require_once('../controllers/createAccount.php');
require_once('../controllers/products.php');

if (isset($_GET['action'])) {
    $page = strval($_GET['action']);
    if ($page == 'connection') {
        connectionVue();
    } elseif ($page == 'createAccount') {
        createAccountVue();
    } elseif ($page == 'products') {
        productsVue($_GET['id']);
    } else {
        accueil();
    }
} else {
    accueil();
}
