<?php


require_once('../model/updateProfil.php');

if ((isset($_POST['id']) || !empty($_POST['id']))
    || (isset($_POST['name']) || !empty($_POST['name']))
    || (isset($_POST['first_name']) || !empty($_POST['first_name']))
    || (isset($_POST['email']) || !empty($_POST['email']))
    || (isset($_POST['adress']) || !empty($_POST['adress']))
    || (isset($_POST['cp']) || !empty($_POST['cp']))
    || (isset($_POST['city']) || !empty($_POST['city']))
) {

    updateClient();
    header('location:../public/index.php');
} else {
    header('location:../admin.php?page=profile');
}
