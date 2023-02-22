<?php
require_once('model/colors.php');

function colors()
{
    $colors = color();
    require('template/colors.php');
}