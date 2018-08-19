<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `messaging` WHERE status = 'unread' AND recipient = 'Support'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

echo $np;
?>