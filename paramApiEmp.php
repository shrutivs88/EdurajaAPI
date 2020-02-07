<?php
header('Access-Control-Allow-Origin: http://localhost/EdurajaAPI/');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');
header('Cache-Control: max-age=900');
header("Content-Type: application/x-www-form-urlencoded"); // tell client that we are sending json data


// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "api_test";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } 
$id = $_GET['id'];
$fullname  =$_GET['fullname'];
$phone = $_GET['phone'];
$emailaddress = $_GET['emailaddress'];
$dob = $_GET['dob'];
$city = $_GET['city'];
$state = $_GET['state'];
$pincode =  $_GET['pincode'];
$age = $_GET['age'];

$params = array(
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
   echo httpPost("http://localhost/EdurajaAPI/paramApiEmp.php",$params);
//echo httpPost("http://localhost/EdurajaAPI/api_create/employee.php",$params);

//  $url = "http://localhost/EdurajaAPI/api_create/employee.php";
function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
    //   $postData .= $k . '='.$v.'&'; 
    $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
  $url = "http://localhost/EdurajaAPI/postData.php";
    $ch = curl_init();  
//   $sql = "INSERT INTO 'emp'('fullname', 'phone', 'emailaddress', 'dob', 'city', 'state', 'age') 
//             VALUES ('".$dxname."', '".$phone."', '".$emailaddress."', '".$dob."', '".$city."', '".$state."', '".$pincode."', '".$age."')"; 
    // $res = mysqli_query($conn, $sql);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, $postData);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);    
 
    $output=curl_exec($ch);
    if($output == true)
    {
        $message = '<div class = "alert alert-success">Detail updated successfully!</div>';
    }
    else
    {
        $message = '<div class = "alert alert-danger">Some error occur!'.curl_error($ch).'</div>';
    }
   

    curl_close($ch);
    return $output;
 
}


  
//  echo httpPost("http://localhost/EdurajaAPI/paramApiEmp.php",$params);





// $params = array(
//     // "receiver" => "01234567890A=",
//     // "min_api_version" => 1,
//     //  "sender" => array(
//         // "name" => "John McClane",
//         // "avatar"  => "http://localhost/EdurajaAPI/"
//         "fullname" => $dxname,
//         "phone" => $phone,
//         "emailaddress" => $emailaddress,
//         "dob" => $dob,
//         "city" => $city,
//         "state" => $state,
//         "pincode" => $pincode,
//         "age" => $age
//     // ),
//     // "tracking_data" => "tracking data",
//     // "type" => "url",
//     // "media" => "http://localhost/EdurajaAPI/"
//  );

// //  $sql = "INSERT INTO 'emp'('fullname', 'phone', 'emailaddress', 'dob', 'city', 'state', 'age') 
// //         VALUES ('".$dxname."', '".$phone."', '".$emailaddress."', '".$dob."', '".$city."', '".$state."', '".$pincode."', '".$age."')"; 
         
//          $res = mysqli_fetch_assoc($params);
//          echo httpPost("http://localhost/EdurajaAPI/paramApiEmp.php",$params);
// // if ($result = $conn->query($sql)) {
// //     echo json_encode("New record created successfully");
// //    // echo "New record created successfully";
// // } else {
// //     echo json_encode("Some error");
// //    // echo "Error: " . $sql . "<br>" . $conn->error;
// // }
// $postData = json_encode($params);

// $url = "http://localhost/EdurajaAPI/";
//  $ch = curl_init($res);  

//  curl_setopt($ch,CURLOPT_URL,$url);
//  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
//  curl_setopt($ch, CURLOPT_POST, true);
//  curl_setopt($ch, CURLOPT_POSTFIELDS, "data=$postData");    

//  $output=curl_exec($ch);

//  curl_close($ch);
//  var_dump($output);

//  $conn->close();






?>