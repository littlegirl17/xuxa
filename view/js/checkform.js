// CHECK FORM ĐĂNG KÝ
function kiemtra_dk(){
    //hoten 
    var hoten = document.getElementById("hoten");
    if(hoten.value==""){
        document.getElementById("alert-register").innerHTML="Họ tên không để trống";
        hoten.focus();
        return false;
    }else{
        var regex_hoten = /^[A-Za-z\s]+$/; //Biểu thức chính quy
        if(!regex_hoten.test(hoten.value)){//Nếu giá trị hoten không phù hợp voi Biểu thức chính quy //bạn cần sử dụng phương thức test() của biểu thức chính quy.
            document.getElementById("alert-register").innerHTML="Họ tên không nhập các ký tư dặc biệt";
            hoten.focus();
            return false;
        }else{
            if(hoten.value.length > 50 ){
                document.getElementById("alert-register").innerHTML="Họ tên không quá 50 ký tự";
                hoten.focus();
                return false;
            }
        }
    }
    
    //ngay sinh
    if(ngaysinh.value==""){
        document.getElementById("alert-register").innerHTML="Ngày sinh không để trống";
        ngaysinh.focus();
        return false;
    }

    //username
    if(username.value==""){
        document.getElementById("alert-register").innerHTML="Email không để trống";
        username.focus();
        return false;
    }else{
        var regex_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; //TRUE
        if(!regex_email.test(username.value)){//Nếu giá trị username không phù hợp voi Biểu thức chính quy
            document.getElementById("alert-register").innerHTML="Email không đúng định dạng";
            username.focus();
            return false;
        }
    }

    //password
    if(matkhau.value==""){
        document.getElementById("alert-register").innerHTML="Mật khẩu không để trống";
        matkhau.focus();
        return false;
    }else{
        if(matkhau.value.length>=10){
            document.getElementById("alert-register").innerHTML="Mật khẩu không quá 10 ký tự";
            matkhau.focus();
            return false;
        }
    }
}

// CHECK FORM ĐĂNG NHẬP
function kiemtra_dn(){
    var emaillogin = document.getElementById("emaillogin");
    if(emaillogin.value==""){
        document.getElementById("alert-login").innerHTML="Email không được để trống";
        emaillogin.focus();
        return false;
    }else{
        var regex_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; //TRUE
        if(!regex_email.test(emaillogin.value)){//Nếu giá trị username không phù hợp voi Biểu thức chính quy
            document.getElementById("alert-login").innerHTML="Email không đúng định dạng";
            emaillogin.focus();
            return false;
        }
    }

    var matkhaulogin = document.getElementById("matkhaulogin");
    if(matkhaulogin.value==""){
        document.getElementById("alert-login").innerHTML="Mật khẩu không được để trống";
        matkhaulogin.focus();
        return false;
    }
}

// CHECK FORM THANH TOÁN ĐƠN HÀNG
function kiemtra_thanhtoan(){
    var hoten = document.getElementById("hoten");
    if(hoten.value==""){
        document.getElementById("alert_thanhtoan_hoten").innerHTML="Họ tên không để trống";
        hoten.focus();
        return false;
    }else{
        var regex_hoten = /^[A-Za-z\s]+$/; //Biểu thức chính quy
        if(!regex_hoten.test(hoten.value)){//Nếu giá trị hoten không phù hợp voi Biểu thức chính quy //bạn cần sử dụng phương thức test() của biểu thức chính quy.
            document.getElementById("alert_thanhtoan_hoten").innerHTML="Họ tên không nhập các ký tư dặc biệt";
            hoten.focus();
            return false;
        }else{
            if(hoten.value.length > 50 ){
                document.getElementById("alert_thanhtoan_hoten").innerHTML="Họ tên không quá 50 ký tự";
                hoten.focus();
                return false;
            }
        }
    }

    var diachi = document.getElementById("diachi");
    if(diachi.value==""){
        document.getElementById("alert_thanhtoan_diachi").innerHTML="Địa chỉ không để trống";
        diachi.focus();
        return false;
    }

    var sdt= document.getElementById("sdt");
    if(sdt.value==""){
        document.getElementById("alert_thanhtoan_sdt").innerHTML="Số điệnt thoại không để trống";
        sdt.focus();
        return false;
    }else{
        if(sdt.value.length>=11){
            document.getElementById("alert_thanhtoan_sdt").innerHTML="Số điện thoại quá 10 số, vui lòng nhập lại";
            sdt.focus();
            return false;
        }
        if(sdt.value.slice(0,1)!="0"){////slice() là 0, vì chúng ta muốn lấy ký tự đầu tiên của chuỗi sdt. Tham số thứ hai là 1, bởi vì chúng ta muốn lấy một ký tự duy nhất từ chuỗi
            document.getElementById("alert_thanhtoan_sdt").innerHTML="Số điện thoại phải bắt đầu bằng số 0, vui lòng nhập lại";
            sdt.focus();
            return false;
        }
    }

    var email = document.getElementById("email");
    if(email.value==""){
        document.getElementById("alert_thanhtoan_email").innerHTML="Email không để trống";
        email.focus();
        return false;
    }else{
        var regex_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; //TRUE
        if(!regex_email.test(email.value)){//Nếu giá trị email không phù hợp voi Biểu thức chính quy
            document.getElementById("alert_thanhtoan_email").innerHTML="Email không đúng định dạng";
            email.focus();
            return false;
        }
    }

    var pttt = document.getElementById("pttt");
    if(!pttt.checked){
        document.getElementById("alert_thanhtoan_pttt").innerHTML="pttt không để trống";
        pttt.focus();
        return false;
    }
}



setInterval(function(){
    document.getElementById("alert-register").innerHTML="";
},7000);

setInterval(function(){
    document.getElementById("alert-login").innerHTML="";
},7000);

setInterval(function(){
    document.getElementById("alert_thanhtoan_hoten").innerHTML="";
},7000);
setInterval(function(){
    document.getElementById("alert_thanhtoan_diachi").innerHTML="";
},7000);
setInterval(function(){
    document.getElementById("alert_thanhtoan_sdt").innerHTML="";
},7000);
setInterval(function(){
    document.getElementById("alert_thanhtoan_email").innerHTML="";
},7000);
setInterval(function(){
    document.getElementById("alert_thanhtoan_pttt").innerHTML="";
},7000);
