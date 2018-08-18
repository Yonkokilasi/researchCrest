<?php
include("connect.php");

if(isset($_POST['writer_id']))
{
	$writerId = $_POST['writer_id'];

	$checkdata = "SELECT * FROM registration WHERE reg_id = '$writerId' and user_type = 'writer'";
	
	$query=mysqli_query($Con, $checkdata);

	if(mysqli_num_rows($query)>0)
	{
	echo "<span style='color: #0f0;'>
	<i class='fa fa-check' style='font-size: 20px; color: #0f0;''></i>
	Writer Id Exists..
	</span>";
	}
	else
	{
	echo "<span style='color: #f00;'>
	<i class='fa fa-times' style='font-size: 20px; color: #f00;''></i>
	Writer Id DOES not exist !
	</span>";
	}
exit();
}
?>