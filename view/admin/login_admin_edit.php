<?php
    extract($detailuser); //ext no ra thi minh moi lay duoc du lieu cu
?>

<form action="admin.php?mod=user&act=login_admin_edit" method="post" enctype="multipart/form-data">
    <section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Chỉnh sửa tài khoản</h2>
                </div>
                <div class="add_save-sp">
                    <input type="submit" class="save-update" value="save" name="submit-update-tk">  
                </div>
                <input type="hidden" name="matk" value="<?=$matk?>">
                <div class="add_product">
                    <div class="add_product_one">
                        <div class="name">
                            <label for="">Họ tên</label> <br>
                            <input type="text"  name="hoten" value="<?=$hoten?>">
                        </div>
                        <div class="name">
                            <label for="">Email</label> <br>
                            <input type="text" name="email" value="<?=$email?>">
                        </div>
                        <div class="name">
                            <label for="">Mật khẩu</label> <br>
                            <input type="text"  name="matkhau" value="<?=$matkhau?>">
                        </div>
                        <div class="name">
                            <label for="">Quyen</label> <br>
                            <input type="text"  name="quyen" value="<?=$quyen?>">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section> 
</form>