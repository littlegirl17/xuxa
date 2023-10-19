

</div>
    <!-- Banner Start -->
    <div class=" banner">
        
        <div class="banner-top">
            <div class="banner-left col8  ">
                <img src="view/img/shoppetbanner.png" id="slide" onclick="slideshow()" alt="">
            </div>
        </div>      
    </div>
    <!-- Banner End -->

    <!--Main Start-->
    <main>
        <section class="bannertext">

                <div class="banner--texthome "> 
                   
                    <div class="texthome">
                        <h2>XUXA PET</h2>
                    </div>
                    <div class="texthome">
                        <p>CHÀO MỪNG BẠN ĐÃ ĐẾN VỚI THIÊN ĐƯỜNG THÚ CƯNG</p>

                    </div>
                    <div class="texthome">
                        <button>XEM THÊM</button>
                    </div>
                     
                </div>
        </section> 
        

        <!-- Box sp new Start -->
        <section>
            <div class="container2">
                <div class=" title">
                    <h3>SẢN PHẨM MỚI</h3>
                </div>
                <div class="box ">
                <?php
                    $html_new = showsp($newproduct);
                    //mình sẽ dùng lại cái hàm , và sẽ thay đổi tham số truyền vào của hàm đó, ví dụ: lấy ra sản phẩm mới thì sẽ thay biến sản phẩm mới bên controller mình đã làm vào làm tham số của hàm đó
                ?>
                    
                </div>
            </div>
        </section>
        <!-- Box sp new End -->

        <!-- Box sp noibat Start -->
        <section>
            <div class="container2">
                <div class=" title">
                    <h3>SẢN PHẨM KHUYẾN MÃI</h3>
                </div>
                <div class="box ">
                <?php
                    $html_sale= showsp($saleproduct);
                ?>
                </div>
                <!---->
                
            </div>
        </section>
        <!-- Box sp noibat End -->

        <!--4 img Box sp new Start -->
        <section class="">
            <div class="container2">
                <div class="title  ">
                    <h3>MUA SẮM ĐÓN PET</h3>
                </div>
                <div class="item ">
                    <div class="item-sp col3 ">
                        <img src="view/img/img1.jpg" alt="">
                        <a href="">Chuồng nuôi</a>
                    </div>
                    <div class="item-sp col3 ">
                        <img src="view/img/img2.jpg" alt="">
                        <a href="">Thức ăn cho pet</a>
                    </div>
                    <div class="item-sp col3 ">
                        <img src="view/img/img3.jpg" alt="">
                        <a href="">Đồ chơi cho </a>
                    </div>
                    <div class="item-sp col3 ">
                        <img src="view/img/img4.jpg" alt="">
                        <a href="">Lót chuồng</a>
                    </div>
                </div>
            </div>
        </section>
        <!--4 img Box sp new End -->
        
        <!-- Box sp chuongnuoi Start -->
        <section>
            <div class="container2">
                <div class=" title">
                    <h3>SẢN PHẨM NHIỀU LƯỢT XEM</h3>
                </div>
                <div class="box ">
                    <?php
                        $html_view= showsp($viewproduct);
                    ?>
                </div>
            </div>
        </section>
        <!-- Box sp chuongnuoi End -->

        <!-- box-img Start -->
        <section class="">
            <div class="container">
                <div class="offer ">
                <div class="offer1 col6 ">
                    <img src="view/img/slide1.png" alt="">
                </div>
                <div class="offer2 col6 ">
                    <img src="view/img/slide5.png" alt="">
                </div>
                </div>
            </div>
        </section>
        <!-- box-img End -->

        <!-- box sp meo Start -->
        <section>
            <div class="container2">
                <?php 
                    $namecata = null; //bắt đầu dưới dạng null để đảm bảo rằng trong vòng lặp ban đầu, không có danh mục nào được coi là "danh mục hiện tại //NULL-> đại diện cho trạng thái "không có giá trị" hoặc "không xác định."
                    foreach($sanphamhomeid as $item): 
                        // TRUE: là giá trị của $namecata không giống giá trị của $item['tendm'] ->húng ta đã bắt đầu xử lý một danh mục mới.
                            if ($namecata !== $item['tendm']) { // !== toán tử không bằng
                                if ($namecata !== null) { //Nếu namecata không phải NULL nghĩa là đã có danh mục trước đó được xử lý
                                    // chương trình sẽ đóng container lại
                                    echo '</div>'; // Điều này đảm bảo rằng danh sách sản phẩm của danh mục trước được đóng trước khi chúng ta bắt đầu danh mục mới.
                                }
                                //Cập nhật lại danh mục để chứa tên của danh mục hiện tại.
                                $namecata = $item['tendm'];

                                echo '<div class="title"><h3>SHOP ' . $namecata . '</h3></div>';
                                // Mở 1 hộp box để chứa danh sách sản phẩm của danh mục hiện tại
                                echo '<div class="box">';
                            }

                            
                        //FALSE giá trị của biến $namecata (danh mục hiện tại) giống với giá trị của $item['tendm'] (danh mục của phần tử hiện tại trong vòng lặp), và do đó, khối mã bên trong câu lệnh if sẽ bị bỏ qua.
                            // chương trình sẽ tiếp tục thực hiện dòng mã bên dưới nó trong vòng lặp foreach
                                // là hiển thị thông tin của sản phẩm, giá, hình ảnh, và các chi tiết khác của sản phẩm đó.
                                    if(isset($item['giasp']) && $item['giasp']>0){
                                        $gia = '<span class="">'.$item['giasp'].' đ</span>';
                                    } else {
                                        $gia = '<span class="">Đang cập nhật</span>';
                                    }

                                    if(isset($item['giasp2']) && $item['giasp2']>0){
                                        $giacu = '<span class="giacu">'.$item['giasp2'].' đ</span>';
                                    } else {
                                        $giacu = '';
                                    }

                                    if( isset($item['promotion']) && $item['promotion']>0){
                                        $promolabel = '<div class="sale"><p>-'.$item['promotion'].'%</p></div>';
                                    } else {
                                        $promolabel = '';
                                    }

                                    if(isset($item['view']) && $item['view']>0){
                                        $soluotxem = '<div class="box-sp-view"><h5>('.$item['view'].' <i class="fa-solid fa-eye"></i>)</h5></div>';
                                    } else {
                                        $soluotxem = '';
                                    }

                                    $linkdetail = "index.php?mod=product&act=detail&idproduct=".$item['masp'];
                ?>
                                    <div class="box-sp">
                                        <?=$promolabel?>
                                        <div class="box-sp-img">
                                            <a href="<?=$linkdetail?>"><img src="view/img/<?=$item['anhsp']?>" alt=""></a>
                                        </div>
                                        <div class="box-sp-name"><a href="<?=$linkdetail?>"><?=$item['tensp']?></a> <?=$soluotxem?></div>
                                        <div class="box-sp-price">
                                            <p>Giá:</p>
                                            <h4 class="price"><span class="giacu"><?=$giacu?></span><?=$gia?></h4>
                                        </div>
                                        <form action="index.php?mod=product&act=addcart" method="post">
                                            <input type="hidden" name="anhsp" value="<?=$item['anhsp']?>">
                                            <input type="hidden" name="tensp" value="<?=$item['tensp']?>">
                                            <input type="hidden" name="giasp" value="<?=$item['giasp']?>">
                                            <input type="hidden" name="masp" value="<?=$item['masp']?>"> 
                                            <input type="hidden" name="soluong" value="<?=$item['soluong']?>"> 
                                            <div class="intro">
                                                <input type="submit" name="btnaddcart" value="Đặt hàng" id="">
                                            </div>
                                        </form>
                                    </div>
                <?php endforeach; ?>
                </div> <!-- Đóng thẻ box -->
            </div> <!-- CONTAINER 2 -->
        </section>






        
    </main>
    <!--Main End-->
