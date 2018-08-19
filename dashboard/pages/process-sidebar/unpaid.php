<?php
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `order` WHERE orderStatus = 'unpaid'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);
if ($np>0) {
	echo "<h1 class = 'label label-danger'>".$np."</h1>";
}else{
	exit();
}

?>