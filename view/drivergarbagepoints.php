<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call payment model

$userID;
$ob = new dbconnection();
$con = $ob->connection();
$obj = new garbagePoints(); //To create an object using payment class
$result = $obj->viewDrivergarbagePoint($userID); //To get all payment info
$res = $obj->viewDriverTotalPoints($userID); //To get all payment info
$ros = $res->fetch_array();
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
                            <h1 class="h3 mb-0 text-gray-800">Garbage Points Management</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h5>Driver Total points - <?php echo $ros['totaldriverpoints']; ?></h5>
                                <h5>GP points</h5>
                                <br>
                                <div class="row mb-3">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <button class="btn btn-success">Paper = 5</button>
                                    </div>
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <button class="btn btn-danger">Plastic = 10</button>
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <button class="btn btn-warning">Rubber = 15</button>
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <button class="btn btn-secondary">Glass = 20</button>
                                    </div>

                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <button class="btn btn-info">e-Waste = 50</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Bin Type</th>
                                                <th>Weight/kg</th>
                                                <th>Total Points</th>
                                                <th>Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row['cusName']; ?></td>
                                                    <td><?php echo $row['binType']; ?></td>

                                                    <td>
                                                        <?php echo $row['weight']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['addPoints']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['addDate']; ?>
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
                var r = confirm("Do you want to " + str + " this product ?");
                if (!r) {
                    return false;
                }
            }

            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>

</html>