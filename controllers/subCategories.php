<?php
require_once('model/vueSubCategories.php');
require_once('model/vueCategories.php');
require_once('model/subCategories.php');
require_once('model/updateSubCategories.php');


function vueSubCategories($id)
{
    $subs = subCategories($id);
    require('template/subCategories.php');
}

function vueAdSubCategories()
{
    $categories = categories();
    require('template/adSubCategories.php');
}

function adSubCategories($nom, $id_categories,$enable)
{
    adSubCat($nom, $id_categories,$enable);
    header('location:admin.php');
}

if (
    (isset($_POST['sub_categories']) || !empty($_POST['sub_categories']))
    || (isset($_POST['subCategoriesCategories']) || !empty($_POST['subCategoriesCategories']))

) {
    $nom = strip_tags($_POST['sub_categories']);
    $enable = strip_tags($_POST['enable']);
    $id_categories = strip_tags($_POST['subCategoriesCategories']);
    adSubCategories($nom, $id_categories,$enable);
}
function vueUpdateSubCategories($id){
    $nomTitre= subCategoriesVue($id);
    require('template/updateSubCategories.php');
 }