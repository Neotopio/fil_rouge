<?php
session_start();
require_once('../model/addCarts.php');


if ((isset($_POST['id']) && !empty($_POST['id']))
    && (isset($_POST['price']) && !empty($_POST['price']))
    && (isset($_POST['quantity']) && !empty($_POST['quantity']))
    && (isset($_POST['size']) && !empty($_POST['size']))
    && (isset($_POST['color']) && !empty($_POST['color']))
    && (isset($_SESSION['identClient']) && !empty($_SESSION['identClient']))

) {
    adCarts();
    if (($_POST['previous'] == " ")) {
        header('location:../public/index.php?action=acceuil');
    } else {
        header('location:../public/index.php?action=products&id=' . $_POST['previous']);
    }
}
