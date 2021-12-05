<?php

include '../common/dbconnection.php';
include '../model/paymentmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new payment();

$total = 0;
$status = strtolower($_REQUEST['status']);

if ($status == "add") {
    $paymentname_id = $_POST['paymentname_id'];
    $donor_name = $_POST['donor_name'];
    $payment_amount = $_POST['payment_amount'];
    $payment_date = $_POST['payment_date'];
    $student_id = $_POST['student'];

    //to get donor id using donor name
    $re = $obj->viewADonor($donor_name);
    $row = $re->fetch_assoc();
    $donor_id = $row['donor_id'];

    //to call add payment method

    $paymentID = $obj->addpayment($paymentname_id, $donor_id, $payment_amount, $payment_date, $student_id);
    header("Location:../view/payment.php");
}

/*
  if ($status == "pending") {
  $paymentID= $_GET['payment_id'];
  $page = $_GET['page'];
  $obj->pendingpayment($payment_id);
  header("Location:../view/payment.php");
  }

  if ($status == "active") {
  $paymentID= $_GET['payment_id'];
  $page = $_GET['page'];
  $obj->activepayment($payment_id);
  header("Location:../view/payment.php");
  } */

if ($status == "delete") {
    $paymentID = $_GET['payment_id'];
    $page = $_GET['page'];
    $obj->deletepayment($payment_id);
    header("Location:../view/payment.php");
}

if ($status == "paynewmember") {
    $applicant_id = $_GET['applicant_id'];

    $paymentID = $obj->addPayment($applicant_id);

    //to call add payment method
    header("Location:../../external/registermsg.php?applicant_id=$applicant_id");
}
//payment for renewal
if ($status == "paid") {
    echo $empID = $_POST['empID'];

    $cdate = date("Y-m-d");
    $date = new DateTime(($cdate));
    $date->modify("+364 day");
    $expirydate = $date->format("Y-m-d");



    //to call add payment method

    $paymentID = $obj->addRenewPayment($empID, $cdate, $expirydate);
    //    header("Location:../view/renewalsuccess.php");
}
