<?php
   
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $user = $_SESSION['user']['hoten'];
        $email = $_SESSION['user']['email'];
    }
?>
<body>
    <header class="header_admin_fixed">
        <div class="container-header">
            <div class="admin-header">
                <div class="admin_logo">
                    <img src="view/img/XXLOGO.png" alt="">
                </div>
                <div class="admin-header-center">
                    <ul>
                        <!-- <li>TRANG CHU</li>
                        <li>DANH MUC</li>
                        <li>SAN PHAM</li>
                        <li>DON HANG</li>
                        <li>TAI KHOAN</li>
                        <li>THOAT</li> -->
                    </ul>
                </div>
                <div class="header_admin_name">
                    <img src="view/img/avatar_xa.png" alt="">
                    <div class="header_admin_name_datab">
                        <p><?=$user?></p>
                        <P><?=$email?></P>
                    </div>
                    
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="admin-article">
            <div class="admin-article-left">
                <ul>
                    <li><a href="admin.php?mod=page&act=dashboard" >DASHBOARD</a></li>
                    <li><a href="admin.php?mod=product&act=admin_catagory" >Danh mục</a></li>
                    <li><a href="admin.php?mod=product&act=admin_product" >Sản phẩm</a></li>
                    <li><a href="admin.php?mod=user&act=login_admin" >Tài khoản</a></li>
                    <li><a href="admin.php?mod=product&act=binhluan_admin" >Bình luận</a></li>
                    <li><a href="admin.php?mod=product&act=donhang_admin" >Đơn hàng</a></li>
                    <li><a href="admin.php?mod=product&act=thongke" >Thống kê</a></li>
                    <li><a href="index.php" >Thoát</a></li>
                </ul>
            </div>
        </div>
    </article>

    <article>
        <div class="bar_admin" style="padding-top: 85px;color:black;">
            <label for="admin_checkbox"><i class="fa-solid fa-bars"></i></label>  
        </div>
        <input type="checkbox" hidden name="" class="admin_hidden_chek" id="admin_checkbox">
    
        <div class="admin-article-mobile">
            <ul>
                <li><a href="admin.php?mod=page&act=dashboard" >DASHBOARD</a></li>
                <li><a href="admin.php?mod=product&act=admin_catagory" >Danh mục</a></li>
                <li><a href="admin.php?mod=product&act=admin_product" >Sản phẩm</a></li>
                <li><a href="admin.php?mod=user&act=login_admin" >Tài khoản</a></li>
                <li><a href="admin.php?mod=product&act=binhluan_admin" >Bình luận</a></li>
                <li><a href="admin.php?mod=product&act=donhang_admin" >Đơn hàng</a></li>
                <li><a href="admin.php?mod=product&act=thongke" >Thống kê</a></li>
                <li><a href="index.php" >Thoát</a></li>
            </ul>
        </div>
    </article>
    
        