<section class="product_admin_cata">
            <div class="container">
                <div class="table-dssp">
                    <h2>Đơn hàng của bạn</h2>    
                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Số lượng mặt hàng</th>
                            <th>Tổng giá trị đơn hàng</th>
                            <th>Tình trạng đơn hàng</th>
                        
                        </tr>
                        <tbody>
                        <?php 
                            if(is_array($listbill)){
                                foreach($listbill as $bill){
                                    extract($bill);
                                    $statusbill = getatus($bill['status']); //trạng thái
                                    $countsp = getshowcart_count($bill['madh']);
                                    echo '
                                        <tr>
                                            <td>'.$madh.'</td>
                                            <td>'.$ngaydat.'</td>
            
                                            <td>'.$countsp.'</td>
                                            <td>'.$tongdonhang.'</td>
                                            <td>'.$statusbill.'</td>                                      
                                        </tr>
                                    ';
                                }
                            }
                        ?>
                            
                        
                        </tbody>
                    </table>
                    <!-- phan trang -->
                    <div class="product_phantrang">
                        <ul>
                            <p>Trang</p>
                            
                        
                        </ul>
                    </div>
                </div>
            </div>
</section> 

