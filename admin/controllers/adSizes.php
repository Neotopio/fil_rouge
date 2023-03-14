<?php
require('model/adSizes.php');

function vueAdSizes()
{
    require('template/adSizes.php');
}

function adSizes($sizes,$enable)
{

    adSize($sizes,$enable);
    header("location:admin.php?page=sizes");
}
if (isset($_POST['sizes'])) {
    $sizes = $_POST['sizes'];
    $enable = $_POST['enable'];
    adSizes($sizes,$enable);
}
