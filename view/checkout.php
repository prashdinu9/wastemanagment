<!DOCTYPE html>
<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/productmodel.php'; //To call product model
include '../model/ordermodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obp = new product();
$obo = new order();
$resulto = $obo->viewAnOrder($s_id);
$rowo = $resulto->fetch_array();
$orderID = $rowo['orderID'];
$resultc = $obo->viewACart($orderID);

echo $points
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
                            <h1 class="h3 mb-0 text-gray-800">Checkout</h1>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tot = 0;
                                            while ($rowc = $resultc->fetch_array()) {
                                                $tot += $rowc['tp'];
                                                $proID = $rowc['proID'];
                                                $re = $obp->viewProductImages($proID);
                                                $ro = $re->fetch_array();
                                                ?>
                                                <tr>
                                                    <td>
                                                        <a href="eshopdetail.php?proID=<?php echo $rowc['proID']; ?>">
                                                            <img alt="" width="175" src="../images/proImages/<?php echo $ro['proImageName']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $rowc['proName']; ?>
                                                        <br/>
                                                        Size: <?php echo $rowc['sizeCode']; ?><br/>
                                                        Color Code: <?php echo $rowc['colorCode'] . "" . $rowc['colorName']; ?><br/>
                                                    </td>

                                                    <td><?php echo $rowc['qsum']; ?></td>
                                                    <td>Gp. <?php echo $rowc['price']; ?></td>
                                                    <td>Gp. <?php echo $rowc['tp']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php
                                $discount = $tot * (5 / 100); //calculate 5%
                                $afterdistot = $tot - $discount; //- discount from total
                                $vat = $afterdistot * (11 / 100); //calculate vat
                                $total = $afterdistot + $vat; //total afer vat

                                $_SESSION['total'] = $tot;

                                $usd = $total * 0.0065;
                                ?>

                                <hr>
                                <p class="right">
        <!--                            <strong>Sub-Total</strong>:	Rs --><?php //echo $tot;  ?><!--<br>-->
        <!--                            <strong>Discount -(5%)</strong>: Rs --><?php //echo $discount;  ?><!--<br>-->
        <!--                            <strong>VAT +(11%)</strong>: Rs --><?php //echo $vat;  ?><!--<br>-->
                                    <strong>Total: Gp <?php echo $tot; ?></strong><br>
                                </p>
                            </div>
                            <div class="card-footer text-right">



<?php if (($total >= $_SESSION['points']) && ($total >= 1)) { ?>
                                    <button disabled class="btn btn-success" >
                                        <i class="fa fa-money-bill"></i> Purchase
                                        </a>
                                    </button>

                                    <div style="color: red">You don't have enough green points to purchase.</div>

<?php } elseif ($total == 0) {
    ?>
                                    <button disabled class="btn btn-success" >
                                        <i class="fa fa-money-bill"></i> Purchase
                                        </a>
                                    </button>
<?php } else {
    ?>
                                    <a href="../controller/ordercontroller.php?status=paid" class="btn btn-success" >
                                        <i class="fa fa-money-bill"></i> Purchase
                                    </a>
                                <?php } ?>


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
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
    </body>

</html>
