<?php
include("connect.php");
include("session.php");

$cr = "SELECT * FROM `order` WHERE orderStatus = 'paid'";
$tl = mysqli_query($Con, $cr);
$np = mysqli_num_rows($tl);
if ($np > 0) {
echo $np;
}else{
	echo "0";
}

?>