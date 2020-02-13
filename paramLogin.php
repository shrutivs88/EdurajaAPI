<?php
header("Access-Control-Allow-Origin: http://localhost/EdurajaApiParam/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


	
		
	   $phone = $_GET['phone'];
          $password = md5($_GET['password']);
		  
            $hostname = "localhost";      // That Is For Database Connection
            $database = "api_test";
            $username = "root";
            $password = "";
            $conn = mysqli_connect($hostname, $username, $password, $database);

   
		  // Query database for row exist or not
        //   $sql = "SELECT * FROM signup WHERE  phone = '$mobilenumber' AND password = '$password'";
        $sql = "SELECT user_id, fullname, phone, emailid FROM signup WHERE  phone = '$phone'";
       
          $result = mysqli_query($conn, $sql);


          if (!mysqli_num_rows($result) > 0){

            $status = "Invalid Login";
            echo json_encode(array("response"=>$status)); 

            }else{
             while($row = mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
                $fullname = $row['fullname'];
                $emailid = $row ['emailid'];
                $phone = $row['phone'];
                $status = "ok";
                echo json_encode(array("response"=>$status, "user_id"=>$user_id, "fullname"=>$fullname, "emailid"=>$emailid, "phone"=>$phone)); 
                 }
              }
  	mysqli_close($conn);

?>
