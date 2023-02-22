<?php
require('model/adColors.php');

function vueAdColors()
{
    require('template/adColors.php');
}

function adColors($colors)
{

    adColor($colors);
    header("location:admin.php?page=colors");
}
if (isset($_POST['colors'])) {
    $colors = $_POST['colors'];
    adColors($colors);
}
