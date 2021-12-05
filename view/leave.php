<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/leavemodel.php'; //To call leave model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new leave; //To create an object using leave class
$result = $obj->viewAllLeave(); //To get all leaves info
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
                    <h1 class="h3 mb-0 text-gray-800">Leave Management</h1>
                    <a href="../view/addleave.php"
                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Leave
                    </a>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Leave From</th>
                                    <th>Leave To</th>
                                    <th>Reason</th>
                                    <th>&nbsp;</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $row['empName']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('Y-m-d h:ia',strtotime($row['leaveFrom'])); ?>
                                        </td>
                                        <td>
                                            <?php echo date('Y-m-d h:ia',strtotime($row['leaveTo'])); ?>
                                        </td>
                                        <td>
                                            <?php echo $row['reason']; ?>
                                        </td>

                                        <td>
                                            <a href="../view/updateleave.php?leaveID=<?php echo $row['empleaveID']; ?>&status=Update">
                                                <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                            <a href="../controller/leavecontroller.php?leaveID=<?php echo $row['empleaveID']; ?>&status=Delete">
                                                <button type="button" class="btn btn-danger" onclick="return confMessage()">
                                                    Delete</button></a>
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
    function confMessage() {
        var r = confirm("Do you want to delete this leave ?");
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