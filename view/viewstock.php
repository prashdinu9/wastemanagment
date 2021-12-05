<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session infor

include '../common/dbconnection.php'; //To get connection string
$ob = new dbconnection();
$con = $ob->connection();

//To get the module name by using page name
$url = $_SERVER['PHP_SELF']; //To get current page
$arrurl = explode("/", $url);
//sort($arrurl);
$ac = count($arrurl);
$page_name = $arrurl[$ac - 1];
$marr = explode(".", $page_name);
$module_name = ucfirst($marr[0]); //To get module name

$proID = $_GET['proID']; //get ids passes by form in stock.php
$sizeID = $_GET['sizeID'];
$colorID = $_GET['colorID'];

include '../model/productmodel.php'; //To call prodcut model
include '../model/stockmodel.php'; //To call stock model
$obs = new stock(); //To create an object using stock class
$obp = new product();

$resultp = $obp->viewAProduct($proID);
$rowp = $resultp->fetch_array();

$resulti = $obp->viewProductImages($proID);
$rowi = $resulti->fetch_array();

if ($rowi['proImageName'] == "") {
    $path = "../images/product.png";
} else {
    $path = "../images/proImages/" . $rowi['proImageName'];
}
$results = $obs->viewASize($sizeID);
$rows = $results->fetch_array();

$resultc = $obs->viewAColor($colorID);
$rowc = $resultc->fetch_array();

if ($rowc['colorCode'] != "") {
    $color = $rowc['colorCode'];
} else {
    $color = $rowc['colorName'];
}
$result = $obs->viewAStock($proID, $colorID, $sizeID);
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
                    <h1 class="h3 mb-0 text-gray-800">View Stock</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/stock.php">Stock Management</a></li>
                        <li class="active breadcrumb-item">View Stock</li>
                    </ol>
                </div>

                <div class="card shadow mb-4 product-card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $path; ?>" class="product-card-img"/>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="mb-3">
                                    <span class="text-lg"><?php echo $rowp['proName']; ?></span>
                                    <span class="text-gray-500 "><?php echo $rowp['catName']; ?></span>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Colour</span>
                                            <div class="colour-block d-block" style="background-color: <?php echo $color; ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="text-gray-500 ">Size</span>
                                            <div class="text-lg"><?php echo $rows['sizeCode']; ?></div>
                                        </div>
                                    </div>
                                </div>

                                <hr/>

                                <div>
                                    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Stock Id</th>
                                            <th>Stock Date</th>
                                            <th>Qunatity</th>
                                            <th>Price</th>
                                            <th>Handle By</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while ($row = $result->fetch_array()) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['stockID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['stockDate']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['stockQty']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['proPrice']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['empName']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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
<!-- Page level plugins -->
<script src="../DataTables/datatables.min.js"></script>
<script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>