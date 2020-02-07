<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/api_test/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// database connection will be here
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/empuser.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$user = new User($db);
 
// submitted data will be here
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->fullname = $data->fullname;
$user->phone = $data->phone;
$user->emailaddress = $data->emailaddress;
$user->dob = $data->dob;
$user->city = $data->city;
$user->state = $data->state;
$user->pincode = $data->pincode;
$user->age = $data->age; 
// use the create() method here
// create the user
if(
    !empty($user->fullname) &&
    !empty($user->phone) &&
    !empty($user->emailaddress) &&
    !empty($user->dob) &&
    !empty($user->city) &&
    !empty($user->state) &&
    !empty($user->pincode) &&
    !empty($user->age)&&
    $user->create()
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user."));
}
?>