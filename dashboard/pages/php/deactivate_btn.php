<?php
include("../connect.php");
include("../session.php");


if (isset($_POST['Deactivate'])) {

$cou1 = "SELECT * FROM `registration` WHERE reg_id = '$session_id';";
$varia1 = mysqli_query($Con, $cou1); 
$raws1 = mysqli_fetch_assoc($varia1);
$user = mysqli_real_escape_string($Con, $raws1['user_type']);
if ($user != 'admin') {
	header('Location:../logout.php');
}else if($user == 'admin'){

	$sql = ("UPDATE `pay` 
	SET `pay`.status 	= 'No'
	WHERE `pay`.id 		= '37702b12d58a007b86a4895' ");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Payment Button has been deactivated";
	header("location:../finance.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
	header("location:../finance.php");
  }

  mysqli_close($Con);

}else{

	$_SESSION['msg']="bad url request";
	header("location:../index.php");
}
} else{
	$_SESSION['msg']="please use the provided link";
	header("location:../index.php");
}
?>