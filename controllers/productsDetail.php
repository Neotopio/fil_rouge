<?php

require_once('../model/productsDetail.php');


function productsDetailVue($id)
{
    $colors=colors();
    $sizes=sizes();
    $photos = pictureProducts($id);
    $options = optionsDetail($id);
    $products = productsDetail($id);
    require('../template/productsDetail.php');
}
