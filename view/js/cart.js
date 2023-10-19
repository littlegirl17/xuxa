function tang(x){
    //thay doi soluong truc tiep DOM
    var cha = x.parentElement;
    var slold =cha.children[1];//0-1-2 (a-span-a)
    var slnew = parseInt(slold.innerHTML) + 1;
    slold.innerHTML = slnew;

}

function giam(x){
    //thay doi soluong truc tiep DOM
    var cha = x.parentElement;
    var slold =cha.children[1];//0-1-2 (a-span-a)
    if(parseInt(slold.innerHTML)>1){
        var slnew = parseInt(slold.innerHTML) - 1;
        slold.innerHTML = slnew;
    }else{
        alert("Dat hang toi thieu la 1");
    }
    // Lấy thông tin sản phẩm để cập nhật lên máy chủ

    
}