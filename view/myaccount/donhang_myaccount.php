

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
                            <h2> Đơn hàng </h2>
                        </div>
                        <!-- Đổi mật khẩu-->
                        <?php
                        if(isset($_SESSION['iddh']) && ($_SESSION['iddh'])>0){
                            $getshowcart = getshowcart($_SESSION['iddh']);
                            if(isset($getshowcart) && ($getshowcart)>0){
                                foreach($getshowcart as $item){
                                    extract($item);
                                    $tt = $giasp * $soluong;
                                    echo '
                                    <div class="mayacc-donmua">
                                        <div class="mayacc-donmua-top">
                                            <div class="mayacc-donmua-1">
                                                <img src="view/img/'.$anhsp.'" alt="">
                                            </div>
                                            <div class="mayacc-donmua-top-1">
                                                <div class="mayacc-donmua-2">
                                                    <h4> '.$tensp.'</h4>
                                                    <p>Số lượng: '.$soluong.'</p>
                                                </div>
                                                <div class="mayacc-donmua-3">
                                                    <h4>'.number_format($giasp,"0",",",".").'</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mayacc-donmua-bottom">
                                            <div class="mayacc-donmua-bottom-1">
                                                <p>Thành tiền: </p>
                                                <p class="donmua">'.number_format($tt,"0",",",".").'</p>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
    </section>
</main>