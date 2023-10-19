<?php
    $get_login_admin = '';
    $stt = 1;
    foreach ($datauser as $item) {
        extract($item);
        $linkedit = '<a href="admin.php?mod=user&act=login_admin_edit&matk='.$matk.'">Sửa</a>';
        $linkdel = '<a href="admin.php?mod=user&act=login_admin_del&matk='.$matk.'">Xóa</a>';
        $get_login_admin .=  '
                <tr>
                    <td>'.$stt.'</td>
                    <td>'.$hoten.'</td>
                    <td>'.$email.'</td>
                    <td>'.$matkhau.'</td>
                    <td>'.$quyen.'</td>
                    <td> '.$linkedit.' / '.$linkdel.'</td>
                </tr>
        ';
    
        $stt++;
    }
?>

<section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Trang tài khoản </h2>
                    
                    <div class="add_save">

                        
                        <div class="dialog overlay" id="my-dialog">
                            <form action="" method="post">
                                <a href="#" class="overlay_close"></a>
                                <div class="dialog-body">
                                    <h3>Thêm tài khoản mới</h3>
                                    <div class="dialog-body-2">
                                        <label for="">Họ tên</label><br>
                                        <input type="text" class="input_popup" name="hoten" id=""><br>
                                        <label for="">Username</label><br>
                                        <input type="text" class="input_popup" name="email" id=""><br>
                                        <label for="">Password</label><br>
                                        <input type="text" class="input_popup" name="matkhau" id=""><br>
                                        <label for="">Quyền</label><br>
                                    
                                        <select name="quyen">
                                            <?php foreach($datauser as $item): extract($item); ?>
                                            <option value="<?=$quyen?>" selected><?=$quyen?></option>
                                            <?php endforeach; ?>
                                        </select><br>

                                        <input type="submit" class="save-btn" value="Thêm" name="submit-user-add">
                                        <div class="closee">
                                            <a href="#" class="dialog_close">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
                
                <div class="addproduct">
                <a href="#my-dialog" class="save-btn-a">Thêm tài khoản</a>
                </div>

                <div class="table_ad_cata">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Quyền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $get_login_admin ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </section> 