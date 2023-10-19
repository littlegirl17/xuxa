<?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']); //tại sao extract trong file php này?
    }// để tại input:hoten nó hiện sẵn họ tên , chính xác , không cần mình phải nhập, Hãy coi CHẤM ĐỎ

?>
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
                        <h2>Đổi mật khẩu</h2>
                    </div>

                    <div class="forgetpstw">
                        <form action="index.php?mod=user&act=doi_password" method="post">
                            <input type="hidden" name="matk" value="<?=$matk?>">
                            <div class="forget">
                                <label for="">Tên đăng nhập</label><br>
                                <input type="text" name="hoten" value="<?=$hoten?>">
                            </div>
                            <div class="forget">
                                <label for="">Mật khẩu cũ</label><br>
                                <input type="text" name="matkhau" >
                            </div>
                            <?=$thongbao?>
                            <div class="forget">
                                <label for="">Mật khẩu mới</label><br>
                                <input type="text" name="matkhaumoi" >
                            </div>
                            <div class="forget">
                                <label for="">Xác nhận mật khẩu mới</label><br>
                                <input type="text" name="againmatkhaumoi" >
                            </div>
                            <?=$thongbao2?>
                            <div class="forget-btn">
                                <input type="submit" name="submit_doi_password" class="save-update" value="Tìm lại mật khẩu">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
