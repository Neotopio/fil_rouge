<?php
require_once("../model/dbUpdateColors.php");
function dbUpdateColors($a,$b,$c)
{
    updateColors($a, $b, $c);
    header("location:../admin.php?page=colors");
}

if (isset($_POST['nom'])) {
    $a= $_POST['nom'];
    $b=$_POST['enable'];
    $c=$_POST['id'];
    dbUpdateColors($a,$b,$c);
}
