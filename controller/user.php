<?php 
    //  quan ly view va model lien quan den user : login log out, them ,xoa , sua.....
    // gia bo cach hoat dong theo MVC
    session_start();
    include_once 'model/connect.php';
    include_once 'model/user.php';
    include_once 'model/donhang.php';
    if($_GET['act']){
        switch ($_GET['act']) {
            case 'login':  
                if(isset($_POST['btn-login'])){
                    $email = $_POST['email'];
                    $matkhau = $_POST['matkhau'];
                    $kq = login($email,$matkhau);
                    if($kq){
                        //dang nhap thanh cong
                        $_SESSION['user'] = $kq;
                        if($_SESSION['user']['quyen'] >= 1){ 
                            header("location: admin.php?mod=page&act=dashboard");
                        }else{
                            header("location: index.php");
                        }
                        
                    }else{
                        //dang nhap khonng thanh cong
                        $thongbao = "Email hoặc password đã sai";
                    }
                    
                }
                if(isset($_POST['submit-register'])){
                    $hoten = !empty($_POST['hoten']) ? $_POST['hoten'] : 'n/a';  //Nếu có dữ liệu được gửi từ trường 'hoten' của biểu mẫu POST, thì gán giá trị của 'hoten' đó vào biến $hoten. Nếu không có dữ liệu (hoặc dữ liệu là rỗng), thì gán giá trị 'n/a' vào biến $hoten.
                    $ngaysinh = !empty($_POST['ngaysinh']) ? $_POST['ngaysinh'] : 'n/a'; //nếu điều kiện là `false`, `$hoten` sẽ được thiết lập thành `'n/a'`.
                    $email = !empty($_POST['email']) ? $_POST['email'] : 'n/a';
                    $matkhau = !empty($_POST['matkhau']) ? md5($_POST['matkhau']) : 'n/a'; //md5 :được sử dụng để mã hóa một chuỗi dữ liệu thành một chuỗi hash dạng 32 ký tự, theo thuật toán MD5 =>Hàm này thường được sử dụng để bảo mật mật khẩu hoặc các thông tin nhạy cảm khác.
                    $kq = checkMail($email);
                    if($kq){
                        //KQ true la da co email roi 
                        //bao loi khong cho dangki
                        $thongbao2 = "Email đã tồn tại, không thể đăng ký";
                    }else{
                        //KQ sai la chua co email
                        //cho phep dang ki
                        $kq = register($hoten, $ngaysinh, $email, $matkhau);
                    }            
                }
                include_once 'view/template_head.php';
                include_once 'view/template_header.php';
                include_once 'view/user_login.php';
                include_once 'view/template_footer.php';
                break;
            //
            case 'myaccount':
                if(isset($_SESSION['user']) == false){
                    header("location: index.php?mod=user&act=login");
                    exit();//thoát liền trang web
                }//Cái này dùng để check dữ liệu, nếu chauw đăng nhập thì nó khôg được phép vào tài khoản , và chuyển nó đến trang đăng nhập
                include_once 'view/template_head.php';
                include_once 'view/template_header_account.php';
                include_once 'view/myaccount/myAccount.php';
                include_once 'view/template_footer.php';
                break;

            //UPDATE-USER
            case 'update-account':
                if(isset($_SESSION['user']) == false){
                    header("location: index.php?mod=user&act=login");
                    exit();//thoát liền trang web
                }//Cái này dùng để check dữ liệu, nếu chauw đăng nhập thì nó khôg được phép vào tài khoản , và chuyển nó đến trang đăng nhập
                if(isset($_POST['submit_up_account']) && ($_POST['submit_up_account'])){
                    $matk = $_POST['matk'];
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $matkhau = $_POST['matkhau'];
                    $sodienthoai = $_POST['sodienthoai'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $diachi = $_POST['diachi'];
                    update_account($matk,$hoten,$email,$matkhau,$sodienthoai,$ngaysinh,$diachi);
                    $_SESSION['user']['hoten'] = $hoten;//dùng để câp nhật dữ liệu mới vừa được sửa lại(để nó hiện dũ liệu mới trên input đó) - nghĩa là lưu dũ liệu mới vào session
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['matkhau'] = $matkhau;
                    $_SESSION['user']['sodienthoai'] = $sodienthoai;
                    $_SESSION['user']['ngaysinh'] = $ngaysinh;
                    $_SESSION['user']['diachi'] = $diachi;
                    //header("location: index.php?mod=user&act=myaccount");
                }
                include_once 'view/template_head.php';
                include_once 'view/template_header_account.php';
                include_once 'view/myaccount/edit_password.php';
                include_once 'view/template_footer.php';
                break;
                break;
            //FORGET PASSWORD
            case 'forgetpassword':
                if(isset($_SESSION['user']) == false){
                    header("location: index.php?mod=user&act=login");
                    exit();//thoát liền trang web
                }//Cái này dùng để check dữ liệu, nếu chauw đăng nhập thì nó khôg được phép vào tài khoản , và chuyển nó đến trang đăng nhập
                $thongbao="";
                if(isset($_POST['submit_for_password'])){
                    $email = $_POST['email'];
                    $checkpass = checkpass_word($email); $thongbao="";
                    if(is_array($checkpass)){
                        $thongbao = "Mat khau cua ban la: ".$checkpass['matkhau'];
                    }else{
                        $thongbao = "Email khong ton tai";
                    }
                    
                }
                include_once 'view/template_head.php';
                include_once 'view/template_header_account.php';
                include_once 'view/myaccount/forget_login.php';
                include_once 'view/template_footer.php';
                break;

            //Doi PASSWORD
            case 'doi_password':
                if(isset($_SESSION['user']) == false){
                    header("location: index.php?mod=user&act=login");
                    exit();//thoát liền trang web
                }//Cái này dùng để check dữ liệu, nếu chauw đăng nhập thì nó khôg được phép vào tài khoản , và chuyển nó đến trang đăng nhập

                
                $thongbao="";
                $thongbao2="";
                if(isset($_POST['submit_doi_password']) && ($_POST['submit_doi_password'])){
                    $matk = $_POST['matk'];
                    $hoten = $_POST['hoten'];
                    $matkhau = $_POST['matkhau'];
                    $matkhaumoi = $_POST['matkhaumoi'];
                    $againmatkhaumoi = $_POST['againmatkhaumoi'];
                    $checkmatkhau = checkpassold($hoten, $matkhau); //kiểm tra mật khẩu cũ
                    
                    if($checkmatkhau){
                        if($matkhaumoi == $againmatkhaumoi){ //nó phải lấy cái mknew để đem đi so sanh vơi cái mk2
                            update_matkhaunew($matk,$hoten,$matkhaumoi); //Cập nhật lại mật khẩu mới
                        }else{
                            $thongbao2 = "Mật khẩu mới và xác nhận mật khẩu không khớp";
                        }
                    }else{
                        $thongbao = "Mat khau vua nhap khong dung";
                    }

                    
                }
                include_once 'view/template_head.php';
                include_once 'view/template_header_account.php';
                include_once 'view/myaccount/doi_password.php';
                include_once 'view/template_footer.php';
                break;
            case 'donhangmyaccount':
                if(isset($_SESSION['user']) == false){
                    header("location: index.php?mod=user&act=login");
                    exit();//thoát liền trang web
                } //Cái này dùng để check dữ liệu, nếu chauw đăng nhập thì nó khôg được phép vào tài khoản , và chuyển nó đến trang đăng nhập
                include_once 'view/template_head.php';
                include_once 'view/template_header_account.php';
                include_once 'view/myaccount/donhang_myaccount.php';
                include_once 'view/template_footer.php';
                break;


            case 'login_admin': //ADMIN
                //load tai khoan tu database len
                $datauser = get_logins();
                //add tai khoan
                if(isset($_POST['submit-user-add'])){
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $matkhau = $_POST['matkhau'];
                    $quyen = $_POST['quyen'];
                    insert_user($hoten,$email,$matkhau,$quyen);
                    header("location: ?mod=user&act=login_admin");
                }
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/login_admin.php';
                break;
            // edit-ADMIN
            case 'login_admin_edit':
                $datauser = get_logins();
                //Lấy dữ liệu cũ về để sửa
                if(isset($_GET['matk']) && ($_GET['matk']>0)){
                    $matk = $_GET['matk'];
                    $detailuser = detail_user($matk);
                }
                //Sau khi sửa xong tiến hành cập nhật lại dữ liệu mới
                if(isset($_POST['submit-update-tk'])){
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $matkhau = $_POST['matkhau'];
                    $quyen = $_POST['quyen'];
                    update_user($matk,$hoten,$email,$matkhau,$quyen);
                    header("location: ?mod=user&act=login_admin");
                }
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/admin/login_admin_edit.php';
                break;

            // delete-ADMIN
            case 'login_admin_del':
                $datauser = get_logins();
                if(isset($_GET['matk'])){
                    $matk = $_GET['matk'];
                    delete_user($matk);
                    header("location: ?mod=user&act=login_admin");
                }
                include_once 'view/admin/template_admin_head.php';
                include_once 'view/admin/template_admin_header.php';
                include_once 'view/login_admin.php';
                break;
            case 'logout':
                session_unset();
                header('location: index.php');
                break;
            default:
                    # 404 - Trang web khong ton tai
                break;
        }
    }
?>