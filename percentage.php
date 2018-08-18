<?php
include("connect.php");

 if(isset($_POST['promoCode']))
 {


	$promoAmount = $_POST['promoCode'];
	$checkdata	= "SELECT * FROM codes WHERE code = '$promoAmount' and active = 'yes'";
	
	$query 		= mysqli_query($Con, $checkdata);

	if(mysqli_num_rows($query)>0)
	{

	$rows 		= mysqli_fetch_assoc($query);
	$percentage	= $rows['percentage'];
	echo $percentage;


	}
	else
	{
	echo "1";
	}
 }else{
 	echo 1;
 }
?>