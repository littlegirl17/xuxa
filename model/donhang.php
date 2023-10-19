<?php
    function taodonhang($iduser,$tongdonhang,$hoten,$diachi,$phone,$email,$pttt,$madonhang){
        $sql = "INSERT INTO donhang (iduser,tongdonhang,hoten,diachi,phone,email,pttt,madonhang) VALUES ('$iduser','$tongdonhang','$hoten','$diachi','$phone','$email','$pttt','$madonhang')";
        return pdo_last_insert_id($sql); //nghãi là nó insert xong nó trả về cái ID mới vừa INSERT, đẻ mình có ID ORDER , để mình sẽ insert vào bảng cart
    } //->nghĩa là sau khi tạo đơn hàng ->thì nó phải trả về ID đơn hàng vừa tạo, -> để mình lấy cái id đơn hàng đó mình insert vào viewcart cùng với mảng session

    function addtocart($iddh, $masp, $tensp, $anhsp, $giasp, $soluong) { //chèn thông tin sản phẩm vào bảng giohang trong cơ sở dữ liệu
        $sql = "INSERT INTO giohang (iddh, masp, tensp, anhsp, giasp, soluong) VALUES (?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $iddh, $masp, $tensp, $anhsp, $giasp, $soluong);
    }

    function getshowcart($iddh){
        $sql = "SELECT * FROM giohang WHERE iddh=?"; // đơn hàng kết nối với giohang thông qua iddh // DÙNG IDDH kết hợp với những cái sản phẩm trong giỏ để mình add vao cái bảng giohang
        return pdo_query($sql,$iddh);
    }

    function getdonhang($iddh){
        $sql = "SELECT * FROM donhang WHERE madh=?"; // show thông tin đơn hàng , thì chỉ không cần kết nối đến bảng nào hết thì nó sẽ lấy khóa chính của donhang
        return pdo_query($sql,$iddh);
    }

    

    //load danh sách đơn hàng
        function loadbilluser($iduser){ // có nghĩa là một user có thể có nhiều có nhiều dơn hàng
            $sql = "SELECT * FROM donhang WHERE iduser=?"; // đơn hàng kết nối với giohang thông qua iddh // DÙNG IDDH kết hợp với những cái sản phẩm trong giỏ để mình add vao cái bảng giohang
            return pdo_query($sql,$iduser);
        }

    //đếm số lượng đơn hàng trong admin (Đơn hàng của tôi)
        function getshowcart_count($iddh){
            $sql = "SELECT * FROM giohang WHERE iddh=?"; // đơn hàng kết nối với giohang thông qua iddh // DÙNG IDDH kết hợp với những cái sản phẩm trong giỏ để mình add vao cái bảng giohang
            $slbill = pdo_query($sql,$iddh);
            return count($slbill);
        }
    //Trạng thái đơn hàng trong admin (Đơn hàng của tôi)
    function getatus($n){
        switch ($n) {
            case '0':
                $tt = "Don hang moi";
                break;
            case '1':
                $tt = "dang xu li";
                break;
            case '2':
                $tt = "dang gia0 hang";
                break;
            case '3':
                $tt = "da giao";
                break;

            
            default:
            $tt = "Don hang moi";
                break;
        }
        return $tt;
    }
?>