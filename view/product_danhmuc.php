<?php 
    // show bang danhmuc
    $danhmuclist = '';
    foreach ($danhmuc_list as $item) {
        extract($item);
        $linkdanhmuc = "index.php?mod=product&act=danhmuc&madanhmuc=".$madm;
        $danhmuclist .=  '
            <li class="category-dm">
                <a href="'.$linkdanhmuc.'">'.$tendm.'</a> <span>('.get_count_sp($madm).')</span><i class="fa-solid fa-chevron-down"></i>
            </li> ';
    }
    
    // show san pham trong danh muc
    $product_list = '';
    foreach ($productlist as $key => $item) {
        extract($item);
        if($giasp>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
            $gia = '<span class="">'.$giasp.' đ</span>';
        
        }else{
            $gia = '<span class="">Đang cập nhật</span>';
        }
        if($giasp2>0){ // neu giasp2 lon hon 0 thi moi cho no show ra
            $giacu = '<span class="giacu">'.$giasp2.' đ</span>';
        }else{
            $giacu = '';
        }

        if($promotion>0){
            $promolabel = '<div class="sale"><p>-'.$promotion.'%</p></div>';
        }else{
            $promolabel = '';
        }
    
        $linkdetail = "index.php?mod=product&act=detail&idproduct=".$masp;
        $product_list .= '
            <div class="box-sp  ">
                '.$promolabel.'
                <div class="box-sp-img">
                <a href="'.$linkdetail.'"><img src="view/img/'.$anhsp.'" alt=""></a>
                </div>
                <div class="box-sp-name"><a href="'.$linkdetail.'">'.$tensp.'</a> </div>
                <div class="box-sp-price">
                    <p>Giá:</p>
                    <h4 class="price"><span class="giacu">'.$giacu.'</span>'.$gia.'</h4>
                </div>
                <form action="index.php?mod=product&act=addcart" method="post">
                    <input type="hidden" name="anhsp" value="'.$anhsp.'">
                    <input type="hidden" name="tensp" value="'.$tensp.'">
                    <input type="hidden" name="giasp" value="'.$giasp.'">
                    <input type="hidden" name="masp" value="'.$masp.'"> 
                    <input type="hidden" name="soluong" value="'.$soluong.'">
                    <div class="intro">
                        <input type="submit" name="btnaddcart" value="Đặt hàng" id="">
                    </div>
                </form>
            </div>
        ';
    }
?>  


    <div class=" ">
        <div class="banner-cart ">
            <img src="view/img/bannerxx3.png" alt="">
        </div>
    </div>
    <main>
        <section>
            <div class="container">
                <div class="danhmuc-title">
                    <ul>
                        <li><a href="">Trang chu</a></li>
                        <!-- truy xuất tên danh mục cho một danh mục cụ thể -->
                        <li><a href=""><?=$name_cata?></a></li>   
                    </ul>
                </div>
            </div>
        </section>

        <!--------------------->
        <div class="container">
            <div class="danhmuc-all">
                <div class="danhmuc-box-left">
                    <div class="dm-left">
                        <div class="dm-left-one">
                            <div class="dm-left-title">
                                <h2>Danh muc san pham</h2>
                            </div>
                            <ul>
                                <!-- dang show dsdm thi cho nay no phai la iddm get_count_sp($madm) -->
                                <?=$danhmuclist?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="danhmuc-box-right">
                    <!-- <div>
                        <select class="select-filter" name="" id="select-filter">
                            <option value="0">Lọc theo</option>
                            <option value="?kytu=asc">Ký tự A-Z</option>
                            <option value="?kytu=desc">Ký tự Z-A</option>
                            <option value="?gia=asc">Giá tăng dần</option>
                            <option value="?gia=desc">Giá giảm dần</option>
                        </select>
                    </div> -->
                    <div class="dm-title">
                        <!-- truy xuất tên danh mục cho một danh mục cụ thể -->
                        <?=$name_cata?>
                    </div>
                    <div class="box-danhmuc-three">
                        <div class="box row">
                            <!-- show sanr pham trong danh muc -->
                            <?=$product_list?>
                        </div>
                    </div>

                    <div class="box row">
                    </div>
                </div>
            </div>
        </div>
    </main>