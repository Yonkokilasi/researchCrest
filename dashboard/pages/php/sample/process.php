<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");
$id = $_GET['id'];
if (isset($_POST['edit_sample'])) {
	
    header("location:../../edit-sample.php?id=$id");
    	
} else if (isset($_POST['set_visible_sample'])) {
	
	$sql = ("UPDATE `samples` 
	SET `samples`.show 	= 'yes'
	WHERE `samples`.id 		= '$id' ");

	$query=mysqli_query($Con, $sql) or mysql_error(); 

	 if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="sample #$id has been successfully set to visible";
    	header("location:../../samples.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../samples.php");	
	  }

	  mysqli_close($Con);
} else if (isset($_POST['set_invisible_sample'])) {
	
	$sql1 = ("UPDATE `samples` 
	SET `samples`.show 	= 'no'
	WHERE `samples`.id 		= '$id' ");

	$query1=mysqli_query($Con, $sql1) or mysql_error(); 

	 if ($query1) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="samples #$id has been successfully set to invisible";
    	header("location:../../samples.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../samples.php");	
	  }

	  mysqli_close($Con);

} else if (isset($_POST['delete_sample'])) {
	
	$query3 = mysqli_query($Con, "DELETE FROM samples WHERE id = '$id'");
    $_SESSION['msg']="sample #$id has been successfully deleted";
    header("location:../../samples.php");	

} else{

    $_SESSION['msg']="No option selected...";
    header("location:../../samples.php");
}

?>