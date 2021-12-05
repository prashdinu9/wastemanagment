<?php

class customer {

    public function viewAllCustomer() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM customer c, route r WHERE c.routeID=r.routeID ORDER BY c.cusID DESC";
//   $sql = "SELECT * FROM customer m,login l,role r WHERE m.customer_id=l.customer_id AND m.role_id=r.role_id ORDER BY m.customer_id DESC";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomer($cusID) {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM customer c, route r WHERE cusID ='$cusID' AND c.routeID=r.routeID";

//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function checkEmail($email) {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = $con->query($sql);
        $nor = $result->num_rows;
        return $nor;
    }

    function addCustomer($arr) {
        $name = $arr['name'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $routeID = $arr['routeID'];
        $longitude = $arr['longitude'];
        $latitude = $arr['latitude'];
//help - need to find mechanism for default pw
        $p = sha1("123"); ///Encryption

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO customer (roleID,cusName,cusAddress,routeID,contactNo,email,password,longitude,latitude,balancePoints,cusStatus,registeredDate) VALUES('4','$name','$address','$routeID','$contactNo','$email','$p','$longitude','$latitude','0','Active',NOW())";
        $result = $con->query($sql) or die($con->error);
        $cusID = $con->insert_id; //Last ID

        return $cusID;
    }

    function updateCustomer($cusID, $arr) {
        $name = $arr['name'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $routeID = $arr['routeID'];
        $longitude = $arr['longitude'];
        $latitude = $arr['latitude'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET cusName='$name', routeID='$routeID',cusAddress='$address',contactNo='$contactNo',email='$email',longitude='$longitude',latitude='$latitude' WHERE cusID ='$cusID'";
        $result = $con->query($sql) or die($con->error);
        return $cusID;
    }

    function deactiveCustomer($cusID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET cusStatus='Deactive' WHERE cusID ='$cusID'";
        $result = $con->query($sql);
    }

    function activeCustomer($cusID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE customer SET cusStatus='Active' WHERE cusID ='$cusID'";
        $result = $con->query($sql);
    }

    public function ReportCustomer() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT * FROM customer c";
//   $sql = "SELECT * FROM customer m,login l,role r WHERE m.customer_id=l.customer_id AND m.role_id=r.role_id ORDER BY m.customer_id DESC";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function customerRegistrationMonth() {
        $con = $GLOBALS['con'];
//sql query
        $sql = "SELECT MONTHNAME(registeredDate) AS Month, COUNT(*) AS ct FROM customer GROUP BY Month;";
//Execute a query
        $result = $con->query($sql);
        return $result;
    }

}
