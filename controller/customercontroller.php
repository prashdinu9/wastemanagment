<?php

include '../common/dbconnection.php';
include '../model/customermodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obj = new customer();
//$result = $obj->viewAcustomer($name);


$status = strtolower($_REQUEST['status']);

switch ($status) {
    case "add":
        $arr = $_POST;
        $name = $arr['name'];
        $email = $arr['email'];

        $cusID = $obj->addCustomer($arr);

        include 'sendpassword.php';
        header("Location:../view/customer.php?status=success");
        break;

    case "update":
        $arr = $_POST;
        $cusID = $_REQUEST['cusID'];
        //$result = $obj->viewCustomer($cusID);
       // $row = $result->fetch_assoc();
        $obj->updateCustomer($cusID,$arr);
       header("Location:../view/customer.php?status=success");

        break;

    case "deactive":
        $cusID = $_GET['cusID'];
        $obj->deactiveCustomer($cusID);
        header("Location:../view/customer.php?status=success");
        break;

    case "active":
        $cusID = $_GET['cusID'];
        $obj->activeCustomer($cusID);
        header("Location:../view/customer.php?status=success");
        break;
}
