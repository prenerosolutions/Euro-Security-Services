<?php
/*******************************************************************************
* Company Name: Prenero Solutions                                               *
*                                                                      *
* Version: 1.1.1	                                                   *
* Author:  Atiq Ramzan                                     				   *
*******************************************************************************/



if ($_SERVER['SERVER_NAME'] == 'localhost') {

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "euro_security";

} else { 
$localhost = "localhost";
$username = "prenero_admin";
$password = "Prenero1102/*";
$dbname = "prenero_educators";
}

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection

date_default_timezone_set('Asia/Karachi');


if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}
?>