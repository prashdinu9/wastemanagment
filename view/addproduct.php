<!DOCTYPE html>
<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To get product type, category

$ob = new dbconnection();
$con = $ob->connection();

$obc = new category();
$rec = $obc->viewCategory();

$obs = new size();
$res = $obs->viewSize();

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
                            <h1 class="h3 mb-0 text-gray-800">Add a Product</h1>
                        </div>

                        <div id="breadcrumbs">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="../view/product.php">Product Management</a></li>
                                <li class="active breadcrumb-item">Add Product</li>
                            </ol>
                        </div>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <form method="post" action="../controller/productcontroller.php?status=Add" enctype="multipart/form-data">

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Product Name <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <input type="text" name="proName" id="proName" placeholder="Product Name " class="form-control" required="" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Category <span>*</span></label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="catID" id="typeID" required="" class="form-control">
                                                <option value="">Select a Category</option>
                                                <?php while ($rowc = $rec->fetch_assoc()) { ?>
                                                    <option value="<?php echo $rowc['catID']; ?>">
                                                        <?php echo $rowc['catName']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Description</label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <textarea name="proDes" id="proDes" placeholder="Product Description " class="form-control" rows='5'></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-2 col-sm-6 col-xs-12">
                                            <label>Price <span>*</span></label>
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <div class="input-group">
                                                <div class="input-group-text">Rs.</div>
                                                <input name="proPrice" id="proPrice" placeholder="Product Price" class="form-control" required="" onkeypress="return onlyNos(event, this)" min="0" step="0.01">
                                            </div>
                                        </div>
                                    </div>

                                    <!--                            <div class="row mb-3">
                                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                                        <label>No of Images</label>
                                                                    </div>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select name="noi" id="noi" class="form-control" onchange="getImages(this.value)">
                                                                            <option value="">Select No of Images</option>
                                    <?php //for ($i = 1; $i <= 5; $i++) { ?>
                                                                                <option value="<?php //echo $i;   ?>"><?php //echo $i;   ?></option>
                                    <?php // } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>-->

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
            // To upload multiple images
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
        </script>
    </body>

</html>