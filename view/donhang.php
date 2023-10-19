
<main>

    <section>
        <div class="container-thanhtoan">
            <div class="payment-lr">
                <div class="payment-left">
                    
                </div> 
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="left-order">    
                <div class="order_two">
                    <!-- show thong tin nguoi dat hang -->
                    <?php
                        if(isset($_SESSION['iddh']) && ($_SESSION['iddh'])){ 
                            $orderinfo = getdonhang($_SESSION['iddh']);
                                if((isset($orderinfo)) && count($orderinfo)>0){
                                    foreach($orderinfo as $item){
                                        extract($item);
                    ?>
                    
                                <div class="donhang_title">
                                    <h2><i class="fa-solid fa-circle-info"></i> Thông tin người đặt hàng</h2>
                                </div>
                                
                                <div class="inform-nguoinhan">
                                    <div class="inform-nguoinhan-img">
                                        <img src="view/img/gd.jpg" alt="">
                                    </div>
                                    <p><i class="fa-solid fa-calendar-days" style="color: #259CD8;"></i>Ngày đặt hàng: <span><?=$ngaydat?></span></p>
                                    <p>Mã đơn hàng: <span><?=$madonhang?></span></p>
                                    <p><i class="fa-regular fa-user" style="color: #259CD8;"></i>Tên người nhận: <span><?=$hoten?></span></p>
                                    <p><i class="fa-solid fa-location-dot" style="color: #259CD8;"></i>Địa chỉ: <span><?=$diachi?></span></p>
                                    <p><i class="fa-solid fa-phone" style="color: #259CD8;"></i>Số điện thoại: <span><?=$phone?></span></p>
                                    <p><i class="fa-regular fa-envelope" style="color: #259CD8;"></i>Địa chỉ email: <span><?=$email?></span></p>
                                    <p><i class="fa-solid fa-notes-medical" style="color: #259CD8;"></i>Ghi chú đơn hàng (tuỳ chọn) <span>
                                    <p><i class="fa-brands fa-paypal" style="color: #259CD8;"></i>Phương thức thanh toán:<span>
                                    <?php
                                    
                                        switch ($pttt) {
                                            case '1':
                                                $txt="Trả tiền mặt khi nhận hàng";
                                                break;
                                            case '2':
                                                $txt="Chuyển khoản ngân hàng";
                                                break;
                                            case '3':
                                                $txt="Thanh toan vi momo";
                                                break;
                                            case '4':
                                                $txt="Thanh toan online";
                                                break;

                                            
                                            default:
                                                $txt="quy khach chua chon pttt";
                                                break;
                                        }
                                        echo ''.$txt.'</span></p>';
                                        
                                    ?>
                                
                                    <?php
                                            }
                                            }
                                        }else{
                                            echo 'taikhoan trong';
                                        }
                                    ?>
                                </div>
                </div>

            <div class="order_one">
                        <div class="donhang_title">
                            <h2><i class="fa-solid fa-cart-shopping"></i> Thông tin đơn hàng</h2>
                        </div>
                        <table class="order-table">
                            <tr class="title-product">
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                            <tbody class="order-tr-td">
                                <!-- show thong tin san pham  -->
                                <?php
                                    if(isset($_SESSION['iddh']) && ($_SESSION['iddh']>0)){ 
                                        $getshowcart = getshowcart($_SESSION['iddh']);
                                        if(isset($getshowcart) && count($getshowcart)>0){
                                            $stt = 1;
                                            $tt=0;
                                            $i = 0;
                                            //$soluong = 1;
                                            foreach ($getshowcart as $item) {
                                                extract($item);
                                                $tt = $giasp * $soluong ;
                                                echo '
                                                <tr class="">
                                                <td>'.$stt.'</td>
                                                <td class="table-order-img">
                                                    
                                                        <img src="view/img/'.$anhsp.'" alt="">
                                                        <h3>'.$tensp.'</h3>

                                                </td>
                                                <td class="">'.number_format($giasp,"0",",",".").'</td>
                                                <td class="">
                                                    
                                                    <input type="number" min=1 max=20 value="'.$soluong.'">

                                                    
                                                    </div>
                                                </td>
                                                <td>'.number_format($tt,"0",",",".").'</td>
                                                
                                                </tr>
                                                    ';
                                                $i++;
                                                $stt++;
                                            }
                                        }
                                    }else{
                                        echo 'giỏ hàng trống <a href="index.php">tiếp tục đặt hàng</a>';
                                    }
                                ?>                           
                            </tbody>
                        </table>
                        <div class="box-total-donhang">
                            <table class="total-donhang"> 
                                <!-- show total -->
                                <?php  
                                    if(isset($_SESSION['iddh']) && ($_SESSION['iddh']>0)){
                                        if(isset($getshowcart)){
                                            $total = 0;
                                            //$soluong = 1;
                                            foreach ($getshowcart as $item) {
                                                extract($item);
                                                $tt=0;
                                                $tt = $giasp * $soluong;
                                                $total += $tt;
                                                
                                            }
                                            echo '
                                                    <tr class="total_order">
                                                    <td class="total_order1">Tổng đơn hàng:<span>'.number_format($total,"0",",",".").' VND</span></td>
                                                    </tr>
                                                ';
                                                
                                        }
                                    }else{
                                        echo 'gio hang trong';
                                    }
                                ?>
                            </table>
                            <div class="total-donhang--back">
                                <a href="index.php?mod=page&act=home">Tiếp tục đặt hàng <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            
        </div>
    
        
        
    </section>
   
</main>