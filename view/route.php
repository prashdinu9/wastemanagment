<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/routemodel.php'; //To call route model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new route; //To create an object using route class
$result = $obj->viewAllroute(); //To get all routes info
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
                    <h1 class="h3 mb-0 text-gray-800">Route Management</h1>
                    <a href="../view/addroute.php"
                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-road fa-sm text-white-50"></i> Add a Route
                    </a>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Route Management</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Route ID</th>
                                    <th>Route Name</th>
                                    <th>Route Description</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    //To check the status
                                    if (strtolower($row['routeStatus']) == "active") {
                                        $label = "Deactive";
                                        $class = "btn btn-danger";
                                    } else {
                                        $label = "Active";
                                        $class = "btn btn-info";
                                    }
                                    ?>
                                    <tr>

                                        <td>
                                            <?php echo $row['routeID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['routeName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['routeDescription']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['routeStatus']; ?>
                                        </td>
                                        <td>
<!--                                            <a href="../view/viewroute.php?routeID=--><?php //echo $row['routeID']; ?><!--&status=View" class="btn btn-success">View</a>-->
<!--                                            <a href="../view/updateroute.php?routeID=--><?php //echo $row['routeID']; ?><!--&status=Update" class="btn btn-primary">Update</a>-->

                                            <a href="../controller/routecontroller.php?routeID=<?php echo $row['routeID']; ?>&status=<?php echo $label; ?>" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')">
                                                <?php echo $label; ?>
                                            </a>
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
        var r = confirm("Do you want to " + str + " this route?");
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