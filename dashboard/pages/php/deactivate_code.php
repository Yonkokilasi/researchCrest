<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['activate'])) {
	
	$id = mysqli_real_escape_string($Con, $_POST['token']);
		$sql = ("UPDATE `codes` 
	SET `codes`.active 	= 'no'
	WHERE `codes`.id 	= '$id' ");
mysqli_autocommit($Con,false);
$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Promotional code has been deactivated";
	header("location:../promotional.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['err']="An error occured during processing, please try again";
	header("location:../promotional.php");
  }

  mysqli_close($Con);

} else{

    $_SESSION['err']="An error occured during processing, please try again";
	header("location:../promotional.php");
}


?>