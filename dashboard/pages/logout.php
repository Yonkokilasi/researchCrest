<?php
include("connect.php");
include("session.php");
date_default_timezone_set("GMT");
$logout_time     = date('Y-m-d H:i:s');

$sql 	= "SELECT reg_id FROM `sessions` WHERE user_session = '$session_id';";
$query 	= mysqli_query($Con, $sql); 
$raw 	= mysqli_fetch_assoc($query); 
$reg_id = $raw['reg_id'];

$result  = mysqli_query($Con, "UPDATE registration SET online_status = 'offline' WHERE reg_id = '$session_id'");
$result2 = mysqli_query($Con, "UPDATE sessions SET logout_time = '$logout_time' WHERE reg_id = '$session_id'");
if ($result and $result2) {
header("location:logout2.php");
} else{
$_SESSION['err'] = "there was a technical error during log out, kindly inform system admin";
header("location:../../");
}
?>