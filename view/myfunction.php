
<!-- đẩy sản phẩm của giỏ hàng lên -->
<?php 
    // function showcart($giohang){
    //     $mycart="";
    //     $stt = 1;
    //     $i=0;
    //     //delete
    //     if(isset($_GET['del']) && ($_GET['del']>=0)){
    //         array_splice($_SESSION['giohang'],$_GET['del'],1);
    //     }

        
    //     foreach ($giohang as $item) {
    //         extract($item);
    //         $soluong = 1;
    //         $link="cart.php?del=".$i;
    //         $tt = $soluong * $giasp;
    //         $mycart .='
    //                         <tr class="product">
    //                         <td>'.$stt.'</td>
    //                         <td class="product-cart">
    //                             <a href="">
    //                                 <img src="'.$img.'" alt="">
    //                                 <h3>'.$tensp.'</h3>
    //                             </a>
    //                         </td>
    //                         <td class="product-price">'.number_format($giasp,"0",",",".").'</td>
    //                         <td class="product-quantity">
    //                             <div class="quantt">
    //                                 <span class="minus"><i class="fa-solid fa-minus"></i></span>
    //                             <input type="text" value="'.$soluong.'">
    //                             <span class="plus"><i class="fa-solid fa-plus"></i></span>
    //                             </div>
    //                         </td>
    //                         <td>'.number_format($tt,"0",",",".").'</td>
    //                         <td><a href="'.$link.'"><i class="fa-regular fa-trash-can" style="color: #ff0000;"></i></i></a></td>
    //                     </tr>
    //         ';
    //         $stt++;
    //         $i++;
    //     }
    //     return $mycart;
    
    // }
    // // tổng tiền của sản phẩm giỏ hàng
    // function total($giohang){
    //     $soluong = 1;
    //     $total = "";
    //     $tong = 0;
    //     foreach ($giohang as $item) {
    //     extract($item);
    //     $tt = $soluong * $giasp;
    //     $tong += $tt;
    //     $total  = '
    //                         <tr>
    //                             <td >Tổng đơn hàng:</td>
    //                             <td >$'.number_format($tong,"0",",",".").'</td>
    //                         </tr>
    //             ';
    //     }
    //     return $total;
    // }
//-------------------------------------------------------------------------------------------------------------------------------------------
?>