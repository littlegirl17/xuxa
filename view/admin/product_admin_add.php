<form action="" method="post" enctype="multipart/form-data">
    <section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                <h2>Thêm sản phẩm</h2>
                
                <div class="add_save-sp">
                    <input type="submit" class="save-update" value="save" name="submit">  
                </div>
                </div>
                <div class="add_product">
                    <div class="add_product_one">
                        <div class="name">
                        <label for="">Tên sản phẩm</label> <br>
                            <input type="text" placeholder="name" name="tensp">
                        </div>
                        <div class="description">
                        <label for="">Mô tả sản phẩm</label> <br>
                            <input type="text" placeholder="Chi tiết sản phẩm (dài)" name="motachitiet">
                        </div>
                        <div class="shor_description">
                        <label for="">Mô tả sản phẩm ngắn</label> <br>
                            <input type="text" placeholder="Chi tiết sản phẩm (ngắn)" name="motangan">
                        </div>
                        <div class="add_price">
                            <div class="add_price_gia">
                            <label for="">Giá mới (giá hiện tại)</label> <br>
                            <input type="text"placeholder="Giá mới (giá hiện tại)" name="giasp"> <br>
                            </div>
                            <div class="add_price_km">
                            <label for="">Giá cũ</label> <br>
                            <input type="text" placeholder="Giá cũ" name="giasp2">
                            </div>

                            
                        </div>
                        <div class="soluong">
                        <label for="">Số lượng</label> <br>
                            <input type="text" placeholder="Số lượng" name="soluong">
                        </div>
                        <div class="soluong">
                            <label for="">Promotion</label> <br>
                            <input type="text" placeholder="Phần trăm giảm giá một sản phẩm" name="promotion">
                        </div>
                        <div class="soluong">
                            <label for="">View</label> <br>
                            <input type="text" placeholder="Số lượt xem" name="view">
                        </div>
                        <div class="soluong">
                            <label for="">New</label> <br>
                            <input type="text" placeholder="Sản phẩm mới" name="new">
                        </div>
                    </div>
                    <div class="add_product_two">
                        <label for="">Images</label><br>
                        <input type="file" name="anhsp" id="">
                        <div class="product--eidt-cata">
                            <label for="">Danh mục</label>
                        </div>
                            <select class="form-select" name="madm">
                                <?php foreach($data['dsdm'] as $dm): extract($dm); ?>
                                <option value="<?=$madm?>"><?=$tendm?></option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>
                
            </div>
        </div>
    </section> 
</form>