<?php
include("../connect.php");
include("../session.php");

$id = $_GET['token'];

if (isset($_POST['set_visible'])) {

mysqli_autocommit($Con,false);

$sql1 = ("UPDATE `feedback` SET `feedback`.status = 'visible' WHERE `feedback`.id = '$id'");
$query1=mysqli_query($Con, $sql1) or mysql_error();

 if ($query1 ) {

  mysqli_query($Con,"COMMIT");

  $_SESSION['msg']="Feedback # $id is now visible to all users";
    header("location:../feedback.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
    header("location:../feedback.php");

  }
  mysqli_close($Con);
} else 
if (isset($_POST['set_invisible'])) {
  mysqli_autocommit($Con,false);

$sql1 = ("UPDATE `feedback` SET `feedback`.status = 'not visible' WHERE `feedback`.id = '$id'");
$query1=mysqli_query($Con, $sql1) or mysql_error();

 if ($query1 ) {

  mysqli_query($Con,"COMMIT");

  $_SESSION['msg']="Feedback # $id is not visible to all users";
    header("location:../feedback.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
    header("location:../feedback.php");

  }
}else 
if (isset($_POST['delete'])) {
  mysqli_autocommit($Con,false);

$sql1 = ("DELETE FROM `feedback` WHERE `feedback`.id = '$id'");
$query1=mysqli_query($Con, $sql1) or mysql_error();

 if ($query1 ) {

  mysqli_query($Con,"COMMIT");

  $_SESSION['msg']="Feedback # $id has been deleted";
    header("location:../feedback.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again";
    header("location:../feedback.php");

  }
}

 else{
      $_SESSION['msg']="bad url request";
    header("location:../index.php");
}


?>