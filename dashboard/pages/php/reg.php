<?php
include("../connect.php");
include("../session.php");

if (isset($_POST['activate'])) {

	$sql = ("UPDATE `pay` 
	SET `pay`.status 	= 'Yes'
	WHERE `pay`.id 		= 'register' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Registration page is now active";
	header("location:../index.php");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../index.php");
  }

  mysqli_close($Con);

} else if (isset($_POST['Deactivate'])) {

	$sql = ("UPDATE `pay` 
	SET `pay`.status 	= 'No'
	WHERE `pay`.id 		= 'register' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Registration page has been deactivated";
	header("location:../index.php");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../index.php");
  }

  mysqli_close($Con);

} else{
	$_SESSION['msg']="bad url request";
	header("location:../index.php");
}


?>