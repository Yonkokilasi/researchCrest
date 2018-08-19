<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['suspendStudent'])) {
	$regId 		= $_GET['regId'];

	$sql = ("UPDATE `registration` 
	SET `registration`.online_status 		= 'suspended',
		`registration`.activation_status 	= 'suspended',
		`registration`.account_status 		= 'suspended'
	WHERE `registration`.reg_id 		= '$regId' ");

$query=mysqli_query($Con, $sql) or mysql_error();

#Email here

 if ($query and $send_mail8) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Writer account has been suspended";
	header("location:../viewWriter.php?id=$regId");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../viewWriter.php?id=$regId");
  }

  mysqli_close($Con);

}else if (isset($_POST['activateStudent'])) {
	$regId 		= $_GET['regId'];

	$sql = ("UPDATE `registration` 
	SET `registration`.online_status 		= 'active',
		`registration`.activation_status 	= 'active',
		`registration`.account_status 		= 'active'
	WHERE `registration`.reg_id 		= '$regId' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

#Email here

 if ($query and $send_mail9) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Writer account has been activated";
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