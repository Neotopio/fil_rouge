<?php
require('model/adSizes.php');

function vueAdSizes()
{
    require('template/adSizes.php');
}

function adSizes($sizes)
{

    adSize($sizes);
    header("location:admin.php?page=sizes");
}
if (isset($_POST['sizes'])) {
    $sizes = $_POST['sizes'];
    adSizes($sizes);
}
