<?php
require_once('../model/createClient.php');


if ((isset($_POST['name']) || !empty($_POST['name']))
    || (isset($_POST['first_name']) || !empty($_POST['first_name']))
    || (isset($_POST['email']) || !empty($_POST['email']))
    || (isset($_POST['adress']) || !empty($_POST['adress']))
    || (isset($_POST['cp']) || !empty($_POST['cp']))
    || (isset($_POST['city']) || !empty($_POST['city']))
    || (isset($_POST['password']) || !empty($_POST['password']))
) {
    adClient();
    header('location:../index.php?action=connection');
} else {
    header('location:../index.php?action=createAccount');
}
