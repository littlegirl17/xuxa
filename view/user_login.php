
        <div class="row ">
            <div class="banner-cart ">
                <img src="view/img/bannerxx3.png" alt="">
            </div>
        </div>
<main>
    <section>
        <div class="container-login">
            <div class="login-reges">
                <div class="wrapper">
                    <div class="form-box register">
                        <h2>Registration</h2>
                        <form action=""  method="post">
                            <div class="input-box">
                                <input type="text" id="hoten" name="hoten" >
                                <label for="">Họ tên</label>
                            </div>
                            <div class="input-box">
                                <input type="date" id="ngaysinh" name="ngaysinh" >
                                
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input type="text" id="username" name="email" > <!-- required bắt buộc phải điền vào trường này trước khi gửi biểu mẫu -->
                                    <label for="">Username</label>
                            </div>

                            <div class="input-box">
                                <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="passWord" id="matkhau" name="matkhau"> <!-- required bắt buộc phải điền vào trường này trước khi gửi biểu mẫu -->
                                    <label for="">PassWord</label>
                            </div>

                            <!-- <div class="remember-forgot">
                                <label ><input type="checkbox">agree to the terms & conditions</label>
                            </div> -->

                            <input type="submit" onclick="return kiemtra_dk()" name="submit-register" value="Register" class="btn">
                            
                            <!-- <div class="login-register">
                                <p>Already have an account? <a href="#" class="login-link">Login</a>
                                </p>
                            </div> -->
                            <div id="alert-register" class="baoloi_dangky"></div>
                            <?php if(isset($thongbao2)): ?>
                                <div id="alert-login" class="alert-login">
                                    <?=$thongbao2?>
                                </div>
                            <?php endif; unset($thongbao2); ?>
                        </form>
                    </div>
                </div>
                <div class="wrapper">
                    <span class="icon-close"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                    <div class="form-box login">
                        <h2>Login</h2>
                        <form action="" method="post">
                            <div class="input-box">
                                <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <input type="text" id="emaillogin" name="email" > <!-- required bắt buộc phải điền vào trường này trước khi gửi biểu mẫu -->
                                    <label for="">Email</label>
                            </div>
            
                            <div class="input-box">
                                <span class="icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="passWord" name="matkhau" id="matkhaulogin"> <!-- required bắt buộc phải điền vào trường này trước khi gửi biểu mẫu -->
                                    <label for="">PassWord</label>
                            </div>
            
                            <div class="remember-forgot">
                                <label ><input type="checkbox">Remember me</label>
                                <a href="index.php?mod=user&act=forget_password">Forgot Password?</a>
                            </div>
                            <input type="submit" name="btn-login" onclick="return kiemtra_dn()" value="Dang Nhap" class="btn">
            
                            <div id="alert-login" class="baoloi_dangky"></div>
                            
                            <?php if(isset($thongbao)): ?>
                                <div class="alert-login">
                                    <?=$thongbao?>
                                </div>
                            <?php endif; unset($thongbao); ?>  
                        </form>
                    </div>  
                </div>
            </div> 
        </div>  
    </section>
</main>

