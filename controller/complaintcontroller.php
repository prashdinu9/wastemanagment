<?php

include '../common/dbconnection.php';
include '../model/complaintmodel.php';
include '../common/session.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new complaint();
//$result = $obj->viewAcomplaint($name);
echo $complainerID = $userID;
$complaintID = $_REQUEST['complaintID'];
$status = strtolower($_REQUEST['status']);

if ($status == "add") {
    $arr = $_POST;

    $complaintID = $obj->addComplaint($arr, $complainerID);
    header("Location:../view/complaint.php");
}

if ($status == "addcomplaintcus") {
    $arr = $_POST;

    $complaintID = $obj->addComplaintCus($arr, $complainerID);
    header("Location:../view/complaintcus.php");
}

if ($status == "addcomment") {
    $arr = $_POST;

    $complaintID = $obj->addCommment($arr, $complaintID, $userID);
    if ($roleID == 4) {
        header("Location:../view/complaintcus.php?status=success");
    } else {
        header("Location:../view/complaint.php?status=success");
    }

    //header("Location:../view/viewcomplaint.php?complaintID=$complaintID&status=View");
}

if ($status == "completed") {
    $obj->completeComplaint($complaintID);
    header("Location:../view/complaint.php?status=success");
}

if ($status == "active") {
    $obj->activeComplaint($complaintID);
    header("Location:../view/complaint.php?status=success");
}



