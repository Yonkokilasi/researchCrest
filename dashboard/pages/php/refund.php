<?php
include("../connect.php");
include("../session.php");

if (isset($_POST['refund_student'])) {

$orderId = $_GET['id'];

$sql        = "SELECT dateDue FROM `order` WHERE orderId = '$orderId'";
$query      = mysqli_query($Con, $sql);
$row        = mysqli_fetch_assoc($query);
$dateDue    = $row['dateDue'];

if ($dateDue == "refunded") {

    $_SESSION['msg']="This order has already been refunded, you cant refund it again !";
    header("location:../finance.php#Refunds");
} else{

mysqli_autocommit($Con,false);


$sql2 = ("UPDATE `order` 
	SET `order`.dateDue 		= 'refunded' 	
	WHERE `order`.orderId 	= '$orderId'");

$query2=mysqli_query($Con, $sql2) or mysql_error();

#Email here

 if ($query2) {

  mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="student has been successfully refunded";
    header("location:../finance.php#Refunds");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
      echo "Failed";
    $_SESSION['msg']="An error occured during processing, please try again";
    header("location:../finance.php#Refunds");

  }
}  
  mysqli_close($Con);
} else{
  $_SESSION['msg']="Bad url request";
  header("location:../index.php");
}  
?>