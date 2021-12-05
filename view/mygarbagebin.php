<!DOCTYPE html>
<?php
include '../common/session.php';
include '../model/binmodel.php';
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$userID;
$obj = new garbageBinStatus;
$result = $obj->viewMyGarbageBin($userID);
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
                            <h1 class="h3 mb-0 text-gray-800">My Garbage Bins</h1>
                        </div>

                        <div class="row">
                            <?php
                            while ($row = $result->fetch_array()) {
                                if (strtolower($row['isbinFull']) == "yes") {
                                    $label = "Empty";
                                    $class = "btn btn-warning";
                                    $style = "color: #ce4844";
                                } else {
                                    $label = "Bin Full";
                                    $class = "btn btn-info";
                                    $style = "color: grey";
                                }
                                ?>
                                <div class="col-md-4">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="fa fa-trash fa-10x" style="<?php echo $style; ?>"></i>
                                                    <div>&nbsp;</div>
                                                </div>

                                                <div class="col-auto">
                                                    <div class="text-lg">
                                                        <?php echo $row['binType']; ?>
                                                    </div>
                                                    <div>
                                                        <?php echo $row['volume'] . "L"; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class="col-auto">
                                                    <a href="../view/viewgarbagebin.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=View"><button type="button" class="btn btn-success "> View</button></a>
                                                </div>
                                                <div class="col-auto">
                                                    <?php if ($label == "Bin Full") { ?>
                                                        <a href="../controller/bincontroller.php?binAllocationID=<?php echo $row['binAllocationID']; ?>&status=<?php echo $label; ?>&cusID=<?php echo $row['cusID']; ?>">
                                                            <button type="button" class="<?php echo $class; ?>">
                                                                <?php echo $label; ?></button></a>                                                     

                                                    <?php } ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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