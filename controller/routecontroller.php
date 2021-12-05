<?php

include '../common/dbconnection.php';
include '../model/routemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new route();

$status = strtolower($_GET['status']);

$routeID = strtolower($_GET['routeID']);

if ($status == "add") {
    $arr = $_POST;   
    $routeID = $obj->addRoute($arr);
   header("Location:../view/route.php");
}

if ($status == "update") {
    $arr = $_POST;
    $routeID = $obj->updateRoute($arr, $routeID);
    header("Location:../view/route.php");
}

if ($status == "deactive") {
    $routeID = $_GET['routeID'];
    $obj->deactiveRoute($routeID);
    header("Location:../view/route.php");
}

if ($status == "active") {
    $routeID = $_GET['routeID'];
    $obj->activeRoute($routeID);
    header("Location:../view/route.php");
}

