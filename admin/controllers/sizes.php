<?php
require_once('model/sizes.php');
require_once('model/updateSizes.php');

function sizes()
{
    $sizes = size();
    require('template/sizes.php');
}
function updateSizesVue($id){
    $nomTitre= sizesVue($id);
    require('template/updateSizes.php');
 }