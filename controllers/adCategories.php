<?php
require('model/categories.php');

function vueAdCategories()
{
    require('template/adCategories.php');
}

function adCategories($categories)
{

    adCat($categories);
    header("location:admin.php");
}
if (isset($_POST['categories'])) {
    $categories = $_POST['categories'];
    adCategories($categories);
}
