<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/customermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer; //To create an object using customer class
$result = $obj->ReportCustomer(); //To get all customers info
?>
<html lang="en">

    <?php include '../common/include_head.php'; ?>
    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../DataTables/SearchBuilder-1.0.1/css/searchBuilder.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../DataTables/Buttons-1.7.0/css/buttons.dataTables.min.css">

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
                            <h1 class="h3 mb-0 text-gray-800">Customer Report</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="javascrpit:void(0);">
                                            <i class="fa fa-table"></i> &nbsp; Table view
                                        </a>
                                    </li>
                                    <!--                            <li class="nav-item">
                                                                    <a class="nav-link" href="reportcustomerregistration.php">
                                                                        <i class="fa fa-chart-pie"></i> &nbsp; Chart view
                                                                    </a>
                                                                </li>-->
                                </ul>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>customer ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Telephone</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Balance Points</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['cusID']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['cusName']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['cusAddress']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['contactNo']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['email']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['cusStatus']; ?>
                                                    </td>

                                                    <td>

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
        <script src="../DataTables/SearchBuilder-1.0.1/js/dataTables.searchBuilder.min.js"></script>
        <script src="../DataTables/SearchBuilder-1.0.1/js/searchBuilder.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    dom: 'QBfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>
    </body>

</html>