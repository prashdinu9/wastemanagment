<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors

include '../common/dbconnection.php'; //To get connection string
include '../common/session.php'; // to get session info

$ob = new dbconnection();
$con = $ob->connection();

include '../model/stockmodel.php';
$obs = new stock();

$status = strtolower($_GET['status']);
$empID = $userID;

if ($status == "add") {
    $proID = $_POST['proID'];
    $sizeID = $_POST['sizeID'];
    $colorID = $_POST['colorID'];
    $stockDate = $_POST['stockDate'];
    $proPrice = $_POST['proPrice'];
    $stockQty = $_POST['stockQty'];

    if (isset($_POST['colorName'])) {
        $color = $_POST['colorName'];
        $str = "colorName";
        $rescn = $obs->checkColorName($color);
        if ($rescn->num_rows == 0) {
            $colorID = $obs->AddColorName($color);
            echo $colorID;
        } else {
            $rowscn = $rescn->fetch_assoc();
            $colorID = $rowscn['colorID'];
            echo $colorID;
        }
    } else { // to check colour code
        $color = $_POST['colorCode'];
        $str = "colorCode";
        $rescc = $obs->checkColorCode($color);
        if ($rescc->num_rows == 0) {
            $colorID = $obs->AddColorCode($color);
            echo $colorID;
        } else {
            $rowscc = $rescc->fetch_assoc();
            $colorID = $rowscc['colorID'];
            echo $colorID;
        }
    }
    //echo $color; // to check the
    //echo $str;
    $status = "Active";
    // to add data into stock table
    $stockID = $obs->AddStock($proID, $colorID, $sizeID, $stockDate, $stockQty, $status, $empID);
    //echo $stock_id;

    header("Location:../view/stock.php");
}
