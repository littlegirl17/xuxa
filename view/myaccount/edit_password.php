<main>
    <section>
        <div class="container">
            <div class="main__nav_bar">
                <div class="left__nava_bar">
                    <div class="myaccount-tab-menu " >
                        <a href="index.php?mod=user&act=myaccount" ><i class="fa fa-dashboard"></i>
                            Tai khoan cua toi</a>
                        <a href="index.php?mod=user&act=update-account" ><i class="fa fa-dashboard"></i>
                            Cập nhật tài khoản</a>

                        <a href="index.php?mod=user&act=forgetpassword"><i class="fa fa-cart-arrow-down"></i> Quên mật khẩu</a>
                        <a href="index.php?mod=user&act=doi_password"><i class="fa fa-cart-arrow-down"></i> Đổi mật khẩu</a>
                        <a href="index.php?mod=user&act=donhangmyaccount" ><i class="fa fa-cloud-download"></i>
                        Đơn hàng của tôi</a>


                        <a href="index.php?mod=user&act=logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>  
                </div>

                <div class="right__nava_bar" >
                    <div class="title-forgetpw">
                        <h2>CAP NHAT TAI KHOAN</h2>
                    </div>
                    <?php
                        if(isset($_SESSION['user']) && (is_array($_SESSION['user']))){
                            extract($_SESSION['user']);
                        }
                    ?>
                    <form action="index.php?mod=user&act=update-account" method="post">
                        <div class="forgetpstw">
                        <input type="hidden" name="matk" value="<?=$matk?>">
                        <div class="forget">
                            <label for="">Họ và tên</label><br>
                            <input type="text" name="hoten" value="<?=$hoten?>">
                        </div>
                        <div class="forget">
                            <label for="">Địa chỉ email</label><br>
                            <input type="text" name="email" value="<?=$email?>">
                        </div>
                        <div class="forget">
                            <label for="">Mật khẩu  </label><br>
                            <input type="text" name="matkhau" value="<?=$matkhau?>">
                        </div>
                        <div class="forget">
                            <label for="">Số điện thoại  </label><br>
                            <input type="text" name="sodienthoai" value="<?=$sodienthoai?>">
                        </div>
                        <div class="forget">
                            <label for="">Ngày sinh</label><br>
                            <input type="text" name="ngaysinh" value="<?=$ngaysinh?>">
                        </div>
                        <div class="forget">
                            <label for="">Địa chỉ</label><br>
                            <input type="text" name="diachi" value="<?=$diachi?>">
                        </div>
                        <div class="forget-btn">
                            <input type="submit" name="submit_up_account" class="save-update" value="Cập nhật">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>





