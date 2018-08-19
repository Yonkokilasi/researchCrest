<?php 
include("../connect.php");
include("../session.php");

$sql 	= "SELECT * FROM gen WHERE sender =  'support' GROUP BY user_type ";
$result = mysqli_query($Con, $sql);
$row 	= mysqli_num_rows($result);

if (empty($row)) {
	 exit();
} else{
	echo "<h1 class = 'label_not label-danger'>".$row."</h1>";
}

?>