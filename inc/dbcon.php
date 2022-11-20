<?php
date_default_timezone_set("Asia/Dhaka");
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'softic';
$con = mysqli_connect("$host","$user","$pass","$dbname");
mysqli_set_charset($con, 'utf8');

//mysqli_query ($con,"set character_set_client='utf8'"); 
//mysqli_query ($con,"set character_set_results='utf8'"); 
//mysqli_query ($con,"set collation_connection='utf8_general_ci'");

// Check connection
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>