<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['deletecode'])) {
	
	$id = mysqli_real_escape_string($Con, $_POST['token']);
	
mysqli_autocommit($Con,false);

$query = mysqli_query($Con, "DELETE FROM log WHERE id = '$id'");

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="paypal log has been deleted";
	header("location:../log.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['err']="An error occured during processing, please try again";
	header("location:../log.php");
  }

  mysqli_close($Con);

} else{

    $_SESSION['err']="An error occured during processing, please try again";
	header("location:../log.php");
}


?>