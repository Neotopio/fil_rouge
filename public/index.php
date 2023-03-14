<?php
require_once('controllers/accueil.php');
require_once('controllers/connection.php');
require_once('controllers/createAccount.php');

if (isset($_GET['action'])) {
    $page = strval($_GET['action']);
    if ($page == 'connection') {
        connectionVue();
        
    } 
    elseif($page='createAccount'){
        createAccountVue();
    }
    else {
        accueil();
    }
} else {
    accueil();
}
