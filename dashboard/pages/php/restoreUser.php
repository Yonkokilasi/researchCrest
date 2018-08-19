<?php
include("../connect.php");
include("../session.php");
$userId = $_GET['id'];

$sql = ("UPDATE `registration` 
		SET	`registration`.account_status 	    = 'active',
			`registration`.online_status 	    = 'active',
			`registration`.activation_status    = 'active'
WHERE `registration`.reg_id 		        	= '$userId' ");

$query=mysqli_query($Con, $sql) or mysql_error();

#Email here

if ($query) {

mysqli_query($Con,"COMMIT");

$_SESSION['msg']="User account has been restored";
header("location:../suspended.php?id=$userId");
} else {        
mysqli_query($Con,"ROLLBACK");

$_SESSION['msg']="An error occured during processing, please try again";
header("location:../suspended.php?id=$userId");
}
mysqli_close($Con);

?>