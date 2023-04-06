<?php
  // Initialiser la session
  session_start();
  
 
  unset($_SESSION['email']);
  

    header("Location:../public/index.php");
  