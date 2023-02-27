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
        <h1 class="h3 mb-0 text-primary font-weight-bold bg-light text-center py-1 ml-5">SOLD LIST</h1>
        <table id="sort_product" class="bg-light table table-striped table-bordered">
            <thead>
                <tr class="bg-primary text-white text-center">
                    <th scope="col">#</th>
                    <th scope="col">Sold ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Number</th>
                    <th scope="col">Address</th>

                    <th scope="col">Total</th>

                    <th scope="col">Due</th>


                </tr>
            </thead>
            <tbody class="text-dark">
                <?php
                $query = "SELECT * FROM sale_2 order by id desc";
                $sale = $db->select($query);
                if ($sale) {
                    $sn = 1;
                    while ($result = $sale->fetch_assoc()) {

                ?>
                        <tr class="text-center">
                            <td><?php echo $sn;
                                $sn++;   ?>
                            </td>
                            <td>
                                <?php echo $result['id']; ?>
                            </td>
                            <td>
                                <?php echo $result['name']; ?>
                            </td>
                            <td>
                                <?php echo $result['phone']; ?>
                            </td>
                            <td>
                                <?php echo $result['addr']; ?>
                            </td>
                            <td>
                                <?php echo $result['sub_total']; ?>
                            </td>
                            <td>
                                <?php echo $result['sub_due']; ?>
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
