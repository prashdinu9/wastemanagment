<?php

class complaint {

    public function viewAllComplaint() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM complaint c,
              complainttypes ct,
              customer cs
              WHERE c.complaintTypeID=ct.complaintTypeID AND cs.cusID=c.cusID ORDER BY c.complaintID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewCustomerComplaint($userID) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM complaint c, complainttypes ct, customer cu WHERE c.complaintTypeID=ct.complaintTypeID AND cu.cusID=c.complainerID AND c.cusID='$userID' ORDER BY c.complaintID DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewComplaint($complaintID) {
        $con = $GLOBALS['con'];
        //sql query
//        $sql = "SELECT * FROM complaint c
//        LEFT JOIN complainttypes ct ON c.complaintTypeID=ct.complaintTypeID
//          LEFT JOIN complaintcomments cc ON cc.complaintID=c.complaintID
//          LEFT JOIN customer cu ON cu.cusID =cc.commenterID
//          WHERE  c.complaintID='$complaintID'";

        $sql = "SELECT * FROM complaint c
        INNER JOIN complainttypes ct ON c.complaintTypeID=ct.complaintTypeID
        INNER JOIN customer cu ON c.cusID=cu.cusID
          WHERE  c.complaintID='$complaintID'";

        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewComment($complaintID) {
        $con = $GLOBALS['con'];
        $sql = "select cc.*, CASE WHEN CC.roleID = 4 THEN (SELECT cusName FROM customer CUS WHERE CUS.cusID = cc.CommenterID) ELSE (SELECT empName FROM employee E WHERE E.EMPID = cc.CommenterID) END AS 'CommenterName' from complaintcomments cc inner join complaint c on cc.complaintID = c.complaintID where c.complaintID = '$complaintID'";

        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewComplaintType() {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM complainttypes";
        //$sql = "SELECT * FROM complaint m,login l,role r WHERE m.complaint_id=l.complaint_id AND m.role_id=r.role_id AND m.complaint_id='$complaint_id'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function addComplaint($arr, $complainerID) {

        $cusID = $arr['cusID'];
        $title = $arr['title'];
        $description = $arr['description'];
        $complaintTypeID = $arr['complaintTypeID'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO complaint (cusID,title,description,complaintTypeID,status,complaintDate,complainerID) "
                . "VALUES('$cusID','$title','$description','$complaintTypeID','Active',NOW(),'$complainerID')";
        $result = $con->query($sql) or die($con->error);
        $complaintID = $con->insert_id; //Last ID
        return $complaintID;
    }

    function addComplaintCus($arr, $complainerID) {


        $title = $arr['title'];
        $description = $arr['description'];
        $complaintTypeID = $arr['complaintTypeID'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO complaint (cusID,title,description,complaintTypeID,status,complaintDate,complainerID) "
                . "VALUES('$complainerID','$title','$description','$complaintTypeID','Active',NOW(),'$complainerID')";
        $result = $con->query($sql) or die($con->error);
        $complaintID = $con->insert_id; //Last ID
        return $complaintID;
    }

    function addCommment($arr, $complaintID, $userID) {
        $comment = $arr['comment'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO complaintcomments (complaintID,comment,commentDate,commenterID) VALUES('$complaintID','$comment',NOW(),'$userID')";
        $result = $con->query($sql) or die($con->error);
        $complaintID = $con->insert_id; //Last ID
        return $complaintID;
    }

    function completeComplaint($complaintID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE complaint SET status='Completed' WHERE complaintID='$complaintID'";
        $result = $con->query($sql);
    }

    function activeComplaint($complaintID) {
        $con = $GLOBALS['con'];
        $sql = "UPDATE complaint SET status='Active' WHERE complaintID='$complaintID'";
        $result = $con->query($sql);
    }

}
