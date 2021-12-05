<?php
include '../common/session.php'; //To get session info
include '../common/dbconnection.php'; //To get connection string
include '../model/stockmodel.php';

$ob = new dbconnection();
$con = $ob->connection();
$obs = new stock();


$sid = $_GET['sid'];
$pid = $_GET['pid'];

$resultcolor = $obs->viewStockProductColor($pid, $sid);
$arr = array();
$arr1 = array();
while ($rowcolor = $resultcolor->fetch_array()) {
    if ($rowcolor['colorCode'] != "") {
        array_push($arr, $rowcolor['colorCode']);
        array_push($arr1, $rowcolor['colorID']);
    }
    if ($rowcolor['colorName'] != "") {
        array_push($arr, $rowcolor['colorName']);
        array_push($arr1, $rowcolor['colorID']);
    }
}
?>

<?php foreach ($arr as $k => $v) { //k index v code ?>
    <a href="javascript:getPrice(<?php echo $arr1[$k]; ?>, <?php echo $sid ?>,<?php echo $pid; ?>)" class="colour-block">
        <span class="colour-block-inner" style="background-color: <?php echo $v; ?>;"></span>
    </a>
<?php } ?>