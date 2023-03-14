<?php
require_once('model/colors.php');
require_once('model/updateColors.php');

function colors()
{
    $colors = color();
    require('template/colors.php');
}
function updateColorsVue($id){
    $nomTitre= colorsVue($id);
    require('template/updateColors.php');
 }