<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session infor
include '../model/productmodel.php'; //To call prodcut model
include '../model/stockmodel.php'; //To call stock model
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

$obs = new stock(); //To create an object using stock class
$obp = new product();
$result = $obs->viewStocks()
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
                    <h1 class="h3 mb-0 text-gray-800"><?php echo $module_name; ?> Management</h1>
                    <a href="../view/add<?php echo strtolower($module_name); ?>.php"
                       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-cart-plus fa-sm text-white-50"></i> Add a <?php echo $module_name; ?>
                    </a>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Stock Quantity</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row = $result->fetch_array()) {
                                    $proID = $row['proID'];
                                    $resultp = $obp->viewProductImages($proID);
                                    $imgarray = array();
                                    while ($rowp = $resultp->fetch_array()) {
                                        array_push($imgarray, $rowp['proImageName']);
                                    }
                                    shuffle($imgarray);

                                    //To check the Image
                                    if (count($imgarray)) {
                                        $path = "../images/proImages/" . $imgarray[0];
                                    } else {
                                        $path = "../images/product.png";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo $path; ?>" width="35" height="auto" />
                                        </td>
                                        <td>
                                            <?php echo $row['proName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['proCode']; ?>
                                            </td>
                                        <td>
                                            <?php
                                            //
                                            if ($row['colorCode'] !== "") {
                                                $color = $row['colorCode'];
                                            } else {
                                                $color = $row['colorName'];
                                            }
                                            //echo $row['colorID'];
                                            ?>
                                            <div class="m-auto" style="width:40px; height:40px; border-radius: 50%; background-color:<?php echo $color;?> "></div>
                                        </td>
                                        <td>
                                            <?php echo $row['sizeCode']; ?>
                                            </td>
                                        <td>
                                            <?php echo $row['sq']; ?>
                                            </td>
                                        <td>
                                            <a href="../view/viewstock.php?proID=<?php echo $row['proID']; ?>&sizeID=<?php echo $row['sizeID']; ?>&colorID=<?php echo $row['colorID']; ?>&status=View"> <button type="button" class="btn btn-success"> View</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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

<script type="text/javascript">
    function confMessage(str) {
        var r = confirm("Do you want to " + str + " this product ?");
        if (!r) {
            return false;
        }
    }

    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>