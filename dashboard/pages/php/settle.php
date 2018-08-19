<?php
date_default_timezone_set("GMT");
include("../connect.php");
include("../session.php");

$orderId = $_GET['id'];

$sql        = "SELECT * FROM `order` WHERE orderId = '$orderId'";
$query      = mysqli_query($Con, $sql);
$row        = mysqli_fetch_assoc($query);
$clientId   = mysqli_real_escape_string($Con, $row['clientId']);
$writerId   = mysqli_real_escape_string($Con, $row['writerId']);

$dateDue    = date('Y-m-d H:i:s');

$sql6       = "SELECT user_name FROM `registration` WHERE reg_id = '$writerId'";
$query6     = mysqli_query($Con, $sql6);
$row6       = mysqli_fetch_assoc($query6);
$user_name  = mysqli_real_escape_string($Con, $row6['user_name']);

if (isset($_POST['refund'])) {

mysqli_autocommit($Con,false);

$sql2 = ("UPDATE `order` 
		SET `order`.orderStatus 	= 'paid',
			`order`.dateDue 		    = 'refund'  
		WHERE `order`.orderId 		= '$orderId'");

$query2 = mysqli_query($Con, $sql2) or mysql_error();

$sql3 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '', '$clientId', 'client', 'The dispute you opened on order # $orderId has been closed in your favor and a refund issued. The admin will process the refund and you will get your money as soon as possible. To view this refund, go to your archived orders.', 'not viewed')");

$query3 = mysqli_query($Con,$sql3) or mysql_error();

 $sql4 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '$writerId', '', 'writer', 'The dispute filed against you on order # $orderId has been closed in favor of the client and a refund has been issued. Be more attentive to avoid such disputes in your future orders. To view this refund, go to your archived orders. We appreciate your cooperation', 'not viewed')");

$query4 = mysqli_query($Con,$sql4) or mysql_error();

 $sql5 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '', '', 'Support', 'The dispute filed against Writer $writerId - ($user_name) on order # $orderId has been closed in favor of the client and a refund has been issued.', 'not viewed')");

$query5 = mysqli_query($Con, $sql5) or mysql_error();

 if ($query and $query2 and $query3 and $query4 and $query5 and $query6) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Your refund has been successfully been recorded, it will be processed soon ";
  	header("location:../disputed.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
   $_SESSION['msg']="An error occured during processing, please try again";
   header("location:../disputed.php");

}
} else if (isset($_POST['resolve'])) {

mysqli_autocommit($Con,false);

$sql2     = ("UPDATE `order` SET `order`.orderStatus = 'done' 
            WHERE `order`.clientId = '$clientId' AND `order`.orderId = '$orderId'");
$query2   = mysqli_query($Con, $sql2) or mysql_error();

$sql7     = ("UPDATE `payment` 
            SET `payment`.clientId      = '$clientId', 
              `payment`.eligible      = 'eligible',
              `payment`.dateDue       = '$dateDue'    
            WHERE `payment`.orderId   = '$orderId'");

$query7   = mysqli_query($Con, $sql7) or mysql_error();

$sql3     = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
            VALUES (NULL, '', '$clientId', 'client', 'The dispute you opened against the writer $writerId ($user_name) on order # $orderId has been resolved in favor of the writer. A message with the reasons explaining this outcome has been sent to you. Thank you for understanding', 'not viewed')");

$query3 = mysqli_query($Con,$sql3) or mysql_error();

 $sql4 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '$writerId', '', 'writer', 'The dispute filed against you on order # $orderId has been resolved in your favor. To view the order and its financial overview, go to approved orders', 'not viewed')");


$query4 = mysqli_query($Con,$sql4) or mysql_error();

 $sql5 = ("INSERT INTO `r_p_w`.`notifications` (`id`, `writerId`, `studentId`, `userType`, `notification`, `status`) 
        VALUES (NULL, '', '', 'Support', 'The dispute filed against Writer $writerId - ($user_name) on order # $orderId has been resolved in favor of the writer.', 'not viewed')");

$query5 = mysqli_query($Con,$sql5) or mysql_error();

 if ($query and $query2 and $query3 and $query4 and $query5 and $query6 and $query7) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="Your refund has been successfully been recorded, it will be processed soon ";
    header("location:../disputed.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
   $_SESSION['msg']="An error occured during processing, please try again";
   header("location:../disputed.php");

  }
}
else{
    $_SESSION['msg']="Bad url request";
   header("location:../disputed.php");
}

?>  