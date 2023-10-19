<?php
    //thuc hien tuong tac với bảng user va bằng tai khoan trong csdl
    // co cac ham, lenh sql , de tuong tac voiw CSDL
    function login($email,$matkhau){
        $sql = "SELECT * FROM taikhoan WHERE email = ? AND matkhau = ? "; // cau lenh
        return pdo_query_one($sql,$email,$matkhau);
    }

    function register($hoten, $ngaysinh, $email, $matkhau){
        $sql = "INSERT INTO taikhoan (`hoten`, `ngaysinh`, `email`, `matkhau`) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $hoten, $ngaysinh, $email, $matkhau);
    }
    function checkMail($email){
        $sql = "SELECT * FROM taikhoan WHERE email=?";
        return pdo_query_one($sql, $email);
    }

    //update-account
    function update_account($matk,$hoten,$email,$matkhau,$sodienthoai,$ngaysinh,$diachi){
        $sql = "UPDATE taikhoan SET hoten=?, email=?, matkhau=?, sodienthoai=?, ngaysinh=?, diachi=? WHERE matk=?";
        pdo_execute($sql, $hoten, $email, $matkhau,$sodienthoai,$ngaysinh,$diachi,$matk);
    }
    //
    function checkpass_word($email){
        $sql = "SELECT * FROM taikhoan WHERE email=?";
        return pdo_query_one($sql,$email);
    }

    //doi mat khau
    function checkpassold($hoten, $matkhau){
        $sql = "SELECT * FROM taikhoan WHERE hoten = ? AND matkhau = ?";
        return pdo_query_one($sql, $hoten, $matkhau);
    }
    function update_matkhaunew($matk,$hoten,$matkhaumoi){
        $sql = "UPDATE taikhoan SET hoten=?, matkhau=? WHERE matk=?";
        pdo_execute($sql, $hoten,$matkhaumoi,$matk);
    }


    // load tat ca tai khoan tu database len  - admin
    function get_logins(){
            $sql = "SELECT * FROM taikhoan";
            return pdo_query($sql);
    }

    //add tai khoan - admin
    function insert_user($hoten,$email,$matkhau,$quyen){
        $sql = "INSERT INTO taikhoan (hoten, email, matkhau, quyen) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, $hoten, $email, $matkhau, $quyen);
    }

    //edit - admin
    function detail_user($matk){
        $sql = "SELECT * FROM taikhoan WHERE matk=?";
        return pdo_query_one($sql,$matk);
    }
    // function detail_user1($matk){
    //     $sql = "SELECT * FROM taikhoan WHERE matk = ? ";
    //     return pdo_query_one($sql,$matk);
    // }
    //update - admin
    function update_user($matk,$hoten,$email,$matkhau,$quyen){
        $sql = "UPDATE taikhoan SET hoten=?, email=?, matkhau=?, quyen=? WHERE matk=?";
        pdo_execute($sql, $hoten, $email, $matkhau, $quyen, $matk);
    }
    //delete - admin
    function delete_user($matk){
        $sql = "DELETE FROM taikhoan WHERE matk= ? ";
        pdo_execute($sql,$matk);
    }

?>

