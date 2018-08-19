<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");
$id = $_GET['id'];
if (isset($_POST['edit_blog'])) {
	
    header("location:../../editBlog.php?id=$id");	
} else if (isset($_POST['set_visible_blog'])) {
	
	$sql = ("UPDATE `blogs` 
	SET `blogs`.show 	= 'yes'
	WHERE `blogs`.id 		= '$id' ");

	$query=mysqli_query($Con, $sql) or mysql_error(); 

	 if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="blog #$id has been successfully set to visible";
    	header("location:../../blog.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../blog.php");	
	  }

	  mysqli_close($Con);
} else if (isset($_POST['set_invisible_blog'])) {
	
	$sql1 = ("UPDATE `blogs` 
	SET `blogs`.show 	= 'no'
	WHERE `blogs`.id 		= '$id' ");

	$query1=mysqli_query($Con, $sql1) or mysql_error(); 

	 if ($query1) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="blog #$id has been successfully set to invisible";
    	header("location:../../blog.php");	
	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
    	header("location:../../blog.php");	
	  }

	  mysqli_close($Con);

} else if (isset($_POST['delete_blog'])) {
	
	$query3 = mysqli_query($Con, "DELETE FROM blogs WHERE id = '$id'");
    $_SESSION['msg']="Blog #$id has been successfully deleted";
    header("location:../../blog.php");	

} else{

    $_SESSION['msg']="No option selected...";
    header("location:../../blog.php");
}

?>