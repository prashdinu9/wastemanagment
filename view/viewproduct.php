<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call role,category,type models
include '../model/productmodel.php'; //To call product model

$ob = new dbconnection();
$con = $ob->connection();

$obc = new category();
$rec = $obc->viewCategory();

//To get product info
$proID = $_REQUEST['proID'];
$obp = new product();
$resultp = $obp->viewProduct($proID);
$rowp = $resultp->fetch_array();
$resulti = $obp->viewProductImages($proID);
$rowi = $resulti->fetch_array();

if ($rowi['proImageName'] !== "") {
    $path = "../images/proImages/" . $rowi['proImageName'];
}
if ($rowi['proImageName'] == "") {
    $path = "../images/product.png";
}
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
                    <h1 class="h3 mb-0 text-gray-800">View Product</h1>
                </div>

                <div class="card shadow mb-4 product-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $path; ?>" class="product-card-img"/>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Product Name</span>
                                            <div class="text-lg"><?php echo $rowp['proName']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Category</span>
                                            <div class="text-lg"><?php echo $rowp['catName']; ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Product Code</span>
                                            <div class="text-lg"><?php echo $rowp['proCode']; ?></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Price</span>
                                            <div class="text-lg">Rs. <?php echo $rowp['proPrice']; ?></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <span class="text-gray-500 ">Description</span>
                                    <div class="text-lg"><?php echo $rowp['proDes']; ?></div>
                                </div>
                            </div>
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