<?php

    //session_start();
    // Điều hướng controller
    if(!isset($_GET['mod'])){
        include_once 'controller/page.php';
    }else{
        switch ($_GET['mod']) {
            case 'page':
                include_once 'controller/page.php';
                break;
            case 'product':
                include_once 'controller/product.php';
                break;
            case 'user':
                include_once 'controller/user.php';
                break;
            default:
                include_once 'controller/page.php'; // nếu nó không chọn case nào mình sẽ chuyển nó về case page
                break; 
        }
        
    }
?>