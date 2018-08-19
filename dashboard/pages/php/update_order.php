<?php
date_default_timezone_set("GMT");
include_once('../connect.php');
include("../session.php");

if (isset($_POST['update_details'])) {

	$orderId 		= mysqli_real_escape_string($Con, $_POST['orderId']);
	$clientId 		= mysqli_real_escape_string($Con, $_POST['clientId']);
	$writerId 		= mysqli_real_escape_string($Con, $_POST['writerId']);
	$paperTopic 	= mysqli_real_escape_string($Con, $_POST['paperTopic']);
	$paperStyle 	= mysqli_real_escape_string($Con, $_POST['paperStyle']);
	$spacing 		= mysqli_real_escape_string($Con, $_POST['spacing']);
	$level 			= mysqli_real_escape_string($Con, $_POST['level']);
	$typeOfWork 	= mysqli_real_escape_string($Con, $_POST['typeOfWork']);
	$deadline 		= mysqli_real_escape_string($Con, $_POST['deadline']);
	$amount 		= mysqli_real_escape_string($Con, $_POST['amount']);
	$numberOfPages 	= mysqli_real_escape_string($Con, $_POST['numberOfPages']);
	$numberOfSources = mysqli_real_escape_string($Con, $_POST['numberOfSources']);
	$digitalSources = mysqli_real_escape_string($Con, $_POST['digitalSources']);

	mysqli_autocommit($Con,false);
	$sql = ("UPDATE `order` 
		SET	
		`order`.clientId     	= '$clientId',
		`order`.writerId     	= '$writerId',
		`order`.paperTopic     	= '$paperTopic',
		`order`.paperStyle     	= '$paperStyle',
		`order`.spacing     	= '$spacing',
		`order`.level     		= '$level',
		`order`.typeOfWork     	= '$typeOfWork',
		`order`.deadline     	= '$deadline',
		`order`.total     		= '$amount',
		`order`.numberOfPages   = '$numberOfPages',
		`order`.numberOfSources = '$numberOfSources',
		`order`.digitalSources  = '$digitalSources'
		WHERE `order`.orderId 	= '$orderId'");

		$query=mysqli_query($Con, $sql); 

		#Email here

		if ($query) {

		mysqli_query($Con,"COMMIT");

		$_SESSION['msg']= "order # $orderId succesfully updated";
		header("location:../edit_order.php");
		} else {        
		mysqli_query($Con,"ROLLBACK");

		$_SESSION['msg']="An error occured during processing, please try again";
		header("location:../edit_order.php");
		}
		mysqli_close($Con);

}else{
	$_SESSION['msg'] = "unknown request";
	header('Location:../edit_order.php');
}





?>