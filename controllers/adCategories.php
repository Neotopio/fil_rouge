<?php
require('model/categories.php');

function vueAdCategories()
{
    require('template/adCategories.php');
}

function adCategories($categories,$enable)
{

    adCat($categories,$enable);
    header("location:admin.php");
}
if (isset($_POST['categories'])) {
    $categories = $_POST['categories'];
    $enable=$_POST['enable'];
    adCategories($categories,$enable);
}
