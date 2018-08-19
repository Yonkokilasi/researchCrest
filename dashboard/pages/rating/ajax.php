<?php
require_once 'config.php';

    if($_POST['act'] == 'rate'){
    	//search if the user(ip) has already gave a note
    	$ip        = $_SERVER["REMOTE_ADDR"];
    	$therate   = $_POST['rate'];
    	$orderId   = $_POST['post_id'];

        $sql1        = "SELECT * FROM `order` WHERE orderId = '$orderId'";
        $query1      = mysqli_query($Con, $sql1);
        $row1        = mysqli_fetch_assoc($query1);
        $clientId    = $row1['clientId'];
        $writerId    = $row1['writerId'];

    	$query = mysqli_query($Con, "SELECT * FROM wcd_rate WHERE orderId = '$orderId'"); 
    	while($data = mysqli_fetch_assoc($query)){
    		$rate_db[] = $data;
    	}
    	if(@count($rate_db) == 0 ){
    		mysqli_query($Con, "INSERT INTO `wcd_rate` (`id`, `studentId`, `writerId`, `orderId`, `ip`, `rate`, `dt_rated`) VALUES (NULL, '$clientId', '$writerId', '$orderId', '$ip', '$therate', CURRENT_TIMESTAMP)");
    	}else{
    		mysqli_query($Con, "UPDATE wcd_rate SET rate= '$therate' WHERE orderId = '$orderId'");
    	}
    } 
?>
