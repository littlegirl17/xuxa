<?php
    extract($detail);
?>
<form action="" method="post">
    <section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Chỉnh sửa danh mục</h2>
                </div>
                <div class="add_product">
                    <div class="add_product_one">
                        <div class="name">
                            <label for="">Tên danh mục</label> <br>
                            <input type="hidden" name="madm" value="<?=$madm?>">
                            <input type="text" placeholder="Ten danh muc" name="tendm" value="<?=$tendm?>">
                        </div>
                        <div class="add_save">
                            <input type="submit" class="save-update" value="Cập nhật" name="submit-update-dm">  
                        </div>
                    </div>
                
            </div>
            
        </div>
    </section> 
</form>

