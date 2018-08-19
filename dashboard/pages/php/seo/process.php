<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");
$id = $_GET['id'];
if (isset($_POST['edit_seo'])) {
	
    header("location:../../edit-seo.php?id=$id");
    	
} else if (isset($_POST['set_visible_seo'])) {
	
	$sql = ("UPDATE `seo` 
	SET `seo`.show 	= 'yes'
	WHERE `seo`.id 		= '$id' ");

	$query=mysqli_query($Con, $sql) or mysql_error(); 

	 if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="Page #$id has been successfully set to visible";
    	header("location:../../seo.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../seo.php");	
	  }

	  mysqli_close($Con);
} else if (isset($_POST['set_invisible_seo'])) {
	
	$sql1 = ("UPDATE `seo` 
	SET `seo`.show 	= 'no'
	WHERE `seo`.id 		= '$id' ");

	$query1=mysqli_query($Con, $sql1) or mysql_error(); 

	 if ($query1) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="Page #$id has been successfully set to invisible";
    	header("location:../../seo.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../seo.php");	
	  }

	  mysqli_close($Con);

} else if (isset($_POST['delete_seo'])) {
	
	$query3 = mysqli_query($Con, "DELETE FROM seo WHERE id = '$id'");
    $_SESSION['msg']="Page #$id has been successfully deleted";
    header("location:../../seo.php");	

} else{

    $_SESSION['msg']="No option selected...";
    header("location:../../seo.php");
}

?>