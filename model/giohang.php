<?php
    function giohang(){
        $html_giohang = '';
        if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
            $stt = 1;
            $tt=0;
            $i = 0;
            foreach ($_SESSION['giohang'] as  $item) {
            extract($item);
            $tt = $giasp * $soluong ;
            $linkdelete = "index.php?mod=product&act=delcart&ind=".$i;
                echo '
                    <tr class="product">
                    <td>'.$stt.'</td>
                    <td class="product-cart">
                        <a href="">
                            <img src="view/img/'.$anhsp.'" alt="">
                            <h3>'.$tensp.'</h3>
                        </a>
                    </td>
                    <td class="product-price">'.number_format($giasp,"0",",",".").'</td>
                    <td class="tanggiam_soluong">
                        <a href="" class="cart_giam" onclick="giam(this)">-</a>
                            <span>'.$soluong.'</span>
                        <a href="" class="cart_tang" onclick="tang(this)">+</a></td>
                    <td>'.number_format($tt,"0",",",".").'</td>
                    <td>   <a href="'.$linkdelete.'"><i class="fa-regular fa-trash-can" style="color: #ff0000;"></i></i></a></td>
                    </tr>
                    ';
                $i++; 
                $stt++;
                }
            }
            return $html_giohang;
    }

    // function totalgiohang(){
    //     $html_total = '';
    //     if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
    //         $total = 0;
    //         foreach ($_SESSION['giohang'] as $item) {
    //             extract($item);
    //             $tt=0;
    //             $tt = $giasp * $soluong;
    //             $total += $tt;
                
    //         }
    //         echo '
    //                 <tr>
    //                     <td >Tổng đơn hàng:</td>
    //                     <td >'.number_format($total,"0",",",".").'</td>
    //                 </tr>
    //             ';
                
    //     }
    //     return $html_total;
    // }

?>