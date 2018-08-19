<?php
include("connect.php");
include("session.php");

mysqli_autocommit($Con,false);

$sql2 		= "SELECT * FROM `messaging` WHERE recipient = '$session_id' AND status = 'unread'";
$query2 	= mysqli_query($Con, $sql2);
$result2 	= mysqli_num_rows($query2);
if ($result2 > 0) {
	
	echo "1";

} else{

echo "0";

}
 mysqli_close($Con);
?>