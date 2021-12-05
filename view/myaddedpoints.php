<!DOCTYPE html>
<?php
include '../common/session.php';
include '../model/binmodel.php';
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$cusID = $cusID;
$obj = new garbagePoints();
$result = $obj->viewCustomerAddedPoints($cusID);
//$row = $result->fetch_array();
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
                    <h1 class="h3 mb-0 text-gray-800">My Garbage Points</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Earned Points</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Burnt Points</a>
                            </li>
                        </ul>
                        <div class="row g-3 mb-4 justify-content-center">
                            <div class="col-sm">Current Available Points - 156</div>
                            <div class="col-sm">Total Points Earned- 567</div>
                            <div class="col-sm">Total Points Used- 89</div>
                        </div>

                        <div class='text-center mb-4'>
                            <button type="button" class="btn btn-primary">
                                Glass <span class="badge bg-secondary bg-gradient-secondary">5</span>
                            </button>
                            <button type="button" class="btn btn-danger">
                                Rubber <span class="badge bg-secondary bg-gradient-danger">15</span>
                            </button>
                            <button type="button" class="btn btn-success">
                                Paper <span class="badge bg-secondary bg-gradient-success">35</span>
                            </button>
                        </div>

                        <div class="row g-3 mb-4 justify-content-center">
                            <div class="col-sm">
                                <label>From: </label>
                                <input type="date" class="col form-control" placeholder="From date">
                            </div>

                            <div class="col-sm">
                                <label>To: </label>
                                <input type="date" class="col form-control" placeholder="To date">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Bin Type</th>
                                    <th>Points for kg.</th>
                                    <th>Weight (kg)</th>
                                    <th>Points Received</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
<!--                                --><?php
//                                while ($row = $result->fetch_array()) {
//                                    ?>
                                    <tr>

                                        <td>
<!--                                            --><?php //echo $row['binType']; ?>
                                            Glass
                                        <td>
<!--                                            --><?php //echo $row['points']; ?>
                                            5
                                        </td>

                                        <td>
                                            5.3
<!--                                            --><?php //echo $row['addDate']; ?>
                                        </td>
                                        <td>
                                            26.5
<!--                                            --><?php //echo $row['addPoints']; ?>
                                        </td>


                                        <td>
                                            2021-03-20
<!--                                            --><?php //echo $row['addDate']; ?>
                                        </td>

                                    </tr>

<tr>

    <td>
        <!--                                            --><?php //echo $row['binType']; ?>
        Rubber
    <td>
        <!--                                            --><?php //echo $row['points']; ?>
        15
    </td>

    <td>
        2.0
        <!--                                            --><?php //echo $row['addDate']; ?>
    </td>
    <td>
        30
        <!--                                            --><?php //echo $row['addPoints']; ?>
    </td>


    <td>
        2021-04-25
        <!--                                            --><?php //echo $row['addDate']; ?>
    </td>

</tr>
<!--                                --><?php //} ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" style="text-align:right">
                                            <strong>Total</strong>
                                        </td>
                                        <td>
                                            <strong>7.3</strong>
                                        </td>

                                        <td>
                                            <strong>56.5</strong>
                                        </td>
                                        <td></td>
                                    </tr>
                                </tfoot>
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
    $(document).ready(function() {
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