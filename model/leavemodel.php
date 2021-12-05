<?php

class leave
{

    public function viewAllLeave()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM empleave el, employee e WHERE el.	empID=e.empID ORDER BY empleaveID DESC";
        //   $sql = "SELECT * FROM leave m,login l,role r WHERE m.leave_id=l.leave_id AND m.role_id=r.role_id ORDER BY m.leave_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewleave($leaveID)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM leave WHERE leaveID='$leaveID'";

        //$sql = "SELECT * FROM leave m,login l,role r WHERE m.leave_id=l.leave_id AND m.role_id=r.role_id AND m.leave_id='$leave_id'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function deleteLeave($leaveID)
    {
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM `empleave` WHERE empleaveID='$leaveID'";
        $result = $con->query($sql);
    }
  


    function addLeave($arr)
    {
        $empID = $arr['empID'];
        $to = $arr['to'];
        $from = $arr['from'];
        $reason = $arr['reason'];
       
        $con = $GLOBALS['con'];
        $sql = "INSERT INTO empleave (empID,leaveTo, leaveFrom, reason) VALUES('$empID','$to','$from','$reason')";
        $result = $con->query($sql) or die($con->error);
        
    }

    function updateLeave($leaveID, $arr)
    {

        $to = $arr['to'];
        $from = $arr['from'];
       $reason = $arr['reason'];

        $con = $GLOBALS['con'];
        $sql = "UPDATE empleave SET leaveTo='$to',leaveFrom='$from',reason='$reason' WHERE empleaveID='$leaveID'";
        $result = $con->query($sql) or die($con->error);
        return $leaveID;
    }

    public function viewLeaveEmployee($leaveID)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM employee e, empleave el WHERE e.empID=el.empID AND el.empleaveID='$leaveID'";

        //$sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id AND m.employee_id='$employee_id'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    
}
