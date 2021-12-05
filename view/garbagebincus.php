<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call bin model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new garbageBinStatus;
$result = $obj->viewMyGarbageBin($userID);
$userID;
$roleID;
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
                            <h1 class="h3 mb-0 text-gray-800">Garbage Bin Management</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Bin ID</th>

                                                <th>Bin Type</th>
                                                <th>Bin Volume (L)</th>
                                                <th>Bin Full</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                //To check the status
                                                if (strtolower($row['isbinFull']) == "yes") {
                                                    $label = "Empty";
                                                    $class = "btn btn-danger";
                                                } else {
                                                    $label = "Bin Full";
                                                    $class = "btn btn-info";
                                                }
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
                                                    <td>
                                                        <?php echo $row['isbinFull']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="../view/viewgarbagebin.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=View"><button type="button" class="btn btn-success"> View</button></a>
                                                        <?php if ($label == "Bin Full") { ?>
                                                            <a href="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=<?php echo $label; ?>&cusID=<?php echo $row['cusID']; ?>">
                                                                <button type="button" class="<?php echo $class; ?>">
                                                                    <?php echo $label; ?></button></a>
                                                        <?php } else {
                                                            ?>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-<?php echo $row['binAllocationID']; ?>">
                                                                <?php echo $label; ?>
                                                            </button>

                                                            <!-- Modal -->
                                                            <form method="post" action="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=Addweight&cusID=<?php echo $row['cusID']; ?>&points=<?php echo $row['points']; ?>" enctype="multipart/form-data">
                                                                <div class="modal fade" id="modal-<?php echo $row['binAllocationID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Bin Weight</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">

                                                                                <input type="number" name="weight" id="weight" placeholder="Add weight in kg" class="form-control" required min="0"/>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        <?php } ?>


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
                var r = confirm("Do you want to make this " + str + " ?");
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