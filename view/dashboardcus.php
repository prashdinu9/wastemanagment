<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php';
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obj= new itemCounts();
$result = $obj->countCustomer();
$row = $result->fetch_array();
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include '../common/include_sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include '../common/include_topbar.php'; ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Customers
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">45</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Garbage (kg)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">546</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-recycle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Bins
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">145</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-trash-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
<!--                        <div class="col-xl-3 col-md-6 mb-4">-->
<!--                            <div class="card border-left-warning shadow h-100 py-2">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="row no-gutters align-items-center">-->
<!--                                        <div class="col mr-2">-->
<!--                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">-->
<!--                                                Total revenue ($)</div>-->
<!--                                            <div class="h5 mb-0 font-weight-bold text-gray-800">145.00</div>-->
<!--                                        </div>-->
<!--                                        <div class="col-auto">-->
<!--                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Employees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">6</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-address-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Vehicles</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">14</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Garbage Collection Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Customer Registration</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myChart1"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Active
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Inactive
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

            <?php
            include "../model/binmodel.php";
            $point = new garbagePoints();
            $res = $point->viewCustomerAddedPoints($userID);
            $res2 = $point->viewCustomerBurntPoints($userID);

            $rowu = $res->fetch_array();
            $rowu2 = $res2->fetch_array();
            $add = $rowu['totaladdpoints'];
            $ded = $rowu2['totalburntpoints'];
            $totp = $add - $ded;
            $_SESSION['points'] = $totp;
            ?>

            <?php include '../common/include_footer.php'; ?>

        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include '../common/include_scripts.php'; ?>
    <script type="text/javascript" src="../js/dashboard.js"></script>
</body>

</html>