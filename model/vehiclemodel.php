<?php

class vehicle {

    public function viewAllVehicle() {
        $con = $GLOBALS['con'];
        //sql query
        //$sql = "SELECT * FROM vehicle v, vehicletype vt where v.vehicleType = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
        $sql = "SELECT * FROM vehicle v Left JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID ORDER BY v.vehicleID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewVehicle($vehicleID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM vehicle v Left JOIN vehicletype vt ON v.vehicleTypeID = vt.vehicleTypeID WHERE vehicleID='$vehicleID' ORDER BY v.vehicleID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addVehicle($arr) {
        $vehicleNo = $arr['vehicleNo'];
        $vehicleTypeID = $arr['vehicleTypeID'];
        $odometer = $arr['odometer'];
        $description = $arr['description'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO vehicle (vehicleNo,vehicleTypeID,odometer,vehicleDescription,vehicleStatus) VALUES('$vehicleNo','$vehicleTypeID','$odometer','$description','Active')";
        $result = $con->query($sql) or die($con->error);
        $vehicleID = $con->insert_id; //Last ID
        return $vehicleID;
    }

    function updateVehicle($vehicleID, $arr) {
        $vehicleNo = $arr['vehicleNo'];
        $vehicleTypeID = $arr['vehicleTypeID'];
        $odometer = $arr['odometer'];
        $description = $arr['description'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET vehicleNo='$vehicleNo', vehicleTypeID='$vehicleTypeID',odometer='$odometer',vehicleDescription='$description' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql) or die($con->error);
        return $vehicleID;
    }

    function checkVehicle($vehicleNo) {
        $con = $GLOBALS['con'];
        $sql = "SELECT vehicleNo FROM vehicle WHERE vehicleNo='$vehicleNo'";
        $result = $con->query($sql);
        $nor = $result->num_rows;
        return $nor;
    }

    function deactiVevehicle($vehicleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET vehicleStatus='Deactive' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql);
    }

    function activeVehicle($vehicleID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE vehicle SET vehicleStatus='Active' WHERE vehicleID='$vehicleID'";
        $result = $con->query($sql);
    }

}
