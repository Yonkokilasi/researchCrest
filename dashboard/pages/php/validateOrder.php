<?php
include("../connect.php");
include("../session.php");

if (isset($_GET['id'])) {

$orderId = $_GET['id'];

mysqli_autocommit($Con,false);

$sql = ("UPDATE `order` 
    SET `order`.orderStatus       = 'not taken'
    WHERE `order`.orderId         = '$orderId'");

$query = mysqli_query($Con, $sql) or mysql_error();

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Order has been successfully validated!";
    header("location:../posted.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
   $_SESSION['msg']="An error occured during processing, please try again";
   header("location:../posted.php");

  }

} else{

$_SESSION['msg']="order Id does not exist...";
header("location:../unpaid.php");

}
?>

