<?php
    //session_start();
    if(isset($_SESSION['user'])&& ($_SESSION['user']!="")){ //kiểm tra xem đã được thiết lập chưa và có trống hay không và sẽ được gán giá trị tương ứng
        $user = $_SESSION['user']['hoten']; //gán cho biến $user
    }

    // if(isset($_SESSION['pass'])&& ($_SESSION['pass']!="")){
    //     $pass = $_SESSION['pass']; //gán cho biến $
    // }

    // if($user!=""){ //Nếu người dùng đã đăng nhập
    //     $logined='<a href="myAccount.php"><strong>'. $user .'</strong></a>';
    // }else{  //Nếu người dùng chưa đăng nhập
    //     $logined = '<a href="login.php">Login</a>';
    // }

    
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
                                    <a href="index.php?mod=product&act=viewcart"> <i class="fa fa-shopping-cart"  aria-hidden="true"></i></a>
                                </li>
                                <li class="header-right-login">
                                    <?= $user?>
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
   