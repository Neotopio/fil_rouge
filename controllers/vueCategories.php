<?php
require_once('model/vueCategories.php');
require_once('model/updateCategories.php');

function vueCategories()
{
    $categories = categories();
    require('template/categories.php');
}
function vueUpdateCategories($id){
   $nomTitre= categoriesVue($id);
   require('template/updateCategories.php');
}

