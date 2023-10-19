<?php 
    extract($detail);
    if($giasp>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
        $gia = '<span class="">'.$giasp.'đ</span>';
    }else{
        $gia = '<span class="">Đang cập nhật</span>';
    }

    if($giasp2>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
        $giacu = '<span class="giacu">'.$giasp2.'đ</span>';
    }else{
        $giacu = '';
    }

?>
<div class="">
        <div class="banner-cart">
            <img src="view/img/bannerxx3.png" alt="">
        </div>
</div>

    <main>
        <section>
            <div class="container">
                <div class="danhmuc-title">
                    <ul>
                        <li><a href="">Trang chu</a></li>
                        <li><a href=""><?=$tensp?></a></li>
                        
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <div class="container-detail">
                <div class="box-detail">
                    <div class="box-detail-left">
                        <div class="detail-left-one">
                            <img src="view/img/<?=$anhsp?>" alt="">
                        </div>
                        <div class="detail-left-two">
                            <img src="view/img/<?=$anhsp?>" alt="">
                            <img src="view/img/<?=$anhsp?>" alt="">
                            <img src="view/img/<?=$anhsp?>" alt="">
                            <img src="view/img/<?=$anhsp?>" alt="">
                            
                        </div>
                    </div>
                    <div class="box-detail-right">
                        <div class="detail-title">
                            <h2><?=$tensp?></h2>
                        </div>
                        <div class="box-detail-rg">
                        <div class="gia-detail-product">
                            <p >Gia:</p>
                            <h4 class="price-dt"><span class="giamoi"><?=$giasp?></span>
                                        <?=$giacu?>
                            </h4>
                        </div>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <div class="box-dt-p">
                                <p>Thức ăn cho chó con hữu cơ NATURAL CORE Lamb Puppy thịt cừu được chế biến từ các loại thịt tươi và các nguyên liệu được chứng nhận hữu cơ ECOCERT: thịt cừu Úc và thịt nạc gà hữu cơ, khoai lang hữu cơ và ngũ cốc. Với nhiều chất dinh dưỡng tốt cho sức khỏe thú cưng, ECO5a có tác dụng nổi bật trong việc hỗ trợ sự phát triển của chó con.</p>
                            </div>
                            <div class="box-dt-inp">
                                <!-- form này giúp user đặt hàng được trong trang chi tiết -->
                                <form action="index.php?mod=product&act=addcart" method="post">
                                    
                                    <input type="hidden" name="anhsp" value="<?=$anhsp?>">
                                    <input type="hidden" name="tensp" value="<?=$tensp?>">
                                    <input type="hidden" name="giasp" value="<?=$giasp?>">
                                    <input type="hidden" name="masp" value="<?=$masp?>"> 
                                        <div class="buy-amount">
                                        <button class="plus-btn" onclick="handleMinus()">
                                            -
                                        </button>
                                        <input type="number" min=1 max=10 name="soluong" id="amount" value="1">
                                        <button class="minus-btn" onclick="handlePlus()">
                                            +
                                        </button>
                                        </div>
                                    <input type="submit" class="save-update" value="Dat hang" name="btnaddcart">
                                </form>
                            </div>
                            <div class="box-dt-1">
                                <p>Ma hang: <span>007</span></p>
                                <p>Han su dung: <span>18 thang</span></p>
                                <p>Trong luong: <span>1kg,2kg va 10kg</span></p>
                                <p>Tinh trang: <span>con hang</span></p>
                            </div>
                            <div class="box-dt-2">
                                <p>Share:</p>
                                <div class="box-dt-2-img">
                                    <img src="view/img/cellphones-facebook.png" alt="">
                                    <img src="view/img/cellphones-instagram.png" alt="">
                                    <img src="view/img/cellphones-tiktok.png" alt="">
                                    <img src="view/img/cellphones-youtube.png" alt="">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section>
            <div class="container-detail">
                <div class="box-detail-2">
                    <div class="detail-title-2">
                        <h2>Mô tả</h2>
                        <p>Thức ăn cho chó MKB MEC Wild Taste Nutrition for Poodle phù hợp với chó Poodle ở mọi độ tuổi, giúp cải thiện thể chất cho chó.</p>
                        <h2>Lợi ích chính</h2>
                        <p class="cham-detail">Thức ăn cho chó MKB MEC Wild Taste Nutrition for Poodle được chế biến từ nguyên liệu hoàn toàn tự nhiên</p>
                        <p class="cham-detail">Hương vị thơm ngon, phù hợp khẩu vị của chó</p>
                        <p class="cham-detail">Không chứa chất bảo quản, chất tạo màu, tạo mùi và phụ gia thực phẩm độc hại</p>
                        <p class="cham-detail">Giảm các vấn đề về da và lông, giúp mắt chó Poodle luôn khỏe mạnh</p>
                        <p class="cham-detail">Hạt thức ăn có kích thước phù hợp với hàm răng của chó, giúp làm sạch và bảo vệ răng miệng cho chó.</p>
                        <h2>Thành phần dinh dưỡng</h2>
                        <p>Thức ăn cho chó MKB MEC Wild Taste Nutrition for Poodle được chế biến bằng các nguyên liệu từ thiên nhiên. Bao gồm:</p>
                        <li>Thịt: gà, vịt, bò, cá hồi, cá ngừ, cá cơm, mỡ gà, gan gà</li>
                        <li>Rau củ: bột hắc mạch, khoai tây, khoai mỡ, khoai lang, ngô, bông cải xanh, rau chân vịt, táo, quả việt quất, xà lách</li>
                        <li>Phụ phẩm: dầu cá, đường fructose, men bia, dầu oliu, vitamin, khoáng chất, nguyên tố vi lượng</li>
                    </div>
                </div>
            </div>
        </section>

        <!--Thu vien Jquery load-->
            

        <section>
            <div class="container-detail">
                <div class="row title">
                    <h3>Đánh giá</h3>
                </div>
                <div class="detail-binhluan">
                    <div class="detail-p">
                        <h2>Hãy là người đầu tiên nhận xét “<?=$tensp?> mã <?=$masp?>” </h2>
                    </div>
                    <table class="table_cmt">
                        <?php
                            //echo 'noi dung cmt o here'.$masanpham;
                                foreach($loadcmt as $cmt){
                                extract($cmt);
                                echo '<tr>
                                <td>'.$noidung.'</td>
                                <td>'.$ngaybl.'</td>
                                </tr>';
                            }
                        ?>
                    </table>

                    <!-- Nếu nó tồn tại session['user'] thì mình mới cho nó quyền ĐƯỢC BÌNH LUẬN -->
                        <?php if(isset($_SESSION['user'])) {?>
                            <form action="index.php?mod=product&act=binhluan" method="post"> <!-- vi minh lam doc loc -->
                                <input type="hidden" name="masp" value="<?=$masp?>">
                                <div class="form-detail">
                                    <label for="">Nhận xét của bạn</label><br>
                                    <input type="text" name="noidung">
                                </div>
                                <div class="form-detail-sub">
                                    <input type="submit" class="save-update" name="gui_binhluan" value="Gửi đi">
                                </div>
                            </form>
                        <?php }?>
                    <!-- END -->
                </div>
            </div>
        </section>

        <section class="detail-pro-lienquan">
                <div class="container-detail">
                    <div class="row title">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                    <div class="box row">
                        <!-- sản phẩm liên quan -->
                        <?php 
                            foreach ($related as $item) {
                                extract($item);
                            if($giasp>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
                                $gia = '<span class="">'.$giasp.'đ</span>';
                            
                            }else{
                                $gia = '<span class="">Đang cập nhật</span>';
                            }
                            if($giasp2>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
                                $giacu = '<span class="giacu">'.$giasp2.'đ</span>';
                            }else{
                                $giacu = '';
                            }

                            if($promotion>0){
                                $promolabel = '<div class="sale"><p>-'.$promotion.'%</p></div>';
                            }else{
                                $promolabel = '';
                            }
                        
                            $linkdetail = "index.php?mod=product&act=detail&idproduct=".$masp;
                            echo '
                                <div class="box-sp  ">
                                    
                                    '.$promolabel.'
                                    <div class="box-sp-img">
                                    <a href="'.$linkdetail.'"><img src="view/img/'.$anhsp.'" alt=""></a>
                                    </div>
                                    <div class="box-sp-name"><a href="'.$linkdetail.'">'.$tensp.'</a> </div>
                                    <div class="box-sp-price">
                                        <p>Giá:</p>
                                        <h4 class="price"><span class="giacu">'.$giacu.'</span>'.$gia.'</h4>
                                    </div>
                                    <form action="index.php?mod=product&act=addcart" method="post">
                                        <input type="hidden" name="anhsp" value="'.$anhsp.'">
                                        <input type="hidden" name="tensp" value="'.$tensp.'">
                                        <input type="hidden" name="giasp" value="'.$giasp.'">
                                        <input type="hidden" name="masp" value="'.$masp.'"> 
                                        <input type="hidden" name="soluong" value="'.$soluong.'">
                                        <div class="intro">
                                            <input type="submit" name="btnaddcart" value="Đặt hàng" id="">
                                        </div>
                                        
                                    </form>
                                </div>
                            ';
                            }
                        ?>
                        
                    
                    </div>
            </div>
        </section>
    </main>