<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/employeemodel.php'; //To call employee model
include '../model/vehiclemodel.php'; //To call vehicle model
include '../model/binmodel.php'; //To call bin model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee; //To create an object using employee class
$result = $obj->viewAllEmployee(); //To get all employees info

$obv = new vehicle; //To create an object using vehicle class
$resv = $obv->viewAllVehicle(); //To get all vehicles info

$obg = new garbageBinStatus; //To create an object using bin class
$resg = $obg->viewAllBinGarbageStatus(); //To get all bins info
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>
<link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />

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
                    <h1 class="h3 mb-0 text-gray-800">Scheduler Plan Assistant</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div id="contentdiv">

                            <div class="container-fluid">
                                <div class="row g-3 mb-4 justify-content-center">
                                    <div class="col-sm-2 d-flex align-items-center justify-content-end">
                                        <h5 class="mb-0">Availability:</h5>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="">Date: </label>
                                        <input type="date" class="form-control" placeholder="From date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Drivers</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-1" style="">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                    <?php
                                                    while ($row = $result->fetch_array()) { ?>
                                                        <li class="list-group-item">
                                                            <?php echo $row['empName']; ?>
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Vehicles</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-2" style="">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                    <?php
                                                    while ($rv = $resv->fetch_array()) { ?>
                                                        <li class="list-group-item">
                                                            <?php echo $rv['vehicleNo']; ?>
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card shadow mb-4">
                                            <!-- Card Header - Accordion -->
                                            <a href="#collapse-3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                                <h6 class="m-0 font-weight-bold text-primary">Bins</h6>
                                            </a>
                                            <!-- Card Content - Collapse -->
                                            <div class="collapse show" id="collapse-3" style="">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                    <?php
                                                    while ($rg = $resg->fetch_array()) { ?>
                                                        <li class="list-group-item">
                                                            <?php echo $rg['cusName']; ?> -
                                                            <?php echo $rg['routeName']; ?> -
                                                            <?php echo $rg['binType']; ?>
                                                            <?php echo $rg['volume']; ?>L
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<!-- Page level plugins -->
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    function confMessage(str) {
        var r = confirm("Do you want to " + str + " this employee ?");
        if (!r) {
            return false;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>