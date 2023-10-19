<section class="product_admin_cata">
            <div class="container">
                <div class="table-dssp">
                    <h2>Thống kê sản phẩm theo danh mục</h2>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Loại hàng</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Trung bình</th>
                        </tr>
                        <tbody>
                            <?php
                                foreach ($list_thongke as $tk){
                                    extract($tk);
                                    echo '
                                        <tr>
                                            <td>'.$madm.'</td>
                                            <td>'.$tendm.'</td>
                                            <td>'.$countmasp.'</td>
                                            <td>'.$maxgiasp.'</td>
                                            <td>'.$mingiasp.'</td>
                                            <td>'.$avggiasp.'</td>
                                        </tr>
                                    ';
                                }
                            ?>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
</section> 