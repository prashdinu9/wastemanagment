<?php

include '../common/dbconnection.php';
include '../model/leavemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new leave();

$status = strtolower($_REQUEST['status']);
$leaveID = strtolower($_REQUEST['leaveID']);

if ($status == "add") {
    $arr = $_POST;    

    $leaveID = $obj->addLeave($arr);
    header("Location:../view/leave.php");
}

if ($status == "update") {
    $arr = $_POST;

   $obj->updateLeave($leaveID , $arr);
    $leaveID = $obj->updateLeave($leaveID,$arr);
   header("Location:../view/leave.php?status=success");
}

if ($status == "delete") {
    $obj->deleteLeave($leaveID);
         header("Location:../view/leave.php?status=success");
}
