<?php
session_start();
ob_start();
require_once '../database/connect_db.php'; 
require_once 'model/user.php';  
require_once 'model/san_pham.php'; 

connect_db();  
require_once '../back/model/danh_muc.php';
$categories = get_categories_hierarchical();

include 'view/header.php'; 

// Khởi tạo biến để lưu sản phẩm
$new_arrivals = [];
$featured_products = [];
$best_sellers = [];


if (isset($_POST['filter'])) {
    if (isset($_POST['new_arrival'])) {
        $new_arrivals = get_new_arrivals(); 
    }
    if (isset($_POST['featured'])) {
        $featured_products = get_featured_products(); 
    }
    if (isset($_POST['best_seller'])) {
        $best_sellers = get_best_sellers(); 
    }
} else {
    
    $new_arrivals = get_new_arrivals(11); 
}

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
                include 'view/body.php'; // Gọi view body
                break;  
            
            default:
                include 'view/body.php'; // Gọi view body
                break;
        }
    } else {
        include 'view/body.php'; // Gọi view body
    }
}

include 'view/footer.php';  
?>