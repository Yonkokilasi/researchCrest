<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `messaging` WHERE status = 'unread' AND recipient = 'Support'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

if ($np>0) {
	echo "<h1 class = 'label label-success'>".$np."</h1>";
}else{
	exit();
}
?>