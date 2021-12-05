<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common vehicle model
include '../model/vehiclemodel.php';

$ob = new dbconnection();
$con = $ob->connection();

$obj = new CommonVehicle(); //To create an object using vehicle class
$result = $obj->viewVehicleType(); //To get all vehicle type info

$vehicleID = $_REQUEST['vehicleID'];
$obu = new vehicle();
$resultu = $obu->viewVehicle($vehicleID);
$rowu = $resultu->fetch_array();

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
                    <h1 class="h3 mb-0 text-gray-800">Edit Vehicle</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/vehicle.php">Vehicle Management</a></li>
                        <li class="active breadcrumb-item">Edit Vehicle</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="../controller/vehiclecontroller.php?status=Update&vehicleID=<?php echo $vehicleID; ?>" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Vehicle No <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" required="" name="vehicleNo" id="vehicleNo" placeholder="Vehicle No" class="form-control" value="<?php echo $rowu['vehicleNo'] ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Vehicle Type <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="vehicleTypeID" required="" id="vehicleTypeID" class="form-control">
                                        <option value=""><?php echo $rowu['vehicleType'] ?></option>
                                        <?php while ($row = $result->fetch_array()) { ?>
                                            <option value="<?php echo $row[0]; ?>">
                                                <?php echo ucwords($row[1]); ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Odometer (km)</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="number" name="odometer" id="odometer" placeholder="Odometer" class="form-control" value="<?php echo $rowu['odometer'] ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo $rowu['vehicleDescription'] ?></textarea>
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

</body>

</html>