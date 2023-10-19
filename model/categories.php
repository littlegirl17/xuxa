<?php
    //hàm này có nghĩa là kích vào tên danhmuc thì tất cả sản phẩm liên quan đến danhmuc đó hiện ra
    function get_cata_sp($madanhmuc=0,$keyword=""){
        $sql = "SELECT * FROM sanpham WHERE 1"; // Cội nguồn
        if($madanhmuc>0){ //TH2 (là người ta muốn load sản phẩm theo danh mục)
            $sql.=" AND madanhmuc=".$madanhmuc;
        }
        if($keyword!=""){ 
            $sql.=" AND tensp LIKE'%".$keyword."%'";
        }
        $sql.=" ORDER BY masp DESC LIMIT 9"; // TH1 
        return pdo_query($sql);
    }


    // hàm này giúp bạn lấy danh sách các danh mục từ bảng daanhmuc
    function get_catagories($keyword=""){
        $sql = "SELECT * FROM daanhmuc ORDER BY madm DESC ";
       //$sql = "SELECT * FROM daanhmuc WHERE 1";
    
        if($keyword!=""){ //TH2 la vao trang san pham theo id ma danh muc
            $sql.=" AND tendm LIKE '%".$keyword."%'";
        }
        //$sql.=" ORDER BY tendm";
        return pdo_query($sql);
    }

    //lay ve catalog de sua
    //hàm này giúp bạn lấy thông tin chi tiết về một danh mục cụ thể từ bảng daanhmuc 
    function getcatalogdetail($madm){
        $sql = "SELECT * FROM daanhmuc WHERE madm=?";
        return pdo_query_one($sql,$madm); 
    }

    //cap nhat sau khi sua
    //hàm này giúp bạn cập nhật tên của một danh mục cụ thể trong bảng daanhmuc. 
    function update_catalog($madm,$tendm){
        $sql = "UPDATE daanhmuc SET tendm=? WHERE madm=?";
        pdo_execute($sql, $tendm, $madm);
    }

    //hàm này giúp bạn xóa một danh mục cụ thể từ bảng daanhmuc. Trước khi xóa, hàm kiểm tra xem có sản phẩm nào liên quan đến danh mục đó hay không.
    function delete_dm($madm){
        //kiem tra madm co la khoa ngoai khong
        $checkcata = check_catalog($madm);
        $thongbao_del = "";
        if($checkcata>0){
            $thongbao_del = "Day la khoa ngoai, khong duoc xoa";
        }else{
            $sql = "DELETE FROM daanhmuc WHERE madm = ? ";
            pdo_execute($sql,$madm);
            $thongbao_del = "Xoa thanh cong";
        }
        return $thongbao_del;
    }

    //hàm này giúp bạn chèn một danh mục mới vào bảng daanhmuc
    function insert_catalog($tendm){
        $sql = "INSERT INTO daanhmuc (tendm) VALUES ( ? )";
        pdo_execute($sql,$tendm); 
    }

    
?>