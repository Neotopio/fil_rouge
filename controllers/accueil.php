<?php
require_once('../model/accueil.php');
function accueil()
{
    $products=accueilVue();
    require('../template/accueil.php');
}
