
<section class="product_admin_cata">
    <div class="container">
        <div class="table-dssp">
            <h2>Bảng điều khiển</h2>
            
            <div id="piechart"></div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'số lượng sản phẩm'],
                    <?php
                        $tongdm = count($list_thongke); //đếm số lượng các danh mục và gán
                        $i=1;
                            foreach ($list_thongke as $tk){
                                extract($tk);
                                if($i==$tongdm) $dauphay=""; else $dauphay=",";// nếu cái i đó nó bằng danh mục cuối cùng thì nó ko có dấu , || và ngược lại thì có
                                echo "['".$tendm."',".$countmasp."]".$dauphay; //mình count cái masp để biết nó đếm số lượng của sản phẩm đó: vd: có 4 cái masp, thò danh mục con chó TỒN TẠI SỐ LƯỢNG 4 CON
                                $i+=1;
                            }
                        
                    ?>
                
                    ]);

                    // Optional; add a title and set the width and height of the chart
                    var options = {'title':'Biểu đồ thống kê danh mục', 'width':550, 'height':400};

                    // Display the chart inside the <div> element with id="piechart"
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                    }
                </script>
        </div>
    </div>
</section> 