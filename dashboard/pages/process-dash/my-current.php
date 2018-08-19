<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `order` WHERE orderStatus = 'completed'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

$cr2 = "SELECT * FROM `order` WHERE orderStatus = 'taken'";
$tl2 = mysqli_query($Con, $cr2);
$np2 = mysqli_num_rows($tl2);

echo $np+$np2;
?>