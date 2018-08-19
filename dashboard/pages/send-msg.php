<?php
include("connect.php");
include("session.php");
if (isset($_POST['submit-msg'])) {
	
	$recipient 	= $_POST['recipient'];
	$orderId 	= $_POST['orderId'];
	$subject	= $_POST['subject'];
	$message 	= $_POST['message'];
	$time       = date('Y-m-d H:i:s');

	mysqli_autocommit($Con,false);

	if ($recipient == 'Student') {
    $sql2 		 = 	"SELECT clientId FROM `order` WHERE orderId = '$orderId'";
    $result2 	 = 	mysqli_query($Con, $sql2);
    $row2		 =	mysqli_fetch_assoc($result2);
    $recipientId =	$row2['clientId'];

	}else if ($recipient == 'Writer') {
    $sql2 		 = 	"SELECT writerId FROM `order` WHERE orderId = '$orderId'";
    $result2 	 = 	mysqli_query($Con, $sql2);
    $row2		 =	mysqli_fetch_assoc($result2);
    $recipientId =	$row2['writerId'];
	}
	
	$sql = ("INSERT INTO `r_p_w`.`messaging` (`id`, `orderId`, `sender`, `recipient`, `subject`, `message`, `status`, `time`) VALUES (NULL, '$orderId', 'Support', '$recipientId', '$subject', '$message', 'unread', '$time')");

	$query=mysqli_query($Con, $sql) or mysql_error();

	 if ($query) {

	    mysqli_query($Con,"COMMIT");

	    $_SESSION['msg']="Your message has been successfully sent";
		header("location:messages.php");

	 } else {        
	      mysqli_query($Con,"ROLLBACK");
	      
	    $_SESSION['msg']="An error occured during processing, please try again";
		header("location:messages.php");
	  }

	  mysqli_close($Con);

}else{
	echo "No data recieved";
}



?>