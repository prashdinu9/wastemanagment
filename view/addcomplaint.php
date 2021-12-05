<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common  model
include '../model/complaintmodel.php'; //To call complaint model
include '../model/customermodel.php'; //To call bin model

$ob = new dbconnection();
$con = $ob->connection();

$obc = new customer;
$resultc = $obc->viewAllCustomer();

$obj = new complaint; //To create an object using complaint class
$result = $obj->viewComplaintType(); //To get all complaints info
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
                            <h1 class="h3 mb-0 text-gray-800">Add Complaint</h1>
                        </div>

                        <?php if ($roleID == 1 || $roleID == 2) { ?>

                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/complaint.php">Complaint</a></li>
                                    <li class="active breadcrumb-item">View Complaint</li>
                                </ol>
                            </div>
                        <?php } else { ?>
                            <div id="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="../view/dashboardcus.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="../view/complaintcus.php">Complaint</a></li>
                                    <li class="active breadcrumb-item">View Complaint</li>
                                </ol>
                            </div>

                        <?php } ?>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="post" action="../controller/complaintcontroller.php?status=Add" enctype="multipart/form-data">


                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label>Customer <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="cusID" id="cusID" required="" class="form-control" onchange="function customerOnChange($rowc)">
                                                <option value="">Select a Customer</option>
                                                <?php while ($rowc = $resultc->fetch_assoc()) { ?>
                                                    <option value="<?php echo $rowc['cusID']; ?>">
                                                        <?php echo $rowc['cusName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label>Complaint Type <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select name="complaintTypeID" id="complaintTypeID" required="" class="form-control">
                                                <option value="">Complaint Type</option>
                                                <?php while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['complaintTypeID']; ?>">
                                                        <?php echo $row['type']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label>Title <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" required="" name="title" id="title" placeholder="Title" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <label>Description <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <textarea name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3 col-sm-6 col-xs-12"></div>
                                        <div class="col-md-9">
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

    </body>

</html>