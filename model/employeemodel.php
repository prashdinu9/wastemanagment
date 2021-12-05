<?php

class employee
{

    public function viewAllEmployee()
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM employee e, role r WHERE e.roleID=r.roleID ORDER BY empID DESC";
        //   $sql = "SELECT * FROM employee m,login l,role r WHERE m.employee_id=l.employee_id AND m.role_id=r.role_id ORDER BY m.employee_id DESC";
        //Execute a query
        $result = $con->query($sql);
        return $result;
    }

    public function viewAEmployee($empID)
    {
        $con = $GLOBALS['con'];
        //sql query
        $sql = "SELECT * FROM employee e, role r WHERE e.roleID=r.roleID AND e.empID='$empID'";
            //Execute a query
        $result = $con->query($sql);
        return $result;
    }

     

    function checkEmail($email)
    {
        $con = $GLOBALS['con'];
        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = $con->query($sql);
        $nor = $result->num_rows;
        return $nor;
    }

    function addEmployee($arr)
    {
        $name = $arr['name'];
        $roleID = $arr['roleID'];
        $NIC = $arr['nic'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $contract = $arr['contract'];
        $hireDate = $arr['hireDate'];

        $con = $GLOBALS['con'];
        $sql = "INSERT INTO employee (roleID,empName,empAddress,contactNo,email,contract,hireDate,NIC,empStatus) VALUES('$roleID','$name','$address','$contactNo','$email','$contract','$hireDate','$NIC','Active')";
        $result = $con->query($sql) or die($con->error);
        $empID = $con->insert_id; //Last ID

        //help - need to find mechanism for default pw
        $p = sha1("123"); ///Encryption
        //Insert into login table


        return $empID;
    }

    function updateEmployee($empID, $arr)
    {
        $name = $arr['name'];
        $roleID = $arr['roleID'];
        $NIC = $arr['nic'];
        $contactNo = $arr['contactNo'];
        $email = $arr['email'];
        $address = $arr['address'];
        $contract = $arr['contract'];
        $hireDate = $arr['hireDate'];
        

        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET roleID='$roleID', empName='$name',empAddress='$address',contactNo='$contactNo',email='$email',contract='$contract',hireDate='$hireDate', NIC='$NIC' WHERE empID='$empID'";
        $result = $con->query($sql) or die($con->error);
        return $empID;
    }

    function deactiveEmployee($empID)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET empStatus='Deactive' WHERE empID='$empID'";
        $result = $con->query($sql);
    }

    function activeEmployee($empID)
    {
        $con = $GLOBALS['con'];
        $sql = "UPDATE employee SET empStatus='Active' WHERE empID='$empID'";
        $result = $con->query($sql);
    }


  
}
