<?php

include "inc/header.php";
include "logic.php";
$fm = new format();
?>

<!-- Topbar -->

<!-- Container Fluid-->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Dashboard
            </li>
        </ol>
    </div>
    <div class="alert bg-accent text-center font-weight-bold mb-2 text-uppercase" role="alert">
        Quick Access
    </div>
    <div class="row">
        <div class="col-md-2 text-center mb-2">
            <a href="order.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">New Sale</button></a>
        </div>
        <div class="col-md-2  text-center mb-2">
            <a href="expence.php"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Expence</button></a>
        </div>
        <div class="col-md-2 text-center mb-2">
            <a href="add_product.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Add Product</button></a>
        </div>
        <div class="col-md-2 text-center mb-2">
            <a href="sold_list.php" class="text-decoration-none"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Sale List</button></a>
        </div>
        <div class="col-md-2  text-center mb-2">
            <a href="due_list.php"><button class="btn btn-accent w-100 text-white font-weight-bold py-2">Due List</button></a>
        </div>
        <div class="col-md-2 text-center mb-2">
            <a href="profit_withdraw.php"><button class="btn btn-danger w-100 text-white font-weight-bold py-2">Profit Withdraw</button></a>
        </div>
    </div>
    <div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
        Total Overview
    </div>
    <div class="row mb-3 mt-3">
        <?php if (Session::get('userRole') == '0') { ?>
            <div class="col-xl-3 col-sm-6">
                <div class="card text-white">
                    <div class="card-body text-success">
                        <div class="d-flex">
                            <i class="fas fa-dollar-sign mt-1" aria-hidden="true"></i>
                            <h5 class="ml-2">CAPITAL</h5>
                        </div>

                        <h1 class="text-center c_number"><?php echo $capital; ?></h1>
                        <hr class="w-100 bg-success" />

                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card text-white">
                    <div class="card-body text-danger">
                        <div class="d-flex">
                            <i class="fas fa-dollar-sign mt-1" aria-hidden="true"></i>
                            <h5 class="e ml-2">EXPENSES </h5>
                        </div>

                        <h1 class="text-center c_number"><?php echo $ex_amount; ?> </h1>
                        <hr class="w-100 btn-danger" />

                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-xl-3 col-sm-6">
            <div class="card text-white">
                <div class="card-body text-warning">
                    <div class="d-flex">
                        <i class="fas fa-dollar-sign mt-1" aria-hidden="true"></i>
                        <h5 class="e ml-2">DUE</h5>
                    </div>

                    <h1 class="text-center c_number"><?php echo $sales_due; ?> </h1>
                    <hr class="w-100 btn-warning" />

                </div>
            </div>
        </div>
        <?php if (Session::get('userRole') == '0') { ?>
            <div class="col-xl-3 col-sm-6">
                <div class="card text-white">
                    <div class="card-body text-success">
                        <div class="d-flex">
                            <i class="fas fa-dollar-sign mt-1" aria-hidden="true"></i>
                            <h5 class="text-uppercase ml-2">PROFIT</h5>
                        </div>

                        <h1 class="text-center c_number"><?php echo $profit; ?></h1>
                        <hr class="w-100 bg-success" />

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="row mb-3 mt-3">
        <div class="col-xl-4 col-sm-6">
            <div class="card text-white">
                <div class="card-body text-primary">
                    <div class="d-flex">
                        <i class="fas fa-motorcycle mr-2 mt-1" aria-hidden="true"></i>
                        <h5 class="ml-2">PRODUCTS</h5>
                    </div>
                    <?php
                    $ret = mysqli_query($db->link, "select product_id from tbl_product");
                    $products = mysqli_num_rows($ret);
                    ?>
                    <h4 class="display-4 text-center c_number"> <?php echo $products; ?> </h4>
                    <hr class="w-100 bg-primary" />
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-primary btn-sm px-2" href="product_list.php">View</a>
                        <?php if (Session::get('userRole') == '0') { ?>
                            <a class="btn btn-primary btn-sm px-2" href="add_product.php">Add</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (Session::get('userRole') == '0') { ?>
            <div class="col-xl-4 col-sm-6">
                <div class="card text-white">
                    <div class="card-body text-info">
                        <div class="d-flex">
                            <i class="fa fa-users mr-2 mt-1" aria-hidden="true"></i>
                            <h5 class="text-uppercase ml-2">STAFF</h5>
                        </div>
                        <?php
                        $ret = mysqli_query($db->link, "select staff_id from tbl_staff");
                        $staffs = mysqli_num_rows($ret);
                        ?>
                        <h4 class="display-4 text-center c_number"><?php echo $staffs; ?></h4>
                        <hr class="w-100 bg-info" />
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-info btn-sm px-2" href="staff_info.php">View</a>
                            <a class="btn btn-info btn-sm px-2" href="staff.php">Add</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card text-white ">
                    <div class="card-body text-primary">
                        <div class="d-flex">
                            <i class="fa fa-users mr-2 mt-1" aria-hidden="true"></i>
                            <h5 class="text-uppercase ml-2"><span class="text-success">ADMIN </span><span class="text-danger">/</span> USER</h5>

                        </div>
                        <?php
                        $admin = mysqli_query($db->link, "select * from admin where role='0' ");
                        $ad = mysqli_num_rows($admin);
                        $user = mysqli_query($db->link, "select * from admin where role='1' ");
                        $us = mysqli_num_rows($user);
                        ?>
                        <div class="text-center">
                            <h4 class="display-4 d-inline text-center text-success c_number"><?php echo $ad; ?></h4>
                            <span class=" display-4 text-danger">/</span>
                            <h4 class="display-4 d-inline text-center c_number"><?php echo $us; ?></h4>
                        </div>
                        <hr class="w-100 bg-primary" />
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary btn-sm font-weight-bold" href="setting.php">Manage</a>
                            <a type="button" class="btn btn-primary btn-sm font-weight-bold text-light" data-toggle="modal" data-target="#staticBackdrop">Add</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>
    <div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
        Today's Statistics
    </div>
    <div class="row">
        <div class="col-md-7 mt-5">
            <div class="row mb-1">
                <!-- Product Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class="font-weight-bold mt-1 text-primary">Today's Sale</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-shopping-cart text-primary"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $t_sale; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Due Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class="font-weight-bold mt-1 text-warning">Today's Due</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $t_due; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-1">
                <!-- Profit Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class="font-weight-bold mt-1 text-success">Today's Profit</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-chart-line text-success"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $t_profit; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Expence Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class="font-weight-bold mt-1 text-danger">Today's Expence</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $t_exp; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    include_once('inc/doughnut_chart.php');
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
    <div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
        This Week Sales & Expence Info
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <?php include_once('inc/pie_chart.php'); ?>
                </div>
            </div>
        </div>
        <div class="col-md-7 mt-5">
            <div class="row mb-1">
                <!-- Product Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-primary'>Weekly Sales</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-shopping-cart text-primary"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $w_sale; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Due Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-warning'>Weekly Due</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $w_due; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-success'>Weekly Profit</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-chart-line text-success"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $w_profit; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Expence Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-danger'>Weekly Expence</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $w_exp; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Profit Total -->
        </div>
    </div>
    <!--Row-->
    <div class="alert bg-accent text-center font-weight-bold mb-4 text-uppercase" role="alert">
        This MONTH Sales & Expence Info
    </div>
    <div class="row">
        <div class="col-md-7 mt-5 mb-5">
            <div class="row">
                <!-- Product Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-primary'>Monthly Sales</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-shopping-cart text-primary"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $m_sale; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Due Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-warning'>Monthly Due</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-hand-holding-usd text-warning"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $m_due; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Profit Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-success'>Monthly Profit</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-chart-line text-success"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $m_profit; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Expence Total -->
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between mx-1">
                                <div class="text-uppercase mb-1">
                                    <h6 class='font-weight-bold mt-1 text-danger'>Monthly Expence</h6>
                                </div>
                                <div class="float-right">
                                    <h4><i class="fas fa-sort-amount-down text-danger"></i></h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <strong>৳</strong><?php echo $m_exp; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <?php include_once('inc/pie_chart_2.php'); ?>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
</div>
<!-- Topbar -->
<!-- Button trigger modal -->
<!-- php code for add user form  -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $fm->validation($_POST['username']);
    $admin_pass = $fm->validation($_POST['admin_pass']);
    $role = $_POST['role'];

    $query = "INSERT INTO admin (username,admin_pass,role) values('$username','$admin_pass','$role')";
    $usesrinsert = $db->insert($query);
    if ($usesrinsert) {
        echo "<script>alert('New User Created Succesfully');</script>";
        echo "<meta http-equiv='refresh' content='0.5;url=dashboard.php' </meta>";
    }
}
?>
<!-- modal from header -- add user  -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center text-primary font-weight-bold">Add New User</h4>
                <hr class="bg-primary mt-1 mb-1">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <label for="" class="font-weight-bold ml-2">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="">
                        </div>
                        <div class="col">
                            <label for="" class="font-weight-bold ml-2">Password</label>
                            <input type="password" name="admin_pass" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-row mt-3 mb-3">
                        <div class="col">
                            <select name="role" class="form-control">
                                <option class="font-weight-bold">Select User Role</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="submit" value="Create New User" class="form-control btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End modal of add user form -->
<!---Container Fluid-->

<?php include "inc/footer.php"; ?>