<?php
    $catalog_html = '';
    $stt = 1;
    foreach ($cataloglist as  $item) {
        extract($item);
        $linkedit = '<a href="admin.php?mod=product&act=product_admin_editDM&madm='.$madm.'">Sửa</a>';
        $linkdelete = '<a href="admin.php?mod=product&act=deletedm&madm='.$madm.'">Xóa</a>';
        $catalog_html.= '
                            <tr>
                                <td>'.$stt.'</td>
                                <td>'.$tendm.'</td>
                                <td> '. $linkedit.' / '. $linkdelete.' </td>
                            </tr>
        ';

        $stt++;
    }   
?>

<section class="product_admin_cata">
        <div class="container">
            <div class="table-dssp">
                <div class="admin_add_title">
                    <h2>Trang danh mục</h2>
                    <!-- <form action="admin.php?mod=product&act=search" method="post">
                        <input type="text" placeholder="search" name="keyword">
                        <button type="submit" name="btn-search">Tim kiem</button>
                    </form> -->
                    <div class="add_save">
                        <!-- <input type="submit" class="save-btn" value="Them danh muc" name="submit-dm">   -->
                        
                        <div class="dialog overlay" id="my-dialog">
                            <form action="admin.php?mod=product&act=addcatalog" method="post">
                                <a href="#" class="overlay_close"></a>
                                <div class="dialog-body">
                                    <h3>Thêm danh mục mới</h3>
                                    <div class="dialog-body-2">
                                        <label for="">Tên danh mục</label><br>
                                        <input type="text" class="input_popup" name="tendm" id=""><br>
                                        <input type="submit" class="save-btn" value="Thêm" name="submit-dm">
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
                    <a href="#my-dialog" class="save-btn-a">Thêm danh mục</a>
                </div>

                <h6 style="color:red;"><?= $thongbao_del?></h6>
                <div class="table_ad_cata">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?=$catalog_html?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </section> 