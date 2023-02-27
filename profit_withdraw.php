<?php

include "inc/header.php";
?>
<?php if (!Session::get('userRole') == '0') {
    echo "<script> window.location='dashboard.php';</script> ";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reason = $_POST["reason"];
    $amount = $_POST["amount"];

    $insert_query = "INSERT INTO tbl_p_withdraw (reason, amount) 
    VALUES ('$reason','$amount') ";

    $redirect = $db->insert($insert_query);
    if ($redirect) {
        echo "<div class='mx-auto text-light bg-success text-center py-2 px-3 w-50'> Data Insesrted Succesfuly </div>";
?>
        <meta http-equiv='refresh' content='0.5;url=profit_withdraw.php'>
<?php
    } else {
        echo "<div class='mx-auto text-light bg-danger text-center py-2 px-3 w-50'>Something Went Wrong </div>";
    }
}

?>
<?php
if (isset($_GET['delw'])) {
    $delw = $_GET['delw'];
    $delquery = "DELETE FROM tbl_p_withdraw WHERE id ='$delw' ";
    $delW = $db->delete($delquery);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="card mx-auto mt-3" style="max-width: 18rem;">
                <div class="card-title">
                    <h3 class="text-center text-danger font-weight-bold mt-4 mb-0">Withdrawal</h3>
                </div>
                <div class="card-body text-danger pt-3">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="reason" class="ml-1 text-danger">Description</label>
                            <input type="text" name="reason" class="form-control" id="reason" aria-describedby="" required />
                        </div>
                        <div class="form-group">
                            <label for="amount" class="ml-1 text-danger">Amount</label>
                            <input type="text" name="amount" class="form-control" id="amount" aria-describedby="" required />
                        </div>
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-danger btn-sm" name="submit">ADD</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-5">
            <div class="bg-white mt-3 pt-1 px-1">
                <h3 class="text-center text-primary font-weight-bold my-3">Withdrawal Table</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM tbl_p_withdraw ORDER BY id  DESC";
                            $data = $db->select($query);
                            if ($data) {
                                $sn = 0;
                                while ($result = $data->fetch_assoc()) {
                                    $sn++;

                            ?>
                                    <tr class="bg-light text-dark">
                                        <td><?php echo $sn; ?></td>
                                        <td><?php echo $result['reason']; ?></td>
                                        <td><?php echo $result['amount']; ?></td>
                                        <td><?php echo $result['date']; ?></td>
                                        <td>
                                            <a onclick="return confirm('Are You Sure to Remove ');" href="?delw=<?php echo $result['id']; ?>" class="btn btn-danger btn-sm">Remove</a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<script>
    function myFunction2() {
        var x = document.getElementById("myInput2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php include "inc/footer.php";
