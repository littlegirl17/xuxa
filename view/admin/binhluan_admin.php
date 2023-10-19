<?php
    $get_binhluan = '';
    $stt = 1;
    foreach ($list_binhluan as $cmt) {
        extract($cmt);
        $xoabinhluan = '<a href="admin.php?mod=product&act=binhluan_del&mabl='.$mabl.'">Xóa</a>';
        $get_binhluan .=  '
                <tr>
                    <td>'.$mabl.'</td>
                    <td>'.$makhachhang.'</td>
                    <td>'.$masanpham.'</td>
                    <td>'.$noidung.'</td>
                    <td>'.$ngaybl.'</td>
                    <td>'.$xoabinhluan.'</td>
                </tr>
        ';
    
        $stt++;
    }
?>

<section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Trang danh sách bình luận </h2>
                    <?=  $thongbao_binhluan ; ?>
                    
                    <div class="add_save">
                    </div>
                </div>
                
                <div class="table_ad_cata">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>mã khách hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $get_binhluan ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </section> 