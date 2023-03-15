<?php
require_once('model/categories.php');
function accueil()
{
    $categories=categoriesVue();
    require('template/accueil.php');
}
