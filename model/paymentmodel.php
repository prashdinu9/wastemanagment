<?php

class payment
{

    public function viewAllPayment()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM payment p
        INNER JOIN orders o ON o.paymentID=p.paymentID
        INNER JOIN customer c ON o.cusID=c.cusID 
        WHERE o.orderStatus='Paid'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    /*  public function viewpayment($payment_id) {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM payment s, donor d, student st, payment_name sn WHERE s.donor_id=d.donor_id AND s.student_id=st.student_id AND sn.paymentname_id=s.paymentname_id AND s.payment_id='$payment_id'";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    function deletepayment($payment_id) {
        $con = $GLOBALS['con'];
        $sql = "DELETE FROM payment WHERE payment_id='$payment_id'";
        $result = $con->query($sql);
    }
 */
    /*  public function addPayment($applicant_id) {
        //insert new memeber's payment details
        $con = $GLOBALS['con'];
        //sql query
        $sql = "INSERT INTO payment (payAmount,paymentDate,paymentReason) VALUES ('2500', NOW(),'NewMembership')";
        //Execute a query
        $result = $con->query($sql) or die($con->error);
        $paymentID= $con->insert_id; //Last ID
        //
//to update applicant payment status
        $sqlap = "UPDATE applicant SET payment_id='$payment_id' WHERE applicant_id='$applicant_id'";
        $resultap = $con->query($sqlap) or die($con->error);

        return $payment_id;
    }

    public function addRenewPayment($empID, $cdate, $expirydate) {
        //insert new memeber's payment details
        $con = $GLOBALS['con'];
        //sql query
        $sql = "INSERT INTO payment (payAmount,paymentDate,paymentReason) VALUES ('2500', NOW(),'Renewal')";
        //Execute a query
        $result = $con->query($sql) or die($con->error);
        $paymentID= $con->insert_id; //Last ID


        $sqlap = "UPDATE member SET payment_id='$payment_id', member_renew_date='$cdate',member_expiry_date='$expirydate' WHERE empID='$empID'";
        $resultap = $con->query($sqlap) or die($con->error);

        return $payment_id;
    } */
}
