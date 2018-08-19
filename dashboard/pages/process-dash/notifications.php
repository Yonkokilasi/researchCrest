<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `notifications` WHERE status = 'not viewed' AND userType = 'Support'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

echo $np;
?>