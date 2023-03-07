<?php
require_once('model/products.php');
require_once('model/updateProducts.php');
require_once('model/colors.php');
require_once('model/sizes.php');
require_once('model/vueCategories.php');

function products()
{
    $products = product();
    require('template/products.php');
}
function updateProductsVue($id) {
    $categories = categories();
    $sizes=size();
    $colors=color();
    $products=productsVue($id);
    $photos=photoVue($id);
    require('template/updateProducts.php');
}