<?php

class binAllocation {

    public function viewAllBinAllocation() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN customer c ON ba.cusID=c.cusID
    INNER JOIN route r ON r.routeID=c.routeID
 INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
ORDER BY c.cusName";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomerAllocationBin($cusID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN customer c ON ba.cusID=c.cusID
    INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
    WHERE c.cusID='$cusID'";

//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewBinType() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM bintype";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewBinVolume() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binvolume";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addBinAllocation($arr, $activationCode, $allocationDate, $userID) {
        $binTypeID = $arr['binTypeID'];
        $cusID = $arr['cusID'];
        $cusID = $userID;
        $binVolumeID = $arr['binVolumeID'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO binallocation (binTypeID,binVolumeID,cusID,activationCode,allocationDate, binStatus,isbinFull) VALUES('$binTypeID','$binVolumeID','$cusID','$activationCode','$allocationDate','Pending','No')";
        $result = $con->query($sql) or die($con->error);
    }

    function updatebin($binID, $arr) {
        $name = $arr['name'];
        $NIC = $arr['NIC'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $longitude = $arr['longitude'];
        $latitude = $arr['latitude'];
//$binID = $arr['binID'];


        $con = $GLOBALS['con'];
        $sql = "UPDATE bin SET cusName='$name', NIC='$NIC',cusAddress='$address',contactNo='$contactNo',email='$email',longitude='$longitude',latitude='$latitude' WHERE binID='$binID'";
        $result = $con->query($sql) or die($con->error);
        return $binID;
    }

    function deactiveBin($binAllocationID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET binStatus='Deactive' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql);
    }

    function activeBin($binAllocationID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET binStatus='Active' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql);
    }

}

class garbageBinStatus {

    public function viewAllBinGarbageStatus() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN customer c ON ba.cusID=c.cusID
INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
INNER JOIN route r ON r.routeID = c.routeID
WHERE ba.binStatus ='Active' AND c.cusStatus='Active' ORDER BY c.cusName";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewMyGarbageBin($userID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN customer c ON ba.cusID=c.cusID
INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
INNER JOIN route r ON r.routeID = c.routeID
WHERE ba.binStatus ='Active' AND ba.cusID='$userID' ORDER BY c.cusName";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewBinWeightGroupedByType2() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT  bintype.binType,SUM(weight) AS weight FROM bintrans,bintype,binallocation
WHERE bintype.binTypeID =binallocation.binTypeID AND bintrans.binAllocationID =binallocation.binAllocationID
GROUP BY bintype.binType ";

//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewDriverCollectionBins($scheduleID) {
        $con = $GLOBALS['con'];
//sql query

        $sql = "SELECT *  From garbageloc gl
    LEFT JOIN binallocation ba ON gl.binAllocationID = ba.binAllocationID
    LEFT JOIN bintype bt ON ba.binTypeID= bt.binTypeID
LEFT JOIN customer c ON ba.cusID=c.cusID
LEFT JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
LEFT JOIN route r ON r.routeID = c.routeID
WHERE gl.scheduleID='$scheduleID' AND isbinFull='Yes' AND binStatus='Active' ";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewBinFullCustomers() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID INNER JOIN customer c ON ba.cusID=c.cusID WHERE ba.isbinFull='yes'";

//$sql = "SELECT * FROM bin m,login l,role r WHERE m.bin_id=l.bin_id AND m.role_id=r.role_id AND m.bin_id='$bin_id'";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewACustomerFullBins($cusID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM binallocation ba INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID INNER JOIN customer c ON ba.cusID=c.cusID WHERE cusID='$cusID' AND ba.isbinFull='yes'";

//$sql = "SELECT * FROM bin m,login l,role r WHERE m.bin_id=l.bin_id AND m.role_id=r.role_id AND m.bin_id='$bin_id'";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function binFullStaff($binAllocationID, $changedBy, $cusID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET isbinFull='Yes' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql);

        $sqln = "INSERT INTO bintrans (binAllocationID,cusID,transDate,isbinFull,changedBy) VALUES ('$binAllocationID','$cusID',NOW(),'Yes','$changedBy')";
        $resultn = $con->query($sqln);
    }

    function binEmptyStaff($binAllocationID, $changedBy, $cusID, $weight, $totalPoints, $userID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET isbinFull='No' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql) or die($con->error);

        $sqln = "INSERT INTO bintrans (binAllocationID,cusID,weight,points,transDate,isbinFull,changedBy) VALUES ('$binAllocationID','$cusID','$weight','$totalPoints',NOW(),'No','$changedBy')";
        $resultn = $con->query($sqln);

        $sqlp = "INSERT INTO custaddpoints (binAllocationID,cusID,weight,addPoints,addDate,driverID) VALUES ('$binAllocationID','$cusID','$weight','$totalPoints',NOW(),'$userID')";
        $resultp = $con->query($sqlp);
    }

//    function addBinWeightStaff($binAllocationID,$weight)
//    {
//        $con = $GLOBALS['con'];
//        $sqln = "UPDATE bintrans set weight ='$weight' WHERE binAllocationID='$binAllocationID'";
//        $resultn = $con->query($sqln);
//
////        $sqlp = "INSERT INTO custaddpoints (binAllocationID,cusID,addPoints,addDate) VALUES ('$binAllocationID','$cusID','1',NOW())";
////        $resultp = $con->query($sqlp);
//    }

    public function viewAGarbageBinTrans($binAllocationID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT *, (bv.volume * bt.expectedWeight) AS expectedTotalWeight FROM binallocation ba
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    INNER JOIN bintrans btr ON btr.binAllocationID=ba.binAllocationID
INNER JOIN binvolume bv ON bv.binVolumeID=ba.binVolumeID
WHERE ba.binAllocationID='$binAllocationID' ORDER BY btr.transDate DESC";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewBinWeightGroupedByType() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT SUM(weight) FROM bintrans bt
INNER JOIN binallocation ba ON ba.binAllocationID= bt.binAllocationID
GROUP BY ba.binTypeID";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

}

class garbagePoints {

    public function pointCalculation($binTransID) {
        $con = $GLOBALS['con'];
//sql query
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllgarbagePoint() {
        $con = $GLOBALS['con'];
//sql query
//        $sql = "SELECT * FROM binallocation ba
//    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
//    INNER JOIN customer c ON ba.cusID=c.cusID
//INNER JOIN custaddpoints cap ON cap.cusID=c.cusID
//ORDER BY cap.addDate DESC";
        $sql = "SELECT * FROM custaddpoints cap
   INNER JOIN customer c ON cap.cusID=c.cusID
INNER JOIN binallocation ba ON cap.binAllocationID=ba.binAllocationID
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
ORDER BY cap.addDate DESC";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewDrivergarbagePoint($userID) {
        $con = $GLOBALS['con'];
//sql query
//        $sql = "SELECT * FROM binallocation ba
//    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
//    INNER JOIN customer c ON ba.cusID=c.cusID
//INNER JOIN custaddpoints cap ON cap.cusID=c.cusID
//ORDER BY cap.addDate DESC";
        $sql = "SELECT * FROM custaddpoints cap
   INNER JOIN customer c ON cap.cusID=c.cusID
INNER JOIN binallocation ba ON cap.binAllocationID=ba.binAllocationID
    INNER JOIN bintype bt ON ba.binTypeID= bt.binTypeID
    WHERE driverID='$userID'
ORDER BY cap.addDate DESC;";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewDriverTotalPoints($userID) {
        $con = $GLOBALS['con'];
//sql query
//
        $sql = "SELECT SUM(addPoints) as totaldriverpoints FROM `custaddpoints` WHERE driverID='$userID'";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomerAddedPoints($cusID) {
        $con = $GLOBALS['con'];
//sql query
//        $sql = "SELECT * FROM custaddpoints cap
//        INNER JOIN customer c ON cap.cusID=c.cusID
//      -- RIGHT JOIN custburntpoints cbp ON cbp.cusID=c.cusID
//        INNER JOIN binallocation ba ON cap.binAllocationID=ba.binAllocationID
//        INNER JOIN bintype bt ON bt.binTypeID=ba.binTypeID
//        INNER JOIN garbagepoints gp ON bt.binTypeID=gp.binTypeID
//        WHERE cap.cusID='$cusID'";

        $sql2 = "SELECT *, SUM(addPoints) as totaladdpoints FROM `custaddpoints` WHERE cusID='$cusID'";
//Execute a query
        $result = $con->query($sql2);
        return $result;
    }

    public function viewCustomerBurntPoints($cusID) {
        $con = $GLOBALS['con'];
//sql query

        $sql2 = "SELECT SUM(burntPoints) as totalburntpoints FROM `custburntpoints` WHERE cusID='$cusID'";

//Execute a query
        $result = $con->query($sql2);
        return $result;
    }

    public function viewCustomergarbagePoints($cusID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM custaddpoints cap
        INNER JOIN customer c ON cap.cusID=c.cusID
      -- RIGHT JOIN custburntpoints cbp ON cbp.cusID=c.cusID
        INNER JOIN binallocation ba ON cap.binAllocationID=ba.binAllocationID
        INNER JOIN bintype bt ON bt.binTypeID=ba.binTypeID
        INNER JOIN garbagepoints gp ON bt.binTypeID=gp.binTypeID
        WHERE cap.cusID='$cusID'";

//$sql = "SELECT * FROM bin m,login l,role r WHERE m.bin_id=l.bin_id AND m.role_id=r.role_id AND m.bin_id='$bin_id'";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addBinPoints($arr) {
//  x=$binAllocationID;


        $con = $GLOBALS['con'];
        $sql = "INSERT INTO custaddpoints (	binAllocationID,cusID,addPoints,addDate) VALUES('$binTypeID','$cusID','$activationCode','$allocationDate')";
        $result = $con->query($sql) or die($con->error);
    }

    public function viewBinType() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM bintype";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addBinAllocation($arr) {
        $binTypeID = $arr['binTypeID'];
        $cusID = $arr['cusID'];
        $activationCode = substr(md5(microtime()), rand(0, 26), 5);
        $allocationDate = date("Y-m-d");

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO binallocation (binTypeID,cusID,activationCode,allocationDate, binStatus) VALUES('$binTypeID','$cusID','$activationCode','$allocationDate','Pending')";
        $result = $con->query($sql) or die($con->error);
    }

    function updatebin($binID, $arr) {
        $name = $arr['name'];
        $NIC = $arr['NIC'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $longitude = $arr['longitude'];
        $latitude = $arr['latitude'];
//$binID = $arr['binID'];


        $con = $GLOBALS['con'];
        $sql = "UPDATE bin SET cusName='$name', NIC='$NIC',cusAddress='$address',contactNo='$contactNo',email='$email',longitude='$longitude',latitude='$latitude' WHERE binID='$binID'";
        $result = $con->query($sql) or die($con->error);
        return $binID;
    }

    function deactiveBin($binAllocationID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET binStatus='Deactive' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql);
    }

    function activeBin($binAllocationID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE binallocation SET binStatus='Active' WHERE binAllocationID='$binAllocationID'";
        $result = $con->query($sql);
    }

}
