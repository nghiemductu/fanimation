<?php
session_start();
ob_start();
include "../model/connect_db.php";  
include "../model/danh_muc.php";  
include "../model/san_pham.php";      
connect_db();  

include "view/header.php";

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'danh_muc':
            $kq = getall_dm();
            include "view/danh_muc.php";
            break;
        
        case 'adding_category':
            if(isset($_POST['add_new'])){
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $parent_id = $_POST['parent_id'];
                add_category($ten_danh_muc, $parent_id);
            }
            header("Location: index.php?act=danh_muc");
            break;
        
        case 'update_category':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $dm = get_category($id);
                $kq = getall_dm();
                include "view/update_category.php";
            }
            if(isset($_POST['update'])){
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $parent_id = $_POST['parent_id'];
                update_category($id, $ten_danh_muc, $parent_id);
                header("Location: index.php?act=danh_muc");
            }
            break;
        
        case 'delete_category':
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                delete_category($id);
            }
            header("Location: index.php?act=danh_muc");
            break;

        case 'update_category':
           
            if(isset ($_GET['id'])) {
                $id=$_GET ['id'];
                $kq1=get_category($id);
                $kq =getall_dm();
                include "view/update_category.php";   
            }
            if(isset ($_POST['id'])) {
                $id=$_POST ['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                update_category($id, $ten_danh_muc, $parent_id);
                $kq=getall_dm();
                include "view/danh_muc.php";
            }
            break;

        case 'san_pham':
            $dsdm=getall_dm();
            $kq=getall_sp();
            include "view/san_pham.php";
            break;

        case 'add_san_pham':
            if(isset($_POST['add_new'])) {
            $ten_sp = $_POST['ten_sp'];
            $gia = $_POST['gia'];
            $id_danh_muc = $_POST['id_dm'];
                    
            $images = "";
            if(isset($_FILES['imgs']) && $_FILES['imgs']['error'] == 0) {
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES["imgs"]["name"]);
                if (move_uploaded_file($_FILES["imgs"]["tmp_name"], $target_file)) {
                    $images = $target_file;
                }
            }
                    
            insert_product($id_danh_muc, $ten_sp, $gia, $images);
            header("Location: index.php?act=san_pham");
            }
            break;
        

        case 'update_san_pham':
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $sp = get_product($id);
                $dsdm = getall_dm();
                include "view/update_san_pham.php";
            }
            if(isset($_POST['update'])) {
                $id = $_POST['id'];
                $ten_sp = $_POST['ten_sp'];
                $gia = $_POST['gia'];
                $id_danh_muc = $_POST['id_dm'];
                
                $images = "";
                if(isset($_FILES['imgs']) && $_FILES['imgs']['error'] == 0) {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["imgs"]["name"]);
                    if (move_uploaded_file($_FILES["imgs"]["tmp_name"], $target_file)) {
                        $images = $target_file;
                    }
                }
                
                update_product($id, $ten_sp, $images, $gia, $id_danh_muc);
                header("Location: index.php?act=san_pham");
            }
            break;

            case 'delete_product':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    delete_product($id);
                }
                header("Location: index.php?act=san_pham");
                break;

            case 'hidden_items':
                $hidden_categories = get_hidden_categories();
                $hidden_products = get_hidden_products();
                include "view/muc_an.php";
                break;
            
            case 'restore_category':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    restore_category($id);
                }
                header("Location: index.php?act=muc_an.php");
                break;
            
            case 'restore_product':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    restore_product($id);
                }
                header("Location: index.php?act=muc_an.php");
                break;

            case 'them_nguoi_dung':
                include "view/them_nguoi_dung.php";
                break;

            case 'don_hang':
                include "view/don_hang.php";
                break;

            case 'danh_gia_va_phan_hoi_khach_hang':
                include "view/danh_gia_va_phan_hoi_khach_hang.php";
                break;

            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }

    include "view/footer.php";
    ?>
