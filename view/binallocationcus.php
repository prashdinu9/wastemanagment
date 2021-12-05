<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call bin model

$userID;
$roleID;
$ob = new dbconnection();
$con = $ob->connection();
$obj = new binAllocation; //To create an object using bin class
$result = $obj->viewCustomerAllocationBin($userID); //To get all bins info
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
                            <h1 class="h3 mb-0 text-gray-800">Bin Allocation Details</h1>
                            <a href="../view/addbincus.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Add Bin
                            </a>
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
                                                <th>Requested Date</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = $result->fetch_array()) {
                                                //To check the status
                                                if (strtolower($row['binStatus']) == "active") {
                                                    $label = "Deactive";
                                                    $class = "btn btn-danger";
                                                } else {
                                                    $label = "Active";
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
                                                        <?php echo $row['allocationDate']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['binStatus']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=<?php echo $label; ?>"><button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')"><?php echo $label; ?></button></a><!-- comment -->
                                                        <!--                                                        <?php //if (($label == "Deactive") and ($roleID == 1)) {  ?>

                                                                                                                        <a href="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=<?php //echo $label;  ?>"><button type="button" class="<?php //echo $class;  ?>" onclick="return confMessage('<?php echo $label; ?>')"><?php echo $label; ?></button></a>

                                                        <?php // } else { ?>

                                                                                                                        <button type="button" class="<?php // echo $class;  ?>" onclick="return confMessage('<?php // echo $label;  ?>')" data-toggle="modal" data-target="#modal-<?php //echo $row['binAllocationID'];  ?>"><?php echo $label; ?></button>
                                                                                                                        <input type="hidden" value="<?php //echo $row['activationCode']  ?>" name="verification_no1" />

                                                                                                                         Modal
                                                                                                                        <form method="post" action="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=<?php echo $label; ?>" enctype="multipart/form-data">-->
                                                                    <!--                                                                <div class="modal fade" id="modal-<?php // echo $row['binAllocationID'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                                    <div class="modal-content">
                                                                                                                                        <div class="modal-header">
                                                                                                                                            <h5 class="modal-title" id="exampleModalLongTitle">Enter Verification Code</h5>
                                                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                <span aria-hidden="true">&times;</span>
                                                                                                                                            </button>
                                                                                                                                        </div>
                                                                                                                                        <div class="modal-body">

                                                                                                                                            <input type="text" name="verification_no2" id="verification_no2" placeholder="Verification Code" class="form-control" />

                                                                                                                                        </div>
                                                                                                                                        <div class="modal-footer">
                                                                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                            <button type="submit" class="btn btn-primary" onclick="verifyCode()">Save</button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>-->
                                                        <!--                                                            </form>-->
                                                        <?php //} ?>
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
                                                                var r = confirm("Do you want to " + str + " this bin?");
                                                                if (!r) {
                                                                    return false;
                                                                }
                                                            }
        </script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    "bSort": false
                }); //to turn off datatable sorting
            });

            function verifyCode() {
                var sentCode = document.getElementById("verification_no1").value;


                var filledCode = document.getElementById("verification_no2").value;


                if (sentCode.text() == filledCode.text()) {

                    return true;
                } else {
                    alertify.alert("The verification code does not match");
                    //document.getElementById("verification_no2").value =" ";

                    return false;

                }
            }
        </script>
    </body>

</html>