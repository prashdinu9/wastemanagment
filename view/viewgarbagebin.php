<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call role model
include '../model/binmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
//$obj = new role(); //To create an object using role class
//$result = $obj->viewRole(); //To get all roles' info
//To get bin info
$binAllocationID = $_REQUEST['binAllocationID'];
$obj = new garbageBinStatus();
$result = $obj->viewAGarbageBinTrans($binAllocationID);
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
                            <h1 class="h3 mb-0 text-gray-800">Garbage Bin Transactions</h1>
                        </div>

                        <?php if ($roleID == 1 || $roleID == 2) { ?>

                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/garbagebin.php">Garbage Bin</a></li>
                                    <li class="active breadcrumb-item">Garbage Bin Transactions</li>
                                </ol>
                            </div>
                        <?php } else { ?>
                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboardcus.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/mygarbagebin.php">Garbage Bin</a></li>
                                    <li class="active breadcrumb-item">Garbage Bin Transactions</li>
                                </ol>
                            </div>

                        <?php } ?>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Trans ID</th>
                                                <th>Bin Type</th>
                                                <th>Bin Volume (L)</th>
                                                <th>Transaction Date</th>
                                                <th>Bin Full</th>
                                                <th>Expected Weight/kg</th>
                                                <th>Actual Weight/kg</th>
                                                <th>Changed By</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                //To check the status
                                                /* if (strtolower($row['cusStatus']) == "active") {
                                                  $label = "Deactive";
                                                  $class = "btn btn-danger";
                                                  $iclass = "glyphicon glyphicon-remove";
                                                  } else {
                                                  $label = "Active";
                                                  $class = "btn btn-info";
                                                  $iclass = "glyphicon glyphicon-ok";
                                                  } */
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['binTransID']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['binType']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['volume']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['transDate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['isbinFull']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['expectedTotalWeight']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['weight']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['changedBy']; ?>
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
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>

</html>