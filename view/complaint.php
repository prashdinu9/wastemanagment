<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/complaintmodel.php'; //To call complaint model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new complaint; //To create an object using complaint class
$result = $obj->viewAllComplaint(); //To get all complaints info
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
                            <h1 class="h3 mb-0 text-gray-800">Complaint Management</h1>
                            <a href="../view/addcomplaint.php"
                               class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-exclamation-circle fa-sm text-white-50"></i> Add Complaint
                            </a>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>

                                                <th>Comp. ID</th>
                                                <th>Customer</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                //To check the status
                                                if (strtolower($row['status']) == "active") {
                                                    $label = "Completed";
                                                    $class = "btn btn-danger";
                                                    $iclass = "glyphicon glyphicon-remove";
                                                } else {
                                                    $label = "Active";
                                                    $class = "btn btn-info";
                                                    $iclass = "glyphicon glyphicon-ok";
                                                }
                                                ?>
                                                <tr>

                                                    <td>
                                                        <?php echo $row['complaintID']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['cusName']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['title']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['type']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo date('Y-m-d H:ia', strtotime($row['complaintDate'])); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>

                                                    <td>
                                                        <a href="../view/viewcomplaint.php?complaintID=<?php echo $row['complaintID']; ?>&status=View"><button type="button" class="btn btn-success"> View</button></a>
                                                        <!--                                            <a href="../view/updatecomplaint.php?complaintID=--><?php //echo $row['complaintID'];          ?><!--&status=Update">-->
                                                        <!--                                                <button type="button" class="btn btn-primary"> </i> Update</button></a>-->

                                                        <a href="../controller/complaintcontroller.php?complaintID=<?php echo $row['complaintID']; ?>&status=<?php echo $label; ?>"><button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')"><?php echo $label; ?></button></a>
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
                                                                var r = confirm("Do you want to " + str + " this complaint ?");
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