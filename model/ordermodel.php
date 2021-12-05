<?php

class order
{

    public function viewAnOrder($s_id)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM orders WHERE sessionID='$s_id'";
        $result = $con->query($sql);
        return $result;
    }

    public function viewInvoice($paymentID )
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM orders o, payment p, customer c WHERE p.paymentID ='$paymentID ' AND p.orderID=o.orderID AND o.cusID=c.cusID";
        $result = $con->query($sql);
        return $result;
    }

    public function addAnOrder($s_id)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO orders (orderDate,orderStatus,sessionID) VALUES (NOW(),'Pending','$s_id')";
        $result = $con->query($sql);
        $orderID = $con->insert_id;
        return $orderID;
    }

    public function addToCart($proID, $colorID, $sizeID, $qty, $proPrice, $totprice, $orderID)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO cart (proID,colorID,sizeID,quantity,price,totprice,orderID) VALUES ('$proID','$colorID','$sizeID','$qty','$proPrice','$totprice','$orderID')";
        $result = $con->query($sql);
        return $result;
    }

    public function viewACart($orderID)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT SUM(c.quantity) qsum, c.proID,c.price,SUM(c.totprice) tp,p.proName,s.sizeCode,co.colorCode,co.colorName FROM cart c,product p,productsize s,productcolor co WHERE c.orderID='$orderID' AND c.proID=p.proID AND c.sizeID=s.sizeID AND c.colorID=co.colorID GROUP BY c.proID,c.sizeID,c.colorID";
        $result = $con->query($sql);
        return $result;
    }

}
