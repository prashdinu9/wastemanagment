<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE); //To hide errors
include '../common/dbconnection.php';
include '../model/commonmodel.php';
include '../model/productmodel.php';
include '../model/ordermodel.php';
include '../model/stockmodel.php';
include '../common/session.php';

$ob = new dbconnection();
$con = $ob->connection();

$obp = new product();
//$obpi = new proImages();

$obo = new order();
$resulto = $obo->viewAnOrder($s_id);

$obs = new stock();

$status = strtolower($_GET['status']);

if ($status == "add") {
    $proName = $_POST['proName'];
    $nproName = sprintf("%03s", $proName);
    $catID = $_POST['catID'];
    $ncatID = sprintf("%.03d", $catID);
    $proDes = $_POST['proDes'];
    $proPrice = $_POST['proPrice'];

    $proCode = "#" . $nproName . "_" . $ncatID;

    //To call addProduct method
    $proID = $obp->addProduct($proName, $proCode, $catID, $proDes, $proPrice);
    header("Location:../view/product.php");

    //image
    $proImageName = $_FILES['proImageName']['name'];
    $proImageName_tmp = $_FILES['proImageName']['tmp_name'];
    print_r($proImageName_tmp);
    print_r($proImageName);
    $noi = count($proImageName);
    if ($noi != 0) {
        foreach ($proImageName as $k => $e) {
            if ($e != "") { //To check image file
                $pi_name = time() . "_" . $proImageName[$k];
                $pi_name_tmp = $proImageName_tmp[$k];
                $obpi->addProImage($pi_name, $proID);
                $path = "../images/proImages/" . $pi_name;
                move_uploaded_file($pi_name_tmp, $path);
            }
        }
    }
}


if ($status == "update") {
    $proName = $_POST['proName'];
    print $nproName = sprintf("%.03s", $proName);
    $catID = $_POST['catID'];
    $ncatID = sprintf("%03d", $catID);
    $proDes = $_POST['proDes'];
    $proPrice = $_POST['proPrice'];
    $proID = $_GET['proID'];

    $proCode = "#" . $nproName . "_" . $ncatID;

    //To call updateProduct method
    $obp->updateProduct($proID, $proName, $proCode, $catID, $proDes, $proPrice);

    //image

    $proImageName = $_FILES['proImageName']['name'];
    $proImageName_tmp = $_FILES['proImageName']['tmp_name'];
    print_r($proImageName_tmp);
    print_r($proImageName);
    $noi = count($proImageName);
    if ($noi != 0) {
        foreach ($proImageName as $k => $e) {
            if ($e != "") { //To check image file
                $pi_name = time() . "_" . $proImageName[$k];
                $pi_name_tmp = $proImageName_tmp[$k];
                $obpi->addProImage($pi_name, $proID);
                $path = "../images/proImages/" . $pi_name;
                move_uploaded_file($pi_name_tmp, $path);
            }
        }
    }

    header("Location:../view/product.php");
}

if ($status == "delete") {
    $proID = $_GET['proID'];
    $obp->deleteProduct($proID);
    header("Location:../view/product.php");
}
