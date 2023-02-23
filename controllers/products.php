<?php
require_once('model/products.php');


function products()
{
    $products = product();
    require('template/products.php');
}
