<?php
include("../connect.php");
include("../session.php");

if (isset($_GET['id'])) {

$orderId = $_GET['id'];

mysqli_autocommit($Con,false);

$query = mysqli_query($Con,"DELETE FROM `order` WHERE `order`.orderId = '$orderId'") or mysql_error();

if ($query) {

	mysqli_query($Con,"COMMIT");

	$_SESSION['msg']="Order #$orderId has been successfully deleted...";
	header("location:../unpaid.php");

} else {        
  	
  	mysqli_query($Con,"ROLLBACK");
  
	$_SESSION['msg']="An error occured during processing, please try again";
	header("location:../unpaid.php");

}


} else{

$_SESSION['msg']="order Id does not exist...";
header("location:../unpaid.php");

}
?>

