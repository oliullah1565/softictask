<?php session_start(); 
include 'dbcon.php';
include ('functions.php');

$id=$_SESSION['uid'];

if(!isset($_SESSION['uid'])){
// Unset all of the session variables
$_SESSION = array();
	
// Destroy the session.
session_destroy();
	
// Redirect to login page
header("location: ../index.php");
exit;	
}
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

foreach ($_SESSION as $key => $value) {
unset($_SESSION[$key]);
} 
// Redirect to login page
header("location: ../index.php");
exit;
?>