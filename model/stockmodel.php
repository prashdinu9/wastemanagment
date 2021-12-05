<?php

class stock {

    public function viewStocks() {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT SUM(s.stockQty) as sq,p.proName,p.proCode,z.sizeCode,c.colorCode,c.colorName,p.proID,z.sizeID,c.colorID FROM stock s,productcolor c,productsize z,product p WHERE s.sizeID=z.sizeID AND s.proID=p.proID AND s.colorID=c.colorID GROUP BY s.proID,z.sizeID,c.colorID";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllSize() {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productsize ORDER BY sizeID DESC";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAllColor() {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productcolor WHERE colorName not in('') ORDER BY colorID DESC"; // using not in can remove the spaces in list down
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function checkColorName($colorName) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productcolor WHERE colorName='$colorName'"; // check the colour name is exsiting
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function checkColorCode($colorCode) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productcolor WHERE colorCode='$colorCode'"; // check the colour code is exsiting
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function AddColorName($colorName) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "INSERT INTO productcolor (colorName) VALUES ('$colorName')";
        // execute Query
        $result = $con->query($sql);
        $colorID = $con->insert_id;
        return $colorID;
    }

    public function AddColorCode($colorCode) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "INSERT INTO productcolor (colorCode) VALUES ('$colorCode')";
        // execute Query
        $result = $con->query($sql);
        $colorID = $con->insert_id;
        return $colorID;
    }

    public function AddStock($proID, $colorID, $sizeID, $stockDate, $stockQty, $status, $empID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "INSERT INTO stock (proID,colorID,sizeID,stockDate,stockQty,stockStatus,empID) VALUES ('$proID','$colorID','$sizeID',NOW(),'$stockQty','$status','$empID')";
        // execute Query
        $result = $con->query($sql) or die($con->error); // to detect rrors
        $colorID = $con->insert_id;
        return $colorID;
    }

    public function viewAColor($colorID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productcolor WHERE colorID ='$colorID'";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewASize($sizeID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM productsize WHERE sizeID ='$sizeID'";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAStock($proID, $colorID, $sizeID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT * FROM stock s, employee e, product p WHERE s.colorID ='$colorID' AND s.proID='$proID' AND sizeID='$sizeID' AND s.empID=e.empID AND s.proID=p.proID";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewStockProductSize($proID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT DISTINCT s.sizeID,z.sizeCode FROM stock s, productsize z WHERE s.sizeID=z.sizeID AND s.proID='$proID'  ";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

    public function viewStockProductColor($proID, $sizeID) {
        $con = $GLOBALS['con'];
        //sql Query
        $sql = "SELECT DISTINCT s.colorID,c.colorCode,c.colorName FROM stock s, productcolor c WHERE s.colorID=c.colorID AND s.sizeID='$sizeID'AND s.proID='$proID'  ";
        // execute Query
        $result = $con->query($sql);
        return $result;
    }

}
