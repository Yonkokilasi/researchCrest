<?php
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `bids` GROUP BY orderId";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);
if ($np>0) {
	echo "<h1 class = 'label label-success'>".$np."</h1>";
}else{
	exit();
}
?>