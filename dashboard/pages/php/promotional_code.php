<?php
include("../connect.php");
include("../session.php");

if (isset($_POST['submit-code'])) {

	$promo_code 	= mysqli_real_escape_string($Con, $_POST['promocode']);
	$percentage 	= mysqli_real_escape_string($Con, $_POST['percentage']);

	mysqli_autocommit($Con,false);
	$sql = ("INSERT INTO `codes` (`id`, `code`, `percentage`, `active`) VALUES (NULL, '$promo_code', '$percentage', 'no');");
	$query=mysqli_query($Con, $sql) or mysql_error();


	if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="promotional code has been succesfully saved";
		header("location:../promotional.php");

	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['err']="An error occured during processing, please try again";
		header("location:../promotional.php");
	  }

	  mysqli_close($Con);

	}else{

	$_SESSION['err']="an error occured during processing, please try again";
	header("location:../promotional.php");
	
	}

?>