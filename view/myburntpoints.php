<!DOCTYPE html>
<?php
include '../common/session.php';
include '../model/binmodel.php';
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$cusID = $cusID;
$obj = new garbagePoints();
$result = $obj->viewCustomerBurntPoints($cusID);
//$row = $result->fetch_array();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Garbage Points</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" type="text/css" href="../css/leftsidebar-styles.css">
    <script type="text/javascript" src="../JQuery/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4e352e5914.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
    <script src="../js/leftsidebar.js"></script>

    <!-- date table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.3.1/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.0/r-2.2.9/rg-1.1.3/sb-1.1.0/datatables.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.3.1/jszip-2.5.0/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/date-1.1.0/r-2.2.9/rg-1.1.3/sb-1.1.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'QBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>


</head>

<body>
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

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Earned Points</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Burnt Points</a>
            </li>

        </ul>

        <div class="mainbody">
            <div class="dash">My Garbage Points </div>
        </div>
        <div class="container-fluid" style="text-align: center">
            <p>Current Available Points - 156</p>
            <p>Total Points Earned- 567</p>
            <p>Total Points Used- 89</p>
            <div class='row'>

            </div>

            <div style="text-align: center;">From <input type="date" />
                &nbsp; To <input type="date" /></div>

            <div class="container-fluid">

                <table class="table table-responsive table-striped" id="example">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Points Used</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_array()) {
                        ?>
                            <tr>

                                <td>
                                    <?php echo $row['orderID']; ?>
                                <td>
                                    <?php echo $row['burntPoints']; ?>
                                </td>

                                <td>
                                    <?php echo $row['burntDate']; ?>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                    <footer>
                       
                        <td>
                            Total
                        </td>
                        <td>
                            89
                        </td>
                        <td></td>
                    </footer>
                </table>



            </div>

            <div class="footer">
                <?php
                include '../common/include_footer.php';
                ?>
            </div>

        </div>

</body>

</html>