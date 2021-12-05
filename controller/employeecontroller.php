<?php

include '../common/dbconnection.php';
include '../model/employeemodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new employee();
//$result = $obj->viewAemployee($name);


$status = strtolower($_REQUEST['status']);
$empID = $_GET['empID'];

switch ($status) {
    case "add":
        $arr = $_POST;
         $empID = $obj->addEmployee($arr);

        header("Location:../view/employee.php?status=success");

        break;

     case "update":
         $arr = $_POST;
         $obj->updateEmployee($empID, $arr);
        header("Location:../view/employee.php?status=success");

         break;

    case "deactive":

        $obj->deactiveEmployee($empID);
        header("Location:../view/employee.php?status=success");
        break;

    case "active":

        $obj->activeEmployee($empID);
        header("Location:../view/employee.php?status=success");
        break;
}
