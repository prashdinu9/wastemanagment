<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/productmodel.php'; //To call product model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new product(); //To create an object using product class
$result = $obj->viewAllProduct(); //To get all product

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
                    <h1 class="h3 mb-0 text-gray-800">E-shop</h1>
                </div>

                <div class="row">
                    <?php
                    while ($row = $result->fetch_array()) {
                        //To check the image
                        $proID = $row['proID'];
                        $resultimg = $obj->viewProductImages($proID);

                        $arrimg = array();
                        while ($rowimg = $resultimg->fetch_array()) {
                            array_push($arrimg, $rowimg['proImageName']);
                        }
                        shuffle($arrimg);
                        //To check the Image
                        if (count($arrimg) == 0) {
                            $path = "../images/product.png";
                        } else {
                            $path = "../images/proImages/" . $arrimg[0];
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="card item-card">
                                <div class="item-image">
                                    <img src="<?php echo $path; ?>" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row['proName']; ?></h4>
                                    <h5 class="card-text">GP. <?php echo $row['proPrice']; ?></h5>
                                </div>
                                <div class="card-footer">
                                    <a href="eshopdetail.php?proID=<?php echo $row['proID']; ?>" class="btn btn-block btn-success shadow-sm">
                                        <i class="fa fa-tag"></i> View product details
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
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