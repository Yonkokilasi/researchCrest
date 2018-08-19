<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['setOrders'])) {
	$regId 		= $_POST['regId'];
	$orders 	= $_POST['orders'];

	$sql = ("UPDATE `writeraccount` 
	SET `writeraccount`.maxOrders 	= '$orders'
	WHERE `writeraccount`.reg_Id 	= '$regId' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Maximum order-takes has been successfully set";
	header("location:../viewWriter.php?id=$regId");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../viewWriter.php?id=$regId");
  }

  mysqli_close($Con);

}else{
	$_SESSION['msg']="bad url request";
	header("location:../index.php");
}


?>