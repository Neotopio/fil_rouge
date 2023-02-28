<?php

require_once('model/vueCategories.php');

require_once('model/colors.php');
require_once('model/sizes.php');

function vueAdProducts()
{
    $sizes=size();
    $colors=color();
    $categories = categories();
    require('template/adProducts.php');
} 

