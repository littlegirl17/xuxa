<?php 
    // Model
    session_start();
    ob_start();
    include_once 'model/connect.php';
    include_once 'model/page.php';
    include_once 'model/product.php';
    //quan ly cac view : trang chu , lien he, gioi thieu,.....
    if(!isset($_GET['act']) ){
        if(isset($_POST['submit-home'])){
            $keyword = $_POST['keyword'];
        }else{
            $keyword = ""; 
        }
                $newproduct = getproducthome($keyword);
                $saleproduct = getproducthome_promo();
                $viewproduct = getproducthome_view();
                $sanphamhomeid = sanpham_byhome();
                
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/page_home.php';
                include_once 'view/template_footer.php';
    }else{
        switch ($_GET['act']) {
            case 'home':
                
                if(isset($_POST['submit-home'])){
                    $keyword = $_POST['keyword'];
                }else{
                    $keyword = ""; 
                }
                $newproduct = getproducthome($keyword);
                $saleproduct = getproducthome_promo();
                $viewproduct = getproducthome_view();
                $sanphamhomeid = sanpham_byhome();
                
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/page_home.php';
                include_once 'view/template_footer.php';
                break;
            
            case 'dashboard':
                if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen']>=1)){
                    header("location: index.php");
                }
                $list_thongke = load_thongke_dm();
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/page_dashboard.php';
                break;

            default:
            // nếu sự lựa chọn không có trong case thì cho chuyển về home
            $newproduct = getproducthome();
            $saleproduct = getproducthome_promo();
            $viewproduct = getproducthome_view();
            include_once 'view/template_head.php';
            include_once 'view/template_header.php';
            include_once 'view/page_home.php';
            include_once 'view/template_footer.php';
            break;
        }
    }
    
?>