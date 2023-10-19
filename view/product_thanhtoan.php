

<main>
    <form action="index.php?mod=product&act=donhang" method="post">
        <!-- Start PHP -->
        <?php  
            if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                $total = 0;
                $soluong = 1;
                foreach ($_SESSION['giohang'] as $item) {
                    extract($item);
                    $tt=0;
                    $tt = $giasp * $soluong;
                    $total += $tt;
                }
            }  
        ?>
        <!-- End PHP -->
        <input type="hidden" name="tongdonhang" value="<?=$total?>">
        <section>
            <div class="container-thanhtoan">

                    <div class="payment-lr">
                        <div class="payment-left">
                            <div class="payment-left-h2">
                                <h2>Thông tin thanh toán</h2>
                            </div>
                            
                            <div class="form-left-1">
                                <span>Họ tên</span> <br>
                                <input type="text" name="hoten" id="hoten" placeholder="Thông tin họ tên">
                            </div>
                            <div id="alert_thanhtoan_hoten" class="baoloi_dangky"></div>
                            <div class="form-left-2">
                                <span>Địa chỉ</span><br>
                                <input type="text" name="diachi" id="diachi" placeholder="Thông tin địa chỉ"><br>
                            </div> 
                            <div id="alert_thanhtoan_diachi" class="baoloi_dangky"></div>
                            <div class="form-left-2">   
                                <span>Số điện thoại</span><br>
                                <input type="text" name="phone" id="sdt" placeholder="Số điện thoại"><br>
                            </div>
                            <div id="alert_thanhtoan_sdt" class="baoloi_dangky"></div>
                            <div class="form-left-2"> 
                                <span>Email</span><br>
                                <input type="text" name="email" id="email" placeholder="Thông tin email">
                            </div>
                            <div id="alert_thanhtoan_email" class="baoloi_dangky"></div>
                        </div>
                        <div class="payment-ct-rg">
                            <div class="payment-left-h2">
                                <h2>Tổng tiền giỏ hàng</h2>
                            </div>
                            
                            <table class="table_payment">
                            <!-- start foreach PHP-->
                            <tr>
                                <td>Tên </td>
                                <td>Giá</td>
                                <td>SL</td>
                            </tr>
                            <?php 
                                $alltotal = 0; 
                                foreach($_SESSION['giohang'] as $item): extract($item);
                                    $tt = $giasp * $soluong; //Biến $tt thể hiện tổng tiền cho sản phẩm này.
                                    $alltotal += $tt;
                            ?>
                                <tr>
                                    <th style="color: #259CD8;"><?=$tensp?></th>
                                    <th><?=number_format($giasp,"0",",",".")?></th>
                                    <th><?=$soluong?></th>
                                </tr>
                                <tr class="table_payment-total">
                                    <th>Tổng tiền</th>
                                    <th></th>
                                    <th><?=number_format($tt,"0",",",".")?></th>
                                </tr> 
                            <?php endforeach; ?>
                            <?php ?>
                                <tr class="table_payment-total-2">
                                    <th>Tổng đơn hàng</th>
                                    <th></th>
                                    <th><?=number_format($alltotal,"0",",",".")?></th>
                                </tr> 
                            </table>
                        </div>
                    </div>
            </div>
        </section>

        <section>
            
            <div class="container-thanhtoan">
                <div class="payment-right">
                    <div class="payment-right-1">
                        <input type="checkbox"><span>Giao hàng tới địa chỉ khác?</span> <br>
                    </div>
                    <div class="payment-right-2">
                        <span>Ghi chú đơn hàng (tuỳ chọn)</span><br>
                        <input type="text" placeholder="Ghi chú về đơn hàng">
                    </div>
                    <div id="alert_thanhtoan_diachi" class="baoloi_dangky"></div>
                </div>
                <div class="payment-box-2">
                    <div class="payment-radio" >
                        <div class="payment-radio-1">
                            <input type="radio" name="pttt" id="pttt" value="1">
                            <span>Trả tiền mặt khi nhận hàng</span>  
                        </div>
                        <div class="payment-radio-1">
                            <input type="radio" name="pttt" id="pttt" value="2">
                            <span>Chuyển khoản ngân hàng</span>
                        </div>
                        <div class="payment-radio-1" >
                            <input type="radio" name="pttt" id="pttt" value="3">
                            <span>Thanh toan vi momo</span>
                        </div>
                        <div class="payment-radio-1">
                            <input type="radio" name="pttt" id="pttt" value="4">
                            <span>Thanh toan online</span>
                        </div>
                    </div>
                    <div id="alert_thanhtoan_pttt" class="baoloi_dangky"></div>
                    <div class="payment-button">
                        <input type="submit" onclick="return kiemtra_thanhtoan()" class="save-update" value="Đặt Hàng" name="thanhtoan">
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>
