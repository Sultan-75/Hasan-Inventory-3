 <?php
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $m_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(ex_amount) FROM tbl_expence WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date)=MONTH(NOW()) ORDER BY ex_id DESC') as $row) {
        $m_exp = $row['SUM(ex_amount)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $m_profit = ($row['SUM(sales_profit)']) - $m_exp;
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $m_due = $row['SUM(sales_due)'];
    }

    ?>
 <!-- Bar Chart -->
 <div class="card shadow mb-4">
     <div class="card-body">
         <div class="chart-pie">
             <canvas id="pie_month"></canvas>
         </div>
     </div>
 </div>

 <!-- backend -->

 <div id="month_totalsale" style="display: none;">
     <?php
        echo htmlspecialchars($m_sale);
        ?>
 </div>
 <div id="month_due" style="display: none;">
     <?php
        echo htmlspecialchars($m_due);
        ?>
 </div>
 <div id="month_expence" style="display: none;">
     <?php

        echo htmlspecialchars($m_exp);
        ?>
 </div>
 <div id="month_profit" style="display: none;">
     <?php

        echo htmlspecialchars($m_profit);
        ?>
 </div>

 <script src="js/chart.js/Chart.min.js"></script>
 <script>
     var div = document.getElementById("month_totalsale");
     var month_sale = div.textContent;
     var div2 = document.getElementById("month_due");
     var month_due = div2.textContent;
     var div3 = document.getElementById("month_expence");
     var month_expence = div3.textContent;
     var div4 = document.getElementById("month_profit");
     var month_profit = div4.textContent;
 </script>
 <!-- custom js  -->
 <script language="JavaScript" type="text/javascript" src="js/cus/custom_3.js"></script>