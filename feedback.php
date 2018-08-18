<?php
include("connect.php");
date_default_timezone_set("GMT");

session_start();
 
// $email = $_POST['email'];
$name      = mysqli_real_escape_string($Con, $_POST['name']);
$email     = mysqli_real_escape_string($Con, $_POST['email']);
$message   = mysqli_real_escape_string($Con, $_POST['message']);
$date      = date('d M Y H:i:s A');

if (isset($_POST['sent_feed'])) {

// if(isset($_POST['g-recaptcha-response'])){
// 	      $captcha=$_POST['g-recaptcha-response'];
// 	    }
// 	    if(!$captcha){
// 	        $_SESSION['err']="Please check the the captcha form.";
// 			header("location:../index");
// 	    }
// 	    $secretKey = "6LeSeA0UAAAAAEXkvo3g7BeGKvKb7UgTYGy0HQhy";
// 	    $ip = $_SERVER['REMOTE_ADDR'];
// 	    $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
// 	    $responseKeys = json_decode($response,true);
// 	    if(intval($responseKeys["success"]) !== 1) {
// 	      	$_SESSION['err']="Kindly confirm that you are not a robot !";
// 			header("location:../index");
// 	    } else {
	    	
$sql = ("INSERT INTO `feedback` (`id`, `username`, `email`, `title`, `content`, `time`, `status`) VALUES (NULL, '$name', '$email', 'Feedback', '$message', '$date', 'not visible')");

$query=mysqli_query($Con, $sql); 

#Email here

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['info'] = "your feedback has been succesfully sent, thank you";
	header("location:../index");
 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['err']="An error occured during processing, please try again";
	header("location:../index");
  }

  mysqli_close($Con);

// } 

}else{

$_SESSION['err'] = "kindly use the form provided in the feedback page";
header('Location: ../index.php');
}

?>