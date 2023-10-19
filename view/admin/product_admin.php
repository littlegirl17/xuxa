<section class="product_admin_cata">
            <div class="container">
                <div class="table-dssp">
                    <h2>Trang sản phẩm</h2>
                    <div class="addproduct">
                        <a href="admin.php?mod=product&act=admin_add_product" class="save-btn-a">Them san pham</a>
                    </div>
                    
                    <table>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên Sản phẩm</th>
                            <th>Mã sản phẩm</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                            <th>Giá cũ</th>
                            <th>Promotion</th>
                            <th>View</th>
                            <th>New</th>
                            <th>Hành động</th>
                        
                        </tr>
                        <tbody>
                            <?php foreach( $data['dssp'] as $sp): extract($sp); ?>
                                
                            <tr>
                                <td><img src="upload/product/<?=$anhsp?>" alt="" width="50px" height="50px"></td>
                                <td><?=$tensp?></td>
                                <td><?=$masp?></td>
                                <td><?=$tendm?></td>
                                <td><?=$soluong?></td>
                                <td><?=$giasp?></td>
                                <td><?=$giasp2?></td>
                                <td><?=$promotion?></td>
                                <td><?=$view?></td>
                                <td><?=$new?></td>
                                <td><a href="admin.php?mod=product&act=edit&id=<?=$masp?>">Edit</a>/ <a onclick="deleteProduct(<?=$masp?>)" href="#">Delete</a></td>
                                
                            </tr>
                            
                            <?php endforeach; ?>
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

<script>
    function deleteProduct(id){
        var kq = confirm("Bạn có muốn xóa sản phẩm này không?");
        if(kq){
            //neu kq dung la nguoi ta muon xoa
            window.location.search = '?mod=product&act=delete&id='+id;
        }else{

        }
    }
</script>