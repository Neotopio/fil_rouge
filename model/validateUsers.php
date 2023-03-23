<?php
session_start();
require('../database.php');

   

  $db=dbconnect();



   
 
  
 

     
    $email = ($_POST["email"]);
    $password = ($_POST["password"]);
    $stmt = $db->prepare('SELECT * FROM client WHERE email = :email');
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();
         
if(($user['email'] == $email) && (password_verify($password, $user['password'])) ){
         $_SESSION['email'] = $email;
                header("location:../public/index.php");
        }
        else {
            
            header("location:../public/index.php?action=connection");
            die();
        }
    