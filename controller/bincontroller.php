<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/dbconnection.php';
include '../model/binmodel.php';
include '../common/session.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new binAllocation();
$obg = new garbageBinStatus();

echo $userID;

$status = strtolower($_GET['status']);
//get today
//date_default_timezone_set("Asia/colombo");
//$cdate = date("Y-m-d H:i:sa");
$changedBy = $userName;
$cusID = $_GET['cusID'];
$binAllocationID = $_GET['binAllocationID'];
$scheduleID = $_GET['scheduleID'];

if ($status == "add") {
    $arr = $_POST;
    $count = $_POST['qty'];
    //get current date
    $allocationDate = date("Y-m-d");

    //for multiple bins
    for ($x = 1; $x <= $count; $x++) {
        //generate activation code
        $activationCode = substr(md5(microtime()), rand(0, 26), 5);
        $binID = $obj->addBinAllocation($arr, $activationCode, $allocationDate, $userID);
        //include 'sendcode.php';
    }

    if ($roleID == 4) {
        header("Location:../view/binallocationcus.php?status=success");
    } else {
        header("Location:../view/binallocation.php?status=success");
    }
}

if ($status == "deactive") {
    $obj->deactiveBin($binAllocationID);
    header("Location:../view/binallocation.php?status=success");

    if ($roleID == 4) {
        header("Location:../view/binallocationcus.php?status=success");
    } else {
        header("Location:../view/binallocation.php?status=success");
    }
}

if ($status == "active") {
    $obj->activeBin($binAllocationID);

    if ($roleID == 4) {
        header("Location:../view/binallocationcus.php?status=success");
    } else {
        header("Location:../view/binallocation.php?status=success");
    }
}
//        if ($status == "empty") {
//        $obg->binEmptyStaff($binAllocationID,$changedBy,$cusID) ;
//       header("Location:../view/garbagebin.php");
//}
if ($status == "bin full") {
    $obg->binFullStaff($binAllocationID, $changedBy, $cusID);
    if ($roleID == 4) {
        header("Location:../view/mygarbagebin.php?status=success");
    } else {
        header("Location:../view/garbagebin.php?status=success");
    }
}

if ($status == "addweight") {
    echo $weight = $_POST['weight'];
    echo $point = $_GET['points'];
    $totalPoints = $weight * $point;
    // $obg->addBinWeightStaff($binAllocationID,$weight);
    $obg->binEmptyStaff($binAllocationID, $changedBy, $cusID, $weight, $totalPoints);
    header("Location:../view/garbagebin.php?status=success");
}

if ($status == "addweightdriver") {
    $weight = $_POST['weight'];
    $point = $_GET['points'];
    $totalPoints = $weight * $point;

    // $obg->addBinWeightStaff($binAllocationID,$weight);
    $obg->binEmptyStaff($binAllocationID, $changedBy, $cusID, $weight, $totalPoints, $userID);
    header("Location:../view/driverbincollectionlist.php?scheduleID=$scheduleID&status=success");
}
