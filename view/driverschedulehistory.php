<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/schedulemodel.php'; //To call schedule model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule; //To create an object using schedule class
$result = $obj->viewCompletedSchedule($userID); //To get all schedules info
$userID;
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
                            <h1 class="h3 mb-0 text-gray-800">Schedule History</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Schedule ID</th>
                                                <th>Vehicle Type</th>
                                                <th>Vehicle No</th>
                                                <th>Route ID</th>
                                                <th>Schedule Date</th>
                                                <th>Start Time</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php echo $row['scheduleID']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['vehicleType']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['vehicleNo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['routeName']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['sDate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('h:ia', strtotime($row['startTime'])); ?>
                                                    </td>
                                                    <td>
                                                        <a href="../view/viewschedule.php?scheduleID=<?php echo $row['scheduleID']; ?>&status=View">
                                                            <button type="button" class="btn btn-success"> </i> View</button></a>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
                var r = confirm("Do you want to " + str + " this schedule ?");
                if (!r) {
                    return false;
                }
            }
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({"bSort": false});
            });
        </script>
    </body>

</html>