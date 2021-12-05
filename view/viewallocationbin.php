<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
//To get customer info
$cusID = $_REQUEST['cusID'];
$cusName = $_REQUEST['cusName'];
$obj = new binAllocation();
$result = $obj->viewCustomerAllocationBin($cusID);

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
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $cusName; ?>'s Allocated Bins</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/binallocation.php">Bin Allocation</a></li>
                        <li class="active breadcrumb-item">View Allocated Bins</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead class="thead-light">
                                <tr>
                                    <th>Bin ID</th>
                                    <th>Bin Type</th>
                                    <th>Bin Volume (L)</th>
<!--                                    <th>Activation Code</th>-->
                                    <th>Requested Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['binAllocationID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['binType']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['volume']; ?>
                                        </td>
<!--                                        <td>-->
<!--                                            --><?php //echo $row['activationCode']; ?>
<!--                                        </td>-->
                                        <td>
                                            <?php echo $row['allocationDate']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['binStatus']; ?>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>