<?php
session_start();
require('../database.php');

   

  



   
 
  
 

     
    $username = ($_POST["nom"]);
    $password = ($_POST["password"]);
    $stmt = $db->prepare('SELECT * FROM admins WHERE name = :nom');
    $stmt->bindValue(":nom", $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();
         
if(($user['name'] == $username) && (password_verify($password, $user['password'])) ){
         $_SESSION['nom'] = $username;
                header("location:../admin.php");
        }
        else {
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            header("location:../template/loginAdmin.php");
            die();
        }
    

 
?>
 
