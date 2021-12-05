<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common vehicle model
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$empID = $_REQUEST['empID'];

$obe = new employee();
$rese = $obe->viewAEmployee($empID);
$rowe = $rese->fetch_array();
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
                    <h1 class="h3 mb-0 text-gray-800">View Employee</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/employee.php">Employee</a></li>
                        <li class="active breadcrumb-item">View Employee</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <h5>Personal Information :</h5>
                        <br>
                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Name : </label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['empName']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Designation : </label>
                                </div>
                                <div class="col-md-8">
                                    <?php echo $rowe['roleName']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>ID Number :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['NIC']; ?>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Contract Type :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['contract']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Hire Date :</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $rowe['hireDate']; ?>
                                </div>
                            </div>
                        <hr>

                        <h5>Contact Information :</h5>
                        <br>
                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Contact No :</label>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <?php echo $rowe['contactNo']; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Email :</label>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <?php echo $rowe['email']; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Address :</label>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <?php echo $rowe['empAddress']; ?>
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