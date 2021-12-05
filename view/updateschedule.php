<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //to get driver,vehicle,schedule info from common class
include '../model/schedulemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obr = new CommonRoute();
$rer = $obr->viewActiveRoutes();

$obv = new CommonVehicle();
$rev = $obv->viewActiveVehicles();

$obe = new CommonEmployee();
$ree = $obe->viewActiveDrivers();

$obvt = new CommonVehicle();
$revt = $obvt->viewVehicleType();

$obb = new CommonBin();
$reb = $obb->viewFullBins();

$scheduleID = $_REQUEST['scheduleID'];
$obj = new schedule();
$result = $obj->viewASchedule($scheduleID);
$row = $result->fetch_array();

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
                    <h1 class="h3 mb-0 text-gray-800">Update Schedule</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/schedule.php">Schedule</a></li>
                        <li class="active breadcrumb-item">Update Schedule</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="../controller/schedulecontroller.php?status=Update" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Driver Name <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="driverID" id="driverID" required class="form-control">
                                        <option value=""> <?php echo $row['empName']; ?></option>
                                        <?php
                                        while ($rowe = $ree->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowe['empID']; ?>">
                                                <?php echo $rowe['empName']; ?>
                                            </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Route Name <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="routeID" id="routeID" required class="form-control">
                                        <option value=""><?php echo $row['routeName']; ?></option>
                                        <?php
                                        while ($rowr = $rer->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowr['routeID']; ?>">
                                                <?php echo $rowr['routeName']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Vehicle Type<span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="vehicleTypeID" id="vehicleTypeID" required class="form-control">
                                        <option value="">Select a Product</option>
                                        <?php
                                        while ($rowvt = $revt->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowvt['vehicleTypeID']; ?>">
                                                <?php echo $rowvt['vehicleType']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Vehicle <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="vehicleID" id="vehicleID" required class="form-control">
                                        <option value=""> <?php echo $row['vehicleNo']; ?></option>
                                        <?php
                                        while ($rowv = $rev->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowv['vehicleID']; ?>">
                                                <?php echo $rowv['vehicleNo']; ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>schedule Date <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="date" required="" name="sDate" id="sDate" placeholder="Contact No" class="form-control" value="<?php echo $row['sDate']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>schedule Start Time <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="time" required="" name="start" id="start" placeholder="Contact No" class="form-control" value="<?php echo $row['startTime']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>schedule End Time <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="time" required="" name="end" id="end" placeholder="Contact No" class="form-control" value="<?php echo $row['endTime']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Start Odometer<span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" required="" name="startOdo" id="startOdo" placeholder="Contact No" class="form-control" value="<?php echo $row['startMeter']; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Bin Locations<span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="binLoc" id="binLoc" multiple class="form-control">
                                        <option value="">Select a Bin</option>
                                        <?php
                                        while ($rowb = $reb->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowb['binAllocationID']; ?>">
                                                <?php echo $rowb['binAllocationID'] . "-" . $rowb['binType'] . "-" . "L"; ?>
                                            </option>
                                            <?php
                                        } ?>
                                    </select>

                                    <select name="states" id="example" class="form-control" multiple="multiple" style="display: none;">
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option selected value="CA">California</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12"></div>
                                <div class="col-md-9">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-outline-secondary">Clear</button>
                                </div>
                            </div>
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
<script src="../js/popper.min.js"></script>
<script src="../Bootstrap-4-Multi-Select-BsMultiSelect/dist/js/BsMultiSelect.bs4.min.js"></script>
<script>
    $(function() {
        $("#binLoc").bsMultiSelect();
    });
</script>
</body>

</html>