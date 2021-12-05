<?php

class login {

    public function loginvalidate($email, $pass) {
        $con = $GLOBALS['con'];
        //sql query
//emp login
        $sql = "SELECT * FROM employee e WHERE email='$email' AND password='$pass' AND e.empStatus='active'";
        $result = $con->query($sql);
     //cus login
 if ($result->num_rows == 0) {
   $sql2 = "SELECT * FROM customer c WHERE email='$email' AND password='$pass' AND c.cusStatus='active'";
    $result = $con->query($sql2);
}
        //Execute a query
        //$result = $con->query($sql);
        return $result;
    }
}

?>
