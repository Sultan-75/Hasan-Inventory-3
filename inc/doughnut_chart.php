 <!-- Bar Chart -->
 <?php
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_due = $row['SUM(sales_due)'];
    }
    foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE DATE(date) = DATE(NOW()) ORDER BY ex_id DESC') as $row) {
        $t_exp = $row['SUM(ex_amount)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_profit = ($row['SUM(sales_profit)']) - $t_exp;
    }
    ?>
 <div class="card shadow mb-4">
     <div class="card-body">
         <div class="chart-pie">
             <canvas id="doughnut"></canvas>

         </div>
     </div>
 </div>

 <!-- backend -->

 <div id="today_totalsale" style="display: none;">
     <?php
        echo htmlspecialchars($t_sale);
        ?>
 </div>
 <div id="today_due" style="display: none;">
     <?php
        echo htmlspecialchars($t_due);
        ?>
 </div>
 <div id="today_expence" style="display: none;">
     <?php
        echo htmlspecialchars($t_exp);
        ?>
 </div>
 <div id="today_profit" style="display: none;">
     <?php
        echo htmlspecialchars($t_profit);
        ?>
 </div>
 <script src="js/chart.js/Chart.min.js"></script>
 <script language="JavaScript" type="text/javascript">
     var div = document.getElementById("today_totalsale");
     var today_sale = div.textContent;
     var div2 = document.getElementById("today_due");
     var today_due = div2.textContent;
     var div3 = document.getElementById("today_expence");
     var today_expence = div3.textContent;
     var div4 = document.getElementById("today_profit");
     var today_profit = div4.textContent;
 </script>
 <!-- custom js  -->
 <script language="JavaScript" type="text/javascript" src="js/cus/custom.js"></script>