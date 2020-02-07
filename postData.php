<?php
include ('dbconfig.php');

    if(isset($_REQUEST['id']) == true)
    {
    $sql = "INSERT INTO emp(id,fullname,phone,emailaddress,dob,city,state,pincode,age) 
                   VALUES(  '".$_REQUEST['id']."',
                            '".$_REQUEST['fullname']."',
                            '".$_REQUEST['phone']."',
                            '".$_REQUEST['emailaddress']."',
                            '".$_REQUEST['dob']."',
                            '".$_REQUEST['city']."',
                            '".$_REQUEST['state']."',
                            '".$_REQUEST['pincode']."',
                            '".$_REQUEST['age']."')";
    $result = mysqli_query($conn, $sql);
    if($result == 1)
    {
    $msg    = '<div class="alert alert-success">Added successfully!</div>'; 
    }
    else
    {
    $msg    = '<div class="alert alert-danger">Some error occur, Please try again!</div>'; 
    }
    
    }




?>