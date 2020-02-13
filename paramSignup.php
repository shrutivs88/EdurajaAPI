<?php
header("Access-Control-Allow-Origin: http://localhost/EdurajaApiParam/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// $id = $_GET['id'];
$fullname  =$_GET['fullname'];
$phone = $_GET['phone'];
$emailid = $_GET['emailid'];
$pwd = md5($_GET['password']);


// $data = array (
//     // "id" => $id,
//     "fullname" => $fullname,
//     "phone" => $phone,
//     "emailid" => $emailid,
//     "password" => $password,
      
// );


$hostname = "localhost";      // That Is For Database Connection
$database = "api_test";
$username = "root";
$password = "";
$conn = mysqli_connect($hostname, $username, $password, $database);

// $id = mysqli_real_escape_string($conn, $_REQUEST['id']);
// $fullname = mysqli_real_escape_string($conn, $_REQUEST['fullname']);
// $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
// $emailid = mysqli_real_escape_string($conn, $_REQUEST['emailid']);
// $pwd = mysqli_real_escape_string($conn, sha1($_REQUEST['password']));

 $query = "select * from signup where phone = '$phone'";
 $result = mysqli_query($conn, $query);

 if(mysqli_num_rows($result) > 0 ){

    $status = "Record already exist";
 }else{
    $sql = "INSERT INTO signup(fullname,phone,emailid,password) VALUES ('$fullname', '$phone', '$emailid','$pwd')";
    $res = mysqli_query($conn, $sql);
    if($res == true){
        $status = "Records added successfully.";
    } 
    else{
        $status = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
 }

echo json_encode(array("response"=>$status));
 
// Close connection
mysqli_close($conn);

?>