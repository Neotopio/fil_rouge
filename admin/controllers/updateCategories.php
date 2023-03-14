<?php
require_once("../model/dbUpdateCategories.php");
function dbUpdateCategories($a,$b,$c)
{
    updateCategories($a, $b, $c);
    header("location:../admin.php");
}

if (isset($_POST['nom'])) {
    $a= $_POST['nom'];
    $b=$_POST['enable'];
    $c=$_POST['id'];
    dbUpdateCategories($a,$b,$c);
}
