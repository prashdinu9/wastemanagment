<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
//include '../model/commonmodel.php'; //To call role model
include '../model/notificationmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$complaintID = $_REQUEST['userID'];
$obu = new notification();
$result = $obu->viewNotifications($receiverID);

//$rowm = $resultu->fetch_array();
?>
<html lang="en">

<?php include '../common/include_head.php'; ?>

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
                    <h1 class="h3 mb-0 text-gray-800">View a Complaint</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form>
                            <?php
                            while ($row = $result->fetch_array()) {
                                ?>
                            <div class="row mb-3">

                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php  //echo ['notificationDate'] ; ?>
                                </div>
                            </div>


                            <div class="row mb-3">
                                                   <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $row['type']; ?>
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <?php echo $row['message'] ." by ". $row['cusName']; ?>
                                </div>
                            </div>

                            <?php } ?>
                        </form>
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

</body>

</html>