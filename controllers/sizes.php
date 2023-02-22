<?php
require_once('model/sizes.php');

function sizes()
{
    $sizes = size();
    require('template/sizes.php');
}