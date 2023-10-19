<form action="" method="post" enctype="multipart/form-data">
    <section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Chỉnh sửa sản phẩm</h2>
                </div>
                <div class="add_save-sp">
                    <input type="submit" class="save-update" value="save" name="submit">  
                </div>
                <div class="add_product">
                    <div class="add_product_one">
                        <div class="name">
                            <label for="">Tên sản phẩm</label> <br>
                            <input type="text"  name="tensp" value="<?=$data['sp']['tensp'] ?>">
                        </div>
                        <div class="description">
                            <label for="">Mô tả sản phẩm</label> <br>
                            <input type="text"  name="motachitiet" value="<?=$data['sp']['motachitiet'] ?>">
                        </div>
                        <div class="shor_description">
                            <label for="">Mô tả sản phẩm ngắn</label> <br>
                            <input type="text"  name="motangan" value="<?=$data['sp']['motangan'] ?>">
                        </div>
                        <div class="add_price">
                            <div class="add_price_gia">
                            <label for="">Giá mới (giá hiện tại)</label> <br>
                            <input type="text"  name="giasp" value="<?=$data['sp']['giasp'] ?>"> <br>
                            </div>
                            <div class="add_price_km">
                            <label for="">Giá cũ</label> <br>
                            <input type="text"  name="giasp2" value="<?=$data['sp']['giasp2'] ?>">
                            </div>

                            
                        </div>
                        <div class="soluong">
                            <label for="">Số lượng</label> <br>
                            <input type="text"  name="soluong" value="<?=$data['sp']['soluong'] ?>">
                        </div>
                        <div class="soluong">
                            <label for="">Promotion</label> <br>
                            <input type="text"  name="promotion" <?=$data['sp']['promotion'] ?>>
                        </div>
                        <div class="soluong">
                            <label for="">View</label> <br>
                            <input type="text"  name="view" value="<?=$data['sp']['view'] ?>">
                        </div>
                        <div class="soluong">
                            <label for="">New</label> <br>
                            <input type="text"  name="new" <?=$data['sp']['new'] ?>>
                        </div>
                    </div>
                    <div class="add_product_two">
                        <label for="">Images</label><br>
                        <img src="upload/product/<?=$data['sp']['anhsp'] ?>" alt="" style="width:100px">
                        <input type="file" name="anhsp" id="">

                        <div class="product--eidt-cata">
                            <label for="">Danh mục</label>
                        </div>

                            <select class="form-select" name="madm">
                                <?php foreach($data['dsdm'] as $dm): extract($dm); ?>
                                <option 
                                value="<?=$madm?>"
                                <?=($dm['madm']==$data['sp']['madanhmuc'])? "selected": "" ?> >
                                    <?=$tendm?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                </div>
                
            </div>
        </div>
    </section> 
</form>