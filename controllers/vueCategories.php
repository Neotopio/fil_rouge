<?php
require_once('model/vueCategories.php');

function vueCategories()
{
    $categories = categories();
    require('template/categories.php');
}
