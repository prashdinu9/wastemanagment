<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common vehicle model
include '../model/binmodel.php'; //To call bin model
include '../model/customermodel.php'; //To call bin model
$ob = new dbconnection();
$con = $ob->connection();

$obc = new customer;
$resultc = $obc->viewAllCustomer();

$obj = new binAllocation; //To create an object using bin class
$result = $obj->viewBinType(); //To get all bins info
$resultv = $obj->viewBinVolume();

$newVar = 0;
$cusID = $newVar;
$obj = new binAllocation();
$res = $obj->viewCustomerAllocationBin($cusID);

//$allocatedBins = array();
//while($r = $res->fetch_assoc()) {
//    $allocatedBins[] = $r;
//}
//$allocatedJson = json_encode($allocatedBins);
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
                            <h1 class="h3 mb-0 text-gray-800">Add Bin</h1>
                        </div>

                        <div id="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../view/dashboardcus.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="../view/binallocationcus.php">Bin Allocation</a></li>
                                <li class="active breadcrumb-item">Add Bin</li>
                            </ol>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="post" action="../controller/bincontroller.php?status=Add" enctype="multipart/form-data">

                                    <div hidden><?php $X = $rowc['cusID']; ?></div>
                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Bin Type <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="binTypeID" id="binTypeID" required="" class="form-control">
                                                <option value="">Select a Bin Type</option>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
                                                    in <option value="<?php echo $row['binTypeID']; ?>">
                                                        <?php echo $row['binType']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Bin Volume <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="binVolumeID" id="binVolumeID" required="" class="form-control">
                                                <option value="">Select a Volume</option>
                                                <?php while ($rowv = $resultv->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $rowv['binVolumeID']; ?>">
                                                        <?php echo $rowv['volume']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Qty <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="number" required="" name="qty" id="qty" placeholder="Qty" class="form-control" min="0"/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!--                    <div class="card shadow mb-4">-->
                        <!--                        <div class="card-body">-->
                        <!--                            <div class="table-responsive">-->
                        <!--                                <table class="table table-bordered" id="example" width="100%" cellspacing="0">-->
                        <!--                                    <thead class="thead-light">-->
                        <!--                                        <tr>-->
                        <!--                                            <th>Bin Type</th>-->
                        <!--                                            <th>Bin Volume (L)</th>-->
                        <!--                                            <th>Requested Date</th>-->
                        <!--                                            <th>Status</th>-->
                        <!--                                        </tr>-->
                        <!--                                    </thead>-->
                        <!--                                    <tbody>-->
                        <!--                                        --><?php
//                                        while ($rows = $res->fetch_array()) {
//
//
                        ?>
                        <!--                                            <tr>-->
                        <!--                                                <td>-->
                        <!--                                                    --><?php //echo $rows['binType'];        ?>
                        <!--                                                </td>-->
                        <!--                                                <td>-->
                        <!--                                                    --><?php //echo $rows['volume'];        ?>
                        <!--                                                </td>-->
                        <!--                                                <td>-->
                        <!--                                                    --><?php //echo $rows['allocationDate'];        ?>
                        <!--                                                </td>-->
                        <!--                                                <td>-->
                        <!--                                                    --><?php //echo $rows['binStatus'];        ?>
                        <!--                                                </td>-->
                        <!--                                            </tr>-->
                        <!--                                        --><?php //}        ?>
                        <!--                                    </tbody>-->
                        <!--                                </table>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->

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

    <script>
        $(function customerOnChange($rowc) {
            $newVar = $rowc
        });
    </script>
</html>