<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hasan_inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["getNewOrderItem"])) {

    $query = "SELECT * FROM tbl_product";
    $allproduts = $conn->query($query);
?>
    <tr>
        <td><b class="number">1</b></td>
        <td>
            <select name="pid[]" class="form-control form-control-sm pid" required>
                <option value="">Choose Product</option>
                <?php
                foreach ($allproduts as $row) {
                ?><option value="<?php echo $row['product_id']; ?>"><?php echo $row["product_name"]; ?></option><?php
                                                                                                            }
                                                                                                                ?>
            </select>
        </td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
        <td><input name="price[]" readonly type="text" class="form-control form-control-sm price"></span>
            <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name">
        </td>
        <td>TK.<span class="amt">0</span></td>
    </tr>
<?php
    exit();
}

if (isset($_POST["getPriceAndQty"])) {

    $id = $_POST["id"];

    $query = "SELECT * FROM tbl_product WHERE product_id= $id LIMIT 1 ";
    $result = $conn->query($query)->fetch_assoc();
    echo json_encode($result);
    exit();
}

if (isset($_POST["order_date"]) and isset($_POST["cust_name"])) {

    $orderdate = $_POST["order_date"];
    $cust_name = $_POST["cust_name"];

    $ar_tqty = $_POST["tqty"];
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_pro_name = $_POST["pro_name"];

    $sub_total = $_POST["sub_total"];
    $discount = $_POST["discount"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];

    $insert_query = "INSERT INTO invoice (customer_name, order_date, sub_total,discount,net_total,paid,due) 
    VALUES ('$cust_name','$orderdate','$sub_total','$discount','$net_total','$paid','$due') ";
    $redirect =  $conn->query($insert_query);
    $invoice_no = $conn->insert_id;
    if ($invoice_no != null) {
        for ($i = 0; $i < count($ar_price); $i++) {

            //Here we are finding the remaing quantity after giving customer
            $rem_qty = $ar_tqty[$i] - $ar_qty[$i];
            if ($rem_qty < 0) {
                return "ORDER_FAIL_TO_COMPLETE";
            } else {
                //Update Product stock
                $sql = "UPDATE tbl_product SET product_quantity = '$rem_qty' WHERE product_name = '" . $ar_pro_name[$i] . "'";
                $conn->query($sql);
            }

            $insert_product_2 = "INSERT INTO invoice_details(invoice_no, product_name, price, qty)
				 VALUES ('$invoice_no','$ar_pro_name[$i]',$ar_price[$i],$ar_qty[$i])";
            $conn->query($insert_product_2);
        }

        return $invoice_no;
    }
}
