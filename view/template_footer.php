       
        <!-- Footer Start -->
        <footer class="row">
        <div class="container">
            <div class="foo row">
                <div class="foo-it col3 row">
                    <img src="view/img/XXLOGO.png" alt="">
                    <p>Hotline:<span> 12855</span></p>
                    <p>Tech support:<span> +1 (514) 312-5678</span></p>
                    <p>Email:<span> hello@patoi.com</span></p>
                    <p>Address:<span> 1523 Cook Hill Road New Haven, CT</span></p>
                </div>
                <div class="foo-it col3 row">
                    <h3>Information</h3>
                    <a href="">About Us</a>
                    <a href="">Terms & Conditions</a>
                    <a href="">Privacy Policy</a>
                    <a href="">Refund Policy</a>
                    <a href="">Cookie Policy</a>
                </div>
                <div class="foo-it col3 row">
                    <h3>Customer service</h3>
                    <a href="">My Account</a>
                    <a href="">FAQ's</a>
                    <a href="">Order History</a>
                    <a href="">Wishlist</a>
                    <a href="">Delivery Information</a>
                </div>
                <div class="foo-it col3 row">
                    <h3>Subscribe to our newsletter!</h3>
                    <p>Sign up for our mailing list to get the latest updates news & offers.</p>
                    <input type="email" class="input_foo" placeholder="Your email address" required="" autocomplete="off">
                    <button type="submit" class="butt_foo"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </div>
            </div>
            <!---->
            
            <div class="text-foo">
                <p>Copyright @2021 Patoi. Design & Developed by EnvyTheme</p>
            </div>
        
        </div>
    </footer>
        <!-- Footer End -->
        <script src="view/js/main.js"></script>
        <script src="view/js/cart.js"></script>
        <script src="view/js/checkform.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!--Jquery-->
        <!-- Filter danh mục -->
        <!-- <script>
            //$(document).ready(function(){
           //     var active = location.search;
        //        $('#select-filter option[value="'+active+'"]').attr('selected','selected');
         //   })
            //đầu tiên lấy giá trị của từng selected về là cái value
            $('.select-filter').change(function(){
                var value = $(this).find(':selected').val(); //value=this nghĩa là khi  $('.select-filter') thì nó sẽ thay đổi // thực thi trong hàm// selected là đã chọn
                //alert(value); đã lấy đc gia trị
                
                //dùng để thêm url vào url hiện tại
                if(value!=0){
                    var url = value;
                    window.location.replace(url);//http://localhost:8080/PHP1/asignment/mohinhMVC%20-%20Copy/index.php?mod=product&act=danhmuc&madanhmuc=1/?kytu=asc
                }else{
                    //nếu nó =0 là nó chọn vào value=--lọc theoi--
                    alert("Hãy lọc sản phẩm");
                }
            })
            
        </script> -->
</body>
</html>