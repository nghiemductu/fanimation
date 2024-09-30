<?php
session_start();
ob_start();
require_once '../database/connect_db.php'; 
require_once 'model/user.php';  

connect_db();  
include 'view/header.php'; 

if (isset($_GET['act']) && ($_GET['act'] == 'login' || $_GET['act'] == 'register')) {
    switch ($_GET['act']) {
        case 'login':
            include 'view/login.php';  
            break;

        case 'register':
            include 'view/register.php';  
            break;
    }
} else {

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'body':
                include 'view/body.php';  
                break;

            default:
                include 'view/body.php';  
                break;
        }
    } else {
        include 'view/body.php';  
    }
}

include 'view/footer.php';  
