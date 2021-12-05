<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //to get driver,vehicle,schedule info from common class

$ob = new dbconnection();
$con = $ob->connection();

$obr = new CommonRoute();
$rer = $obr->viewActiveRoutes();

$obv = new CommonVehicle();
$rev = $obv->viewActiveVehicles();
$vehicleRows = array();
while ($r = $rev->fetch_assoc()) {
    $vehicleRows[] = $r;
}
$vehicleJson = json_encode($vehicleRows);

$obe = new CommonEmployee();
$ree = $obe->viewActiveDrivers();

$obvt = new CommonVehicle();
$revt = $obvt->viewVehicleType();

$obb = new CommonBin();
$reb = $obb->viewFullBins();
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
                            <h1 class="h3 mb-0 text-gray-800">Add schedule</h1>
                        </div>

                        <div id="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="../view/schedule.php">Schedule Management</a></li>
                                <li class="active breadcrumb-item">Add Schedule</li>
                            </ol>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="post" action="../controller/schedulecontroller.php?status=Add" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Driver Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="driverID" id="driverID" class="form-control" required>
                                                <option value="">Select a Driver</option>
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
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Route Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="routeID" id="routeID" class="form-control" required>
                                                <option value="">Select a Route</option>
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
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Vehicle Type <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="vehicleTypeID" id="vehicleTypeID" class="form-control" required>
                                                <option value="">Select a Vehicle Type</option>
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
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Vehicle <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="vehicleID" id="vehicleID" class="form-control" required>
                                                <option value="">Select a Vehicle</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Schedule Date <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="date" name="sDate" id="sDate" placeholder="Schedule date" class="form-control" required onchange="checkDate()""/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Schedule Start Time <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="time" name="start" id="start" placeholder="Schedule start time" class="form-control" required />
                                        </div>
                                    </div>

                                    <!--                            <div class="row mb-3">-->
                                    <!--                                <div class="col-md-2 col-sm-6 col-xs-12">-->
                                    <!--                                    <label>Schedule End Time</label>-->
                                    <!--                                </div>-->
                                    <!--                                <div class="col-md-8 col-sm-6 col-xs-12">-->
                                    <!--                                    <input type="time" name="end" id="end" placeholder="Schedule end time" class="form-control" />-->
                                    <!--                                </div>-->
                                    <!--                            </div>-->

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Start Odometer/km</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="number" name="startOdo" id="startOdo" placeholder="Start Odometer" class="form-control" value="" min="0" "/>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Bins <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="binLoc[]" id="binLoc" class="form-control" multiple required>
                                                <?php
                                                while ($rowb = $reb->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $rowb['binAllocationID']; ?>">
                                                        <?php echo $rowb['volume'] . "L" . "-" . $rowb['binType']; ?>
                                                    </option>
                                                <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Save</button>
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
                                                $(function () {
                                                    let vehicles = <?php echo $vehicleJson; ?>;

                                                    $("#binLoc").bsMultiSelect();
                                                    $("#vehicleTypeID").change(function () {
                                                        $("#startOdo").val("");
                                                        let vehicleSelect = $("#vehicleID");
                                                        let vehicleTypeId = $(this).val();

                                                        if (vehicleTypeId) {
                                                            vehicleSelect.empty();
                                                            vehicleSelect.append($("<option></option>").val("").html("Select a Vehicle"));

                                                            $.each(vehicles, function (index, item) {
                                                                if (vehicleTypeId == item.vehicleTypeID) {
                                                                    vehicleSelect.append($("<option></option>").val(item.vehicleID).html(item.vehicleNo));
                                                                }
                                                            });

                                                        } else {
                                                            vehicleSelect.empty();
                                                            vehicleSelect.append($("<option></option>").val("").html("Select a Vehicle"));
                                                        }
                                                    });

                                                    $("#vehicleID").change(function () {
                                                        let vehicleId = $(this).val();

                                                        if (vehicleId) {
                                                            $("#startOdo").val(vehicles.filter(v => v.vehicleID == vehicleId)[0].odometer);
                                                        } else {
                                                            $("#startOdo").val("");
                                                        }
                                                    });
                                                });
        </script>
        <script>
            function checkDate() {
                var selectedText = document.getElementById('sDate').value;
                var selectedDate = new Date(selectedText);
                var now = new Date();
                //let day = d.getDate();
                var dateonly = now.setHours(0, 0, 0, 0);
                if (selectedDate < dateonly) {
//                    alert("Error " + "\n"
//                            + "\n"
//                            + "Date must be in the future");
                    alert("Date must be in the future");
                    document.getElementById('sDate').value = "";
                }
            }

        </script>
    </body>

</html>