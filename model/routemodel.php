<?php

class route
{

    public function viewAllRoute()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM route";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomerAllocationroute($cusID)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM route ba INNER JOIN routetype bt ON ba.routeTypeID= bt.routeTypeID INNER JOIN customer c ON ba.cusID=c.cusID WHERE cusID='$cusID'";

        //$sql = "SELECT * FROM route m,login l,role r WHERE m.route_id=l.route_id AND m.role_id=r.role_id AND m.route_id='$route_id'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewrouteType()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM routetype";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addRoute($arr)
    {
        $routeName = $arr['routeName'];
        $routeDescription = $arr['routeDescription'];
        

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO route (routeName, routeDescription, routeStatus) VALUES('$routeName','$routeDescription','Active')";
        $result = $con->query($sql) or die($con->error);
        
    }

    function updateRoute($routeID, $arr)
    {
        $routeName = $arr['routeName'];
        $routeDescription = $arr['routeDescription'];
        


        $con = $GLOBALS['con'];
        $sql = "UPDATE route SET routeName='$routeName', routeDescription ='$routeDescription' WHERE routeID='$routeID'";
        $result = $con->query($sql) or die($con->error);
        return $routeID;
    }

    function deactiveRoute($routeID)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE route SET routeStatus='Deactive' WHERE routeID='$routeID'";
        $result = $con->query($sql);
    }

    function activeRoute($routeID)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE route SET routeStatus='Active' WHERE routeID='$routeID'";
        $result = $con->query($sql);
    }
}

