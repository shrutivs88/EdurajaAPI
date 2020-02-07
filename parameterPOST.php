<?php
header("Access-Control-Allow-Origin: http://localhost/EdurajaAPI/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$id = $_GET['id'];
$fullname  =$_GET['fullname'];
$phone = $_GET['phone'];
$emailaddress = $_GET['emailaddress'];
$dob = $_GET['dob'];
$city = $_GET['city'];
$state = $_GET['state'];
$pincode =  $_GET['pincode'];
$age = $_GET['age'];

$data = array (
    "id" => $id,
    "fullname" => $fullname,
    "phone" => $phone,
    "emailaddress" => $emailaddress,
    "dob" => $dob,
    "city" => $city,
    "state" => $state,
    "pincode" => $pincode,
    "age" => $age    
);


$hostname = "localhost";      // That Is For Database Connection
$database = "api_test";
$username = "root";
$password = "";
$conn = mysqli_connect($hostname, $username, $password, $database);

$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
$fullname = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
$emailaddress = mysqli_real_escape_string($conn, $_REQUEST['emailaddress']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
$city = mysqli_real_escape_string($conn, $_REQUEST['city']);
$state = mysqli_real_escape_string($conn, $_REQUEST['state']);
$pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
$age = mysqli_real_escape_string($conn, $_REQUEST['age']);
 
// Attempt insert query execution
$sql = "INSERT INTO emp(id,fullname,phone,emailaddress,dob,city,state,pincode,age) VALUES ('$id','$fullname', '$phone', '$emailaddress', '$dob', '$city', '$state','$pincode','$age')";
if(mysqli_query($conn, $sql)){
    
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);

?>