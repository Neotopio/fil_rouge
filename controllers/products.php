<?php
require_once('../model/products.php');
function productsVue($id)
{
    $products=products($id);
   
    require('../template/products.php');
}
