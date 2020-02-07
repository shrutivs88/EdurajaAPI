<?php

 header("Access-Control-Allow-Origin: http://localhost/EdurajaAPI/");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

 //Creating Array for JSON response
 $response = array();

 // Check if we got the field from the user
if (isset($_GET['fullname']) && isset($_GET['phone']) && isset($_GET['emailaddress']) && isset($_GET['dob']) 
&& isset($_GET['city']) && isset($_GET['state']) && isset($_GET['pincode']) && isset($_GET['age'])) {
// echo $_GET['fullname'];
// echo $_GET['phone'];
// echo $_GET['emailaddress'];
// echo $_GET['dob'];
// echo $_GET['city'];
// echo $_GET['state'];
// echo $_GET['pincode'];
// echo $_GET['age'];

$fullname = $_REQUEST['fullname'];
$phone = $_REQUEST['phone'];
$emailaddress = $_REQUEST['emailaddress'];
$dob = $_REQUEST['dob'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$pincode =  $_REQUEST['pincode'];
$age = $_REQUEST['age'];


$dbo = mysqli_connect('localhost','root','','api_test');
// Fire SQL query to insert data in weather
$result = "INSERT INTO emp(fullname,phone,emailaddress,dob,city,state,pincode,age) 
VALUES('$fullname', '$phone', '$emailaddress', '$dob', '$city', '$state', '$pincode', '$age')";

$res = mysqli_query($dbo, $result);
// Check for succesfull execution of query
        if ($res ) {
            // successfully inserted 
            $response["success"] = 1;
            $response["message"] = "user successfully created.";

            // Show JSON response
            echo json_encode($response);
        } else {
            // Failed to insert data in database
            $response["success"] = 0;
            $response["message"] = "Something has been wrong";

            // Show JSON response
            echo json_encode($response);
        }
} else {
  // If required parameter is missing
$response["success"] = 0;
$response["message"] = "Parameter(s) are missing. Please check the 
request";

// Show JSON response
echo json_encode($response);
 }

?>