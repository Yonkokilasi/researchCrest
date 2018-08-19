<?php
date_default_timezone_set("GMT");
include("../connect.php");
include("../session.php");



if (isset($_POST['submit-msg'])) {
	
	$recipient 	= mysqli_real_escape_string($Con, $_POST['recipient']);
	// $sender		= $reg_id;
	$orderId 	= mysqli_real_escape_string($Con, $_POST['orderId']);
	$subject	= mysqli_real_escape_string($Con, $_POST['subject']);
	$message 	= mysqli_real_escape_string($Con, $_POST['message']);
	$time       = date('Y-m-d H:i:s');

	mysqli_autocommit($Con,false);

	if ($recipient == 'Student') {
    $sql2 		= 	"SELECT clientId FROM `order` WHERE orderId = '$orderId'";
    $result2 	= 	mysqli_query($Con, $sql2);
    $row2		=	mysqli_fetch_assoc($result2);
    $clientId	=	mysqli_real_escape_string($Con, $row2['clientId']);
	}else{
	$clientId	=	$recipient;
	}

	$sql = ("INSERT INTO `r_p_w`.`messaging` (`id`, `orderId`, `sender`, `recipient`, `subject`, `message`, `status`, `time`) VALUES (NULL, '$orderId', 'Support', '$clientId', '$subject', '$message', 'unread', '$time')");

	$query=mysqli_query($Con, $sql) or mysql_error();

	 if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="Your message has been successfully sent";
		header("location:../viewPosted.php?id=$orderId#messages");

	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
		header("location:../viewPosted.php?id=$orderId#messages");
	  }

	  mysqli_close($Con);

}else{
	    $_SESSION['msg']="bad url request";
		header("location:../index.php");
}
?>