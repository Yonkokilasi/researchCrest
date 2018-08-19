<?php
include("../connect.php");
include("../session.php");
if (isset($_POST['deletecode'])) {
	
	$id = mysqli_real_escape_string($Con, $_POST['token']);
	
mysqli_autocommit($Con,false);

$query = mysqli_query($Con, "DELETE FROM codes WHERE id = '$id'");

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Promotional code has been deleted";
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