<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call role model
include '../model/schedulemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$roleID;

//To get schedule info
$scheduleID = $_REQUEST['scheduleID'];
$obj = new schedule();
$result = $obj->viewASchedule($scheduleID);
$row = $result->fetch_array();

$resultt = $obj->viewScheduleBins($scheduleID);
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
                            <h1 class="h3 mb-0 text-gray-800">View Schedule</h1>
                        </div>
                        <?php if ($roleID == 3) { ?>
                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboarddriver.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/myschedule.php">Schedule</a></li>
                                    <li class="active breadcrumb-item">View Schedule</li>
                                </ol>
                            </div>

                        <?php } else {
                            ?>
                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/schedule.php">Schedule</a></li>
                                    <li class="active breadcrumb-item">View Schedule</li>
                                </ol>
                            </div>
                        <?php }
                        ?>



                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Schedule Details</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Route Name</span>
                                            <div class="text-lg"><?php echo $row['routeName']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Date</span>
                                            <div class="text-lg"><?php echo $row['sDate']; ?></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Vehicle Type</span>
                                            <div class="text-lg"><?php echo $row['vehicleType']; ?>
                                                <span id="show"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Vehicle No</span>
                                            <div class="text-lg"><?php echo $row['vehicleNo']; ?>
                                                <span id="show"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Start Time</span>
                                            <div class="text-lg"><?php echo $row['startTime']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Driver Name</span>
                                            <div class="text-lg"><?php echo $row['empName']; ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Bins List</span>
                                            <?php
                                            while ($rowt = $resultt->fetch_array()) {
                                                ?>
                                                <div class="text-lg"><?php echo $rowt['binAllocationID'] . "-" . $rowt['binType'] . " " . $rowt['volume'] . "L" ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Start Odometer (km)</span>
                                            <div class="text-lg"><?php echo $row['startMeter']; ?></div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">End Odometer (km)</span>
                                            <div class="text-lg"><?php echo $row['endMeter']; ?></div>
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
                    var r = confirm("Do you want to " + str + " this product ?");
                    if (!r) {
                        return false;
                    }
                }
            </script>
            <script>
                $(document).ready(function () {
                    $('#example').DataTable();
                });
            </script>
    </body>

</html>