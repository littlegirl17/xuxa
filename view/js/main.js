document.querySelector('#btn_bars').addEventListener('click', function(){
    document.querySelector('nav').classList.toggle('active');
})

document.querySelector('#btn_dots').addEventListener('click', function(){
    document.querySelector('.nav_dots').classList.toggle('active_dots');
});

function my_drop_user() {
    document.getElementById("drop_login").classList.toggle("show_login");
}
//
var index = 0;
function slideshow(){
    index++;
    var i = ["view/img/shoppetbanner.png","view/img/slide4.png","view/img/slide2.png","view/img/slide3.png"];
    if(index==i.length){
        index=0;
    }
    document.getElementById("slide").src = i[index]; //src chỉ định tệp nguồn của hình ảnh sẽ đucowj hiển thị //i[index] gán cho src, i mảng với giá trị hiện tại là index // i[index] : index=0 assets_user/img/1 và index=1 thì sẽ là 2.png
}
setInterval(slideshow,2500);

//
var headerSearch = document.querySelector(".header-search"); // lấy phẩn tử đầu tiên và gán ->Điều này giả định rằng trang web của bạn có một hoặc nhiều phần tử có lớp CSS "header-search".
window.addEventListener("scroll", function () { //Khi trang web được cuộn, hàm callback trong function sẽ được thực thi.
    var scrollY = window.scrollY; // Đoạn mã này lấy giá trị vị trí cuộn dọc(Y) hiện tại của trang web và lưu trữ nó trong biến scrollY.

    if (scrollY > 0) { //Nếu vị trí cuộn dọc (scrollY) lớn hơn 0, nghĩa là người dùng đã cuộn trang xuống một khoảng đáng kể
        headerSearch.style.display = "none"; // Ẩn header-search khi cuộn trang xuống
    } else { //nếu vị trí cuộn dọc (scrollY) bằng 0 hoặc nhỏ hơn, nghĩa là trang web đã cuộn về đầu trang
        headerSearch.style.display = "block"; // Hiển thị header-search khi cuộn về đầu trang
    }
});








