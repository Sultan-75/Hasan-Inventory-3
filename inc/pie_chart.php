 <!-- Bar Chart -->

 <?php
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $w_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $w_due = $row['SUM(sales_due)'];
    }
    foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE WEEKOFYEAR(date)=WEEKOFYEAR(NOW()) ORDER BY ex_id DESC') as $row) {
        $w_exp = $row['SUM(ex_amount)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $w_profit = ($row['SUM(sales_profit)']) - $w_exp;
    }
    ?>

 <div class="card shadow mb-4">
     <div class="card-body">
         <div class="chart-pie">
             <canvas id="pie"></canvas>
         </div>
     </div>
 </div>

 <!-- backend -->

 <div id="weekly_totalsale" style="display: none;">
     <?php
        echo htmlspecialchars($w_sale);
        ?>
 </div>
 <div id="weekly_due" style="display: none;">
     <?php
        echo htmlspecialchars($w_due);
        ?>
 </div>
 <div id="weekly_expence" style="display: none;">
     <?php
        echo htmlspecialchars($w_exp);
        ?>
 </div>
 <div id="weekly_profit" style="display: none;">
     <?php
        echo htmlspecialchars($w_profit);
        ?>
 </div>

 <script src="js/chart.js/Chart.min.js"></script>
 <script>
     var div = document.getElementById("weekly_totalsale");
     var week_sale = div.textContent;
     var div2 = document.getElementById("weekly_due");
     var week_due = div2.textContent;
     var div3 = document.getElementById("weekly_expence");
     var week_expence = div3.textContent;
     var div4 = document.getElementById("weekly_profit");
     var week_profit = div4.textContent;
 </script>
 <!-- custom js  -->
 <script language="JavaScript" type="text/javascript" src="js/cus/custom_2.js"></script>