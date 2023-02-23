<?php
require_once("../model/dbUpdateSizes.php");
function dbUpdateSizes($a,$b,$c)
{
    updateSizes($a, $b, $c);
    header("location:../admin.php?page=sizes");
}

if (isset($_POST['nom'])) {
    $a= $_POST['nom'];
    $b=$_POST['enable'];
    $c=$_POST['id'];
    dbUpdateSizes($a,$b,$c);
}
