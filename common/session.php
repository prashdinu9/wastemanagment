<?php

error_reporting(0);
//error_reporting(E_ERROR | E_WARNING  | E_PARSE);
//To start the session
if (!isset($_SESSION)) {
    session_start();
}
//ERROR REPORTING
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
if ($_SESSION['s_id'] == "") {

    //To get IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) { //identify client ip (here used few methods)
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    $_SESSION['s_id'] = time() . "_" . $ip; //create session id
}

$s_id = $_SESSION['s_id'];

//To get count from session array
$count = count($_SESSION['user_info']);
//If not login
if ($count == 0) {
    $msg = "Please Login...";
    $msg = base64_encode($msg);
    header("Location:../view/login.php?msg=$msg");
    exit();
}

$user_info = $_SESSION['user_info'];
$roleID = $user_info['roleID'];

if ($roleID == 1 || $roleID == 2 || $roleID == 3) {
    $userID = $user_info['empID'];
    $userName = $user_info['empName'];
    // $roleName = $user_info['roleName'];
    $roleID = $user_info['roleID'];
} else {
    $userName = $user_info['cusName'];
    //  $roleName = $user_info['roleName'];
    $userID = $user_info['cusID'];
    $roleID = $user_info['roleID'];
}


