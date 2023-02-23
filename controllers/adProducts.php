<?php

require_once('model/vueCategories.php');
require_once('model/subCategories.php');

function vueAdProducts()
{
    if(isset ($_GET['id']) ) {
        $id=$_GET['id'];
        $sousCategories = subCategories($id);
        }
    $categories = categories();
    require('template/adProducts.php');
}
