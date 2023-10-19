<?php
   
    $user = ""; //Cái này dùng để: khi mà mình load lại đăng nhập, khi không có đăng nhập thì nó ko xuất hiện dòng báo lỗi
    if(!empty($_SESSION['user'])&& ($_SESSION['user']!="")){ //kiểm tra xem đã được thiết lập chưa và có trống hay không và sẽ được gán giá trị tương ứng
        $user = $_SESSION['user']['hoten']; //gán hoten cho biến $user , để minh lấy ra hoten
    }

    if($user!=""){ //Nếu người dùng đã đăng nhập - thì nó sẽ hiện tênUSER và LOGOUT, và chuyển đến trang myaccount
        $logined=
        '<li><a href="index.php?mod=user&act=myaccount">hi, '. $user .'</a></li> 
        <li><a href="index.php?mod=user&act=logout">Thoát</a></li> 
        ';
    }else{  //Nếu người dùng chưa đăng nhập - thì nó sẽ hiện LOGIN để mình vào đăng nhập
        $logined = '<li><a href="index.php?mod=user&act=login">Login</a></li>';
    }

    $soluonggiohang = 0; // Mặc định số lượng giỏ hàng là 0
    if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){ //Việc kiểm tra xem $_SESSION['giohang'] tồn tại và có phải là một mảng trước khi sử dụng hàm count() sẽ giúp tránh được lỗi khi giỏ hàng trống.
        $soluonggiohang = count($_SESSION['giohang']);
    }
    
?>
<body>
    <!-- Header Start -->
    <header class="row">
        <div class="header-search">
            <div class="container">
                <div class="header-search-all">
                    <div class="header-sr-p">
                        <p>FREE 5 days shipping over $99</p>
                    </div>
                    <div class="header-sr-inp">
                        <form action="" method="post">
                            <input type="text" name="keyword" placeholder="Tim kiem san pham">
                            <button type="submit" name="submit-home"><i class="fa-sharp fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
                        </form>
                        
                    </div>
                    <div class="header-sr-icon">
                        <ul>
                            <li><a href=""><i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-twitter" style="color: #ffffff;"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a></li>
                            <li><a href=""><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-all">
            <div class="container">
                <div class="header-top">
                    <div class="logo col2">
                        <a href="index.php?mod=page&act=home"><img src="view/img/XXLOGO.png"  alt=""></a>
                    </div>
                    
                    <nav class="" >
                        <div class="header_center">
                            <ul>
                                <li><a href="index.php" style="color: #259CD8;">Trang chủ</a></li>
                                <li><a href="">Giới thiệu</a></li>
                                <li class="category">
                                    <a href="index.php?mod=product&act=danhmuc">Thú cưng</a> 
                                        <ul  class="category-list" >
                                            <li><a href="index.php?mod=product&act=danhmuc&madanhmuc=1">Chó</a></li>
                                            <li><a href="index.php?mod=product&act=danhmuc&madanhmuc=2">Mèo</a></li>
                                            <li><a href="index.php?mod=product&act=danhmuc&madanhmuc=3">Chuột Hamster</a></li>
                                            <li><a href="index.php?mod=product&act=danhmuc&madanhmuc=21">Sóc bay</a></li>
                                            <li><a href="index.php?mod=product&act=danhmuc&madanhmuc=23">Thỏ</a></li>
                                        </ul>
                                </li>
                                <li class="category">
                                    <a href="">Phụ kiện</a>
                                    <ul class="category-list">
                                        <li><a href="">Lồng nuôi</a></li>
                                        <li><a href="">Thức ăn</a></li>
                                        <li><a href="">Đồ chơi cho Pet</a></li>
                                        <li><a href="">Đồ lót chuồng</a></li>
                                        <li><a href="">Đồ dùng cho Pet</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </div>
                    </nav>
                
                    <div class="nav_dots ">
                        <div class="header-right  ">
                            <ul class="header-right-gh-lg" >
                                <li class="li_giohang">
                                    <a href=""> 
                                        <i class="fa fa-shopping-cart"  aria-hidden="true" >
                                            <span class="soluong_home_cart"><?=$soluonggiohang?></span>
                                        </i>
                                        <ul class="header-right-cart-con"> 
                                            <h4>Sản phẩm mới thêm</h4>
                                            
                                            <?php
                                                if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])) {
                                                    // Display up to the first three items
                                                    $itemCounter = 0;
                                                
                                                    foreach ($_SESSION['giohang'] as $item) {
                                                        if ($itemCounter < 3) {
                                                            extract($item);
                                                            echo '
                                                                <div class="headet_cart_mini">
                                                                    <div class="headet_cart_mini_img">
                                                                        <img src="view/img/'.$anhsp.'" alt="">
                                                                    </div>
                                                                    <div class="headet_cart_mini_p">
                                                                        <p>'.$tensp.'</p>
                                                                    </div>
                                                                    <div class="headet_cart_mini_span">
                                                                        <span>'.number_format($giasp * $soluong,"0",",",".").'</span>
                                                                    </div>
                                                                </div>
                                                            ';
                                                        }
                                                        $itemCounter++;
                                                    }
                                                }else{
                                                    $_SESSION['giohang'] = [];
                                                }
                                            ?>
                                            
                                            <div class="headet_cart_mini_bottom">
                                                <div class="headet_cart_mini_bottom_p">
                                                    <p><?=COUNT($_SESSION['giohang'])?> sản phẩm trong gio hang</p>
                                                </div>
                                                <div class="headet_cart_mini_bottom_btn">
                                                    <a href="index.php?mod=product&act=viewcart" class="save-cart">Xem giỏ hàng</a>
                                                </div>
                                            </div>
                                        </ul>
                                    </a>
                                </li>
                                <li class="header-right-login">
                                    <a href="index.php?mod=user&act=login"><i class="fa-regular fa-user"></i></a>
                                    <ul class="header-right-login-con">
                                        <?=$logined?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="icon_dot_bar">
                        <!-- dots -->
                        <i class="fa fa-ellipsis-h" id="btn_dots" aria-hidden="true"></i>
                        <!-- bars -->
                        <i class="fa-solid fa-bars" id="btn_bars" ></i>  
                    </div>  
                </div>
            </div>
    
        </div>
    
    </header>
   