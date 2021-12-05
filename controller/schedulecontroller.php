<?php

include '../common/dbconnection.php';
include '../model/schedulemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new schedule();
//$result = $obj->viewAschedule($name);
$scheduleID = $_REQUEST['scheduleID'];

$status = strtolower($_REQUEST['status']);

if ($status == "add") {
    $arr = $_POST;
    $arr2 = $_POST['binLoc'];
    $arr2;

    foreach ($arr2 as $value)
        echo $value . "\n";

    $scheduleID = $obj->addSchedule($arr);
    header("Location:../view/schedule.php");
}

if ($status == "completed") {
    //$scheduleID = $_GET['scheduleID'];
    $endodo = $_POST['endodo'];
    $obj->completeSchedule($scheduleID, $endodo);
    header("Location:../view/myschedule.php");
}

if ($status == "mydecline") {
    $scheduleID = $_GET['scheduleID'];
    $userID = $_GET['driverID'];
    $obj->approveSchedule($cusID, $scheduleID);
    //header("Location:../view/myschedule.php");
}

if ($status == "delete") {
    $obj->deleteSchedule($scheduleID);
    header("Location:../view/schedule.php?status=success");
}







//     case "update":
//         $arr = $_POST;
//         $scheduleID = $_REQUEST['scheduleID'];
//         $p = $_REQUEST['p'];
//         $result = $obj->viewschedule($scheduleID);
//         $row = $result->fetch_assoc();
//         $obj->updateschedule($scheduleID, $arr);
//         header("Location:../view/schedule.php?scheduleID=$scheduleID&page=$p");

//         break;

//     case "deactive":
//         $scheduleID = $_GET['scheduleID'];
//         $obj->deactiveschedule($scheduleID);
//         header("Location:../view/schedule.php?page=$page");
//         break;

//     case "active":
//         $scheduleID = $_GET['scheduleID'];
//         $obj->activeschedule($scheduleID);
//         header("Location:../view/schedule.php?page=$page");
//         break;
