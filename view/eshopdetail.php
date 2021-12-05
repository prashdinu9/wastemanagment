<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/productmodel.php'; //To call product model
include '../model/stockmodel.php';


$ob = new dbconnection();
$con = $ob->connection();

$obp = new product();
$proID = $_GET['proID']; //get pro id passed thru url
$respro = $obp->viewAProduct($proID);
$rowpro = $respro->fetch_array(); //an array with all product details
//to get images based on product id
$resi = $obp->viewProductImages($proID);
$count = 0; //initail count 0 before run loop
$arrimages = array(); //create an array to store images
while ($rowi = $resi->fetch_array()) {
    $count++; //count images
    array_push($arrimages, $rowi['proImageName']); //add an image into an array
}
$j = $count - 1; //no of images to display as small images
//get details from stock table
$obs = new stock();
$resultsize = $obs->viewStockProductSize($proID);
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
                    <h1 class="h3 mb-0 text-gray-800">Product Details</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/eshop.php">E-shop</a></li>
                        <li class="active breadcrumb-item">Product Details</li>
                    </ol>
                </div>

                <div class="card shadow mb-4 product-card">
                    <div class="row g-0">
                        <div class="col-md-3 image-viewer-wrapper">
                            <div class="large-img">
                                <a href="../images/proImages/<?php echo $arrimages[0]; ?>" class="thumbnail" "../images/proImages/<?php echo $arrimages[0]; ?>" data-fancybox-group="group1" title="Description 1">
                                    <img alt="" src="../images/proImages/<?php echo $arrimages[0]; ?>" class="product-img">
                                </a>
                            </div>
                            <!--<div class="thumb-wrapper">
                                <ul class="thumbnails small">
                                    <?php
/*                                    //for ($k = 1; $k <= $j; $k++) {
                                    */?>
                                    <li class="">
                                        <a href="..images/proImages/<?php /*echo $arrimages[$k]; */?>" class="" data-fancybox-group="group1" title="Description 2">
                                            <img src="../images/proImages/<?php /*echo $arrimages[$k]; */?>" alt="" width="150">
                                        </a>
                                    </li>
                                    <?php /*//}
                                    */?>
                                </ul>
                            </div>-->
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <form method="post" action="../controller/ordercontroller.php?status=addcart&proID=<?php echo $proID; ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Name</span>
                                                <div class="text-lg"><?php echo $rowpro['proName']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Category</span>
                                                <div class="text-lg"><?php echo $rowpro['catName']; ?></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Product Code</span>
                                                <div class="text-lg"><?php echo $rowpro['proCode']; ?></div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Size</span>
                                                <div class="">
                                                    <select name="sizeID" required="" id="sizeID" onchange="getColor(<?php echo $proID ?>, this.value)" class="form-control">
                                                        <option value="">Select a Size</option>
                                                        <?php while ($rowsize = $resultsize->fetch_array()) { ?>
                                                            <option value="<?php echo $rowsize['sizeID']; ?>"><?php echo $rowsize['sizeCode']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Color</span>
                                                <div id="show1" class="text-muted" >(Select a size to see available colours)</div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Price</span>
                                                <div class="text-lg">Gp. <span id="show"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">

                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <span class="text-gray-500 ">Qty</span>
                                                <div class="text-lg">
                                                    <input type="number" class="form-control span1" placeholder="1" name="qty" autocomplete="off" required min="1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col text-right">
                                            <button class="btn btn-success" type="submit">
                                                <i class="fa fa-cart-plus"></i> Add to cart
                                            </button>
                                            <button class="btn btn-outline-secondary" type="button">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
<script>
    function getPrice(colorID, sizeID, proID) {
        var xmlhttp;
        if (colorID == "" || sizeID == "") {
            document.getElementById("show").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../controller/getprice.php?cid=" + colorID + "&sid=" + sizeID + "&pid=" + proID, true);
        xmlhttp.send();
    }


    function getColor(proID, sizeID) {
        document.getElementById('show').innerHTML = "";
        // alert("sss");
        var xmlhttp;
        if (sizeID == "") {
            document.getElementById("show1").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("show1").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "../controller/getcolor.php?sid=" + sizeID + "&pid=" + proID, true);
        xmlhttp.send();
    }
</script>
</body>

</html>