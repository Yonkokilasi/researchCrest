<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['pay'])) {
	
	$amount             = $_GET['amount'];
	$requestCode        = $_GET['requestCode'];
	$code 				= strtoupper(uniqid());
	$transactionCode    = "Code-".$code;
	$datePaid           = date('Y-m-d H:i:s');

	$cou1 = "SELECT * FROM `payment` WHERE requestCode = '$requestCode'";
	$varia1 = mysqli_query($Con, $cou1); 
	while($raws1 = mysqli_fetch_assoc($varia1)){
	$order_Id  = $raws1['orderId'];

	$sql = ("UPDATE `order` 
	SET `order`.orderStatus     = 'paid'
	WHERE `order`.orderId       = '$order_Id' ");

	$query=mysqli_query($Con, $sql) or mysql_error();
	}

	$sql2 = ("UPDATE `payment` 
	SET `payment`.eligible              = 'paid',
	    `payment`.transactionCode       = '$transactionCode',
	    `payment`.datePaid              = '$datePaid',
	    `payment`.status                = 'paid'
	WHERE `payment`.requestCode         = '$requestCode' ");

	$query2=mysqli_query($Con, $sql2) or mysql_error();

	 if ($query and $query2) {

	    mysqli_query($Con,"COMMIT");

	    unset($_SESSION["amt"]);
	    unset($_SESSION["r_code"]);

	    $_SESSION['msg']="Payment has been successfully made";
	    header("location:../finance.php#Requested");

	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    unset($_SESSION["amt"]);
	    unset($_SESSION["r_code"]);  
	    $_SESSION['msg']="An error occured during processing, please try again";
	    header("location:../finance.php#Requested");
	  }




    $_SESSION['msg']="Payment has been successfully made";
	    header("location:../finance.php#Requested");
} else{




    $_SESSION['msg']="An error occured during processing, please try again";
	    header("location:../finance.php#Requested");
}
?>