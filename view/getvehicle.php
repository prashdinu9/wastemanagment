<?php

include '../common/dbconnection.php'; //To get connection string
$ob = new dbconnection();
$con = $ob->connection();
include '../model/vehiclemodel.php';
$obj = new vehicle();
$vehicleNo = $_REQUEST['vehicleNo'];

$nor = $obj->checkVehicle($vehicleNo);
//echo $nor;
//$num = count($nor);

if ($nor > 0) {
    echo "1";
} else {
    echo "0";
}
?>


