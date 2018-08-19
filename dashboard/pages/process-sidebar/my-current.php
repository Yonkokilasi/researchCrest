<?php 
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `order` WHERE orderStatus = 'completed'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);

$cr2 = "SELECT * FROM `order` WHERE orderStatus = 'taken'";
$tl2 = mysqli_query($Con, $cr2);
$np2 = mysqli_num_rows($tl2);

$cr3 = "SELECT * FROM `order` WHERE requestWriter != 'writerId'";
$tl3 = mysqli_query($Con, $cr3);
$np3 = mysqli_num_rows($tl3);

$cr4 = "SELECT * FROM `order` WHERE orderStatus = 'not taken'";
$tl4 = mysqli_query($Con, $cr4);
$np4 = mysqli_num_rows($tl4);

$cr5 = "SELECT * FROM `order` WHERE orderStatus = 'unpaid'";
$tl5 = mysqli_query($Con, $cr5);
$np5 = mysqli_num_rows($tl5);

$cr6 = "SELECT * FROM `order` WHERE orderStatus = 'disputed'";
$tl6 = mysqli_query($Con, $cr6);
$np6 = mysqli_num_rows($tl6);

$cr7 = "SELECT * FROM `order` WHERE orderStatus = 'revision'";
$tl7 = mysqli_query($Con, $cr7);
$np7 = mysqli_num_rows($tl7);

$cr8 = "SELECT * FROM `order` WHERE orderStatus = 'done'";
$tl8 = mysqli_query($Con, $cr8);
$np8 = mysqli_num_rows($tl8);

$np9 = $np+$np2+$np3+$np4+$np5+$np6+$np7+$np8;
if ($np3>0) {
	echo "<h1 class = 'label label-success'>".$np9."</h1>";
}else{
	exit();
}
?>