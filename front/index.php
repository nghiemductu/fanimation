<?php
session_start();
ob_start();
require_once '../database/connect_db.php'; 
require_once 'model/user.php';  
require_once 'model/san_pham.php';  // Thêm dòng này để include model sản phẩm

connect_db();  
require_once '../back/model/danh_muc.php';
$categories = get_categories_hierarchical();

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
                $new_arrivals = get_new_arrivals(11); // Thêm dòng này
                include 'view/body.php';
                break;  
            
            default:
                $new_arrivals = get_new_arrivals(11); // Thêm dòng này
                include 'view/body.php';  
                break;
        }
    } else {
        $new_arrivals = get_new_arrivals(11); // Thêm dòng này
        include 'view/body.php';  
    }
}

include 'view/footer.php';  