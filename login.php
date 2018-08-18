<?php
include("connect.php");
date_default_timezone_set("GMT");
if (isset($_POST['login_user'])) {

$email 		= $_POST['email'];
$password  	= md5(sha1($_POST['password']));

mysqli_autocommit($Con,false);

$exe=mysqli_query($Con,"select  * from registration where password='$password' and email='$email'");
$row= mysqli_fetch_array($exe);
if(mysqli_num_rows(mysqli_query($Con,"select  * from registration where password='$password' and email='$email'" ))>0)
{
	$login_time     = date('Y-m-d H:i:s');
	$user_session	= uniqid();
	$ip_address 	= $_SERVER['REMOTE_ADDR'];
$result  = mysqli_query($Con,"UPDATE `registration` SET `registration`.online_status = 'online' WHERE `registration`.email = '$email'");

if (mysqli_query($Con, "UPDATE `sessions` 
		SET `sessions`.user_session 	= '$user_session',
			`sessions`.ip_address 		= '$ip_address',
			`sessions`.login_time 		= '$login_time'  
	WHERE   `sessions`.email 			= '$email'")) {

mysqli_query($Con,"COMMIT");

if (($row["user_type"] == 'client') && ($row["activation_status"] == 'active') && ($row["account_status"] == 'active')) {

if ($result) {
$reg_id             = $row["reg_id"];	
$reg_sess = time().sha1(md5($reg_id));
session_id($reg_sess);
session_start();		
$_SESSION['id']		= $row["reg_id"];
$_SESSION['logged'] = true;
$_SESSION['user']	= $user_session;
session_write_close();
header("location:../account/");
} else{
session_start();	
$_SESSION['err'] = "a technical error occured during log in, kindly try again";
header("location:../login.php");
}

}if (($row["user_type"] == 'client') && ($row["activation_status"] == 'inactive') && ($row["account_status"] == 'active')) {
session_start();
$_SESSION['err'] = "Your account is inactive, Kindly <a href = 'contact.php'>use this link</a> to contact support";
header("location:../login.php");
session_start();
}if (($row["user_type"] == 'client') && ($row["activation_status"] == 'active') && ($row["account_status"] == 'inactive')) {
session_start();
$_SESSION['err'] = "Your account is inactive, Kindly <a href = 'contact.php'>use this link</a> to contact support";
header("location:../login.php");

}if (($row["user_type"] == 'client') && ($row["activation_status"] == 'suspended') && ($row["account_status"] == 'suspended')) {
session_start();
$_SESSION['err'] = "Your account has been suspended, Kindly <a href = 'contact.php'>use this link</a> to contact support.";
header("location:../login.php");
}
if ($row["user_type"] == 'writer') {
session_start();
$_SESSION['err'] = "Kindly <a href = 'writing-jobs/login.php'>click this link</a> for writer login";
header("location:../login.php");
}
if (($row["user_type"] == 'admin') && ($row["activation_status"] == 'active') && ($row["account_status"] == 'active')) {

$reg_id             = $row["reg_id"];	
$reg_sess = time().sha1(md5($reg_id));
session_id($reg_sess);
session_start();
$reg_id              = $row["reg_id"];	
$_SESSION['id']		 = $row["reg_id"];
$_SESSION['logged']  = true;
$_SESSION['user']	 = $user_session;
session_write_close();
header("location:../admin");
}
} 
} else {        
mysqli_query($Con,"ROLLBACK");
session_start();  
$_SESSION['err'] = "Email or Password does not match. Kindly check and try again";
header("location:../login.php");

}
}
else{
session_start();
$_SESSION['err'] = "An error occured during processing please try again...";
header("location:../login.php");
}

?>