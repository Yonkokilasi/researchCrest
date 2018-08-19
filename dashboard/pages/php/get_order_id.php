<?php
include("../connect.php");
include("../session.php");

 if(isset($_POST['orderId']))
 {
 	$orderId = $_POST['orderId'];
 	$checkdata	= "SELECT `order`.orderId FROM `order` WHERE `order`.orderId LIKE  '$orderId%'";
	$query 		= mysqli_query($Con, $checkdata);
	if(mysqli_num_rows($query)>0)
	{

	while (mysqli_fetch_assoc($query)) {
		# code...
	$rows 		= mysqli_fetch_assoc($query);
	$orderId	= $rows['orderId'];
	echo "<ul class = 'list-unstyled'>
			<li><strong>"
			.$orderId.
			"</strong></li>
			</ul>";
	}
	}
	else
	{
	echo "order does not exist";
	}

 }else{
 	echo "no order(s) to display";
 }
?>