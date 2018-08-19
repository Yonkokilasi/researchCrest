<?php
include("connect.php");
include("session.php");

$msgId = $_GET['msgId'];

$sql2 		= "SELECT * FROM `messaging` WHERE sender = 'Support' AND id = '$msgId'";
$query2 	= mysqli_query($Con, $sql2);
$result2 	= mysqli_num_rows($query2);
if ($result2 > 0) {
	
	exit();

} else{

mysqli_autocommit($Con,false);

$sql = ("UPDATE `messaging` 
	SET `messaging`.status 	= 'read'
	WHERE `messaging`.id 		= '$msgId'");

$query=mysqli_query($Con, $sql) or mysql_error(); 

 if ($query) {

    mysqli_query($Con,"COMMIT");

 } else {        
      mysqli_query($Con,"ROLLBACK");
  }

  mysqli_close($Con);
}

?>