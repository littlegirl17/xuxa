<?php 
    //session_start();
    // Dieu huong cac controller
    if(isset($_GET['mod'])){
        switch ($_GET['mod']) {
            case 'page':
                include_once 'controller/page.php';
                break;
            case 'user':
                include_once 'controller/user.php';
                break;  
            case 'product':
                include_once 'controller/product.php';
                break;                      
            default:
                # code...
                break;
        }
    }else{
        header("location: admin.php"); //neu no vao trang index khong thi se chuyen ve trang chu
    }
?>