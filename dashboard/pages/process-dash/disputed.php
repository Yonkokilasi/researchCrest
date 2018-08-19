<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `order` WHERE orderStatus = 'disputed'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

echo $np;
?>