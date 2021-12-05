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
<html>

<head>
    <meta charset="UTF-8">
    <title>Waste Management</title>
    <link rel="shortcut icon" href="../images/favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet" />

    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script type="text/javascript" src="../JQuery/jquery-3.6.0.min.js"></script>
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        function confMessage(str) {
            var r = confirm("Do you want to " + str + " this product ?");
            if (!r) {
                return false;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <link rel="stylesheet" type="text/css" href="../css/leftsidebar-styles.css">
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4e352e5914.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/leftsidebar.js"></script>

</head>

<body>
    <div class="page-wrapper green-theme">
        <div class="header">
            <?php include '../common/include_header.php'; ?>
        </div>

        <div class="row">
            <div class="col-md-2 leftsidebar">
                <?php include '../common/include_leftsidebar.php'; ?>
            </div>

            <div class="col-md-10">

                <div id="navidiv">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/stock.php">Stock Management</a></li>
                        <li class="active breadcrumb-item">View Stock</li>
                    </ol>
                    &nbsp;
                </div>


                <div id="contentdiv">
                    <div class="dash">View Stock</div>
                    <div class="container-fluid">

                        <table class="table table-responsive">
                            <tr>
                                <td rowspan="2">
                                    <img src="<?php echo $path; ?>" width="200" />
                                </td>
                                <td>
                                    <h4><?php echo $rowp['proName']; ?></h4>
                                </td>
                                <td>Color</td>
                                <td>Size&nbsp;</td>
                            </tr>
                            <tr>
                                <td><?php echo $rowp['catName']; ?></td>
                                <td>
                                    <div style="width:40px; height:40px;  background-color: <?php echo $color; ?>"></div>
                                </td>
                                <td><?php echo $rows['sizeCode']; ?></td>

                                <td></td>
                            </tr>
                        </table>
                        <div class="container-fluid">
                            <table id="example" class="table table-responsive table-striped">
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
                                            <td><?php echo $row['stockID']; ?>

                                                &nbsp;</td>
                                            <td>
                                                <?php echo $row['stockDate']; ?>

                                                &nbsp;</td>
                                            <td>
                                                <?php echo $row['stockQty']; ?>
                                                &nbsp;</td>
                                            <td>
                                                <?php echo $row['proPrice']; ?>

                                            </td>
                                            <td>
                                                <?php echo $row['empName']; ?>
                                                &nbsp;</td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        &nbsp;
    </div>

    <div>
        <?php include '../common/include_footer.php'; ?>
    </div>
    </div>
</body>

</html>