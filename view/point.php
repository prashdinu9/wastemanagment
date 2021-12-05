<!DOCTYPE html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/binmodel.php'; //To call point model

$ob = new dbconnection();
$con = $ob->connection();
$obj = new point; //To create an object using point class
$result = $obj->viewAllpoint(); //To get all points info
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Waste Management</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <link href="../DataTables/DataTables-1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script type="text/javascript" src="../JQuery/jquery-3.6.0.min.js"></script>
    <script src="../DataTables/datatables.min.js"></script>
    <script src="../DataTables/DataTables-1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/leftsidebar-styles.css">

    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4e352e5914.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/leftsidebar.js"></script>


    <script type="text/javascript">
        function confMessage(str) {
            var r = confirm("Do you want to " + str + " this point ?");
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

</head>

<body>
    <div class="container-fluid">


        <div class="page-wrapper green-theme">
            <div class="header">
                <?php
                include '../common/include_header.php';
                ?>
            </div>
            <div>
                <?php
                include '../common/include_leftsidebar.php';
                ?>
            </div>

            <div class="mainbody">
                <div>&nbsp;</div>
                <div id="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../view/dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">point Management</li>
                    </ol>
                </div>

                <div id="contentdiv">
                    <div class="dash">point Management</div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <?php // if ($role_id == '1') { 
                                ?>
                                <a href="../view/addpoint.php">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        &nbsp;Add point
                                    </button>
                                </a>
                                <?php //} 
                                ?>
                            </div>
                        </div>
                        <hr />
                        <div class="container-fluid">

                            <table class="table table-responsive table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>point From</th>
                                        <th>point To</th>
                                        <th>Reason</th>
                                        <th>&nbsp;</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_array()) {
                                    ?>
                                        <tr>

                                            <td>
                                                <?php echo $row['empName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['pointFrom']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['pointTo']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['reason']; ?>
                                            </td>

                                            <td>
                                                <a href="../view/updatepoint.php?pointID=<?php echo $row['pointID']; ?>&status=Update">
                                                    <button type="button" class="btn btn-primary"> </i> Update</button></a>

                                                <a href="../controller/pointcontroller.php?
                                                   pointID=<?php echo $row['pointID']; ?>&status=Delete">
                                                    <button type="button" class="btn btn-danger" onclick="return confMessage('<?php echo $label; ?>')">
                                                        Delete</button></a>
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
    <div class="footer">
        <?php
        include '../common/include_footer.php';
        ?>
    </div>
</body>

</html>