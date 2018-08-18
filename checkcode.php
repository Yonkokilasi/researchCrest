<?php
include("connect.php");

if(isset($_POST['promoCode']))
{
	$promoCode = $_POST['promoCode'];

	$checkdata	= "SELECT * FROM codes WHERE code = '$promoCode'";
	
	$query 		= mysqli_query($Con, $checkdata);

	if(mysqli_num_rows($query)>0)
	{
	echo "<span style='color: #0f0;'>
	<i class='fa fa-check' style='font-size: 20px; color: #0f0;''></i>
	Valid promotional code
	</span>";
	}
	else
	{
	echo "<span style='color: #f00;'>
	<i class='fa fa-times' style='font-size: 20px; color: #f00;''></i>
	Invalid Promotional code !
	</span>";
	}
exit();
}
?>