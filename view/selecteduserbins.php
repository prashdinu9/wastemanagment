<?php
include '../common/dbconnection.php'; //To get connection string
$ob = new dbconnection();
$con = $ob->connection();

$obj = new binAllocation();
$res = $obj->viewCustomerAllocationBin($cusID);
?>

