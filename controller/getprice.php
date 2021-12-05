<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/stockmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obs = new stock();

$cid = $_GET['cid'];
$sid = $_GET['sid'];
$pid = $_GET['pid'];
$res = $obs->viewAStock($pid, $cid, $sid);
$rows = $res->fetch_array();
echo $rows['proPrice'];
?>
<input type="hidden" value="<?php echo $cid; ?>" name="colorID" />
<input type="hidden" value="<?php echo $rows['proPrice']; ?>" name="proPrice" />