<?php
include "inc/header.php";
?>

<?php

if (isset($_GET['mul_inv'])) {
    $mul_inv = $_GET['mul_inv'];
    $query = "SELECT * FROM tbl_sales WHERE sales_id ='$mul_inv' ";
    $inv_dat = $db->select($query)->fetch_assoc();

    $sales_prdct_name =  $inv_dat['sales_prdct_name'];
    $sales_quantity =  $inv_dat['sales_quantity'];
    $sales_selling_price =  $inv_dat['sales_selling_price'];
    $sales_total =  $inv_dat['sales_total'];
    $sales_due =  $inv_dat['sales_due'];

    $insert_query = "INSERT INTO tbl_cart (prd_name,price,qty,total,due) 
    VALUES ('$sales_prdct_name','$sales_selling_price','$sales_quantity','$sales_total','$sales_due') ";
    $insert_done = $db->insert($insert_query);
    if ($insert_done) {
        echo "<script> window.location='sold_list.php';</script> ";
    }
}

if (isset($_GET['action']) && $_GET['action'] == "delall") {
    $querys = " DELETE FROM tbl_cart";
    $result = $db->delete($querys);
    if ($result) {
        echo '<script>window.location="sold_list.php";</script>';
    }
}

$all = mysqli_query($db->link, "select cart_id from tbl_cart");
$all_cart = mysqli_num_rows($all);

?>

<!-- Container Fluid-->
<div class="container-fluid bg-white mt-0">

    <div class="pb-3">
        <div class="d-flex">
            <a href="invoice-2.php" class="btn btn-success mt-1 mb-2 py-1 mr-3">Invoice<span class="badge badge-light ml-1"><?php if ($all_cart > 0) {
                                                                                                                                echo $all_cart;
                                                                                                                            } else {
                                                                                                                                echo 0;
                                                                                                                            } ?></span></a>
            <a href="?action=delall" class="btn btn-danger mt-1 mb-2 py-1 mr-5">Clear Invoice</a>
            <h1 class="h3 mb-0 text-primary font-weight-bold bg-light text-center py-1 ml-5">SOLD LIST</h1>
        </div>
        <table id="sort_product" class="bg-light table table-striped table-bordered">
            <thead>
                <tr class="bg-primary text-white text-center">
                    <th scope="col">#</th>
                    <th scope="col">Sold ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Product Name</th>
                    <!--  <th scope="col">Buying Price</th> -->
                    <th scope="col">Selling Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Due</th>
                    <!-- <th scope="col">Profit</th> -->
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                <?php
                $query = "SELECT * FROM tbl_sales order by sales_id desc";
                $category = $db->select($query);
                if ($category) {
                    $sn = 1;
                    while ($result = $category->fetch_assoc()) {

                ?>
                        <tr class="text-center">
                            <td><?php echo $sn;
                                $sn++;   ?>
                            </td>
                            <td>
                                <?php echo $result['sales_id']; ?>
                            </td>
                            <td>
                                <?php echo $result['sales_cstmr_name']; ?>
                            </td>
                            <td>
                                <?php echo $result['sales_prdct_name']; ?>
                            </td>

                            <!-- <td>
                                <?php /* echo $result['sales_buying_price']; */ ?>
                            </td> -->
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
                            <!--  <td>
                                <?php /* echo $result['sales_profit']; */ ?>
                            </td> -->
                            <td><?php echo $fm->formatDate($result['sales_date']); ?></td>
                            <td>
                                <div class="d-flex">
                                    <a data-toggle="tooltip" data-placement="top" title="Return" onclick="return confirm('Are you sure to Return !');" href="return.php?sales_return=<?php echo $result['sales_id']; ?>" class="mr-2 font-weight-bold btn btn-sm btn-warning">
                                        <i class="fa fa-undo"></i>
                                    </a>
                                    <a href="invoice.php?invoice=<?php echo $result['sales_id']; ?>" data-toggle="tooltip" data-placement="top" title="Invoice" class="font-weight-bold btn btn-sm btn-primary">
                                        <i class="fa fa-print"></i></a>
                                    <a href="?mul_inv=<?php echo $result['sales_id']; ?>" data-toggle="tooltip" data-placement="top" title="Invoice" class="font-weight-bold btn btn-sm btn-primary ml-2">
                                        <i class="fa fa-plus"></i></a>
                                </div>
                            </td>
                        </tr>

                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>
<!---Container Fluid-->
<?php include "inc/footer.php";
