<?php
//fetch all
    //Sản phẩm mới
    function getproducthome( $keyword=""){
        //$sql = "SELECT * FROM sanpham ORDER BY masp DESC LIMIT 4";
        $sql = "SELECT * FROM sanpham WHERE 1"; // Cội nguồn
        if($keyword!=""){ 
            $sql.=" AND tensp LIKE'%".$keyword."%'";
        }
        $sql.=" ORDER BY masp DESC LIMIT 4"; // TH1 nay la san pham moi
        return pdo_query($sql);
    }

    // Sản phẩm khuyến mãi
    function getproducthome_promo(){
        $sql = "SELECT * FROM sanpham WHERE promotion>0 ORDER BY promotion DESC";
        return pdo_query($sql);
    }

    // Sản phẩm nhieu luot xem nhieu
    function getproducthome_view(){
        $sql = "SELECT * FROM sanpham WHERE view>0 ORDER BY view DESC";
        return pdo_query($sql);
    }

     //Load sản phẩm theo danh mục
    function sanpham_byhome(){
        return pdo_query("SELECT sp.*,dm.tendm FROM daanhmuc dm INNER JOIN sanpham sp ON sp.madanhmuc = dm.madm  WHERE dm.home = 1 ORDER BY thutu DESC");
    }


    //tối ưu hàm sản phẩm trang home (MỚI-SALE-VIEW)
    function showsp($dssp){ //$dssp chỉ là tham số được truyền vào
        $page_dssp = "";
        foreach ($dssp as $item) { //$dssp chỉ là tham số được truyền vào
            extract($item);
            if($giasp>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
                $gia = '<span class="">'.number_format($giasp,"0",",",".").' đ</span>';
            
            }else{
                $gia = '<span class="">Đang cập nhật</span>';
            }
            if($giasp2>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
                $giacu = '<span class="giacu">'.number_format($giasp2,"0",",",".").' đ</span>';
            }else{
                $giacu = '';
            }

            if($promotion>0){
                $promolabel = '<div class="sale"><p>-'.$promotion.'%</p></div>';
            }else{
                $promolabel = '';
            }

            if($view>0){
                $soluotxem = '<div class="box-sp-view"><h5>('.$view.' <i class="fa-solid fa-eye"></i>)</h5></div>';
            }else{
                $soluotxem = '';
            }
             //link trang chi tiet - no la mot duong dan URL
            $linkdetail = "index.php?mod=product&act=detail&idproduct=".$masp;
            echo '
                <div class="box-sp  ">
                    
                    '.$promolabel.'
                    <div class="box-sp-img">
                    <a href="'.$linkdetail.'"><img src="view/img/'.$anhsp.'" alt=""></a>
                    </div>
                    <div class="box-sp-name"><a href="'.$linkdetail.'">'.$tensp.'</a> '.$soluotxem.'</div>
                    <div class="box-sp-price">
                        <p>Giá:</p>
                        <h4 class="price"><span class="giacu">'.$giacu.'</span>'.$gia  .'</h4>
                        
                    </div>
                    <form action="index.php?mod=product&act=addcart" method="post">
                        <input type="hidden" name="masp" value="'.$masp.'"> 
                        <input type="hidden" name="anhsp" value="'.$anhsp.'">
                        <input type="hidden" name="tensp" value="'.$tensp.'">
                        <input type="hidden" name="giasp" value="'.$giasp.'">
                        <input type="hidden" name="soluong" value="1"> 
                        <div class="intro">
                            <input type="submit" name="btnaddcart" value="Đặt hàng" id="">
                        </div>
                    </form>
                </div>
            ';
        } 
        return $page_dssp;
    }
?>