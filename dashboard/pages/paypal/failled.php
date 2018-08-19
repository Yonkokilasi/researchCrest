<?php
include("../connect.php");
include("../session.php");

unset($_SESSION["amt"]);
unset($_SESSION["r_code"]);  
$_SESSION['msg']="transaction was cancelled !";
header("location:http://homeworkcrest.com/admin/pages/finance-requested.php#Requested");

?>