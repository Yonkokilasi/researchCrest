<?php
include("../connect.php");
include("../session.php");

if (isset($_POST['done'])) {
	$page = $_GET['page'];
	$id = $_GET['id'];
	$_SESSION['msg']="request successfully processed";
  	header("location:../$page?id=$id#files");
}else{
	$_SESSION['msg']="bad url request";
  	header("location:../index.php");
}
?>