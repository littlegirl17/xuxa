<?php
    function insert_binhluan( $makhachhang, $masp,$noidung, $ngaybl){
        $sql = "INSERT INTO binhluan ( makhachhang, masanpham, noidung, ngaybl) VALUES(?,?,?,?)";
        pdo_execute($sql,  $makhachhang, $masp,$noidung, $ngaybl); 
    }
    function load_binhluan($masp){
        $sql = "SELECT * FROM binhluan WHERE masanpham = ? ORDER BY mabl DESC";
        return pdo_query($sql,$masp);
    }

    function loadall_binhluan(){
        $sql = "SELECT * FROM binhluan ";
        return pdo_query($sql);
    }

    function delete_binhluan($mabl){
        $sql = "DELETE FROM binhluan WHERE mabl=?";
        pdo_execute($sql,$mabl);
    }
?>