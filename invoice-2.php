<?php
include "inc/format.php";
include "inc/config.php";
include "inc/db_con.php";


$db = new Database();
$fm = new format();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        .invoice {
            background: #fff;
            padding: 10px;
        }

        .invoice-company {
            font-size: 20px;
        }

        .invoice-header {
            margin: 0 20px;
            background: #f0f3f4;
            padding: 10px;
        }

        .invoice-date,
        .invoice-from,
        .invoice-to {
            display: table-cell;
            width: 1%;
        }

        /* .invoice-from,
      .invoice-to {
        padding-right: 20px;
      } */

        .invoice-date .date,
        .invoice-from strong,
        .invoice-to strong {
            font-size: 16px;
            font-weight: 600;
        }

        .invoice-date {
            text-align: right;
            padding-left: 20px;
        }

        .invoice-price {
            background: #f0f3f4;
            display: table;
            width: 100%;
        }

        .invoice-price .invoice-price-left,
        .invoice-price .invoice-price-right {
            display: table-cell;
            padding: 20px;
            font-size: 20px;
            font-weight: 600;
            width: 75%;
            position: relative;
            vertical-align: middle;
        }

        .invoice-price .invoice-price-left .sub-price {
            display: table-cell;
            vertical-align: middle;
            padding: 0 20px;
        }

        .invoice-price small {
            font-size: 12px;
            font-weight: 400;
            display: block;
        }

        .invoice-price .invoice-price-row {
            display: table;
            float: left;
        }

        .invoice-price .invoice-price-right {
            width: 25%;
            background: #fff;
            border: #F0F3F4 3px solid;
            color: #2d353c;
            font-size: 25px;
            text-align: right;
            vertical-align: bottom;
            font-weight: 400;
        }

        .invoice-price .invoice-price-right small {
            display: block;
            opacity: 0.6;
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px;
        }

        .invoice-footer {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            font-size: 10px;
        }

        .invoice-note {
            color: #999;
            margin-top: 50px;
            font-size: 85%;
        }

        .invoice>div:not(.invoice-footer) {
            margin-bottom: 20px;
        }

        .btn.btn-white,
        .btn.btn-white.disabled,
        .btn.btn-white.disabled:focus,
        .btn.btn-white.disabled:hover,
        .btn.btn-white[disabled],
        .btn.btn-white[disabled]:focus,
        .btn.btn-white[disabled]:hover {
            color: #2d353c;
            background: #fff;
            border-color: #d9dfe3;
        }
    </style>
</head>
<?php
foreach ($db->select('SELECT SUM(total) 
FROM tbl_cart') as $row) {
    $subTotal = $row['SUM(total)'];
}
foreach ($db->select('SELECT SUM(due) 
FROM tbl_cart') as $row) {
    $subDue = $row['SUM(due)'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $num = $_POST['num'];
    $addr = $_POST['addr'];

    $query = "INSERT INTO sale_2 (name,phone,addr,sub_total,sub_due) 
    VALUES('$name','$num','$addr','$subTotal','$subDue')";
    $db->insert($query);
}
if (isset($_GET['action']) && $_GET['action'] == "delall_p") {
    $querys = " DELETE FROM tbl_cart";
    $result = $db->delete($querys);
    if ($result) {
        echo '<script>window.location="sold_list.php";</script>';
    }
}
?>

<body>
    <div class="container mt-5">
        <div class="col-md-12">
            <a href="?action=delall_p" class="text-decoration-none">
                <button onclick="printDiv('printableArea')" class="btn btn-outline-danger px-4  mb-2">Print</button>
            </a>
            <a href="sold_list.php" class="text-decoration-none">
                <button class="btn btn-outline-info px-4 mb-2 ml-5">Back</button>
            </a>

            <div class="invoice" id="printableArea">
                <!-- begin invoice-company -->
                <div class="invoice-company text-center f-w-600"><strong>Moto Gears</strong></div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->
                <div class="invoice-header">
                    <div class="container">
                        <div class="invoice-from">
                            <address class="mb-0">
                                <strong class="text-inverse text-dark font-weight-bold">Mahmudul Hasan</strong><br />
                                Taltola, Sylhet<br />
                                01715109574<br />
                                hasan111@gmail.com
                            </address>
                        </div>
                        <div class="invoice-date">
                            <div class="date text-inverse">Date : <?php echo date("d/m/Y") ?></div>
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <form oninput="x.value=name.value,y.value=num.value,z.value=addr.value" action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" id="Myid">
                                    <label class="font-weight-bold">Name:</label>
                                    <input type="text" name="name" value="" id="name" required><br>
                                </div>
                                Name: <output name="x" class="font-weight-bold"></output>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="Myid2">
                                    <label class="font-weight-bold">Phone:</label>
                                    <input type="text" name="num" value="" id="num" required><br>
                                </div>
                                Phone: <output name="y" class="font-weight-bold"></output>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" id="Myid3">
                                    <label class="font-weight-bold">Address:</label>
                                    <input type="text" name="addr" value="" id="addr" required><br>
                                    <!-- <input type="hidden" name="subt" value="" id="subt"> -->
                                </div>
                                Address: <output name="z" class="font-weight-bold"></output>
                            </div>
                        </div>
                        <div id="Myid4" class="text-center mb-1">
                            <input type="submit" class="btn btn-success px-4 py-1" value="Save Record" />
                        </div>
                    </form>
                    <table class="table table-bordered  table-hover mt-2">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Due</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Subtotal</th>
                                <th><?php echo $subDue; ?></th>
                                <th><?php echo $subTotal; ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tbl_cart ";
                            $getInvoice = $db->select($query);
                            if ($getInvoice) {
                                $sn = 1;
                                while ($result = $getInvoice->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $sn;
                                            $sn++;   ?></td>
                                        <td style="white-space:nowrap;"><?php echo $result['prd_name']; ?></td>
                                        <td><?php echo $result['price']; ?></td>
                                        <td><?php echo $result['qty']; ?></td>
                                        <td><?php echo $result['due']; ?></td>
                                        <td><?php echo $result['total']; ?></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>

                    </table>
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">THANK YOU FOR YOUR BUSINESS</p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            var x = document.getElementById("Myid");
            var y = document.getElementById("Myid2");
            var z = document.getElementById("Myid3");
            var zz = document.getElementById("Myid4");
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
            zz.style.display = "none";

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>

</html>