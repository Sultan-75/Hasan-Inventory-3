 <!-- Bar Chart -->

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
        // $output = $logic->logic_today_sale_totalAmount();
        // echo htmlspecialchars($output);
        ?>
 </div>
 <div id="today_due" style="display: none;">
     <?php
        // $output2 = $logic->logic_today_sale_due();
        // echo htmlspecialchars($output2);
        ?>
 </div>
 <div id="today_expence" style="display: none;">
     <?php
        // $output3 = $logic->logic_today_expence();
        // echo htmlspecialchars($output3);
        ?>
 </div>
 <div id="today_profit" style="display: none;">
     <?php
        // $output4 = $logic->logic_today_sale_profit();
        // echo htmlspecialchars($output4);
        ?>
 </div>
 <script src="../js/chart.js/Chart.min.js"></script>
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
 <script language="JavaScript" type="text/javascript" src="../js/cus/custom.js"></script>