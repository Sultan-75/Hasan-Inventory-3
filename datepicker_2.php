<?php
include "inc/header.php";

?>
<?php if (!Session::get('userRole') == '0') {
    echo "<script> window.location='dashboard.php';</script> ";
}
?>
<?php
if (isset($_GET['today'])) {

    $query = "SELECT * FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC";
    $t_sales = $db->select($query);
    $tbl_header = "TODAY'S SALE";
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_profit = $row['SUM(sales_profit)'];
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_due = $row['SUM(sales_due)'];
    }
    foreach ($db->select('SELECT SUM(sales_quantity) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_t_qty = $row['SUM(sales_quantity)'];
    }
    foreach ($db->select('SELECT SUM(sales_paid) FROM tbl_sales WHERE DATE(sales_date) = DATE(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_paid = $row['SUM(sales_paid)'];
    }
} elseif (isset($_GET['week'])) {

    $query = "SELECT * FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC ";
    $tbl_header = "THIS WEEK SALES";
    $t_sales = $db->select($query);
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_profit = $row['SUM(sales_profit)'];
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_due = $row['SUM(sales_due)'];
    }
    foreach ($db->select('SELECT SUM(sales_quantity) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_t_qty = $row['SUM(sales_quantity)'];
    }
    foreach ($db->select('SELECT SUM(sales_paid) FROM tbl_sales WHERE WEEKOFYEAR(sales_date)=WEEKOFYEAR(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_paid = $row['SUM(sales_paid)'];
    }
} elseif (isset($_GET['month'])) {
    $query = "SELECT * FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC ";
    $tbl_header = "THIS MONTH SALES";
    $t_sales = $db->select($query);
    foreach ($db->select('SELECT SUM(sales_total) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_sale = $row['SUM(sales_total)'];
    }
    foreach ($db->select('SELECT SUM(sales_profit) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_profit = $row['SUM(sales_profit)'];
    }
    foreach ($db->select('SELECT SUM(sales_due) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_due = $row['SUM(sales_due)'];
    }
    foreach ($db->select('SELECT SUM(sales_quantity) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_t_qty = $row['SUM(sales_quantity)'];
    }
    foreach ($db->select('SELECT SUM(sales_paid) FROM tbl_sales WHERE YEAR(sales_date) = YEAR(NOW()) AND MONTH(sales_date)=MONTH(NOW()) ORDER BY sales_id DESC') as $row) {
        $t_paid = $row['SUM(sales_paid)'];
    }
}
?>
<div class="container-fluid">

    <div class="row mt-3 mb-4">
        <div class="col-md-3"></div>
        <div class="col-md-2">
            <a href="?today">
                <button class="btn btn-primary btn-lg px-5">DAILY</button>
            </a>
        </div>
        <div class="col-md-2">
            <a href="?week">
                <button class="btn btn-primary btn-lg px-4">WEEKLY</button>
            </a>
        </div>
        <div class="col-md-2">
            <a href="?month">
                <button class="btn btn-primary btn-lg px-4">MONTHLY</button>
            </a>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row pb-3">
        <div class="col-md-12">
            <div class="bg-light px-2" id="printableArea">
                <?php if (isset($t_sales)) {
                    if ($t_sales == true) { ?>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <h1 class="h3 mb-0 text-primary bg-light text-center py-3 font-weight-bold"><?php echo $tbl_header ?></h1>

                            </div>
                            <div class="col-md-2 mt-3">
                                <a href="?hh" class="text-decoration-none">
                                    <button onclick="printDiv('printableArea')" class="btn btn-success px-4  mb-2">Print</button>
                                </a>
                            </div>
                        </div>
                        <hr class="bg-primary">
                        <div class="table-responsive">
                            <table id="" class="bg-light table table-striped table-bordered ">
                                <thead>
                                    <tr class="bg-primary text-white text-center">
                                        <th scope="col">#</th>

                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Buying Price</th>
                                        <th scope="col">Selling Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Due</th>
                                        <th scope="col">Profit</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php

                                    if (isset($t_sales)) {
                                        $sn = 1;
                                        while ($result = $t_sales->fetch_assoc()) {


                                    ?>
                                            <tr class="text-center">
                                                <td><?php echo $sn;
                                                    $sn++;   ?>
                                                </td>

                                                <td>
                                                    <?php echo $result['sales_cstmr_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_prdct_name']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $result['sales_buying_price']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_selling_price']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_quantity']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_total']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_paid']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_due']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $result['sales_profit']; ?>
                                                </td>
                                                <td><?php echo $fm->formatDate($result['sales_date']); ?></td>

                                            </tr>

                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr class="text-dark text-center">

                                        <th colspan="2">Summary</th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><?php if (isset($t_t_qty)) {
                                                echo $t_t_qty;
                                            } ?></th>
                                        <th><?php if (isset($t_sale)) {
                                                echo $t_sale;
                                            } ?></th>
                                        <th><?php if (isset($t_paid)) {
                                                echo $t_paid;
                                            } ?></th>
                                        <th><?php if (isset($t_due)) {
                                                echo $t_due;
                                            } ?></th>
                                        <th><?php if (isset($t_profit)) {
                                                echo $t_profit;
                                            } ?></th>
                                        <th>

                                        </th>

                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                <?php }
                }  ?>
            </div>
        </div>

    </div>






</div>

<?php include "inc/footer.php"; ?>
<script>
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>