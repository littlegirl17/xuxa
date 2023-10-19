<?php
    session_start();
?>
    <div class=" ">
        <div class="banner-cart ">
            <img src="view/img/bannerxx3.png" alt="">
        </div>
    </div>
    <main>
        <section>
            <div class="container">
                <div>
                    <table>
                        <tr class="title-product">
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th>Xóa</th>
                        </tr>
                        <tbody>
                            <!-- Show giỏ hàng -->
                            <?php
                                $html_cart = giohang();
                            ?>
                        </tbody>
                    </table>
                    <div class="item_cart">
                        <div class="back_home">
                            <a href="index.php"><i class="fa-solid fa-arrow-left"></i> Back to shop</a> | <a href="index.php?mod=product&act=delcartnull"> Delete all product</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="box-total">
                    <table class="total">
                        <!-- Tổng tiền giỏ hàng -->
                        <?php 
                            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                                $total = 0;
                                foreach ($_SESSION['giohang'] as $item) {
                                    extract($item);
                                    $tt=0;
                                    $tt = $giasp * $soluong;
                                    $total += $tt;
                                    
                                }
                                echo '
                                        <tr>
                                            <td >Tổng đơn hàng:</td>
                                            <td >'.number_format($total,"0",",",".").'</td>
                                        </tr>
                                    ';
                                    
                            }
                            
                        ?>
                    </table>
                    <div class="box_voucher">
                        <form action="index.php?mod=product&act=viewcart&voucher=1" method="post">
                            <input type="hidden" name="total" value="<?=$total?>">
                            <input type="text" name="mavoucher" placeholder="Nhập mã voucher">
                            <button type="submit">Áp mã</button>
                        </form>
                    </div>
                    
                    <?php
                        
                        $giatrivoucher=0;
                        if(isset($_GET['voucher']) && ($_GET['voucher']==1)){
                            $total = $_POST['total']; // lấy từ trên form
                            $mavoucher = $_POST['mavoucher'];
                            //so sánh với db để lấy giá trị về
                            $giatrivoucher=10; //Này là mã cho nên mình nhập bao nhiêu nó vẫn trừ 10
                        }
                        $thanhtoan1 = $total - $giatrivoucher; 
                    ?>
                    <div class="box_voucher">
                        <p>Tổng tiền hiện tại <?=$thanhtoan1 ?></p>
                    </div>
                    
                <div class="total-btn">
                    <a href="index.php?mod=product&act=pay" ><span>THANH TOÁN</span></a>
                </div>
            </div>
        </section>
    </main>
