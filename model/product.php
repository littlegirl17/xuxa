<?php 
  // Hàm dẫn đến getproductdetailchi tiết của từng sản phẩm
  function getproductdetail($idproduct){
    $sql = "SELECT * FROM sanpham WHERE masp= ? ";
    return pdo_query_one($sql,$idproduct); 
  }

  // hàm được dùng lấy mã danh mục của một sản phẩm dựa trên mã sản phẩm được truyền vào
  function getmadanhmuc($idproduct){
    $sql = "SELECT madanhmuc FROM sanpham WHERE masp=?";
    $getone = pdo_query_one($sql, $idproduct);
    extract($getone);
    return $madanhmuc;
  }

  // hàm dùng để lấy danh sách các sản phẩm liên quan có cùng danh mục
   function get_related_product($madanhmuc,$idproduct){  //lấy những sản phẩm cùng danh mục
    $sql = "SELECT * FROM sanpham WHERE madanhmuc=? AND masp<> ? ORDER BY masp DESC";
    return pdo_query($sql,$madanhmuc,$idproduct); // kết quả dưới dạng một mảng.
  }


  //hàm này lấy danh sách tất cả các danh mục từ bảng daanhmuc
  function get_catalog(){
      $sql="SELECT * FROM daanhmuc ORDER BY thutu DESC "; // * chọn tất cả cột, của bảng daanh mục,(ORDER BY)và sắp xếp các kết quả theo cột tendm
      return pdo_query($sql);  // kết quả dưới dạng một mảng.
  }
  
  //truy xuất tên danh mục cho một danh mục cụ thể -->
  function gettend($madanhmuc) {
    $sql = "SELECT tendm FROM daanhmuc WHERE madm = ?";
    $result = pdo_query_one($sql,$madanhmuc);// Tra ve 1 
    if($result){
       return $result['tendm']; // Trả lại tên danh mục trực tiếp
    }else{
      return false;
    }
  }

  //dem so luong san pham theo danh muc
  function get_count_sp($madm){ //cái $madm nó không liên quan tới id ở ngoài kia 
    $sql = "SELECT * FROM sanpham WHERE madanhmuc = ? ";
    $count_sp = pdo_query($sql,$madm);
    return count($count_sp);
  }
  

  //hàm này đếm và trả về số lượng sản phẩm có trong bảng sanpham
  function count_products(){
    $sql = "SELECT count(*) AS soluong FROM sanpham"; // cau lenh
    return pdo_query_one($sql);
  }

  //lay ra san pham tu database hien len trong admin
  // hàm này lấy danh sách sản phẩm từ bảng sanpham, kèm theo thông tin tên danh mục từ bảng daanhmuc
  function get_products(){
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp  INNER JOIN daanhmuc dm ON sp.madanhmuc=dm.madm"; // cau lenh
    return pdo_query($sql);
  }

  //lay sp nay ra de edit
  //hàm này giúp bạn lấy thông tin chi tiết của một sản phẩm cụ thể từ bảng sanpham, kèm theo tên danh mục tương ứng từ bảng daanhmuc
  function get_product($id){
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp  INNER JOIN daanhmuc dm ON sp.madanhmuc=dm.madm WHERE sp.masp = ?"; // cau lenh
    return pdo_query_one($sql,$id);
  }
  
  //them san pham tu tai trang admin
  // hàm này thêm một sản phẩm mới vào bảng sanpham trong cơ sở dữ liệu
  function add_product($tensp,$motachitiet,$motangan,$giasp,$giasp2,$soluong,$madanhmuc,$promotion,$view,$new,$anhsp){
    $sql = "INSERT INTO sanpham (`tensp`, `motachitiet`, `motangan`, `giasp`, `giasp2`, `soluong`, `madanhmuc`, `promotion`, `view`, `new`, `anhsp`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $tensp, $motachitiet, $motangan, $giasp, $giasp2, $soluong, $madanhmuc, $promotion, $view, $new, $anhsp);
  }

  // hàm này giúp bạn cập nhật thông tin của một sản phẩm đã tồn tại trong bảng sanpham
  function edit_product($masp,$tensp,$motachitiet,$motangan,$giasp,$giasp2,$soluong,$madanhmuc,$promotion,$view,$new,$anhsp){
    $sql = "UPDATE sanpham SET `tensp`=?, `motachitiet`=?, `motangan`=?, `giasp`=?, `giasp2`=?, `soluong`=?, `madanhmuc`=?, `promotion`=?, `view`=?, `new`=?, `anhsp`=? WHERE masp=?";
    pdo_execute($sql, $tensp, $motachitiet, $motangan, $giasp, $giasp2, $soluong, $madanhmuc, $promotion, $view, $new, $anhsp, $masp);
  }

  //hàm này giúp bạn xóa một sản phẩm khỏi bảng sanpham dựa trên mã sản phẩm. 
  function delete_get_product($masp){
    $sql = "DELETE FROM sanpham WHERE masp=?";
    pdo_execute($sql, $masp);
  }

  //check khoa ngoia cua catalog
  function check_catalog($madanhmuc){
    $sql = 'SELECT COUNT(*) FROM sanpham WHERE madanhmuc=?';
    $count = pdo_query_value($sql, $madanhmuc);
    return $count;
  }

  //
  function load_thongke_dm(){ //
    $sql = "SELECT daanhmuc.madm as madm, daanhmuc.tendm as tendm , COUNT(sanpham.masp) as countmasp, MAX(sanpham.giasp) as maxgiasp, MIN(sanpham.giasp) as mingiasp, AVG(sanpham.giasp) as avggiasp";
    $sql .= " FROM sanpham LEFT JOIN daanhmuc ON daanhmuc.madm=sanpham.madanhmuc"; //từ bảng sản phẩm kết nối đến bảng danhmuc ĐỂ LẤY ĐƯỢC THÔNG TIN CẢ HAI BẢN
    $sql .= " GROUP BY daanhmuc.madm ORDER BY daanhmuc.madm DESC"; //Nhóm theo cột madm của bảng daanhmuc:điều này có nghĩa là bạn sẽ có một bản ghi cho mỗi danh mục riêng biệt.
    return pdo_query($sql);//Tại sao dùng leftjoin: để khi danhmuc nào trống or khi sản phẩm nào trống chúng vẫn có mặt trong kết quả
  }
  /*
  as: là đặt tên; 
  count: đếm số lượng các hàng(row) or cột(column)
  max: Trả về giá trị lớn nhất trong 1 cột cụ thể của bảng
  min: Trả về giá trị nhỏ nhất trong 1 cột cụ thể của bảng
  avg: tính giá trị trung bình của các giá trị trong một cột cụ thể của một bảng
  left join: là loại kết nối 2 or nhiều bảng, và bao gồm tất cả các hàng từ bảng bên trái (bảng gốc) và các hàng từ bảng bên phải (bảng được kết nối) 
  gruop by: nhóm các hàng (rows) trong một bảng dựa trên giá trị của một hoặc nhiều cột để áp dụng các phép toán(như SUM(), COUNT(), AVG(), MAX(), MIN(), vv.)
  */



  //search product
  function search_product($keyword){ 
    $sql = "SELECT sp.*, dm.tendm FROM sanpham sp  INNER JOIN daanhmuc dm ON sp.madanhmuc=dm.madm WHERE sp.tensp LIKE '%".$keyword."%'"; // cau lenh
    return pdo_query($sql);
  }
?>






















<!--
$sql = "SELECT sp.*, dm.tendm FROM sanpham sp  INNER JOIN daanhmuc dm ON sp.madanhmuc=dm.madm"; // cau lenh

-chọn tất cả các cột từ bảng sanpham, thêm một cột tendmtừ bảng daanhmuc -> Cụ thể, nó sẽ lấy tất cả các cột từ bảng sanphamvà cột tendmtừ bảng daanhmuc.
-INNER JOIN để kết hợp hai bảng "sanpham" và "daanhmuc" -> hai bảng được sử dụng là sanpham(được đại diện bởi sp) và daanhmuc(được đại diện bởi dm)
-ON được sử dụng để xác định điều kiện ghép bảng

kết luận:
- truy vấn sẽ kết hợp hai bản ghi này thành một dòng dữ liệu trong kết quả trả về.
Cuối cùng, kết quả của truy vấn sẽ chứa thông tin về các cột của bảng "sanpham" và cột "tendm" từ bảng "daanhmuc" cho những bản ghi mà thỏa mãn điều kiện INNER JOIN.
-->