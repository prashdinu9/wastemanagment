<?php

class product
{

    function addProduct($proName, $proCode, $catID, $proDes, $proPrice)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO product (proName,proCode,catID,proDes,proStatus,proPrice) VALUES('$proName','$proCode','$catID','$proDes','Active','$proPrice')";
        $result = $con->query($sql) or die($con->error);
        $proID = $con->insert_id; //Last ID
        return $proID;
    }

    function updateProduct($proID, $proName, $proCode, $catID, $proDes, $proPrice)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE product SET proName='$proName',proCode='$proCode',catID='$catID',proDes='$proDes',proPrice='$proPrice' WHERE proID='$proID'";
        $result = $con->query($sql) or die($con->error);
        return $proID;
    }

    public function viewAllProduct()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM product p, productcategory c WHERE p.catID=c.catID ORDER BY p.proID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

/*      public function viewPageProduct($start)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM product p,productcategory c WHERE p.catID=c.catID LIMIT $start,8";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    } */

    public function viewProduct($proID)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM product p,productcategory c WHERE p.catID=c.catID AND p.proID='$proID'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    } 

    function viewProductImages($proID)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM productimages WHERE proID='$proID'";
        $result = $con->query($sql);
        return $result;
    }
    
    function viewAProduct($proID)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM product p,productcategory c WHERE p.catID=c.catID AND p.proID  ='$proID'";
        $result = $con->query($sql);
        return $result;
    }

    function deleteProduct($proID)
    {
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM product WHERE proID='$proID'";
        $result = $con->query($sql);
    }
}
/* 
class proImages
{

    function addProImage($proImageName, $proID)
    {
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO proImages (proImageName,proID) VALUES ('$proImageName','$proID')";
        $result = $con->query($sql) or die($con->error);
    }
} */
