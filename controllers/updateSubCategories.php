<?php
require_once("../model/dbUpdateSubCategories.php");
function dbUpdateSubCategories($a,$b,$c)
{
    updateSubCategories($a, $b, $c);
    header("location:../admin.php");
}

if (isset($_POST['nom'])) {
    $a= $_POST['nom'];
    $b=$_POST['enable'];
    $c=$_POST['id'];
    dbUpdateSubCategories($a,$b,$c);
}