<?php
    session_start();
    ob_start(); // khởi tạo 1 cái đối tượng, để 1 số trình duyệt cũ nó không báo lỗi chuyển trang header
    // nếu giỏ hàng này không tồn tại thf mình khởi tạo cho no cái giỏ hàng
    if(!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = array();
    }
    
    include_once 'model/connect.php';
    include_once 'model/page.php';
    include_once 'model/categories.php';
    include_once 'model/product.php';
    include_once 'model/donhang.php';
    include_once 'model/binhluan.php';
    include_once 'model/giohang.php';
    //quan li trang san pham, ctsp, gio hang,...
    if($_GET['act']){
        switch ($_GET['act']) {
            case 'danhmuc':
                $keyword = ""; 
                if (isset($_POST['submit-home'])) {
                    $keyword = $_POST['keyword'];
                    
                } else {
                    $keyword = "";  // Set a default keyword if the form hasn't been submitted
                     // Initialize an empty array to store search results
                }
                
                if(isset($_GET['madanhmuc']) && ($_GET['madanhmuc']>0)){
                    $madanhmuc = $_GET['madanhmuc'];
                }else{
                    $madanhmuc = 0; //Nếu nó không tồn tại hay người ta chơi mình thì nó cũng phải bằng 0 để nó vẫn load được sp
                }
                $productlist = get_cata_sp($madanhmuc,$keyword); // hàm này dùng để load dữ liệu sản phẩm lên 
                $danhmuc_list = get_catalog();
                $name_cata = gettend($madanhmuc); //dùng để lấy cái tên riêng của từng danh mục khi click
                
                //$danhmuc_name = get_name();
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/product_danhmuc.php';
                include_once 'view/template_footer.php';
                break;
    
            case 'binhluan':
                if(isset($_POST['gui_binhluan']) && ($_POST['gui_binhluan']>0)){
                    $makhachhang = $_SESSION['user']['matk'];
                    $masp = $_POST['masp'];
                    $noidung = $_POST['noidung'];
                    $ngaybl = date("h:i:sa d/m/y");
                    insert_binhluan( $makhachhang, $masp,$noidung, $ngaybl);//Thêm bình luận vào DB , Thêm vào mới SELECT ra được
                }
                    header("location: index.php?mod=product&act=detail&idproduct=$masp");
                break;
            case 'detail':
                if(isset($_GET['idproduct']) && ($_GET['idproduct']>0)){
                    //gan cho no cai bien
                    $idproduct = $_GET['idproduct']; // id cua san pham
                    //chi tiet san pham
                    $detail = getproductdetail($idproduct);

                    //view ra san pham lien quan
                    $madanhmuc = getmadanhmuc($idproduct); // id cua danh muc - dùng để load ra sản phẩm liên quan
                    $related = get_related_product($madanhmuc,$idproduct); //$madanhmuc trả về sp cùng danh muc , nhung khac voi id hien tai
                    
                    $loadcmt = load_binhluan($idproduct);  //ttaij vì idproduct bên chi tiết là cái tên biến masp(lấy masp từ idproduct)
                    include_once 'view/template_head.php';
                    include_once 'view/template_header.php';
                    include_once 'view/product_detail.php';
                    include_once 'view/template_footer.php';
                }else{
                    header("location: index.php"); //click vo khong co gi thi cho no ve lai trang chu
                }
                
                break;
                
            case 'delcart': // xoa từng san pham trong cart
                if(isset($_GET['ind']) && ($_GET['ind']>=0)){
                    array_splice($_SESSION['giohang'],$_GET['ind'],1);
                    header("location: index.php?mod=product&act=viewcart");
                }
                
                break;
            case 'delcartnull': // xoa het tat ca san pham trong cart
                if(isset($_SESSION['giohang'])){
                    unset($_SESSION['giohang']);
                    header("location: index.php");
                }
                
                break;
            case 'viewcart': // show cart
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/product_cart.php';
                include_once 'view/template_footer.php';
                break;

            case 'addcart': 
                //lấy dữ liệu từ form về 
                if(isset($_POST['btnaddcart']) && ($_POST['btnaddcart']!="")){
                    $masp = $_POST['masp'];
                    $tensp = $_POST['tensp'];
                    $anhsp = $_POST['anhsp'];
                    $giasp = $_POST['giasp'];
                    if(isset($_POST['soluong']) && ($_POST['soluong']>0)){
                        $soluong = $_POST['soluong']; //dành cho trang chi tiết
                    }else{
                        $soluong = 1; //dành cho trang home , dssp
                    }
                     // phải đẩy tất cả dữ liệu này vào giỏ hàng và lưu trên session
                    $flag = 0; //nếu biến này =0 thì số lượng không thay , và khi số lượng này không thay đổi thì nó không trùng sản phẩm trong giỏ hàng

                    //Kiểm tra sản phẩm bị trùng (nếu sản phẩm đã có thì chỉ cập nhật lại số lượng, còn không thì thêm mới)
                        // + nếu sản phẩm đã có thì chỉ cập nhật lại số lượng
                        $i=0; // i để định vị mình đang ở cái sản phẩm nào mà check // i có nghĩa là: ở phần tử thứ i mình cập nhật lại cái số lượng
                            foreach ($_SESSION['giohang'] as $item) {
                                
                                if($item['tensp'] == $tensp){
                                    $soluongnew = $soluong + $item['soluong'];
                                    $_SESSION['giohang'][$i]['soluong']=$soluongnew; // và sô lượng mới này mình cộng vào cái vị trí sản phẩm
                                    $flag = 1; // và gán lại biến tạm = 1
                                    break; // sau khi check xong thì thoát luôn
                                }
                                $i++;
                            }
                        // + còn không thì thêm sản phẩm vào lại giỏ hàng

                    // khởi tạo mảng con, trước khi thêm vào giỏ hàng
                    if($flag==0){
                        $sp = [
                            "masp"=>$masp,
                            "tensp"=>$tensp,
                            "anhsp"=>$anhsp,
                            "giasp"=>$giasp,
                            "soluong"=>$soluong
                        ];
                        $_SESSION['giohang'][]=$sp;
                    }
                    
                    header("location: index.php");
                }
                
                break;  
            
            case 'pay':
                
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/product_thanhtoan.php';
                include_once 'view/template_footer.php';
                break;
            case 'donhang' :
                if(isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])){
                    // lay du lieu
                    if(isset($_SESSION['user'])){ //nếu nó tồn tại sét sình user
                        $iduser=$_SESSION['user']['matk'];//gán vào iduser: nếu đơn hàng này mà nó có matk thì mình lưu thêm vô
                    }else{
                        $iduser=0; // ngược lại là đơn hàng mới , là khách hàng mới không cần đăng nhập người ta cũng đặt hàng được
                    }
                    $tongdonhang = $_POST['tongdonhang'];
                    $hoten = $_POST['hoten'];
                    $diachi = $_POST['diachi'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                        if(isset($_POST['pttt'])){
                            $pttt = $_POST['pttt'];
                        }else{
                            $pttt="";
                        }
                    $madonhang ="XUXA".rand(0,999999); //
                    // tao don hang 
                    // va tra ve mot id don hang
                    $iddh = taodonhang($iduser,$tongdonhang,$hoten,$diachi,$phone,$email,$pttt,$madonhang); // ĐÂY LÀ: THÔNG TIN ĐƠN HÀNG 
                    $_SESSION['iddh']=$iddh; // LƯU LẠI BẰNG SESSION
                    
                    if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                        foreach ($_SESSION['giohang'] as $item) {
                            extract($item);
                            addtocart($iddh,$masp,$tensp,$anhsp,$giasp,$soluong); // ĐÂY LÀ: THÔNG TIN VỀ MỘT SẢN PHẨM 
                        }
                        unset($_SESSION['giohang']);//nghĩa là sau khi sản phẩm đó được đặt, và quay lại trang chủ thì sản phẩm đó phải biến mất trong giỏ hàng
                    }
                }
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/donhang.php';
                include_once 'view/template_footer.php';
                break;

            case 'donhang_admin':
                include_once 'model/connect.php';
                include_once 'model/user.php';
                include_once 'model/donhang.php';
                $listbill = loadbilluser($_SESSION['user']['matk']);
                //print_r($listbill);
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_bill.php';
                break;

            case 'admin_product': // (san pham)
                // if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen']>=1)){
                //     header("location: index.php");
                // }

                // if(isset($_GET['page']) && ($_GET['page'])!=""){
                //     $soluong = count_products()['soluong'];
                //     $sotrang = ceil($soluong / 2);
                //     ($_GET['page']-1)*2,2);
                
                // }
                $data['dssp'] = get_products();

                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin.php';
                
                break;
//ADMIN Thống kê 
            case 'thongke':
                $list_thongke = load_thongke_dm();
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/admin_thongke.php';
                break;
                
// case của bảng SẢN PHẨM
            case 'admin_add_product': //add sanr pham trong admin (trang con cua san pham)
                // if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen']=='admin')){
                //     header("location: index.php");
                // }
                $data['dsdm'] = get_catagories();


                if(isset($_POST['submit'])){
                    //print_r($_FILES);
                    //return ;
                    $kq = add_product($_POST['tensp'],
                        $_POST['motachitiet'],
                        $_POST['motangan'],
                        $_POST['giasp'],
                        $_POST['giasp2'],
                        $_POST['soluong'],
                        $_POST['madm'],
                        $_POST['promotion'],
                        $_POST['view'],
                        $_POST['new'],
                        $_FILES['anhsp']['name']
                    );
                    if($kq){
                        //kq true da them sp vao co so du lieu
                        if( $_FILES['anhsp']['error']==0){
                            //anh khong loi
                            $kq = move_uploaded_file(
                                $_FILES['anhsp']['tmp_name'],
                                "upload/product/". $_FILES['anhsp']['name']
                            );
                        }
                        if($kq){
                            //kq dung da them anh thanh cong
                            header("location:admin.php?mod=product&act=admin_add_product ");
                        }else{
                            //neu sai thong bao loi
                            $thongbao = "co loi xay ra vui long thu lai sau";
                        }
                    }else{
                        //neu ket qua nay sai, thong bao loi
                        $thongbao = "co loi xay ra vui long thu lai sau";
                    }
                    header("location: admin.php?mod=product&act=admin");
                }
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_add.php';
                
                break;
            




        // case edit của bảng SẢN PHẨM
            case 'edit':
                // if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen']>=1)){
                //     header("location: index.php");
                // }
                
                $data['dsdm'] = get_catagories();
                if(isset($_GET['id'])){
                    $data['sp'] = get_product($_GET['id']);
                }
                

                if(isset($_POST['submit'])){
                    //print_r($_FILES);
                    //return ;
                    //gan $anh = anh moi
                    $anh = $_FILES['anhsp']['name'];
                    if($_FILES['anhsp']['error']!=0){
                        //ko co anh or anh bi loi
                        //thi lay lai anh cu
                        $anh = $data['sp']['anhsp'];
                    }
                    $kq = edit_product(
                        $_GET['id'],
                        $_POST['tensp'],
                        $_POST['motachitiet'],
                        $_POST['motangan'],
                        $_POST['giasp'],
                        $_POST['giasp2'],
                        $_POST['soluong'],
                        $_POST['madm'],
                        $_POST['promotion'],
                        $_POST['view'],
                        $_POST['new'],
                        $anh
                    );
                    if($kq){
                        //kq true da them sp vao co so du lieu
                        if( $_FILES['anhsp']['error']==0){
                            //anh khong loi
                            $kq = move_uploaded_file(
                                $_FILES['anhsp']['tmp_name'],
                                "upload/product/". $_FILES['anhsp']['name']
                            );
                        }
                        if($kq){
                            //kq dung da them anh thanh cong
                            header("location:admin.php?mod=product&act=admin ");
                        }else{
                            //neu sai thong bao loi
                            $thongbao = "co loi xay ra vui long thu lai sau";

                        }
                    }else{
                        //neu ket qua nay sai, thong bao loi
                        $thongbao = "co loi xay ra vui long thu lai sau";

                    }
                    header("location: admin.php?mod=product&act=admin");
                }
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_edit.php';
                
                break;
            




        // case xóa sản phẩm của bảng SẢN PHẨM
            case 'delete':
                // if(!(isset($_SESSION['user']) && $_SESSION['user']['quyen']=='admin')){
                //     header("location: index.php");
                // }
                include_once 'model/connect.php';
                include_once 'model/product.php';
        
                if(isset($_GET['id'])){
                    $kq = delete_get_product($_GET['id']);
                    if($kq){
                        //kq true xoa thanh cong va chuyen trang
                        header("location: admin.php?mod=product&act=admin");
                    }else{
                        $thongbao = "co loi xay ra";
                    }
                    header("location: admin.php?mod=product&act=admin"); //true
                }
                
                break;




    
// case của bảng DANH MỤC
            case 'admin_catagory': //add danh muc trong admin (danhmuc)
                include_once 'model/connect.php';
                include_once 'model/categories.php';
                $cataloglist = get_catagories();
                $thongbao_del ="";
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_catagory.php';
                
                break;




            
        // case thêm danh mục của bảng DANH MỤC (popup)
            case 'addcatalog': 
                //khi nguoi ta submit-dm form catalog thi no chay ve cai case nay
                
                $cataloglist = get_catagories();
                $thongbao_del ="";
                //them moi catalog
                if(isset($_POST['submit-dm'])){
                    $tendm = $_POST['tendm'];
                    insert_catalog($tendm);
                    header("location: admin.php?mod=product&act=admin_catagory");
                }

                //load lai danh muc
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_catagory.php';
                break;




            
        // case xóa danh mục trong bảng DANH MỤC
            case 'deletedm': 
                $cataloglist = get_catagories();
                //lay id ve 
                if(isset($_GET['madm']) && ($_GET['madm']>0)){
                    $madm = $_GET['madm'];
                    $thongbao_del = delete_dm($madm);
                }
                //-> delete

                //load lai danh muc
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_catagory.php';
                break;




            
        // case sửa danh mục trong bảng DANH MỤC
            case 'product_admin_editDM': 
                $cataloglist = get_catagories();
                // lay danh muc 
                if(isset($_GET['madm']) && ($_GET['madm']>0)){
                    $madm = $_GET['madm'];
                    $detail = getcatalogdetail($madm);
                }
                //print_r($detail);
                if(isset($_POST['submit-update-dm'])){
                    $madm = $_POST['madm'];
                    $tendm = $_POST['tendm'];
                    update_catalog($madm,$tendm);
                    header("location:admin.php?mod=product&act=admin_catagory");
                }
            
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_editDM.php';
                break;
//BINH LUAN
            case 'binhluan_admin':
                $thongbao_binhluan = "";
                $list_binhluan = loadall_binhluan();
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/binhluan_admin.php';
                
                break; 
            case 'binhluan_del':
                if(isset($_GET['mabl']) && ($_GET['mabl']>0)){
                    $mabl = $_GET['mabl'];
                    $thongbao_binhluan = delete_binhluan($mabl);
                    if($thongbao_binhluan===true){
                        echo 'success';
                    }else{
                        echo 'fail'; 
                    }
                }
                break;
            // case search trong bảng DANH MỤC
            case 'search':
                if(isset($_POST['btn-search'])){
                    $keyword = $_POST['keyword'];
                }
                $cataloglist = get_catagories($keyword);
                $thongbao_del= "";
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/product_admin_catagory.php';
                break;

            
            default:
            // nếu sự lựa chọn không có trong case thì cho chuyển về home
                include_once 'model/connect.php';
                include_once 'model/page.php';
                $newproduct = getproducthome();
                $saleproduct = getproducthome_promo();
                $viewproduct = getproducthome_view();
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/page_home.php';
                include_once 'view/template_footer.php';
                break;
        }
    }
?>