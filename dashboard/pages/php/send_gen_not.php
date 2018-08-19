<?php
date_default_timezone_set("GMT");
include("../connect.php");
include("../session.php");

if (isset($_POST['submit-gen'])) {
	
	$recipient 	= mysqli_real_escape_string($Con, $_POST['recipient']);
	$sender		= "support";
	$subject	= mysqli_real_escape_string($Con, $_POST['subject']);
	$message 	= mysqli_real_escape_string($Con, $_POST['message']);
	$time       = date('Y-m-d H:i:s');
	$notification_id = rand(100,1000);

	if ($recipient == "writers") {
	
	$cr = "SELECT reg_id FROM `registration` WHERE user_type = 'writer'  AND account_status = 'active' AND activation_status = 'active'";
	$tl = mysqli_query($Con, $cr);
	
	while($np = mysqli_fetch_assoc($tl)){
	$recipient = $np['reg_id'];
	//$_SESSION['msg']="Student Id:".$recipient;
	//header("location:../general_notification");
	$sql = ("INSERT INTO `gen` (`id`, `notification_id`, `sender`, `recipient`, `subject`, `message`, `user_type`, `status`, `time`) VALUES (NULL, '$notification_id', '$sender', '$recipient', '$subject', '$message', 'writers', 'unread', '$time')");

	$query=mysqli_query($Con, $sql) or mysql_error();
	$_SESSION['msg']="notification successfully posted for all writers";
	header("location:../general_notification.php");
	}

	} elseif ($recipient == "clients") {
		$cr = "SELECT reg_id FROM `registration` WHERE user_type = 'client'";
		$tl = mysqli_query($Con, $cr);
		while($np = mysqli_fetch_assoc($tl)){
		$recipient = $np['reg_id'];

		$sql = ("INSERT INTO `gen` (`id`, `notification_id`, `sender`, `recipient`, `subject`, `message`, `user_type`, `status`, `time`) VALUES (NULL,'$notification_id', '$sender', '$recipient', '$subject', '$message', 'students', 'unread', '$time')");

		$query=mysqli_query($Con, $sql) or mysql_error();
		$_SESSION['msg']="notification successfully posted for all students";
		header("location:../general_notification.php");

	}
	}elseif ($recipient == "everyone") {
		$cr = "SELECT reg_id FROM `registration` ";
		$tl = mysqli_query($Con, $cr);
		while($np = mysqli_fetch_assoc($tl)){
		$recipient = $np['reg_id'];

		$sql = ("INSERT INTO `gen` (`id`, `notification_id`, `sender`, `recipient`, `subject`, `message`, `user_type`, `status`, `time`) VALUES (NULL, '$notification_id', '$sender', '$recipient', '$subject', '$message', 'everyone', 'unread', '$time')");

		$query=mysqli_query($Con, $sql) or mysql_error();
		$_SESSION['msg']="notification successfully posted for everyone";
		header("location:../general_notification.php");
	}
	}else{

		$_SESSION['msg']="data not captured";
		header("location:../index.php");
	}


}else{
	    $_SESSION['msg']="bad url request";
		header("location:../index.php");
}
?>