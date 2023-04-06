<?php
require_once('../model/updateProfil.php');

function profile(){
    $clients=updateProfil();
    require('../template/profil.php');
}