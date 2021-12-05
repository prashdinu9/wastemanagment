<!DOCTYPE html>
<?php
/*include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/commonmodel.php'; //To call common vehicle model

$ob = new dbconnection();
$con = $ob->connection();

$obj = new role(); //To create an object using role class
$result = $obj->viewRole(); //To get all roles' info
//To set default time zone
date_default_timezone_set("Asia/colombo");
$cdate = date("Y-m-d");
$cid = strtotime($cdate); //Date convert into timestamp

function getDate1($y)
{
    $a = floor($y / 4);
    $ctimestamp = time();
    $seconds = (60 * 60 * 24 * 365) * $y + (60 * 60 * 24 * $a);
    $timestamp = $ctimestamp - $seconds;
    $aDate = Date("Y-m-d", $timestamp); //To get date from timestamp
    return $aDate;
}

$maxDate = getDate1(18);
$minDate = getDate1(60);
*/?>
<html lang="en">

<?php include '../common/include_head.php' ?>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="../images/logo.png" class="login-logo"/>
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>

                                <div class="alert alert-danger" role="alert" id="error" style="display: <?php echo (isset($_REQUEST['msg'])) ? 'block' : 'none'?>">
                                    <?php
                                    //If there is an error
                                    if (isset($_REQUEST['msg'])) {
                                        echo base64_decode($_REQUEST['msg']);
                                    }
                                    ?>
                                </div>
                                <form method="post" action="../controller/customercontroller.php?status=Add" enctype="multipart/form-data" id="addCustomer" name="addCustomer">
                                    <div class="form-group">
                                        <input type="text" required="" name="email" id="email" placeholder="Email" class="form-control" onkeyup="checkEmail(this.value)" autocomplete="off" />
                                        <span id="show"></span>
                                    </div>
                                    <input type="submit" name="login" value="Reset password" class="btn btn-success btn-user btn-block"/>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="login.php">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../common/include_scripts.php'; ?>
</body>
</html>
