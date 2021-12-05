<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/customermodel.php'; //To call customer model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer; //To create an object using customer class
$result = $obj->viewAllCustomer(); //To get all customers info
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
                    <h1 class="h3 mb-0 text-gray-800">Customer Management</h1>
                    <a href="../view/addCustomer.php"
                       class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-users fa-sm text-white-50"></i> Add Customer
                    </a>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer Management</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Route</th>
                                    <th>Telephone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    //To check the status
                                    if (strtolower($row['cusStatus']) == "active") {
                                        $label = "Deactive";
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
                                            <?php echo $row['cusID']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['cusName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['routeName']; ?>
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
                                            <a href="../view/viewCustomer.php?cusID=<?php echo $row['cusID']; ?>&status=View"><button type="button" class="btn btn-success">View</button></a>
                                            <a href="../view/updateCustomer.php?cusID=<?php echo $row['cusID']; ?>&status=Update">
                                                <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                            <a href="../controller/customercontroller.php?cusID=<?php echo $row['cusID']; ?>&status=<?php echo $label; ?>"><button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')"><?php echo $label; ?></button></a>
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
        var r = confirm("Do you want to " + str + " this customer?");
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