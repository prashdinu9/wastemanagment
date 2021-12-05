<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call role model
include '../model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();
//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info
//To get customer info
$cusID = $_REQUEST['cusID'];
$obu = new customer();
$resultu = $obu->viewCustomer($cusID);
$rowm = $resultu->fetch_array();
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
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $rowm['cusName']; ?>'s Profile</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/customer.php">Customer</a></li>
                        <li class="active breadcrumb-item">View Customer</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Personal Information :</h5>
                        <br>
                                                  <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Name :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['cusName']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Route :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['routeName']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Longitude :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['longitude']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Latitude :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['latitude']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Balance Points :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['balancePoints']; ?>
                                </div>
                            </div>

                            <hr>

                            <h5>Contact Information :</h5>
                            <br>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Email :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['email']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Contact No :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['contactNo']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Address :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowm['cusAddress']; ?>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <?php include '../common/include_footer.php'; ?>

    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php include '../common/include_scripts.php'; ?>

</body>

</html>