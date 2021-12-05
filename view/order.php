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



include '../model/customermodel.php'; //To call customer model
$obj = new customer(); //To create an object using customer class
$result = $obj->viewAllCustomer(); //To get all customers' infor

?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Online Ordering System</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/loginlayout.css" />
    <script type="text/javascript">
        function confMessage(str) {
            var r = confirm("Are You Sure to " + str + " customer");
            if (!r) {
                return false;
            }


        }
    </script>




</head>

<body>
    <div id="maindiv">
        <div id="headerdiv">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-8">
                        <div class="webbanner">
                            OnLine Ordering System
                        </div>
                    </div>
                    <div class="col-md-2">&nbsp;</div>
                </div>
            </div>
        </div>
        <div id="sessiondiv">
            <div class="al">
                <i class="glyphicon glyphicon-customer"></i>
                <?php echo $fname . " | " . $role_name, " | " ?>
                <a href="../view/signout.php">
                    <button class="btn-xs btn-primary">SignOut</button>

                </a>
            </div>

            &nbsp;
        </div>
        <div id="navidiv">
            <ol class="breadcrumb">
                <li><a href="../view/dashboard.php">Dashboard</a></li>
                <li class="active"><?php echo $module_name; ?> Module</li>
            </ol>
            &nbsp;
        </div>
        <div id="contentdiv">
            <div class="dash"><?php echo $module_name; ?> Module</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <?php if ($role_id == '1') { ?><a href="../view/add<?php echo strtolower($module_name); ?>.php">
                                <button type="button" class="btn btn-primary btn-sm">

                                    Add a <?php echo $module_name; ?>
                                </button>
                            </a><?php } ?>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        <form action="searchcustomer.php" method="post">
                            <input type="text" class="input-sm" required="" name="searchkey" placeholder="Search customers" />
                            <button type="submit" name="search" class="btn btn-primary btn-sm">
                                <i class="glyphicon glyphicon-search"></i> </button>
                        </form>

                    </div>
                </div>
                <hr />
                <div class="container">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>&nbsp;</th>
                            <th>customer ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php
                        while ($row = $result->fetch_array()) {
                            //To check the Image
                            if ($row['customer_image'] == "") {
                                $path = "../images/customer.png";
                            } else {
                                $path = "../images/customer_images/" . $row['customer_image'];
                            }
                            //To check the status
                            if (strtolower($row['customer_status']) == "active") {
                                $label = "Deactive";
                                $class = "btn btn-danger";
                            } else {
                                $label = "Active";
                                $class = "btn btn-info";
                            }
                        ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $path; ?>" width="35" height="auto" />
                                    &nbsp;
                                </td>
                                <td>
                                    <?php echo $row['customer_id']; ?>

                                    &nbsp;</td>
                                <td>
                                    <?php echo $row['customer_fname']; ?>
                                    &nbsp;</td>
                                <td>
                                    <?php echo $row['customer_lname']; ?>
                                    &nbsp;</td>
                                <td>
                                    <?php echo $row['email']; ?>
                                    &nbsp;</td>
                                <td>
                                    <?php echo $row['role_name']; ?>
                                    &nbsp;</td>
                                <td>
                                    <?php echo $row['customer_status']; ?>
                                    &nbsp;</td>
                                <td>
                                    <a href="../view/viewcustomer.php?customer_id=<?php echo $row['customer_id']; ?>&status=View"><button type="button" class="btn btn-success">View</button>
                                    </a>
                                    <a href="../view/updatecustomer.php?customer_id=<?php echo $row['customer_id']; ?>&status=Update&p=<?php echo $p; ?>">
                                        <button type="button" class="btn btn-primary">Update</button>
                                    </a>

                                    <a href="../controller/customercontroller.php?
                                           customer_id=<?php echo $row['customer_id']; ?>&status=<?php echo $label; ?>&page=<?php echo $_GET['page']; ?>">
                                        <button type="button" class="<?php echo $class; ?>" onclick="return confMessage('<?php echo $label; ?>')">
                                            <?php echo $label; ?></button>
                                    </a>



                                    &nbsp;
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                    <ul class="pagination pagination-sm">
                        <?php for ($i = 1; $i <= $nopages; $i++) { ?>
                            <li <?php if ($i == $p) { ?> class="active" <?php } ?>>

                                <a href="customer.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                    </ul>


                </div>


                &nbsp;
            </div>

            <div id="footerdiv">
                <div class="ci">&copy; 2017 UCSC, ALL RIGHTS RESERVED</div>
            </div>
        </div>
</body>
<script type="text/javascript" src="../JQuery/jquery-3.6.0.min.js"></script>

</html>