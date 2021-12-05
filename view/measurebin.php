<!DOCTYPE html>
<?php
include '../common/session.php';
include '../model/binmodel.php';
include '../common/dbconnection.php'; //To get connection string

$ob = new dbconnection();
$con = $ob->connection();

$cusID = $cusID;
$obj = new binAllocation();
$result = $obj->viewCustomerActiveBin($cusID);
//$row = $result->fetch_array();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template</title>
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

        <div class="mainbody">
            <div class="dash">My Bins </div>
        </div>
        <div class="container-fluid" style="text-align: center">
            <div class='row'>
                <?php
                while ($row = $result->fetch_array()) {
                    //To check the status
                    /* if (strtolower($row['cusStatus']) == "active") {
                                        $label = "Deactive";
                                        $class = "btn btn-danger";
                                        $iclass = "glyphicon glyphicon-remove";
                                    } else {
                                        $label = "Active";
                                        $class = "btn btn-info";
                                        $iclass = "glyphicon glyphicon-ok";
                                    } */
                ?>



                    <div class="col-md-4">
                        <div class='row'>
                            <?php echo $row['binType']; ?>
                            <?php echo $row['volume'] . "L"; ?>
                        </div>
                            <div class='row'>
                                <img src="../images/emptybin.png">
                            </div>
                            <div class='row'>
                            <?php if (strtolower($row['isbinFull']) == "no") { 
                                echo "help";
                                "<button type='button' class='btn btn-danger'>Full</button>" ;                        

                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    </div>


                    <div class="footer">
                        <?php
                        include '../common/include_footer.php';
                        ?>
                    </div>

            </div>

</body>

</html>