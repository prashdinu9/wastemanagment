<?php

include '../common/session.php'; //to get session info
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include '../common/dbconnection.php';
$ob = new dbconnection();
$con = $ob->connection();


include '../model/ordermodel.php';
include '../model/stockmodel.php';

$obo = new order();

$status = strtolower($_GET['status']);

if ($status == "addcart") {
    $resulto = $obo->viewAnOrder($s_id);
    $nor = $resulto->num_rows; //num_row php property to count nos
    if ($nor == 0) {
        $orderID = $obo->addAnOrder($s_id);
    } else {
        $rowo = $resulto->fetch_array();
        $orderID = $rowo['orderID'];
    }

    $obs = new stock();

    $colorID = $_POST['colorID'];
    $sizeID = $_POST['sizeID'];
    $proID = $_GET['proID']; //bc passed thr URL can use get or required only
    $proPrice = $_POST['proPrice'];
    $qty = $_POST['qty'];
    $totprice = $proPrice * $qty;
    $obo->addToCart($proID, $colorID, $sizeID, $qty, $proPrice, $totprice, $orderID);
    header("Location:../view/cart.php?orderId=$orderID");
}



if ($status == "paid") {

    $resulto = $obo->viewAnOrder($s_id);
    $rowo = $resulto->fetch_array();
    $orderID = $rowo['orderID'];
    $cusID = $userID;
    $total = $_SESSION['total'];
    $status = "Paid";

    //update payment table
    $sqlpay = "INSERT into payment (paymentAmount, paymentDate,paymentReason) VALUES('$total',NOW(),'eshop')";
    $resultup = $con->query($sqlpay);
    $payID = $con->insert_id; //get last insert id
    //update order status
    $sqlup = "UPDATE orders SET cusID='$cusID',orderStatus='$status',paymentID='$payID' WHERE orderID='$orderID'";
    $resultup = $con->query($sqlup);

    $sqlc = "INSERT into custburntpoints (cusID, orderID,burntPoints,burntDate) VALUES('$cusID','$orderID','$total',NOW())";
    $resultc = $con->query($sqlc);


    unset($_SESSION['s_id']); //to remove shopping session only
    header("Location:../view/paymentsucess.php??payID=$payID&orderID=$orderID");
}
