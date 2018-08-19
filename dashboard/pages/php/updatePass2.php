<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['submit-pass'])) {
	$regId 		= mysqli_real_escape_string($Con, $_POST['regId']);
	$pass 		= mysqli_real_escape_string($Con, $_POST['password']);
	$password 	= md5(sha1($pass));

	$sql = ("UPDATE `registration` 
	SET `registration`.password 	= '$password'
	WHERE `registration`.reg_id 		= '$regId' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Student password have been successfully updated";
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