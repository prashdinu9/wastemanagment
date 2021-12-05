<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call role model
include '../model/productmodel.php'; //to call product model
include '../model/stockmodel.php'; // to call stock model

$ob = new dbconnection();
$con = $ob->connection();

$obp = new product(); //to create an object
$rep = $obp->viewAllProduct(); //to call function to get all products

$obs = new stock();
$res = $obs->viewAllSize();
$reco = $obs->viewAllColor(); //can call using same object

$obc = new category();
$rec = $obc->viewCategory();

//To set default time zone
date_default_timezone_set("Asia/colombo");
$cdate = date("Y-m-d");
$cid = strtotime($cdate); //Date convert into timestamp
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
                    <h1 class="h3 mb-0 text-gray-800">Add Bin Stock</h1>
                </div>

                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="../view/stock.php">Stock Management</a></li>
                        <li class="active breadcrumb-item">Add Bin Stock</li>
                    </ol>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="post" action="../controller/stockcontroller.php?status=Add" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Product Name <span>*</span></label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <select name="proID" id="proID" required class="form-control">
                                        <option value="">Select a Product</option>
                                        <?php
                                        while ($rowp = $rep->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rowp['proID']; ?>">
                                                <?php echo $rowp['proName']; ?>
                                            </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Stock Date <span>*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" name="stockDate" id="stockDate" class="form-control" required="" max="<?php echo $cdate; ?>" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Size</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="sizeID" id="sizeID" required="" class="form-control">
                                        <option value="">Select a Size</option>
                                        <?php
                                        while ($rows = $res->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $rows['sizeID']; ?>">
                                                <?php echo $rows['sizeCode']; ?>
                                            </option>

                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Color Code</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="color" name="colorCode" onchange="hideColorName()" />
                                </div>
                            </div>

                            <div class="row mb-3" id="cn">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Color Name</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div>
                                        <input list="color" name="colorName" class="form-control" autocomplete="no" placeholder="Color Name" />
                                        <datalist id='color'>
                                            <?php while ($rowco = $reco->fetch_assoc()) { ?>
                                                <option value="<?php echo $rowco['colorName']; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <label>Quantity</label>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <input type="text" name="stockQty" id="stockQty" placeholder="Stock Quantity" class="form-control" required="" onkeypress="return onlyNos1(event, this)">
                                </div>
                            </div>

                            <div id='shownoi'></div>

                            <div class="row mb-3">
                                <div class="col-md-2 col-sm-6 col-xs-12"></div>
                                <div class="col-md-10 col-sm-6 col-xs-12">
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
<script>
    function getImages(num) {
        var str = "";
        for (i = 1; i <= num; i++) {
            str += "<div class='row mb-3'>";
            str += "<div class='col-md-2 col-sm-6 col-xs-12'><label>Image " + i + "</label></div>";
            str += "<div class='col-md-8 col-sm-6 col-xs-12'><input type='file' name='proImageName[]' class='form-control' /></div>";
            str += "</div>";
        }
        document.getElementById('shownoi').innerHTML = str;

    }
    //To check Integers and Dot
    function onlyNos(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode != 46)) {
                // 31 is Unit Separator, 48 is Zero, 57 is Nine, 88 is Uppercase X
                return false;
            }
            return true;
        } catch (err) {
            alert(err.Description);
        }
    }

    //Only integers
    function onlyNos1(e, t) {
        try {
            if (window.event) {
                var charCode = window.event.keyCode;
            } else if (e) {
                var charCode = e.which;
            } else {
                return true;
            }
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                // 31 is Unit Separator, 48 is Zero, 57 is Nine, 88 is Uppercase X
                return false;
            }
            return true;
        } catch (err) {
            alert(err.Description);
        }
    }

    //to hide color name when color code has been seletcted
    function hideColorName() {
        $('#cn').hide();
    }
</script>
</body>

</html>