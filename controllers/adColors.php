<?php
require('model/adColors.php');

function vueAdColors()
{
    require('template/adColors.php');
}

function adColors($colors,$enable)
{

    adColor($colors,$enable);
    header("location:admin.php?page=colors");
}
if (isset($_POST['colors'])) {
    $colors = $_POST['colors'];
    $enable = $_POST['enable'];
    adColors($colors,$enable);
}
