<!DOCTYPE html>
<?php
include '../common/session.php'; //to get session info
include '../common/dbconnection.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors

$ob = new dbconnection();
$con = $ob->connection();
$orderID = $_REQUEST['orderID'];
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
                        <h1 class="h3 mb-0 text-gray-800">Payment</h1>
                    </div>

                    <div class="col-md-5 m-auto">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-success">
                                    <i class="fa fa-check-circle"></i> Payment complete
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <img src="../images/delivery.jpg">
                                </div>
                                <h5 class="text-center mb-4">Thank you for the order.</h5>
                                <p class="mb-3">Your Order No is #<?php
                                    $t = time();
                                    echo(date("Y/m/d", $t));
                                    ?>ES<?php echo $orderID; ?></p>
                                <p> Please check email for order details.</p>
                                <p>Your package will be delivered within 3 office days.</p>
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
</body>

</html>