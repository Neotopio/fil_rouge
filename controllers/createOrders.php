<?php
session_start();
require_once('../model/cartsVue.php');
require_once('../model/createOrders.php');
require_once('../model/email.php');
require_once('../TCPDF-main/tcpdf.php');

if (isset($_SESSION['email'])) {


    createOrders();
    unset($_SESSION['identClient']);
    $_SESSION['success_message'] = "Votre demande a été envoyée avec succès.";
    header('location:../public/index.php?action=carts');
}
else {
    $_SESSION['echec_message'] = "Merci de vous connecter ";
    header('location:../public/index.php?action=carts');
}
