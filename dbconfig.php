<?php
define('DB_NAME','api_test');
define('DB_USER','root');
define('DB_HOST','localhost');
define('DB_PASSWORD','');
 
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if(!$conn)
{
 echo 'Database not connected';
}
?>
