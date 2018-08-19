<?php
include("../connect.php");
include("../session.php");



if (isset($_GET['id'])) {
	if (isset($_GET['orderId'])) {


$writerId = $_GET['id'];
$orderId = $_GET['orderId'];

mysqli_autocommit($Con,false);

$sql1      = "SELECT clientId FROM `order` WHERE orderId = '$orderId'";
$result1   = mysqli_query($Con, $sql1);
$row1      = mysqli_fetch_assoc($result1);
$clientId = $row1['clientId'];

$sql = ("UPDATE `order` 
	SET `order`.orderStatus 	= 'taken', 
		`order`.writerId 		= '$writerId',
		`order`.requestWriter 	= '$writerId' 
	WHERE `order`.orderId 		= '$orderId' 
	AND `order`.orderStatus 	= 'not taken'
	AND `order`.writerId 		= ''");

$query=mysqli_query($Con, $sql) or mysql_error();

$sql2 = ("DELETE FROM `bids` WHERE `bids`.orderId = '$orderId'");

$query2=mysqli_query($Con, $sql2) or mysql_error();

$sql3 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
		VALUES (NULL, '$writerId', '', 'writer', 'You have been assigned order # $orderId', 'not viewed')");

$query3=mysqli_query($Con, $sql3) or mysql_error();

$sql4 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
		VALUES (NULL, '', '$clientId', 'client', 'Your order # $orderId has been assigned a writer # $writerId and is currently in progress. Please contact the writer in case of any questions/clarifications.', 'not viewed')");

$query4=mysqli_query($Con, $sql4) or mysql_error();

 if ($query and $query2 and $query3 and $query4) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="writer has been successfully assigned ";
	header("location:../bids.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../bids.php");
  }

  mysqli_close($Con); 
  } else{

    $_SESSION['msg']="please use the provided link";
	header("location:../bids.php");
  } 
} else{

    $_SESSION['msg']="please use the provided link";
	header("location:../bids.php");

  }
?>