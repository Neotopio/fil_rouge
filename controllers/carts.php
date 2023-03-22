<?php
require_once('../model/cartsVue.php');

function carts(){
    $carts=cartsVue();
    $resultat=totalCarts();
    
    require('../template/carts.php');
}
