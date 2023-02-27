<?php
include "session.php";
Session::checkSession();
?>
<?php
include "config.php";
include "db_con.php";
include "format.php";
// include "doughnut_chart.php";

?>
<?php
$userId = Session::get('userId');
$userrole = Session::get('userRole');
?>
<?php
$db = new Database();
$fm = new format();

?>
<?php
if (isset($_GET['action']) && $_GET['action'] == "logout") {
    Session::destroy();
}
?>
<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$nav_active_action = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- fontawsome css -->
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <!-- Boostrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- datatable css file -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="css/dashboard.css" />
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fa fa-motorcycle fa-3x"></i>
                </div>
                <!-- <div class="sidebar-brand-text mx-3">Amin & Tahmid</div> -->
            </a>
            <hr class="sidebar-divider my-0" />

            <li class="nav-item <?php if ($nav_active_action == "dashboard") {
                                    echo "active";
                                } else {
                                    echo "noactive";
                                } ?>">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider" />
            <div class="sidebar-heading mb-1">Dashboard Features</div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Company" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-motorcycle" aria-hidden="true"></i>
                    <span>Products </span>
                </a>
                <div id="Company" class="collapse <?php if ($nav_active_action == "add_product" or $nav_active_action == "product_list") {
                                                        echo "show";
                                                    } else {
                                                        echo "notahow";
                                                    } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Products</h6>

                        <a class="collapse-item <?php if ($nav_active_action == "product_list") {
                                                    echo "active";
                                                } else {
                                                    echo "noactive";
                                                } ?>" href="product_list.php">Product Lists</a>
                        <?php if (Session::get('userRole') == '0') { ?>
                            <a class="collapse-item <?php if ($nav_active_action == "add_product") {
                                                        echo "active";
                                                    } else {
                                                        echo "noactive";
                                                    } ?>" href="add_product.php"> Add Product</a>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Managers" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Sales</span>
                </a>
                <div id="Managers" class="collapse <?php if ($nav_active_action == "sold_list") {
                                                        echo "show";
                                                    } else {
                                                        echo "notahow";
                                                    } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sales</h6>
                        <a class="collapse-item <?php if ($nav_active_action == "sold_list") {
                                                    echo "active";
                                                } else {
                                                    echo "noactive";
                                                } ?>" href="sold_list.php">Sold List</a>



                    </div>
                </div>
            </li>
            <?php if (Session::get('userRole') == '0') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#Drivers" aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Staff</span>
                    </a>
                    <div id="Drivers" class="collapse <?php if ($nav_active_action == "staff" or $nav_active_action == "staff_info") {
                                                            echo "show";
                                                        } else {
                                                            echo "notahow";
                                                        } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Staff</h6>
                            <a class="collapse-item <?php if ($nav_active_action == "staff") {
                                                        echo "active";
                                                    } else {
                                                        echo "noactive";
                                                    } ?>" href="staff.php">Staff</a>
                            <a class="collapse-item <?php if ($nav_active_action == "staff_info") {
                                                        echo "active";
                                                    } else {
                                                        echo "noactive";
                                                    } ?>" href="staff_info.php"> Staff Information</a>

                        </div>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#list" aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-file-alt" aria-hidden="true"></i>
                    <span>Lists</span>
                </a>
                <div id="list" class="collapse <?php if ($nav_active_action == "due_list" or $nav_active_action == "return_list") {
                                                    echo "show";
                                                } else {
                                                    echo "notahow";
                                                } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Lists</h6>
                        <a class="collapse-item <?php if ($nav_active_action == "return_list") {
                                                    echo "active";
                                                } else {
                                                    echo "noactive";
                                                } ?>" href="return_list.php">Return List</a>
                        <a class="collapse-item <?php if ($nav_active_action == "due_list") {
                                                    echo "active";
                                                } else {
                                                    echo "noactive";
                                                } ?>" href="due_list.php">Due List</a>
                    </div>
                </div>
            </li>
            <?php if (Session::get('userRole') == '0') { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Expences" aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                        <span>Expenses</span>
                    </a>
                    <div id="Expences" class="collapse <?php if ($nav_active_action == "expence") {
                                                            echo "show";
                                                        }  ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Expenses</h6>
                            <a class="collapse-item <?php if ($nav_active_action == "expence") {
                                                        echo "active";
                                                    }  ?>" href="expence.php">Expenses</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Expences1" aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                        <span>Report</span>
                    </a>
                    <div id="Expences1" class="collapse <?php if ($nav_active_action == "datepicker" or $nav_active_action == "datepicker_2") {
                                                            echo "show";
                                                        } else {
                                                            echo "notahow";
                                                        } ?>" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Report</h6>
                            <a class="collapse-item <?php if ($nav_active_action == "datepicker") {
                                                        echo "active";
                                                    } else {
                                                        echo "noactive";
                                                    } ?>" href="datepicker.php">Reports</a>
                            <a class="collapse-item <?php if ($nav_active_action == "datepicker_2") {
                                                        echo "active";
                                                    } else {
                                                        echo "noactive";
                                                    } ?>" href="datepicker_2.php">Reports With Invoice</a>

                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--  <img class="img-profile rounded-circle" src="" style="max-width: 60px" /> -->
                                <span class="ml-2 d-none d-lg-inline text-white font-weight-bold"> <strong class="text-uppercase"><?php echo Session::get('username'); ?></strong></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <?php if (Session::get('userRole') == '0') { ?>
                                    <a class="dropdown-item" href="setting.php">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>

                                <?php } ?>
                                <hr>

                                <a class="dropdown-item" href="?action=logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>